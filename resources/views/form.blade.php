@extends('layouts.app')
@section('content')
<h1>Créer un nouveau poste</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
@endif
<form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title">
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <button type="submit">Creer</button>
    <hr>
    <p>choose your monster's  features </p>
    <div>
        <input type="checkbox" name="scales" checked>
        <label for="scales">scales</label>
    </div>
    <div>
        <input type="checkbox" name="horns">
        <label for="horns">horns</label>
    </div>
    <label for="avatar">Choose a profil picture</label>
    <input type="file" name="avatar" accept="image/png, image/jpeg">
</form>
@endsection
