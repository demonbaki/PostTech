<x-layout>

    <div class="container-fluid my-5 justify-content-center">
        <div class="row min-vh-100 mx-5 justify-content-center">
            <a id="frecciadet" href="{{route('homepage')}}"><i id="iconadet" class="fa-solid fa-circle-arrow-left"></i></a>
            <div class="col-12 col-md-4 col-lg-4 my-3">
                <img  src="{{Storage::url($article->img)}}" class="img-fluid detail-size img-show" alt="...">
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <h2 id="dettit">{{$article->title}}</h2>
                <h3 id="detsub">{{$article->subtitle}}</h3>
                <p id="detbod">{{$article->body}}</p>
                <p id="detdati">Redatto il {{$article->created_at->format('d/m/y')}} da 
                    <a href="{{route('article.byUser', ['user'=> $article->user->id])}}" class ="adetail text-center  text-capitalize">{{$article->user->name}}</a>
                </p>
                <p class="  text-capitalize">
                    @foreach ($article->tags as $tag)
                        #{{$tag->name}}
                    @endforeach
                </p>

                <span class="text-muted ">Tempo di lettura {{$article->readDuration()}} min</span>
                
                <div>      
                    <a href="{{route('article.byCategory', ['category'=> $article->category->id])}}" class ="adetail text-center  text-capitalize">{{$article->category->name}}</a>
                </div> 
            </div>

        </div>
    </div>
</x-layout>
               




















