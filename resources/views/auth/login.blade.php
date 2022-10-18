{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
 --}}

 <!DOCTYPE html>
 <!--
 Template Name: Rubick - HTML Admin Dashboard Template
 Author: Left4code
 Website: http://www.left4code.com/
 Contact: muhammadrizki@left4code.com
 Purchase: https://themeforest.net/user/left4code/portfolio
 Renew Support: https://themeforest.net/user/left4code/portfolio
 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 -->
 <html lang="en" class="light">
     <!-- BEGIN: Head -->
     <head>
         <meta charset="utf-8">
         <link href="dist/images/logo.svg" rel="shortcut icon">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
         <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
         <meta name="author" content="LEFT4CODE">
         <title>Login - Rubick - Tailwind HTML Admin Template</title>
         <!-- BEGIN: CSS Assets-->
         <link rel="stylesheet" href="dist/css/app.css" />
         <link rel="stylesheet" href="{{ asset('css/all.css')}}" />
         <link rel="stylesheet" href="{{ asset('css/snackbar.min.css')}}" />
         <!-- END: CSS Assets-->
     </head>
     <!-- END: Head -->
     <body class="login">





        <!-- Scripts -->

 <div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="text-white text-lg ml-3"> Ru<span class="font-medium">bick</span> </span>
            </a>
            <div class="my-auto">
                <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to 
                    <br>
                    sign in to your account.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your e-commerce accounts in one place</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
       
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                
                
                
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                   Iniciar Sesión
                </h2>


                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="intro-x mt-8">
                    <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" id="email" name="email" placeholder="Correo">
                    <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" id="password" name="password" placeholder="Contraseña">
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                        <label class="cursor-pointer select-none" for="remember-me">Recordarme</label>
                    </div>
                    <a href="">Forgot Password?</a> 
                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                    <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Sign up</button>
                </div>
                <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                    By signin up, you agree to our 
                    <br>
                    <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a> 
                </div>

            </form>

            </div>
        </div>

        <!-- END: Login Form -->
    </div>
</div>
<script src="dist/js/app.js"></script>
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="{{asset('js/snackbar.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

<script src="{{asset('js/alpine.js')}}"></script>
<!-- END: JS Assets-->
</body>
</html>