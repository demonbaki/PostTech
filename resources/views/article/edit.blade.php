<x-layout>
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class="text-center h1index">Cosa c'è che non va?</h1>
                <hr>
            </div>
        </div>
    </div>
    
    
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form method="POST" class="p-lg-5" action="{{route('article.update', compact('article'))}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="container create">
                        <div class="card card-create color-form">
                            <a class="singup">Modifica Articolo</a>
                            <div class="inputBox mt-5 w-100 px-5">
                                <label for="title" class="form-label">Titolo Articolo</label>
                                <input type="text" required="required" id="" name="title" name="name" value="{{$article->title}}">
                            </div>
                            
                            <div class="inputBox w-100 px-5">
                                <label for="subtitle" class="form-label">Sottotitolo</label>
                                <input type="text" required="required" id="subtitle" name="subtitle" value="{{$article->subtitle}}">
                            </div>
                            <div class="inputBox w-100 px-5">
                                <label for="img" class="form-label">Immagine</label>
                                <input type="file" class="custom-file-input" id="img" name="img">
                            </div>
                            <div class="inputBox w-100 px-5">
                                <label for="category" class="form-label">Categoria</label>
                                <select name="category" id="category" class="form-control text-capitalize">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if ($article->category && $category->id == $article->category->id) selected @endif> {{$category->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="inputBox w-100 px-5">
                                    <label for="body" class="form-label">Corpo</label>
                                    <textarea name="body" id="body-form" cols="30" rows="7" class="form-control" placeholder="Descrivi articolo" id="title" >{{$article->body}}</textarea> 
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags:</label>
                                    <input name="tags" id="tags" class="form-control" value="{{$article->tags->implode('name', ', ')}}">
                                    <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                                </div>
                                
                                
                                <button type="submit" class="enter">Modifica articolo</button>
                                <a id="logo_home" class="btn btn-outlin-info " href="{{route('homepage')}}"><i class="fa-solid fa-house"></i></a>
                            </div>
                        </div>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
        
        
        
        
        
    </x-layout>