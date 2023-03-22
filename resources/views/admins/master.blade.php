<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/path/to/bootstrap/css/bootstrap.min.css"> --}}
</head>
<body>
    <header>
        <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link" href="{{route("admin.index")}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("users.index")}}">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("articles.index")}}">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("categories.index")}}">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("admin.logout")}}" >Logout</a>
            </li>
          </ul>
    </header>
    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>@yield('title')</b></h1>
        @yield('content')
    </div>

</body>
</html>
