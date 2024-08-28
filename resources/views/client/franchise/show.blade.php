@extends('layouts.client.app')

@section('title', 'Category')

@section('textlink', 'rounded aktif')

@section('content')

    <div class="text-center my-5 py-5">
        <div class="container">
            <div class="row px-3">
                <div class="col-3 text-left">
                    <a href="#" onclick="history.back();">
                        <p class="text-white"><i class="fas fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="text-white font-weight-bold">{{ $link->name }}</h4>
                </div>
                <div class="col-3 text-right">
                    <button type="button" class="btn aktif text-white" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <a href="{{ route('link.category', [$category->link->slug, $category->slug]) }}" class="btn m-2 img-gallery"
                    loading="lazy">
                    @if ($category->img === null)
                        <img class="img img-fluid rounded" src="{{ asset('assets/img/comingsoon.jpg') }}" alt="">
                    @else
                        <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $category->img) }}" alt="">
                    @endif
                </a>
            @endforeach
        </div>
        <div class="page d-flex justify-content-center">
            {{ $categories->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
