@extends('layouts.app')

@section('content')


    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <body>
        <img class="wave" src="img/wave.png">
    
        <div class="container">
    
            <div class="img">
                <img src="img/login.svg">
            </div>
    
            <div class="login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
    
                    <img src="img/avatar.svg">
                    <h2 class="title">Login</h2>
    
                    <div class="input-div one">
                       <div class="i">
                            <i class="fas fa-user"></i>
                       </div>
    
                       <div class="div">
                            <h5>Email Address</h5>
                            <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                       </div>
    
                    </div>
    
                    <div class="input-div pass">
                       <div class="i"> 
                            <i class="fas fa-lock"></i>
                       </div>
    
                       <div class="div">
                            <h5>Password</h5>
                            <input id="password" class="input" type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                       </div>
    
                    </div>
    
                    <input type="submit" class="btn" value="Login">
    
                    <p class="signup-link">Don't have an account? <a href="/register" class="btn-signup">Sign up</a></p>
                </form>
               
            </div>
        </div>
        

    </body>

    <script type="text/javascript" src="../../js/app.js"></script>
    
    
    <style>

            body{
                font-family: 'Poppins', sans-serif;
                overflow: hidden;
            }

            .wave{
                position: fixed;
                bottom: 0;
                left: 0;
                height: 100%;
                z-index: -1;
                width: 50%;
            }

            .container{
                width: 100vw;
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap :7rem;
                padding: 0 2rem;
            }

            .img{
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .login-content{
                display: flex;
                justify-content: flex-start;
                align-items: center;
                text-align: center;
            }

            .img img{
                width: 300px;
            }

            form{
                width: 350px;
            }

            .login-content img{
                height: 100px;
            }

            .login-content h2{
                margin: 15px 0;
                color: #333;
                text-transform: uppercase;
                font-size: 2.9rem;
            }

            .login-content .input-div{
                position: relative;
                display: grid;
                grid-template-columns: 7% 93%;
                margin: 25px 0;
                padding: 5px 0;
                border-bottom: 2px solid #d9d9d9;
            }

            .login-content .input-div.one{
                margin-top: 0;
            }

            .i{
                color: #d9d9d9;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .i i{
                transition: .3s;
            }

            .input-div > div{
                position: relative;
                height: 45px;
            }

            .input-div > div > h5{
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #999;
                font-size: 18px;
                transition: .3s;
            }

            .input-div:before, .input-div:after{
                content: '';
                position: absolute;
                bottom: -2px;
                width: 0%;
                height: 2px;
                background-color: #38d39f;
                transition: .4s;
            }

            .input-div:before{
                right: 50%;
            }

            .input-div:after{
                left: 50%;
            }

            .input-div.focus:before, .input-div.focus:after{
                width: 50%;
            }

            .input-div.focus > div > h5{
                top: -5px;
                font-size: 15px;
            }

            .input-div.focus > .i > i{
                color: #38d39f;
            }

            .input-div > div > input{
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border: none;
                outline: none;
                background: none;
                padding: 0.5rem 0.7rem;
                font-size: 1.2rem;
                color: #555;
                font-family: 'poppins', sans-serif;
            }

            .input-div.pass{
                margin-bottom: 4px;
            }

            a{
                display: block;
                text-align: right;
                text-decoration: none;
                color: #999;
                font-size: 0.9rem;
                transition: .3s;
            }

            a:hover{
                color: #38d39f;
            }

            .btn{
                display: block;
                width: 100%;
                height: 50px;
                border-radius: 25px;
                outline: none;
                border: none;
                background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
                background-size: 200%;
                font-size: 1.2rem;
                color: #fff;
                font-family: 'Poppins', sans-serif;
                text-transform: uppercase;
                margin: 1rem 0;
                cursor: pointer;
                transition: .5s;
            }
            .btn:hover{
                background-position: right;
            }

            .title{
                font-weight: bolder;
            }



            /* Add these styles to your existing styles or create a new style block */

            .signin-container {
                text-align: center;
                margin-top: 20px;
            }

            .signin-link {
                color: #555;
                font-size: 14px;
            }

            .btn-signin {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3CB371;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 10px;
                transition: background-color 0.3s ease;
            }

            .btn-signin:hover {
                background-color: #306754;
            }



            @media screen and (max-width: 1050px){
                .container{
                    grid-gap: 5rem;
                }
            }

            @media screen and (max-width: 1000px){
                form{
                    width: 290px;
                }

                .login-content h2{
                    font-size: 2.4rem;
                    margin: 8px 0;
                }

                .img img{
                    width: 400px;
                }
            }

            @media screen and (max-width: 900px){
                .container{
                    grid-template-columns: 1fr;
                }

                .img{
                    display: none;
                }

                .wave{
                    display: none;
                }

                .login-content{
                    justify-content: center;
                }
            }
    </style>

@endsection
