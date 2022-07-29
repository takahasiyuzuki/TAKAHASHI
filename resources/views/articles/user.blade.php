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
                  <th>メール</th>
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
                  <form style="display:inline" action="{{ route('edit', $user->id) }}" method="post">
                    <button type="button" class="button3" onClick="location.href='{{ route('useredit', $user->id) }}'">
                      編集
                    </button>
                  </form>
                       @if(Auth::id() === config('const.admin_flag.管理者'))
                         <form style="display:inline" name="contactform" action="{{ route('userdestroy', $user->id) }}">
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
