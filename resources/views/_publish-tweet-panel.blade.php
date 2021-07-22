<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">

    <form method="POST" action="/tweets" enctype="multipart/form-data" class="dropzone" id="tweetUpload">
        @csrf

        <textarea
            name="body"
            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"
            placeholder="What's up doc?"
            required
            autofocus
        ></textarea>
        <div id="preview-template" class="dropzone-previews text-center"></div>
        <div class="dz-message flex justify-center items-center" data-dz-message>
            <span class="mr-4">Drag and Drop Image</span>
            <div class="w-10 cursor-pointer">
                <svg viewBox="0 0 100 100"
                     xmlns="http://www.w3.org/2000/svg">
                    <defs></defs>
                    <g id="31.-Photo-camera" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                       stroke-linecap="round" stroke-linejoin="round">
                        <g transform="translate(2.000000, 10.000000)" stroke="#2E86DE" stroke-width="4">
                            <path
                                d="M9.6,13.4 L9.6,10.52 L9.6,10.52 C9.6,8.92941992 10.8946987,7.64 12.4803165,7.64 L16.3196835,7.64 C17.9104384,7.64 19.2,8.93265643 19.2,10.52 L19.2,13.4"
                                id="Layer-1"></path>
                            <path
                                d="M24.8784375,14.4 L2.87308931,14.4 C1.28449202,14.4 0,15.6933791 0,17.2888432 L0,77.7511568 C0,79.3465319 1.2863259,80.64 2.87308931,80.64 L93.1269107,80.64 C94.715508,80.64 96,79.3466209 96,77.7511568 L96,17.2888432 C96,15.6934681 94.7136741,14.4 93.1269107,14.4 L71.164875,14.4 L64.1667696,2.47802639 C63.3634179,1.10943617 61.4237809,0 59.8344509,0 L36.2738304,0 C34.6935964,0 32.7398496,1.10945021 31.9303315,2.47802639 L24.8784375,14.4 L24.8784375,14.4 Z"
                                id="Layer-2"></path>
                            <circle id="Layer-3" cx="48" cy="48" r="21.12"></circle>
                            <path d="M43.2,35.52 C40.294875,35.52 35.52,40.0695 35.52,43.2" id="Layer-4"></path>
                            <path d="M38.4,11.52 L57.6,11.52" id="Layer-5"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>

        <hr class="my-4 w-full">
        <footer class="flex justify-between items-center bottom-0">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >

            <button
                type="submit"
                id="submit-tweet"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
