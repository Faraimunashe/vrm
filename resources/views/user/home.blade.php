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
            <li><a class="nav-link scrollto" href="#about">Driver's License</a></li>
            <li><a class="nav-link" href="#">Logout</a></li>
          @else
            <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
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

        <div class="section-title">
          <h3><span>Welcome, {{Auth::user()->name}}</span></h3>
        </div>

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
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>{{\App\Models\Vehicle::where('user_id', Auth::id())->count()}}</h3>
              <p>Total number of vehicles registered in your name.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>0</h3>
              <p>pending application</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>0</h3>
              <p>pending drivers license</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12">
            <form action="" method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="make" class="form-control" id="name" placeholder="Vehicle make" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="model" id="email" placeholder="Vehicle model" required>
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="manufactured_at" class="form-control" id="name" placeholder="Manufacture date" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="color" id="email" placeholder="Vehicle color" required>
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="engine_no" class="form-control" id="name" placeholder="Engine number" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="chasis_no" id="chasis" placeholder="Chasis number" required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Send Application</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>To get updates, news and notices from us.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>VLCS<span>.</span></h3>
            <p>
                Central Vehicle Registry
                <br>
                29 Robson Manyika Avenue
                <br>
                P.O. Box CY760,
                Causeway<br>
                Harare, Zimbabwe<br><br>
              <strong>Phone:</strong> +263 4771 577/ 263 4759 743-5<br>
              <strong>Fax:</strong> 263 474 8010<br>
            </p>
          </div>

        </div>
      </div>
    </div>

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
