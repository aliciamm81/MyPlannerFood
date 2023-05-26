</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">

    <style>
        a {
            text-decoration-line: none;
            color: #8b6d5c;
        }

        th,
        h1,
        h2,
        h3,
        h4,
        th.h4 {
            color: #72ba55;

        }

        h4 {
            font-size: 18px;
        }

        #sidebarMenu {
            background-color: #72ba55;
        }

        body {

            font-family: 'Assistant', sans-serif;
        }

        .steps {
            border-left: none;
            border-left-color: 0.3px #72ba55;
            box-shadow: -4px 0px 5px 0px #72ba55;

        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block text-Light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li><img src="{{ asset('images/logo3.png') }}"class="img-thumbnail"></li>
                        <li class="nav-item p-3 dropdown">
                            <a class="navbar-brand dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="fas fa-book"></i>&nbsp
                                Recipes</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/recipes">Recipes</a></li>
                                <li><a class="dropdown-item" href="/recipes/create">Create Recipes</a></li>
                                <li><a class="dropdown-item" href="/recipes/users">Recipes Users</a></li>


                            </ul>
                        </li>
                        <li class="nav-item p-3 dropdown">
                            <a class="navbar-brand dropdown-toggle" data-bs-toggle="dropdown" href="/menu"><i
                                    class="fas fa-calendar"></i>&nbsp Menu</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/menu">Create menu</a></li>
                                <li><a class="dropdown-item" href="/menu/create">List Menu</a></li>

                            </ul>

                        </li>
                        <li class="nav-item p-3">
                            <a class="navbar-brand" href="/food"><i class="fas fa-carrot"></i>&nbsp Food</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap p-3 mb-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
