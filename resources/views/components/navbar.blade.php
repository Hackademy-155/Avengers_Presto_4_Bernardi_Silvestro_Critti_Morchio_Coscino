<nav class="navbar navbar-expand-lg py-3 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand title" href="#">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav py-5 py-lg-0 mt-1 mb-2 my-lg-0 p-5 mx-auto navbar-freya">
                <li class="nav-item adjust-navbar">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.index')}}">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li class="categories-drop">
                            <a class="dropdown-item text-capitalize color-categories" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                        </li>
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('create.article')}}">Insert Article</a>
                </li>
                @endauth
                <div class="d-flex">
                    <li>
                        <a href="#"><img class="flags ms-3" src="/media/italy.png" alt="Italy"></a>
                    </li>
                    <li>
                        <a href="#"><img class="flags ms-3 me-3" src="/media/united-kingdom.png" alt="United Kingdom"></a>
                    </li>
                    <li class="">
                        <label class="switch mb-0">
                            <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#ffd43b"><circle r="5" cy="12" cx="12"></circle><path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path></g></svg></span>
                            <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path></svg></span>   
                            <input type="checkbox" class="input">
                            <span class="slider"></span>
                        </label>
                    </li>
                </div>
            </ul>
            @auth
            <ul class="navbar-nav justify-content-end px-2 d-flex align-items-center logout">
                <li class="nav-item d-flex align-items-center">
                    <p class="mb-0 fs-5">Ciao {{ Auth::user()->name }}</p>
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                        <i class="bi bi-box-arrow-right account"></i>
                    </a>
                </li>
                <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
                    @csrf
                </form>
            </ul>
            @endauth
            @guest
            <div class="auth-buttons d-flex align-items-center justify-content-end title">
                <a href="{{Route('login')}}" class="btn-auth btn-login">Login</a>
                <span class="divider"></span>
                <a href="{{Route('register')}}" class="btn-auth btn-signup">Sign Up</a>
            </div>
            @endguest
        </div>
    </div>
</nav>
