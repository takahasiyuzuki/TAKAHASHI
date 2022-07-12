@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="midasi"><div class="toukou">投稿一覧</div></div>
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
                  <th>ID</th>
                  <th>タイトル</th>
                  <th>本文</th>
                  <th>状態</th>
                </tr>
              </thead>
                 
              <tbody>
                @if(isset($articles))
                @foreach ($articles as $article)
                <tr class="orange">
                  <td><a class="result" href="{{ route('show', $article->id) }}">{{ $article->id }}</a></td>
                  <td>{{ $article->title }}</a></td>
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