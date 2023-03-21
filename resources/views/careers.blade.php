<x-layout>


    @if (session('message'))
        <div class="alert alert-success">
                <p>{{session('message')}}</p>
        </div>
    @endif





    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class=" text-center">Lavora con noi</h1>
            </div>
        </div>
    </div>


    
    

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 py-5">
                <h2>Lavora come amministratore</h2>
                <p >Cosa farai: L'amministratore di un sito deve gestire i contenuti, garantire la sicurezza del sito e dei dati degli utenti, monitorare le prestazioni del sito e gestire gli utenti del sito. È responsabile della creazione, modifica e eliminazione di testo, immagini e video.</p>
                <h2 class="mt-5">Lavora come revisore</h2>
                <p >Cosa farai: Il ruolo da revisore consiste nell'esaminare e valutare criticamente documenti, testi, relazioni, progetti o altre forme di lavoro per verificarne l'accuratezza, la coerenza, la pertinenza e la conformità alle norme. Il revisore deve garantire che il lavoro rispetti gli standard richiesti e che le informazioni presentate siano corrette e precise. </p>
                <h2 class="mt-5">Lavora come redattore</h2>
                <p >Cosa farai: Il ruolo da redattore consiste nell'elaborazione di testi o contenuti scritti, con l'obiettivo di renderli chiari, coerenti e accattivanti per il pubblico a cui sono destinati. Inoltre, il redattore può collaborare con altri professionisti, come editori e revisori, per migliorare il lavoro prodotto.</p>
            </div>

            <div class="col-12 col-md-8 col-lg-6">
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

                <form method="POST" class="p-lg-5" action="{{route('careers.submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="card pb-4 card-create color-form">
                            <div class="inputBox mt-5 w-100 px-5">
                                <div class="mb-3">
                                    <label for="role" class="form-label ">Per quale ruolo ti stai candidando?</label>
                                    <select name="role" id="role" class="form-control bg-gradient">
                                        <option value="">Scegli qui</option>
                                        <option value="admin">Amministratore</option>
                                        <option value="revisor">Revisore</option>
                                        <option value="writer">Redattore</option>
                                    </select>
                                </div>
                            </div>
                
                            <div class=" w-100 px-5">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control bg-gradient" id="email" name="email" value="{{old('email') ?? Auth::user()->email}}"> 
                            </div>
                            
                            <div class="inputBox w-100 px-5">
                                <label for="message" class="form-label">Parlaci di te</label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control bg-gradient" type="message" >{{old('message')}}</textarea> 
                            </div>
                
                            <button type="submit" class="enter">Invia la tua candidatura</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
