<!DOCTYPE html>
<html lang="en">

<head>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <meta charset="UTF-8">

    <meta name="viewport" content="width=hi, initial-scale=1.0">
    <title>Ulfat</title>

</head>

<body>
    <header>

        <body class="bg-muted">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <img src="{{asset('logo.jpg')}}" class="rounded mx d-block mx-2" style="width: 50px;" alt="logo">
                    <a class="navbar-brand text-primary fw-bold" href="{{route('index')}}">Eng Hamidullah Ulfat</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href=" {{route('student.index')}}">Search students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($page == 'student') active @endif" href="{{route('student.create')}}">Add new Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('subject.index')}}">Subjects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('time.index')}}">Times</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('teacher.index')}}">Teacher and Salary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($page == 'teacher') active @endif" href="{{route('new.index')}}">Add Teacher, Class and Time</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('budget.index')}}">Budget</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
    </header>

    <div class="container bg-muted">

        @yield('content')
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Ayazi @php
                    echo date('Y')
                    @endphp
                </span>
            </div>
        </div>
    </footer>

</body>




</html>