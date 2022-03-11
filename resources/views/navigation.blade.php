<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="/">Instalite</a>
    @isset($user)
    <small>Logged in as: {{$user->name}}</small>
    @endisset
    <ul class="navbar-nav">
        @empty($user)
        <a class="nav-link" href="/createaccount"><span class="create-account">Create account</span></a>
        @endempty
        <li class="nav-item">
            <a class="nav-link" href="/"><i class="bi bi-house-door"></i>
                </svg></a>
        </li>
        @isset($user)
        <li class="nav-item">
            <a class="nav-link" href="/addphoto"><i class="bi bi-plus-square"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/photos"><i class="bi bi-person-circle"></i></a>
        </li>
        @endisset
        <li class="nav-item">
            @isset($user)
            <a class="nav-link" href="/logout"><i class="bi bi-door-closed-fill"></i></a>
            @endisset
        </li>

    </ul>
</nav>
