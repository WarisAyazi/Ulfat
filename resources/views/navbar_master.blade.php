<!DOCTYPE html>
<html lang="en">

<head>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=hi, initial-scale=1.0">
    <title>@yield('header')</title>

</head>

<body>
    <header>

        <body class="bg-muted">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <img src="{{asset('logo.png')}}" class="rounded mx d-block mx-2" style="width: 50px;" alt="logo">
                    <a class="navbar-brand text-primary fw-bold" href="{{route('index')}}">Eng Hamidullah Ulfat</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if($active = 'student') active @endif " aria-current="page" href="{{route('student.index')}}">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active = 'teacher') active @endif  " href="#">Teachers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active = 'subject') active @endif  " href="#">Subjects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active = 'time') active @endif  " href="#">Times</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
    </header>

    <div class="container bg-muted">

        @yield('content')
    </div>

</body>




</html>