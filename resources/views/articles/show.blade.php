@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
   <div class="col-md-12">
    <div class="card">
      <div class="midasi">

          @if(isset($article))
            <div class="toukou">{{ $article->title }}記事詳細<div style="float: right; margin-right: 50px;">
            {{ config('const.status')[$article->status] }}中</div></div>
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
                                      <a class="button5" data-toggle="modal" data-target="#SampleModal" data-title="{{ $article->id }}" data-url="{{ route('destroy',['id' => $article->id]) }}" > 削除 </a>
                                    <div class="modal fade" id="SampleModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                      <form role="form" class="form-inline" method="post" action="">
                                      @csrf
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="myModalLabel">本当に削除しますか？</h5>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a class="btn btn-light" data-dismiss="modal">閉じる</a>
                                                      <button type="submit" class="btn btn-danger">削除</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </form>
                          @endif
                    @endif
                </div>
      </div>
    </div>
  </div>
@endsection
