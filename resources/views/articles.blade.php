@extends('layouts.app')
@section('content')
<!-- s'il n'y apas de poste on a pas besoin de faire la boucle -->
    @if ($posts->count()>0)
        @foreach($posts as $post)
        <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('article.show',['id'=>$post->id])}}" class="underline text-gray-900 dark:text-white">{{$post->title}}</a></div>
        @endforeach        
    @else
      <span>aucun post en base de données</span>  
    @endif       
@endsection