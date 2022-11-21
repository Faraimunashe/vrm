<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vehicle & License Checking System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('things/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('things/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

  <!-- Vendor CSS Files -->
  <link href="{{asset('things/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('things/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('things/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('things/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('things/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('things/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('things/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/"><span>VLCS.</span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          @if (Auth::check())
            <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{route('user-licences')}}">Driver's License</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <li>
                <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
          @else
            <li>

                <a class="nav-link" href="{{route('login')}}">
                    Login
                </a>
            </li>
            <li><a class="nav-link" href="{{route('register')}}">Register</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                  <div class="col-lg-6">
                    <h4>Check Your Drivers License</h4>
                    <p>May be it took a little longer to find it.</p>
                    <form action="{{route('user-licences')}}" method="GET">
                      <input type="text" name="search" class=" ml-3">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">License Details</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>License #:</strong> {{$license->number}}</p>
                            <p><strong>National ID:</strong> {{$license->natid}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="" style="float: right;" class="btn btn-primary">Request collection</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="float: bottom;">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>VLCS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Project 2022</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('things/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('things/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('things/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('things/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('things/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('things/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('things/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('things/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('things/assets/js/main.js')}}"></script>

</body>

</html>
