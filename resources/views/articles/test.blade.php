@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
      <div class="midasi"><div class="toukou">記事詳細</div></div>
        <div class="card-body">
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>作成者</th>
                  <th>タイトル</th>
                  <th>本文</th>
                  <th>状態</th>
                </tr>
              </thead> 
              <tbody>
                @if(isset($article))
                <tr>
                  <td>{{ $article->user->name }}</td>
                  <td>{{ $article->title }}</td>
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
                  </form>
                       @if(Auth::id() === config('const.admin_flag.管理者'))
                         <form style="display:inline" name="contactform" action="{{ route('destroy', $article->id) }}">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit"  class="button2"  onclick="return confirm_test()">
                                      {{ __('削除') }}
                                  </button>
                          </form>
                            <div id="popup">
                                本当に削除しますか？<br>
                                <button id="ok" onclick="okfunc()"> O K </button>
                                <button id="no" onclick="nofunc()">キャンセル</button>
                            </div>
                       @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
