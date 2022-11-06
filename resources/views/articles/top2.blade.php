<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Program') }}</title>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">

</head>

<body>

   <div class="box5">
    <div class="card">
    <div class="midasi">
@if(isset($article))
  </div>
  <div class="card-body">
    <div class="table-resopnsive">
      <div>作成者：{{ $article->user->name }}</div>
      <div class="card-2">
       <div class="content-img">
        <img src="{{ asset('storage/' .$article->img_path) }}" />
       </div>
            <p class="content-1">{{ $article->title }}</p>
            <hr>
            <p class="content-2">{{ $article->body }}</p>
      </div>
@endif
     </div>
   </div>


  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="{{ mix('js/article.js') }}"></script>
  <script src="{{ asset('js/hoge.js') }}" defer></script>
</body>
</html>