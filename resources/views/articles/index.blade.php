@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($articles as $article)
                    <div class="panel panel-default" data-article="{{ $article->id }}">
                        <div class="panel-heading">{{ $article->title }}</div>
                        <div class="panel-body">{{ $article->content }}</div>
                        <div class="panel-footer">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span class="visitors"></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
