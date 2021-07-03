@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New article</div>

                <div class="card-body">
                    <h5 class="write">Title</h5>
                    <form action="{{ route('storeArticles') }}" method="POST">
                        <input type="textarea" name="title" class="articleTitle">
                        <h5 class="write">Text</h5>
                        <textarea rows="20" name="body" class="articleBody"></textarea><br>
                        <button type="submit" onclick="return confirm('Do you want your article to be submited?')" class="btn btn-primary dugme2">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>


@endsection
