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

    <div>
        <h5 class="font-bold mb-2">
            <a href="{{$tweet->user->path()}}">
                {{ $tweet->user->name }}
            </a>
        </h5>

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
