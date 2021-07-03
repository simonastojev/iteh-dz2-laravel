@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header headerNaslov">{{ $article->title }}</div>
                <div class="card-body">
                    <div class="forma">
                        <h5 class="telo">{{ $article->body }}</h5>
                        <form action="{{ route('deleteArticle', $article->id) }}" method="POST">
                            <div>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary dugme" onclick="return confirm('Are you sure?'); deleteArticle('{{ $article->id }}')">Delete article</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Comments
                        </div>
                        @foreach($comments as $comm)
                        <div class="card-body" style="background-color:white">
                            <h5 class="username">{{ $comm->username }}</h5>
                            <h5 class="komentar">{{ $comm->text }}</h5>
                            <h5 class="datumKom">{{ $comm->created_at }}</h5>
                        </div>
                        @endforeach
                        <div class="card-body" style="background-color:white">
                            <a class="napisiKom" onclick="pisanjeKom()">Write a comment</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-10">
        <div class="card" id="pisanjeKomentara">
            <div class="card-body">
                <form action="{{ route('storeComments') }}" method="POST">
                            <input type="text" name="article_id" value="{{ $article->id }}" hidden>
                            <h5 class="write">Username</h5>
                            <input type="text" name="username" class="usernameInput">
                            <h5 class="write">Comment</h5>
                            <textarea name="text" class="commentInput input" rows="5"></textarea><br>
                            <button type="submit" onclick="return confirm('Do you want to post your comment?')" class="btn btn-primary dugme2">Submit</button>
                    </form>
            </div>
        </div>

    </div>
</div>


@endsection
