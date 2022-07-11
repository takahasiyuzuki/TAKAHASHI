@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>

      <div class="card-body">

       <div class="wrap">
         <button type="button" class="button" onclick="location.href='{{ route('create') }}'">
            新規投稿
          </button>
       </div>

          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>本文</th>
                  <th>状態</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($articles))
                @foreach ($articles as $article)
                <tr>
                  <td ><a href="{{ route('show', $article->id) }}">{{ $article->title }}</a></td>
                  <td>{{ $article->body }}</td>
                  <td>{{ $article->status }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection