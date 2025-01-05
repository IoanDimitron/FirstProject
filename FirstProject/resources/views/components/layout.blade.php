<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? "Blog"}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #e0d1a6;
    }
</style>
 
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
               Blog
            </a>
 
            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <!-- Collapsible Content -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <!-- Navigation Links -->
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="/posts">Posts</a>
                    @auth
                    @if(auth()->check() && auth()->user()->type === 'admin')
                    <a class="nav-link" href="/posts/create">Create</a>
                    @endif
                    @endauth
                </div>
 
                <!-- User Dropdown -->
                <div class="d-flex align-items-center">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/my-liked-posts">
                                        My Liked Posts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <a class="btn btn-outline-primary ms-3" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-outline-primary ms-3" href="{{ route('register') }}">Register</a>

                    @endguest
                </div>
            </div>
        </div>
    </nav>
 
    {{$slot}}
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
 
</html>