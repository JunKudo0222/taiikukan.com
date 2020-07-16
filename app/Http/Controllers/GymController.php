<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Area;
use App\Weekday;
use App\Gym;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GymRequest;
use JD\Cloudder\Facades\Cloudder;
use App\Comment;

class GymController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gyms = Gym::all();
        $weekdays = Weekday::all();

        
        $gyms->load('prefecture', 'area');
        return view('gyms.index',compact('gyms','weekdays'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefectures = Prefecture::all();
        $areas = Area::all();
        $weekdays = Weekday::all();
        return view('gyms.create',compact('prefectures','areas','weekdays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GymRequest $request)
    {

        $gym = new Gym; 
        $gym -> name    = $request -> name; //ユーザー入力のtitleを代入
        $gym -> openhour = $request -> openhour; //ユーザー入力のbodyを代入
        $gym -> closehour = $request -> closehour; //ユーザー入力のbodyを代入
        $gym -> detail = $request -> detail; //ユーザー入力のbodyを代入
        $gym -> area_id = $request -> area; //ユーザー入力のbodyを代入
        $gym -> email = $request -> email; //ユーザー入力のbodyを代入
        $gym -> phonenumber = $request -> phonenumber; //ユーザー入力のbodyを代入
        $gym -> price = $request -> price; //ユーザー入力のbodyを代入
        $gym -> prefecture_id = $request -> prefecture; //ユーザー入力のbodyを代入
        
        $gym -> user_id  = Auth::id(); //ログイン中のユーザーidを代入

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $gym->image_path = $logoUrl;
            $gym->public_id  = $publicId;
        }


        $gym -> save(); //保存してあげましょう
        foreach($request->weeks as $week){
            
                $gym->weekdays()->attach($week);
            
        }
        

        
        
        
        
        
        return redirect()->route('gyms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gym = Gym::find($id);
        
        $gym->load('weekdays','area','prefecture','user','comments');

        
        
        

        return view('gyms.show', compact('gym'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gym = Gym::find($id);
        $gym->load('weekdays','area','prefecture');
        $prefectures = Prefecture::all();
        $areas = Area::all();
        $weekdays = Weekday::all();
        $gym_weekdays = $gym -> weekdays;
        foreach($gym_weekdays as $gym_weekday){
            $gym_weekdays_id[] = $gym_weekday -> id;
        }
        
        return view('gyms.edit',compact('gym','prefectures','areas','weekdays','gym_weekdays_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $gym = Gym::find($id);
        $gym -> name    = $request -> name; //ユーザー入力のtitleを代入
        $gym -> openhour = $request -> openhour; //ユーザー入力のbodyを代入
        $gym -> closehour = $request -> closehour; //ユーザー入力のbodyを代入
        $gym -> detail = $request -> detail; //ユーザー入力のbodyを代入
        $gym -> area_id = $request -> area; //ユーザー入力のbodyを代入
        $gym -> email = $request -> email; //ユーザー入力のbodyを代入
        $gym -> phonenumber = $request -> phonenumber; //ユーザー入力のbodyを代入
        $gym -> price = $request -> price; //ユーザー入力のbodyを代入
        $gym -> prefecture_id = $request -> prefecture; //ユーザー入力のbodyを代入
    
        
        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $gym->image_path = $logoUrl;
            $gym->public_id  = $publicId;
        }


        $gym -> save(); //保存してあげましょう
        
        $gym->weekdays()->detach();
        foreach($request->weeks as $week){
            
            $gym->weekdays()->attach($week);
                
            
        }
        

        
        
        
        
        
        return redirect()->route('gyms.show',$gym ->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gym = Gym::find($id);

        if(Auth::id() !== $gym->user_id){
            return abort(404);
        }

        if(isset($gym->public_id)){
            Cloudder::destroyImage($gym->public_id);
        }

        $gym -> delete();

        return redirect()->route('gyms.index');


        
    }
    public function search(Request $request)
    {
        
        $weekdays = Weekday::all();
        $query = Gym::query();

        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%')
            ->orWhereHas('prefecture', function($query) use($request) {           
                $query->where('name', 'like', "%{$request->search}%");})
            ->orWhereHas('area', function($query) use($request) {
                $query->where('name','like',"%{$request->search}%");});
        }

        if(isset($request->weeks)){
            foreach($request->weeks as $week){
                $query->whereIn('gyms.id', function($query) use ($week) {
                    $query->from('gym_weekday')
                    ->select('gym_weekday.gym_id')
                    ->where('gym_weekday.weekday_id',$week);
                });
            }
        }
        
         $gyms = $query->get();
        
        
        

        $search_result = $request->search.'の検索結果'.$gyms->count().'件';

        return view('gyms.index',compact('gyms','search_result','weekdays'));    
    }
  
}

// @foreach( $gym->weekdays as $weekday)
//                     {{ $weekday->name }}/
//                 @endforeach