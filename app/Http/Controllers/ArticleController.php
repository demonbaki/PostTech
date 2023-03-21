<?php

namespace App\Http\Controllers;


use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::orderBy('created_at', 'desc')->get();
        // return view('article.index', compact('articles'));
            $articles = Article::where('is_accepted', true)->orderBy('created_at','desc')->get();
            return view('article.index', compact('articles'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $request->validate([
            'title'=>'required|unique:articles|min:5',
            'subtitle'=>'required|unique:articles|min:5',
            'body'=>'required|min:10',
            'category'=>'required',
            'tags'=>'required',

        ]);

        $article = Article::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'img' =>$request->has('img') ? $request->file('img')->store('public') : '/img/default.png',
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
            'slug'=>Str::slug($request->title),

        ]);

        $tags = explode(', ' , $request->tags);

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $article->tags()->attach($newTag);
            
        }

        return redirect(route('homepage'))->with('message', 'Articolo mandato in revisione');


    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required|min:5|unique:articles,title,' . $article->id,
            'subtitle'=>'required|min:5|unique:articles,subtitle,' . $article->id,
            'body'=>'required|min:10',
            'category'=>'required',
            'tags'=>'required',
        ]);

        $article->update([
         'title'=>$request->title,
         'subtitle'=>$request->subtitle,
         'body'=>$request->body,
         'category_id'=>$request->category,
         'slug'=>Str::slug($request->title),
         'is_accepted' => NULL
        ]);
        
        if ($request->img) {
            Storage::delete($article->img);
            $article->update([
                'img'=>$request->file('img')->store('public/imgs'),
            ]);
        }
        $tags = explode(', ', $request->tags);
        $newTags = [];
        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);

            $newTags[]= $newTag->id;

        }

        $article->tags()->sync($newTags);
        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente aggiornato l\'articolo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }

        if ($article->img) {
            Storage::delete($article->img);
            $article->destroy([]);
        }
    
        $article->delete();

        
        

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');

    }


    public function byCategory(Category $category){
        $articles = $category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.category', compact('category', 'articles'));
    }
    public function byWriter(User $user){
             $articles = $user->articles->sortByDesc('created_at')->filter(function($article){
                return $article->is_accepted == true;
            });
             return view('article.by-user', compact('user', 'articles'));
    }
    public function byUser(User $user){
        $articles = $user->articles->sortByDesc('created_at');
        return view('article.user', compact('user', 'articles'));
    }

    public function details($title){

        $article = Article::where('title', $title)->first();
        return view('article/detail', compact('article'));
    }

    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted' , true)->orderBy('created_at' , 'desc')->get();

        return view('article.search-index' , compact('articles' , 'query'));
    }
}