@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="midasi"><div class="toukou">新規投稿</div></div>
                <div class="card-body">
                    @if (session('flash_message'))
                        <div class="flash_message">
                        {{ session('flash_message') }}
                        </div>
                    @endif

                    <form method="post" enctype="multipart/form-data" action="{{ route('store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">本文</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="nickname" class="col-md-2 col-form-label text-md-right">画像:</label>
                        <input type="file" name="img_path">
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

                           <div class="form-group row mb-0">
                             <div class="col-md-6 offset-md-4">
                             <div class="wrap">
                                <button type="button" class="button4" onClick="history.back()">戻る</button>
                                <button type="submit" class="button2" name='action' value='add'>
                                    投稿
                                </button>
                               </div>
                           </div>
                        </div>
                    </form>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection