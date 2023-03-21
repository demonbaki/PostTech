<x-layout>

    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
            </div>
        </div>
    </div>

    <div class="container form-login">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6" >

            @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST"  action="{{route('login')}}">
                    @csrf
                    <!-- d-flex justify-content-center mb-5 p-5 -->
                    <div class="container"> 
                        <div class="card card-custom color-form">
                            <a class="login pt-3">LOGIN</a>
                            <div class="inputBox inputBoxlogin">
                                <input id="inputlogin" type="email" name="email" id="input-login" required="required">
                                <span class="alto"class="user">Email</span>
                                @error('email') <span class="error bg-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="inputBox inputBoxlogin">
                                <input type="password" id="inputlogin" name="password" required="required">
                                <span class="alto">Password</span>
                                @error('password') <span class="error bg-danger">{{ $message }}</span> @enderror
                            </div>
                    
                            <button class="enter">Accedi</button>
                
                            <p>
                                Non sei registrato? <a href="{{route('register')}}">Clicca qui</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
