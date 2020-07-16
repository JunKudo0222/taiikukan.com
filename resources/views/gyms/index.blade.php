@extends('layouts.app')　{{--→ここでviews layoutsの app.blade.phpを読み込みます--}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
	         <div class="card text-center">
			<div class="card-header">
				<a href="{{ route('gyms.index') }}">体育館一覧</a>
			</div>
			<div class="card-body">
				<form action="{{route('gyms.search')}}" method="get">
					@csrf
					<p>検索したいキーワードを入力してください。</p>
  					<input type="search" name="search" placeholder="キーワードを入力"><br>
					  
                    
                    @foreach($weekdays as $weekday)
                        <input type="checkbox" class="" id="{{ $weekday ->id }}" name="weeks[]" value="{{$weekday -> id}}">
                        <label class="" for="{{ $weekday -> id }}">
                            {{ $weekday -> name }}
                        </label>
                    @endforeach
                
  					<input type="submit"  value="検索">
				</form>
				@isset($search_result)
				<div>
		
				
				<h3>
				{{$search_result}}
				</h3>
				</div>
				@endisset

				<!-- <p class="card-text"> -->
				<div class="row">
				@foreach($gyms as $gym)
				<div class="card col-md-3" style="width: 18rem;">
				
  
  <div class="card-body" class="text-center">
    <h5 class="card-title">{{$gym -> name }}</h5>
	@if(isset($gym->image_path))
	<img src="{{ $gym->image_path }}" alt="画像" class="col-12">
	@endif
    <p class="card-text">{{$gym -> prefecture ->name}}</p>
    <p class="card-text">{{$gym -> area ->name}}</p>
    <p class="card-text">{{$gym -> price}}</p>
    <p class="card-text">@foreach( $gym->weekdays as $weekday)
                    {{ $weekday->name }}/
                @endforeach</p>

    <a href="{{ route('gyms.show',$gym ->id) }}" class="btn btn-primary">詳細へ</a>
  </div>
</div>
                        @endforeach
				</div>
				
				<!-- </p> -->
				
			
		</div>
        </div>

        <div class="col-md-2">
            <a href="{{ route('gyms.create') }}" class="btn btn-primary">新規投稿</a>
        </div>
    </div>
</div>
@endsection


