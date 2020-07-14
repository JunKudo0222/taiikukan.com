<!-- {{$gym -> detail}} -->


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>施設名：{{ $gym->name }}</h5>
            </div>
            
        </div>
    </div>
</div>



<div class="row justify-content-center"><div class="col-md-8">

<img src="{{ $gym->image_path }}" alt="画像">

<table class="table">
  <thead>
    <tr>
      <th scope="col">データ名</th>
      <th scope="col">First</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">詳細</th>
      <td>{{ $gym->detail }}</td>
      
      
    </tr>
    <tr>
      <th scope="row">開館時間</th>
      <td>{{ $gym->openhour }}</td>
      
      
    </tr>
    <tr>
      <th scope="row">閉館時間</th>
      <td>{{ $gym->closehour }}</td>
      
    </tr>
    <tr>
      <th scope="row">メールアドレス</th>
      <td>{{ $gym->email }}</td>
      
    </tr>
    <tr>
      <th scope="row">電話番号</th>
      <td>{{ $gym->phonenumber }}</td>
    </tr>
      
    <tr>
      <th scope="row">都道府県・市町村</th>
      <td>{{ $gym->prefecture->name }}・{{ $gym->area->name }}</td>
      
    </tr>
    <tr>
      <th scope="row">利用可能日</th>
      <td>@foreach( $gym->weekdays as $weekday)
                    {{ $weekday->name }}/
                @endforeach</td>
    </tr>

    <tr>
      <th scope="row">投稿日時</th>
      <td>{{ $gym->created_at }}</td>
    </tr>
      
  </tbody>
</table>
<div class="col-md-5">
            <a href="{{ route('gyms.edit',$gym ->id) }}" class="btn btn-primary">編集</a>
        </div>
</div></div>
@endsection