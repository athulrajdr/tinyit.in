@extends('layouts.app')

@section('content')
    <div class="w-full h-full min-h-screen flex flex-col bg-gray-50">
        <div class="mt-24">
            <div class="text-center text-5xl text-gray-700">Tiny it!</div>
        </div>
        <form action="" method="POST">
            @csrf
            <div class="mt-24 flex justify-cente mx-auto w-6/12">
                <div class="flex-grow shadow-lg h-14 w-full mx-1">
                    <input type="text" name="long_url" id="long_url" placeholder="Enter long url here." class="focus:outline-none focus:ring focus:border-red-100 px-3 w-full h-full">
                </div>
                <div class="h-14 flex-none text-gray-700 mx-1">
                    <button class="focus:outline-none h-full bg-yellow-400 bg-opacity-80 border border-yellow-300 shadow-lg px-2" type="submit">Shorten URL</button>
                </div>
            </div>
        </form>
        <div class="text-center mt-20 text-2xl text-gray-600">Shortened Links</div>
        <div class="mt-5 mx-auto">
            {{-- card begin --}}
            @if (!empty($links))
                @foreach ($links as $link)
                <div class="rounded bg-gray-50 flex shadow-lg mb-4 border border-gray-200 overflow-hidden">
                    <div class="flex flex-col justify-center p-4">
                        <div class="mb-1">
                            <a href="{{ url($link->url_slug) }}" target="_blank">
                                <input class="font-semibold text-gray-600 text-lg" id="short-url" value="{{ url($link->url_slug) }}"/>
                            </a>
                        </div>
                        <div class="">
                            <div class="text-xs text-gray-500">{{ Str::limit($link->long_url, 50) }}</div>
                        </div>
                    </div>
                    <div class="w-24 flex flex-col justify-center">
                        <div class="text-center">
                            <button class="px-4 pt-1 pb-2 font-narrow rounded-md bg-blue-200 text-gray-700 text-lg hover:bg-blue-100" onclick="copyUrl();">
                                copy
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            {{-- card end --}}
        </div>
    </div>
@endsection