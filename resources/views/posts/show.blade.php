@extends('layouts.layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
    <article class="post container">
        @include($post->viewType())
        <div class="content-post">
            @include('posts.header')
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                @include('posts.tags')
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </article>

    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3>Comentarios</h3>
                <button id="comment" class="btn btn-primary">Crear un comentario</button>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.comments.store', $post->slug) }}" method="POST">
                    @csrf
                    <div class="row mb-3 ml-1">
                        <label for="name_user"><strong>Nombre del usuario: </strong></label>
                        <input type="text" name="name_user" id="name_user">
                    </div>
                    <div class="row mb-3 ml-1">
                        <label for="comment"><strong>Comentario: </strong></label>
                        <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Escriba su comentario :)"></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Crear comentario</button>
                </form>
                @forelse ($post->comments as $comment)
                    <div class="card card-primary card-outline">
                        <div class="card-title">
                            <strong>{{$comment->name_user}} </strong>
                            <small> {{ $comment->created_at }}</small>
                        </div>
                        <div class="card-body">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                @empty
                    <p>El post no tiene comentarios</p>
                @endforelse

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#carousel').carousel()
        $('form').hide();
        $('#comment').click(function(){
            $('form').toggle();
        });
    </script>
@endpush
