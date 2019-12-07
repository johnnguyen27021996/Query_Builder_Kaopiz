<style>
    .nameUser{
        color: #ff5040;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index.show') }}">My Web</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if(session()->has('user'))
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Xin chào <span class="nameUser">{{ session()->get('user')[0]->name }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.show') }}">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register.show') }}">Sign Up</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
