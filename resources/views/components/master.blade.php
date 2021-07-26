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
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <style>
        .text-blue {
            color: #1876f2;
        }

        .dropzone {
            border: none !important;
        }
    </style>
</head>
<body>
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto flex justify-between">
            <h1>
                <img
                    src="/images/logo.svg"
                    alt="Tweety"
                >
            </h1>
            @if(auth()->check())
                <div class="notification">
                    <ul>
                        <li id="noti_Container">
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <div id="noti_Counter">
                                    {{(auth()->user()->unreadNotifications->count())}}
                                </div>
                            @endif
                            <div id="noti_Button">
                                <svg viewBox="-47 0 479 479.99235"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="192.496176"
                                                    x2="192.496176"
                                                    y1="476.808" y2="-32.416">
                                        <stop offset="0" stop-color="#006df0"/>
                                        <stop offset="1" stop-color="#00e7f0"/>
                                    </linearGradient>
                                    <path
                                        d="m379.464844 392.566406-19.878906-7.949218c-9.136719-3.617188-15.125-12.457032-15.089844-22.28125v-162.335938c.109375-68.546875-45.824219-128.625-112-146.496094v-13.503906c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v13.601562c-66.28125 17.648438-112.304688 77.804688-112 146.398438v162.335938c.035156 9.824218-5.953125 18.664062-15.089844 22.28125l-19.878906 7.949218c-3.039063 1.214844-5.03125 4.160156-5.03125 7.433594v32c0 4.417969 3.582031 8 8 8h136.71875c3.882812 23.085938 23.871094 39.992188 47.28125 39.992188s43.398437-16.90625 47.28125-39.992188h136.71875c4.417968 0 8-3.582031 8-8v-32c0-3.273438-1.992188-6.21875-5.03125-7.433594zm-210.96875-352.566406c0-13.253906 10.746094-24 24-24s24 10.746094 24 24v9.910156c-.761719-.117187-1.601563-.167968-2.328125-.277344-2.398438-.34375-4.800781-.640624-7.199219-.871093-1.402344-.136719-2.792969-.265625-4.207031-.355469-2.691407-.183594-5.386719-.277344-8.089844-.316406-.726563-.011719-1.441406-.089844-2.175781-.089844s-1.359375.070312-2.046875.078125c-2.785157.042969-5.601563.144531-8.320313.328125-1.335937.089844-2.664062.21875-4 .335938-2.550781.242187-5.074218.554687-7.578125.921874-.679687.105469-1.390625.136719-2.070312.246094zm24 424c-14.585938-.015625-27.320313-9.882812-30.984375-24h61.96875c-3.664063 14.117188-16.398438 23.984375-30.984375 24zm176-40h-352v-18.585938l14.847656-5.933593c15.226562-6.03125 25.203125-20.769531 25.152344-37.144531v-162.335938c.066406-38.71875 16.609375-75.578125 45.492187-101.363281 28.882813-25.785157 67.375-38.0625 105.851563-33.757813 5.019531.566406 10 1.4375 14.914062 2.609375 61.894532 14.011719 105.816406 69.050781 105.742188 132.511719v162.335938c-.050782 16.375 9.925781 31.113281 25.152344 37.144531l14.847656 5.933593zm0 0"
                                        fill="url(#a)"/>
                                </svg>
                            </div>
                            <div id="notifications">
                                <h3>Notifications</h3>
                                <div style="height:300px;" class="overflow-y-scroll">
                                    @foreach (current_user()->notifications as $notification)
                                        {{auth()->user()->unreadNotifications->markAsRead()}}
                                        <div class="flex justify-between p-4">
                                            <img src="{{$notification['data']['user']['avatar']}}"
                                                 class="w-12 rounded-full"
                                                 alt="{{$notification['data']['user']['name']}}">
                                            <div>
                                                <span
                                                    class="text-sm">{{$notification['data']['user']['name']}}</span>
                                                @if($notification->type ==='App\Notifications\TweetCreated')
                                                    <p class="font-medium text-sm">{{substr($notification['data']['tweet']['body'],0,20)}}</p>
                                                    <span
                                                        class="text-sm text-blue font-semibold">{{\Carbon\Carbon::parse($notification['data']['tweet']['created_at'])->diffForHumans()}}</span>
                                                @else
                                                    <p class="font-medium text-sm">Started Following you !</p>
                                                    <span
                                                        class="text-sm text-blue font-semibold">{{\Carbon\Carbon::parse($notification['created_at'])->diffForHumans()}}</span>
                                                @endif
                                            </div>

                                            @if($notification->read_at === null)
                                                <div>
                                                    <svg viewBox="0 0 8 8" fill="currentColor"
                                                         class="h-4 w-4 text-blue">
                                                        <circle cx="4" cy="4" r="3"></circle>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div class="seeAll"><a href="#">See All</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
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
        init: function () {
            var myDropzone = this;
            document.getElementById("submit-tweet").addEventListener('click', function (e) {
                if (myDropzone.files.length > 0) {
                    e.preventDefault();
                    myDropzone.processQueue();
                }
            })
        },
        success: function (file, response) {
            window.location = response.urllink;
        }
    };
    $(document).ready(function () {
        var textarea = document.getElementById('text-area');

        window.onload = textareaLengthCheck();

        function textareaLengthCheck() {
            var textArea = textarea.value.length;
            var charactersLeft = 200 - textArea;
            var count = document.getElementById('characters-left');
            count.innerHTML = "Characters left: " + charactersLeft;
        }

        textarea.addEventListener('keyup', textareaLengthCheck, false);
        textarea.addEventListener('keydown', textareaLengthCheck, false);
    });

</script>
<script>
    $(document).ready(function () {

        $('#noti_Counter')
            .css({opacity: 0})
            .css({top: '-10px'})
            .animate({top: '-2px', opacity: 1}, 500);

        $('#noti_Button').click(function () {
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#2E467C');
                } else $('#noti_Button').css('background-color', '#FFF');
            });
            $('#noti_Counter').fadeOut('slow');     // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                // $('#noti_Button').css('background-color', '#2E467C');
            }
        });

        $('#notifications').click(function () {
            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        });
    });
</script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
</html>
