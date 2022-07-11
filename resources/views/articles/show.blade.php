@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">記事詳細</div>

        <div class="card-body">
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
                @if(isset($article))
                <tr>
                <td><a href="{{ route('edit', $article->id) }}">{{ $article->title }}</a></td>
                  <td>{{ $article->body }}</td>
                  <td>{{ $article->status }}</td>
                </tr>
                @endif
              </tbody>
            </table>
            @if(isset($article))
            <div class="text-center">
                <button type="button" class="button4" onClick="history.back()">戻る</button>

                <form style="display:inline" action="{{ route('edit', $article->id) }}" method="post">
                <button type="button" class="button3" onClick="location.href='{{ route('edit', $article->id) }}'">
                    編集
                </button>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button2">
                        {{ __('削除') }}
                    </button>
                </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection