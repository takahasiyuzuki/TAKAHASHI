<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Program</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fluid {
            display: block;
            width:40vh;
            height: 40vh;
            background:#39eded;
            animation: fluidrotate 20s ease 0s infinite;
            z-index: 1;
            }

            @keyframes fluidrotate {  
                
            0%, 100% {
                border-radius: 63% 37% 54% 46%/55% 48% 52% 45%;
            }
            14% {
                border-radius: 40% 60% 54% 46%/49% 60% 40% 51%;
            }
            28% {
                border-radius: 54% 46% 38% 62%/49% 70% 30% 51%;
            }
            42% {
                border-radius: 61% 39% 55% 45%/61% 38% 62% 39%;
            }
            56% {
                border-radius: 61% 39% 67% 33%/70% 50% 50% 30%;
            }
            70% {
                border-radius: 50% 50% 34% 66%/56% 68% 32% 44%;
            }
            84% {
                border-radius: 46% 54% 50% 50%/35% 61% 39% 65%;
            }
                
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           

               <div class="content">
             <div class="fluid" style="text-align:center; margin-left:280px; margin-bottom:-100px;">
                 <div class="title m-b-md">
                    Program
                </div>
             </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
