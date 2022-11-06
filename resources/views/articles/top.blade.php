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
<div id="particles-js"></div>
<div id="wrapper">
   <div class="fluidbloc">
      <div class="fluid3">
        <div class="top">
          Program<br>PostsList
       </div>
      </div>
    </div>
    <div class="scrolldown4"><span>Scroll</span></div>
</div>

<div style="margin-top: 120px;" class="box4">
   <div class="table-resopnsive">
                     @if(isset($articles))
                     @foreach ($articles as $article)
                     <table class="box3">
                        <tbody>
                          <tr onclick="location.href='{{ route('top2', $article->id) }}'">
                            <td><a class="result">{{ $article->id }}</td>
                            <td class="fluid" style="font-size: 30px;">{{ $article->title }}</td>
                            <td class="card3">{{ $article->body }}</td>
                          </tr>
                        </tbody>
                        @endforeach
                        @endif
                      </table>
   </div>
 </div>


  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="{{ mix('js/article.js') }}"></script>
  <script src="{{ asset('js/hoge.js') }}" defer></script>
</body>
</html>