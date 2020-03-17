<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    @yield('style')



<style>

.list-group-item{

color:black;
font-size:16px;
font-style:;

}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    {{ config('app.name', 'CMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>




   



     @auth

     <div class="container">
     <div class="container-fluid">
         <div class="row py-4">
             <div class="col-md-4">
               <ul class="list-group">
                  <li class="list-group-item active">All You Need</li>

                    
                  <a href="{{ route('dashboard') }}">  <li class="list-group-item">Home</li></a>
                  <a href=" {{ route('post.index') }}">  <li class="list-group-item">Posts</li></a>
               <a href="{{ route('category.index') }}">   <li class="list-group-item">Categories</li></a>
               <a href="{{ route('tag.index') }}">   <li class="list-group-item">Tags</li></a>

               
               <a href="{{ route('user.edit',auth()->user()->id) }}">   <li class="list-group-item">Profile</li></a>

               @if(auth()->user()->isadmin())
               <a href="{{ route('user.index') }}">   <li class="list-group-item">Users</li></a>
               @endif
               <a href="{{ route('trashed.index') }}">   <li class="list-group-item"> Trashed posts</li></a>
                    
                </ul>
             </div>



           <div class="col-md-8">
             <main class="py-4">
               @yield('content')
             </main>
            </div>
         </div>


     </div>
     </div> 

@else
          <div>
             <main class="py-4">
               @yield('content')
             </main>
            </div>
         </div>

@endauth
   </div>
   
   @yield('scripts')

  <div style="align:center" class="container">
    <span class="text-muted">Copy Right Noha Salah 2020</span>
  </div>

</body>
</html>
