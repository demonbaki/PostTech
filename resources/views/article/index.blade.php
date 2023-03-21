<x-layout>

    <div class="container-fluid my-3">
            <div class="row justify-content-center">
                <div class="col">
                <h1 class="h1index">
                        Stavamo parlando di articoli?
                    </h1>
                    <hr>
                </div>
                    
            </div>
    </div>

    <div class="container my-5 ">
            <div class="row justify-content-center">
                   @foreach ($articles as $article)
                        <div class="col-12 col-md-6 col-lg-3 mx-5 my-2 ">
                        <div class="box">
                                                <div class="imgBx">
                                                        <img id="Imm" src="{{Storage::url($article->img)}}" alt="">
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

                                                        <p class="small fst-italic text-capitalize p-tag">
                                                                @foreach ($article->tags as $tag)
                                                                    #{{$tag->name}}
                                                                @endforeach
                                                        </p>
                                                        <div>
                                                                <span class="text-muted p-tag  ">Tempo di lettura {{$article->readDuration()}} min</span>
                                                        </div>
                                                </div>
                                
                                


                                <div class="d-flex justify-content-end me-3">
                        
                                        <a href="{{route('article.detail', ['title'=>$article->title])}}" class="btn btn-outline-dark mb-3">Dettaglio</a>
                                </div>
                            </div>  
                        </div>
                    @endforeach
            </div>
    </div>

</x-layout>