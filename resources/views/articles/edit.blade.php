@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="midasi"><div class="toukou">編集</div></div>
                <div class="card-body">
                    <form action="{{ route('update', $article->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">本文</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" class="form-control">{{ old('body', $article->body) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="nickname" class="col-md-2 col-form-label text-md-right">画像</label>
                        <input type="file" name="img_path">
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