@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($errors->any())
                <div class="alert alert-success">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('gyms.update',$gym->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
                <div class="form-group">
                    <label>施設名</label>
                    <input value="{{$gym->name}}" type="text" class="form-control" placeholder="施設名を入力して下さい" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">都道府県</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="prefecture">
                        @foreach($prefectures as $prefecture)
                            @if($prefecture -> id == $gym -> prefecture -> id)
                            <option value="{{ $prefecture -> id }}" selected>{{ $prefecture -> name }}</option>
                            @else
                            <option value="{{ $prefecture -> id }}" >{{ $prefecture -> name}}</option>
                            @endif
    
                        
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">市町村</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="area">
                        @foreach($areas as $area)
                        @if($area->id == $gym -> area -> id)
                            <option value="{{ $area -> id }}" selected>{{ $area -> name }}</option>
                        @else
                        <option value="{{ $area -> id }}">{{ $area -> name }}</option>   
                        @endif 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input value="{{$gym -> email}}" type="email" class="form-control" placeholder="メールアドレスを入力して下さい" name="email">
                </div>

                <div class="form-group">
                    <label>電話番号</label>
                    <input value="{{$gym -> phonenumber}}" type="tel" class="form-control" placeholder="電話番号を入力して下さい" name="phonenumber">
                </div>

                <div class="form-group">
                    <label>利用料金</label>
                    <input value="{{$gym -> price}}" type="number" class="form-control" placeholder="利用料金を入力して下さい" name="price">
                </div>

                <div class="">
                    <label for="exampleFormControlSelect1">営業日</label><br>
                    @foreach($weekdays as $weekday)
                    

                    
                        <input {{ in_array($weekday->id, $gym_weekdays_id, true) ? 'checked="checked"' : ''}}
                        value="{{$weekday -> id}}" type="checkbox" class="" id="{{ $weekday ->id }}" name="weeks[]" value="{{$weekday -> id}}">
                        <label class="" for="{{ $weekday -> id }}">
                            {{ $weekday -> name }}
                        </label><br>
                    @endforeach
                </div>

                <div class="form-group row">  
                    <label for="example-time-input" class="col-2 col-form-label">開館時間</label>  
                    <div class="col-10">    
                        <input class="form-control" type="time" value="{{$gym->openhour}}" id="example-time-input" name="openhour">  
                    </div>
                </div>
                <div class="form-group row">  
                    <label for="example-time-input" class="col-2 col-form-label">閉館時間</label>  
                    <div class="col-10">    
                        <input class="form-control" type="time" value="{{$gym->closehour}}" id="example-time-input" name="closehour">  
                    </div>
                </div>

                <div class="form-group">
                    <label>内容</label>
                    <textarea  class="form-control" placeholder="内容" rows="5" name="detail">{{$gym ->detail}}</textarea>
                </div>

                <div class="form-group"><label for="image"></label><input type="file" class="form-control-file" id="image" name="image"></div>
                <img src="{{ $gym->image_path }}" alt="画像">
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
@endsection