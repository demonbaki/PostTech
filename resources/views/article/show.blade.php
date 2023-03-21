<x-layout>
<div class="container-fluid color text-center">
    <div class="row justify-content-center">
        <h1>
            {{$article->title}}
        </h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <a id="frecciadet" href="{{route('homepage')}}"><i id="iconadet" class="fa-solid fa-circle-arrow-left"></i></a>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="text-center">
                <img src="{{Storage::url($article->img)}} " class="my-5 img-show" alt="...">
                    <h2>{{$article->subtitle}}</h2>
                    <div>
                        <p>Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y')}}</p>
                    </div>
                
                        <p>{{$article->body}}</p>
                    <div class="text-center">
                        <a href="{{route('article.index')}}" class="btn btn-outline-dark mb-3">Torna indietro</a>
                    </div>
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <a href="{{route('revisor.acceptArticle', compact('article'))}}" class="btn btn-secondary btn-outline-dark text-white my-5">Accetta articolo</a>
                        <a href="{{route('revisor.rejectArticle', compact('article'))}}" class="btn btn-secondary btn-outline-dark text-white my-5">Rifiuta articolo</a>
                    @endif
            </div>
        </div>
    </div>
</div>

</x-layout>