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
            <form action="{{ route('gyms.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label>施設名</label>
                    <input type="text" class="form-control" placeholder="施設名を入力して下さい" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">都道府県</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="prefecture">
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture -> id }}">{{ $prefecture -> name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">市町村</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="area">
                        @foreach($areas as $area)
                            <option value="{{ $area -> id }}">{{ $area -> name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" class="form-control" placeholder="メールアドレスを入力して下さい" name="email">
                </div>

                <div class="form-group">
                    <label>電話番号</label>
                    <input type="tel" class="form-control" placeholder="電話番号を入力して下さい" name="phonenumber">
                </div>

                <div class="form-group">
                    <label>利用料金</label>
                    <input type="number" class="form-control" placeholder="利用料金を入力して下さい" name="price">
                </div>

                <div class="">
                    <label for="exampleFormControlSelect1">営業日</label><br>
                    @foreach($weekdays as $weekday)
                        <input type="checkbox" class="" id="{{ $weekday ->id }}" name="weeks[]" value="{{$weekday -> id}}">
                        <label class="" for="{{ $weekday -> id }}">
                            {{ $weekday -> name }}
                        </label><br>
                    @endforeach
                </div>

                <div class="form-group row">  
                    <label for="example-time-input" class="col-2 col-form-label">開館時間</label>  
                    <div class="col-10">    
                        <input class="form-control" type="time" value="13:45:00" id="example-time-input" name="openhour">  
                    </div>
                </div>
                <div class="form-group row">  
                    <label for="example-time-input" class="col-2 col-form-label">閉館時間</label>  
                    <div class="col-10">    
                        <input class="form-control" type="time" value="13:45:00" id="example-time-input" name="closehour">  
                    </div>
                </div>

                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="detail"></textarea>
                </div>

                <div class="form-group"><label for="image"></label><input type="file" class="form-control-file" id="image" name="image"></div>
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
@endsection