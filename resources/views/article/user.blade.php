<x-layout>

 
        <div class="container-fluid my-3">
                <div class="row justify-content-center">
                        <h1 class="display-1 text-capitalize text-center ">
                            Articoli di  {{$user->name}}
                        </h1>
                </div>
        </div>
    
        <div class="container ">
                <div class="row justify-content-center align-items-center ">
                       @foreach ($articles as $article)
                       <div class="row section-radius">
                            <div class="col-12 col-md-10 col-lg-4 py-5 ">
                                <div class="">
                                    <img src="{{Storage::url($article->img)}} " class="card-img-top h-img img-radius" alt="...">
                                </div>
                            </div>

                                <div class=" col-6 col-md-6 col-lg-6 card-body m-5 py-2">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->subtitle}}</p>
                                        <p class="card-text">{{substr($article->body , 0, 400)}} ...</p>
                                        Redatto il {{$article->created_at->format('d/m/y')}} da {{$article->user->name}}<br>
                                        <a href="{{route('article.show', compact('article'))}}" class=" btn btn-secondary btn-outline-dark text-white">Dettaglio</a>
                                </div>

                                <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                       
                                      
                                </div>
                        </div>         
                            
                        @endforeach
                </div>
        </div>
</x-layout>
