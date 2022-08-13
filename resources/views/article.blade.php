<!-- recuperer la structure general -->
@extends('layouts.app')
@section('content')
    <h1>{{$post->content}}</h1>
    <span>{{$post->image ? $post->image->path:"pas d'image"}}</span>
    <hr>
    @forelse($post->comments as $comment)
    <div>{{$comment->content}} | crée le {{$comment->created_at->format('d/m/y')}}</div>
    @empty
       <span>aucun commentaire pour ce poste</span> 
    @endforelse 
    <hr>
    @forelse ($post->tags as $tag)
        <span>{{$tag->name}}</span>
        @empty
       <span>aucun tag pour ce poste</span> 
    @endforelse 
    <hr>
    <span>non de l'artiste de l'image:{{$post->imageArtist ? $post->imageArtist->name :":pas de nom"}}</span>
    <hr>
    <span>le commentaire le plus recent:{{$post->latestComment ? $post->latestComment->content :"latest"}}</span>
    <hr>
    <span>le commentaire le plus ancien:{{$post->oldestComment ? $post->oldestComment->content:"first"}}</span>
@endsection