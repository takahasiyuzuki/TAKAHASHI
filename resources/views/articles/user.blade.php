@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
      <div class="midasi"><div class="toukou">ユーザー詳細</div></div>
        <div class="card-body">
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>名前</th>
                  <th>メールアドレス</th>
                </tr>
              </thead> 
              <tbody>
                @if(isset($user))
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                </tr>
                @endif
              </tbody>
            </table>

            @if(isset($user))
              <div class="text-center">
                 <button type="button" class="button4" onClick="history.back()">戻る</button>
                  <form style="display:inline" action="{{ route('profile', $user->id) }}" method="post">
                    <button type="button" class="button3" onClick="location.href='{{ route('profile', $user->id) }}'">
                      編集
                    </button>
                  </form>
                  <form style="display:inline" name="contactform" action="{{ route('delete', $user->id) }}">
                    <a class="button5" data-toggle="modal" data-target="#SampleModal" data-title="{{ $user->id }}" data-url="{{ route('delete', $user->id) }}" > 
                      削除 </a>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
