<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/turbolinks"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <style>
        .dropzone {
            border: none !important;
        }
    </style>
</head>
<body>
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <img
                    src="/images/logo.svg"
                    alt="Tweety"
                >
            </h1>
        </header>
    </section>
    {{$slot}}
</div>
<script type="text/javascript">

    Dropzone.autoDiscover = true;

    Dropzone.options.tweetUpload = {
        maxFilesize: 10,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        autoProcessQueue: false,
        previewElement: "#preview-template",
        previewsContainer: "#preview-template",
        init: function (){
            var myDropzone = this;
            document.getElementById("submit-tweet").addEventListener('click',function (e){
                e.preventDefault();
                myDropzone.processQueue();
            })
        },
        success: function(file, response){
            window.location = response.urllink;
        }
    };
</script>
</body>
</html>
