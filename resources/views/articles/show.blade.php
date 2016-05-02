@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div data-article="{{ $article->id }}">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->content }}</p>
                    <div>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span class="visitors"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
