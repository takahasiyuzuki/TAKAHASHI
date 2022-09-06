@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="midasi">
          <div class="toukou">ユーザー</div>
          </div>

            <div class="card-body">
                <div class="table-resopnsive">
                     <table class="table table-striped">
                       <thead>
                         <tr>
                         <th>ID</th>
                         <th>名前</th>
                         <th>メール</th>
                         </tr>
                        </thead>
                      
                        <tbody>
                          @foreach($users as $user)
                          <tr class="orange">
                          <tr onclick="location.href='{{ route('user', $user->id) }}'" class="orange">
                            <td><a class="result">{{ $user->id }}</a></td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                 </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection