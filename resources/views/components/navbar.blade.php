<nav class="navbar navbar-expand-lg fixed-top">
    <div class=" navbar-container container-fluid">
        <h3 class="title d-flex align-items-center"> Presto.it </h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav py-5 py-lg-0 mt-1 mb-2 my-lg-0 p-5 mx-auto navbar-freya">
                <li class="nav-item adjust-navbar">
                    <a class="nav-link" href="/">
                        <i class="bi bi-house-door-fill me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-info-circle me-2"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">
                        <i class="bi bi-boxes me-2"></i>Products
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-tags-fill me-2"></i>Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li class="categories-drop">
                                <a class="dropdown-item text-capitalize color-categories"
                                    href="{{ route('byCategory', ['category' => $category]) }}">
                                    <i class="bi bi-tag me-2"></i>{{ $category->name }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.article') }}">
                            <i class="bi bi-file-earmark-plus me-2"></i>Insert Article
                        </a>
                    </li>
                @endauth
                <a href="{{ route('article.search') }}" class="d-flex align-items-center me-2">
                    <i class="bi bi-search fs-6 pb-0"></i>
                </a>
                <div class="d-flex align-items-center">
                    <!--
                    <li>
                        <a href="#" class="me-2">
                            <img class="flags" src="/media/italy.png" alt="Italy">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="me-3">
                            <img class="flags" src="/media/united-kingdom.png" alt="United Kingdom">
                        </a>
                    </li>
                    -->
                    <li id="buttonDark">
                        <label class="switch mb-0">
                            <span class="sun"><i class="bi bi-sun fs-4 text-warning"></i></span>
                            <span class="moon"><i class="bi bi-moon fs-4 text-muted"></i></span>
                            <input type="checkbox" class="input">
                            <span class="slider"></span>
                        </label>
                    </li>
                </div>
            </ul>
            @auth
                <ul class="navbar-nav d-flex logout">
                    <li class="nav-item d-flex align-items-center">
                        <p class="mb-0 fs-5 me-3">Ciao {{ Auth::user()->name }}</p>
                        @if (Auth::user()->is_revisor)
                        <a class="nav-link btn btn-auth position-relative w-auto rounded-pill px-3 mt-0" href="{{ route('revisor.index') }}">
                            <i class="bi bi-pen-fill me-2"></i>Revision Area
                            <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger notifica">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </a>  
                        @endif
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                            <i class="bi bi-box-arrow-right account"></i>
                        </a>
                    </li>
                </ul>
            @endauth
            @guest
                <div class="auth-buttons d-flex align-items-center justify-content-end ms-auto">
                    <a href="{{ Route('login') }}" class="btn-auth btn-login d-flex align-items-center me-2">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </a>
                    <a href="{{ Route('register') }}" class="btn-auth btn-signup d-flex align-items-center">
                        <i class="bi bi-person-add me-2"></i>Sign Up
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
