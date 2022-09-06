<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Program') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/template.css') }}" rel="stylesheet"> -->
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

<div class="box4">
   <div class="table-resopnsive">
                     @if(isset($articles))
                     @foreach ($articles as $article)
                     <table class="box3">
                        <tbody>
                          <tr>
                            <td><a class="result">{{ $article->id }}</a></td>
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
  <script>
	particlesJS("particles-js",{
	"particles":{
		"number":{
			"value":38,
			"density":{
				"enable":true,
				"value_area":800
			}
		},
		"color":{
			"value":"#00B7B8"
		},
		"shape":{
			"type":"polygon",
			"stroke":{
				"width":0,
			},
	"polygon":{
		"nb_sides":3
	},
	"image":{
		"width":190,
		"height":100
	}
	},
		"opacity":{
		"value":0.664994832269074,
		"random":false,
		"anim":{
			"enable":true,
			"speed":2.2722661797524872,
			"opacity_min":0.08115236356258881,
			"sync":false
		}
		},
		"size":{
			"value":3,
			"random":true,
			"anim":{
				"enable":false,
				"speed":40,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":true,
			"distance":150,
			"color":"#00B7B8",
			"opacity":0.6,
			"width":1
		},
		"move":{
			"enable":true,
			"speed":6,
			"direction":"none",
			"random":false,
			"straight":false,
			"out_mode":"out",
			"bounce":false,
			"attract":{
				"enable":false,
				"rotateX":600,
				"rotateY":961.4383117143238
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
				"mode":"repulse"
			},
	"onclick":{
		"enable":false
	},
	"resize":true
		}
	},
	"retina_detect":true
});
  </script>>
</body>
</html>