@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="midasi"><div class="toukou">編集</div></div>
                <div class="card-body">
                    <form action="{{ route('update', $article->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div style="margin-left:400px; width:40vw;"><a href="">
                        <img src="{{ asset("storage/$article->img_path") }}"></a>
                        </div><br>
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">本文</label>
                            <div class="col-md-9">
                                <textarea name="body" id="textarea" class="form-control" style="height:200px;">{{ old('body', $article->body) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">ステータス</label>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" id="open" name="status" value="0" checked="checked">
                                <label class="form-check-label" for="open">非公開</label>
                             </div>
                             <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="private"  name="status" value="1">
                                <label class="form-check-label" for="private">公開</label>
                             </div>
                        </div>
                        <div class="form-group row">
                        <label for="body" class="col-md-2 col-form-label text-md-right">画像</label>
                          <input type="file" name="img_path">
                        </div>
                        <div class="text-center">
                            <button type="button" class="button4" onClick="history.back()">戻る</button>
                            <button type="submit" class="button2" name='action'value='add'>
                                編集
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection