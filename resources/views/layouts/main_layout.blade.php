<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-secondary text-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-light" href="#">ITI</a>
                <a class="nav-link text-light" href="#">Blog</a>
                <a class="nav-link text-light" href="{{route('posts.index')}}">All Posts</a>
            </div>
        </div>
    </div>
</nav>

<section class="container">
    @yield('content')
</section>

</body>
</html>
