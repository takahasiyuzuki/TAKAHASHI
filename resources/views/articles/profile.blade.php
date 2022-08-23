@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="midasi"><div class="toukou">編集</div></div>
                <div class="card-body">

                    <form action="{{ route('renewal', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">名前</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">メール</label>
                            <div class="col-md-9">
                                <textarea name="email" id="email" class="form-control">{{ old('email', $user->email) }}</textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="button4" onClick="history.back()">戻る</button>
                            <button type="submit" class="button2" name='action'value='add'>
                                登録
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection