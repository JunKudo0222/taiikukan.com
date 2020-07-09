@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('gyms.store') }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label>施設名</label>
                    <input type="text" class="form-control" placeholder="施設名を入力して下さい" name="title">
                </div>

                <div class="form-group">
        <label for="exampleFormControlSelect1">都道府県</label>
        <select class="form-control" id="exampleFormControlSelect1" name="prefectures">
        @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture -> id }}">{{ $prefecture -> name }}</option>
      
        @endforeach
        </select>
        </div>


        <div class="form-group">
        <label for="exampleFormControlSelect1">市町村</label>
        <select class="form-control" id="exampleFormControlSelect1" name="areas">
        @foreach($areas as $area)
        <option value="{{ $area -> id }}">{{ $area -> name }}</option>
      
        @endforeach
        </select>
        </div>

        <div class="">
        @foreach($weekdays as $weekday)
  <input type="checkbox" class="" id="{{ $weekday ->id }}" name="week.{{ $weekday ->id }}">
  <label class="" for="{{ $weekday -> id }}">
  
  {{ $weekday -> name }}
  
  </label><br>
  @endforeach
</div>

<div class="form-group row">  
<label for="example-time-input" class="col-2 col-form-label">開館時間</label>  
<div class="col-10">    
<input class="form-control" type="time" value="13:45:00" id="example-time-input" name="openhour">  
</div></div>
<div class="form-group row">  
<label for="example-time-input" class="col-2 col-form-label">閉館時間</label>  
<div class="col-10">    
<input class="form-control" type="time" value="13:45:00" id="example-time-input" name="closehour">  
</div></div>

        
        




                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="detail"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
@endsection