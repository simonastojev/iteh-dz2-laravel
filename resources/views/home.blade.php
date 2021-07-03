@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                @foreach($article as $art)
                <div class="card-body">
                    <a href="{{ route('viewArticle', $art->id) }}" class="naslov">{{ $art->title }}</a>
                    <h5 class="datum">{{ $art->created_at }}</h5>
                    <h5 class="brojKom">Comments: {{ $art->comments_no }}</h5>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
