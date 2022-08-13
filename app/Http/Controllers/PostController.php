<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        //passer une variable
        $posts = [
            'mon super titre',
            'mon super titre 2'
        ];


        return view('welcome', compact('posts'));
    }
    public function articles()
    {
        //update
        /*   $post = Post::find(1);
        $post->update([
            'title' => 'titire edité'
        ]);
        dd('edité');*/
        //delete
        /* $post = Post::find(12);
        $post->delete();
        dd('suprimer');*/
        //recuper toutes les donners de la tables posts
        $posts = Post::all();
        // $posts = Post::orderby('title')->take(3)->get();
        return view('articles', [
            'posts' => $posts
        ]);
    }

    /*public function index()
    {
        //passer une variable
        $title = 'mon super titre';
        $title2 = 'mon super titre 2';
        return view('welcome', compact('title', 'title2'));
    }*/

    /* public function index()
    {
        //passer une variable
        $title = 'mon super titre';
        return view('welcome',[
            'title'=>$title
        ]);
    }*/

    /* public function index()
    {
        //passer une variable
        $title = 'mon super titre';
        return view('welcome')->with('title',$title);
    }*/
    public function show($id)
    {
        //$post = Post::where('title', 'Cupiditate nulla quia qui tempore qui voluptatem.')->firstOrfail();
        //afficher toutes les données
        //trouve moi le poste qui porte ce id
        $post = Post::findOrfail($id);

        /*       $posts = [
            1 => 'mon titre n°1',
            2 => 'mon titre n°2'
        ];

        $post = $posts[$id] ?? 'pas de titre';*/
        return view('article', [
            'post' => $post
        ]);
    }
    public function contact()
    {
        return view('contact');
    }

    public function create()
    {
        return view('form');
    }
    //stocker des données
    public function store(Request $request)
    {
        //check box
        //dd($request->boolean('scales'), $request->boolean('horns'));
        //tous les entrées
        //dd($request->all());
        //recuperer un fichier
        //dd($request->file('avatar')); //meme chose $request->avatar
        //stocker l'image avatar dans storages app puis dans il creer le dossier avatarss il stock l'image dedans
        //$request->avatar-store('avatar')
        //recuperer l'extension de l'image ->extension()
        //recuperer la variable(valeur) depuis l'url
        //dd($request->query('code'));
        //recuperer le title
        //dd($request->input('title'))//$request->title
        //recuperer juste le _token et le scales
        //dd($request->only(['_token','scales']))
        //recuperer tout sauf _token et scales
        //dd($request->except(['_token', 'scales']));
        //test n'existe pas il renvoi la valeur default
        //dd($request->input('test','default'))
        //renvoyer la methode
        // dd($request->method()); isMethode('POST')
        //recuperer l'url
        //dd($request->fullUrl());
        //dd($request->fullUrlWithQuery(['name' => '12345']));
        //dd($request->url());
        //on verifie si on fait une requete sur la route qui s'appelle article.store
        //dd($request->routeIs('article.store'));
        //si on se retrouve sur article/ n'importe quoi aprés
        //dd($request->is('article/*'));
        //recuperer l'url 
        //dd($request->path());
        /*$post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();*/
        //verifier s'il sont vide ou pas
        $request->validate([
            //'title' => 'required|max:255|min:5|unique:posts', //empecher deux title qui porte le meme nom
            'title' => ['required', 'max:255', 'min:5', 'unique:posts', new Uppercase],
            'content' => ['required']
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    }
}
