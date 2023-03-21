<x-layout>
    <div class="container-fluid my-3">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-8 col-lg-6">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                @endif
                
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="container ">
                    <div class="card card-custom color-form">
                        <a class="singup">REGISTRATI</a>
                        <div class="inputBox mt-5">
                            <input type="text" required="required" name="name">
                            <span class="user">Nome</span>
                            @error('name') <span class="error bg-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="inputBox">
                            <input type="text" required="required" name="email">
                            <span class="user">Email</span>
                            @error('email') <span class="error bg-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="inputBox">
                            <input type="password" required="required" name="password">
                            <span>Password</span>
                            @error('password') <span class="error bg-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="inputBox">
                            <input type="password" required="required" name="password_confirmation">
                            <span>Conferma Password </span>
                            @error('password_confirmation') <span class="error bg-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <button class="enter">Enter</button>
                        
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout>







