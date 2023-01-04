<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple blog html template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container">
                <a class="navbar-brand text-capitalize fw-bold" href="{{ route('homepage') }}">mehedi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <i class="fa-solid fa-magnifying-glass" id="searchicon"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="searchbox p-2 shadow">
        <div class="closebox">
            <i class="fa-solid fa-xmark" id="cloboxicon"></i>
        </div>
        <form action="{{ route('search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" name="search_box" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-dark rounded-0" type="submit" id="button-addon2">Search</button>

            </div>
            @error('search_box')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </form>
    </div>
    <!-- header end -->

    @yield('content')

    <footer class="py-2 bg-dark text-center text-white mt-50">
        <div class="container">
            <div>
                <strong>This Template Design By Mehedi Hassan (Jibon)</strong>
            </div>
        </div>
    </footer>


    <script src="{{ asset('frontend') }}/assets/js/jquery-1.12.4.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/app.js"></script>
</body>

</html>
