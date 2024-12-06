<nav class="navbar navbar-expand-lg py-3 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand title" href="#">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 mx-auto navbar-freya">
                <li class="nav-item ms-4">
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
                            <li>
                                <a class="dropdown-item text-capitalize" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
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
                <li>
                    <a href="#"><img class="flags ms-3" src="/media/italy.png" alt="Italy"></a>
                </li>
                <li>
                    <a href="#"><img class="flags ms-3 me-4" src="/media/united-kingdom.png" alt="United Kingdom"></a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav justify-content-end px-5 d-flex align-items-center logout">
                    <li class="nav-item d-flex align-items-center me-3">
                        <p class="mb-0">Ciao {{ Auth::user()->name }}</p>
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
