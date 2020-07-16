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
            <form action='{{ route('gyms.destroy', $gym->id) }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' value='削除' class="btn btn-danger" 
                     onclick='return confirm("削除しますか？");'>
            </form>
            <br><br>
            <a href="{{ route('gyms.index') }}" class="btn btn-primary">一覧へ戻る</a>
        </div>
</div></div>
<div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
            {{csrf_field()}}
	    <input type="hidden" name="gym_id" value="{{ $gym->id }}">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" 
                     placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>
</div>


<div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($gym->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-text">内容：{{ $comment->body }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection