@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
      <div class="midasi">

      @if(isset($article))
        <div class="toukou">{{ $article->title }}記事詳細<div style="float: right; margin-right: 50px;">{{ config('const.status')[$article->status] }}中</div></div>
      </div>
        <div class="card-body">
          <div class="table-resopnsive">
                  <div class="box1">作成者：{{ $article->user->name }}</div>

                  <div class="card-2">
                   <div class="content-img">
                    <img src="{{ asset("storage/$article->img_path") }}" />
                   </div>
                  <p class="content-1">{{ $article->title }}</p>
                  <hr>
                  <p class="content-2">{{ $article->body }}</p>
                </div>
                @endif

            @if(isset($article))
              <div class="text-center">
              <button type="button" class="button4" onClick="history.back()">戻る</button>
                  <form style="display:inline" action="{{ route('edit', $article->id) }}" medivod="post">
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
