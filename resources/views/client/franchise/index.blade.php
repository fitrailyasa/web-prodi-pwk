@extends('layouts.client.app')

@section('title', 'link')

@section('textlink', 'rounded aktif')

@section('content')

    <div class="container text-center my-5 py-5">
        <h4 class="text-white font-weight-bold">@yield('title')</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($links as $link)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('link.show', $link->slug) }}"
                        class="btn text-white aktif border col-12">{{ $link->name }}</a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $links->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
