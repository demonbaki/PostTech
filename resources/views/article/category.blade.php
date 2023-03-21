<x-layout>

    <div class="container-fluid my-3">
            <div class="row justify-content-center">
                    <h1 class="text-capitalize text-center">
                        Categoria {{$category->name}}
                    </h1>
            </div>
    </div>

    <div class="container my-5 ">
            <div class="row justify-content-center">
                   @foreach ($articles as $article)
                   <div class="col-12 col-md-6 col-lg-3 py-3">
                        <div class="box">
                                <div class="imgBx">
                                        <img id="Imm" src="{{Storage::url($article->img)}}" class="h-img" alt="">
                                </div>
                                <ul class="social-icon">
                                        <li><a href="{{route('article.byUser', ['user'=> $article->user->id])}}"><i class="fa-solid i fa-user"></i></a></li>
                                        <li><a href="{{route('article.byCategory', ['category'=> $article->category->id])}}"><i class="fa-solid i fa-list"></i></a></li>
                                        <li><a href="{{route('article.detail', ['title'=>$article->title])}}"><i class="fa-solid i fa-circle-info"></i></a></li>
                                        <li><a target="_blank" href="https://aulab.it/"><i class="fa-solid i fa-arrow-up-from-bracket"></i></a></li>
                                </ul>
                                
                                <div class="details">
                                        <h2>{{$article->title}}</h2>
                                        <h3>{{$article->subtitle}}</h3>

                                        <p class="small fst-italic text-capitalize">
                                                @foreach ($article->tags as $tag)
                                                    #{{$tag->name}}
                                                @endforeach
                                        </p>
                                </div>
                                @if ($article->category)
                                <a href="{{route('article.byCategory' , ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                                @else
                                <p class="small text-muted fst-italic text-capitalize">
                                Non categorizzato
                                </p>                        
                                @endif
                                
                                </div>
                  </div>
                    @endforeach
            </div>
    </div>

</x-layout>