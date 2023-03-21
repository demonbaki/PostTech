<table class ="table table-striped table-hover border"> 
    <thread class ="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col" class="sub-wri">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col" class="sub-wri">Tags</th>
            <th scope="col" class="sub-wri">Creato Il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thread>
    <tbody>
        @foreach ($articles as $article)
        
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td class="sub-wri">{{$article->subtitle}}</td>
            <td>{{$article->category->name ?? 'non categorizzato'}}</td>
            <td class="sub-wri">
                @foreach ($article->tags as $tag)
                {{$tag->name}},
                
                @endforeach
            </td>
            <td class="sub-wri">{{$article->created_at->format('d/m/Y')}}</td>
            <td>
                <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white px-4"><i class="fa-solid fa-book-open"></i></a>

                <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning text-white px-4"><i class="fa-regular fa-pen-to-square"></i></a>

                <form  action="{{route('article.destroy', compact('article'))}}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger px-4" type="submit"><i class="fa-solid fa-trash-arrow-up"></i></button>
                </form>
                
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>