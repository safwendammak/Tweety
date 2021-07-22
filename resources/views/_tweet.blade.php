<div class="flex p-4  {{$loop->last ? '' : 'border-b border-b-gray-400'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$tweet->user->path()}}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            ></a>
    </div>
    <div class="w-full">
        <div class="flex justify-between">


            <h5 class="font-bold mb-2">
                <a href="{{$tweet->user->path()}}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
            @if(current_user()->id === $tweet->user_id)
                <form method="POST" action="/tweets/{{$tweet->id}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-xs text-gray-500">
                        <svg class="w-6 cursor-pointer" id="Capa_1" enable-background="new 0 0 512 512"
                             viewBox="0 0 512 512"
                             xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path
                                        d="m415.158 85.758c-.268.087-93.932 27.686-94.198 27.777-10.041 3.493-16.788 12.983-16.788 23.614v42.223c0 8.285 6.716 15.001 15.001 15.001h114.008c8.285 0 15.001-6.716 15.001-15.001v-69.935c0-17.077-16.817-29.172-33.024-23.679z"
                                        fill="#ff5e94"/>
                                    <path
                                        d="m160.161 164.371v282.624c0 35.844 29.161 65.005 65.005 65.005h158.012c35.844 0 65.005-29.161 65.005-65.005 0-15.734 0-274.731 0-282.624z"
                                        fill="#9dcfff"/>
                                    <path
                                        d="m304.172 164.371v347.629h79.006c35.843 0 65.005-29.162 65.005-65.005v-282.624z"
                                        fill="#72bbff"/>
                                    <g fill="#5a5a5a">
                                        <path
                                            d="m237.431 233.376c-8.285 0-15.001 6.716-15.001 15.001v179.616c0 8.285 6.716 15.001 15.001 15.001s15.001-6.716 15.001-15.001v-179.616c0-8.285-6.717-15.001-15.001-15.001z"/>
                                        <path
                                            d="m304.171 233.376c-8.285 0-15.001 6.716-15.001 15.001v179.616c0 8.285 6.716 15.001 15.001 15.001s15.001-6.716 15.001-15.001v-179.616c0-8.285-6.716-15.001-15.001-15.001z"/>
                                    </g>
                                    <g fill="#444">
                                        <path
                                            d="m319.172 248.381v179.613c0 8.281-6.72 15.001-15.001 15.001v-209.615c8.281 0 15.001 6.71 15.001 15.001z"/>
                                        <path
                                            d="m370.912 233.376c-8.285 0-15.001 6.716-15.001 15.001v179.616c0 8.285 6.716 15.001 15.001 15.001s15.001-6.716 15.001-15.001v-179.616c0-8.285-6.716-15.001-15.001-15.001z"/>
                                    </g>
                                    <path
                                        d="m192.17 18.07s0 0-.01 0c-15.336-9.588-36.016-7.793-49.46 5.65v.01l-27.58 27.57-27.58 27.58c-15.6 15.6-15.6 40.98 0 56.57l14.15 14.15 20.31-2.1.9-19.12-14.14-14.14c-3.9-3.9-3.9-10.25 0-14.14l27.58-27.58 27.57-27.58h.01c3.689-3.689 10.025-4.116 14.13-.01l14.15 14.15 18.55-3.08 2.67-18.13c-14.806-14.806-16.41-16.818-21.25-19.8z"
                                        fill="#5a5a5a"/>
                                    <path
                                        d="m192.17 18.07s0 0-.01 0c-15.297-9.564-35.968-7.831-49.46 5.66l-27.58 27.57 21.22 21.22 27.58-27.58c3.686-3.686 10.017-4.124 14.13-.01l14.15 14.15 21.22-21.21c-15.291-15.291-16.162-16.574-21.25-19.8z"
                                        fill="#444"/>
                                    <path
                                        d="m317.418 37.108-26.872-26.872c-13.647-13.647-35.853-13.647-49.501 0l-166.992 166.991c-13.647 13.647-13.647 35.853 0 49.501l26.872 26.872c5.857 5.858 15.356 5.859 21.214 0l195.279-195.278c5.858-5.858 5.858-15.356 0-21.214z"
                                        fill="#3ba9ff"/>
                                    <path
                                        d="m290.545 10.236 26.872 26.872c5.855 5.855 5.862 15.352 0 21.215l-97.637 97.637-62.23-62.23 83.494-83.494c13.648-13.648 35.853-13.648 49.501 0z"
                                        fill="#0081ff"/>
                                </g>
                            </g>
                        </svg>
                    </button>
                </form>
            @endif
        </div>


        <div>

            <p class="text-sm mb-3">
                {{ $tweet->body }}
            </p>

            @if(isset($tweet->image))
                <img src="{{$tweet->image}}" alt="tweet image" style="height: auto;width: 100%;max-height: 300pc;">
            @endif

        </div>

        <x-like-buttons :tweet="$tweet"/>
    </div>
</div>
