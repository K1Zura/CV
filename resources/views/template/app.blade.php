<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Folio - Personal Portfolio Template</title>
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/hover/hover.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive css -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/Preview.png">
  @foreach ($konfigurasi as $item)

  <style>
    #header {
        background: url("{{asset('storage/foto/'.$item->background)}}") repeat scroll center center / cover;
        height: 100vh;
        width: 100%;
    }

    .nav-menu {
        display: flex;
        list-style: none;
    }

    .responsive {
        display: none;
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
            flex-direction: column;
        }

        .responsive {
            display: block;
            cursor: pointer;
        }

        .nav-menu.active {
            display: flex;
        }
    }
</style>
</head>

<body>
  <!-- start section navbar -->
  <nav id="main-nav">
    <div class="row">
      <div class="container">

        <div class="logo">
          <a href="/"><img src="images/kasa.png" style="width: 70px; height:" alt="logo"></a>
        </div>

        <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>
        <ul class="nav-menu list-unstyled">
            <li><a href="#header" class="smoothScroll">Home</a></li>
            <li><a href="#about" class="smoothScroll">About</a></li>
            <li><a href="#portfolio" class="smoothScroll">Portfolio</a></li>
            <li><a href="#contact" class="smoothScroll">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End section navbar -->


  <!-- start section header -->
  <div id="header" class="home">

    <div class="container">
      <div class="header-content">
        <h1>I'm <span class="typed"></span></h1>
        <p>Developer, Engineer, Writer</p>

        <ul class="list-unstyled list-social">
          <li><a href="{{$item->facebook}}" target="_blank"><i class="ion-social-facebook"></i></a></li>
          <li><a href="{{$item->instagram}}" target="_blank"><i class="ion-social-instagram"></i></a></li>
          <li><a href="{{$item->linkedln}}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End section header -->


  <!-- start section about us -->
  <div id="about" class="paddsection">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg-4 ">
          <div class="div-img-bg">
            <div class="about-img">
              <img src="{{asset('storage/foto/'.$item->profil)}}" class="img-responsive" alt="me">
            </div>
          </div>
        </div>
        @foreach ($aboutMe as $item)
        <div class="col-lg-7">
          <div class="about-descr">

            <p class="p-heading">{{$item->header}}</p>
            <p class="separator">{{$item->isi}}</p>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end section about us -->


  <!-- start section services -->
  <div id="services">
    <div class="container">

        <div class="services-carousel owl-theme">

          <div class="services-block">

            <i class="ion-code"></i>
            <span>WEB DEVELOPER</span>
            <p class="separator">I can develop and create websites using HTML, CSS, PHP (Laravel), Javascript (AJAX)</p>

          </div>

          <div class="services-block">

            <i class="ion-social-android-outline"></i>
            <span>MOBILE APPS</span>
            <p class="separator">I can develop and create Apps using Flutter and Kotlin</p>

          </div>

          <div class="services-block">

            <i class="ion-ios-analytics-outline"></i>
            <span>Analytics</span>
            <p class="separator">I can analyze a project and make its logic.</p>

          </div>

          <div class="services-block">

            <i class="ion-ios-book"></i>
            <span>WRITING</span>
            <p class="separator">I usually write about web development insights on Medium, and create a novel story.</p>

          </div>

        </div>

    </div>

  </div>
  <!-- end section services -->


  <!-- start section portfolio -->
  <div id="portfolio" class="text-center paddsection">

    <div class="container">
      <div class="section-title text-center">
        <h2>My Portfolio</h2>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="portfolio-list">

            <ul class="nav list-unstyled" id="portfolio-flters">
              <li class="filter filter-active" data-filter=".all">all</li>
              <li class="filter" data-filter=".web">Web</li>
              <li class="filter" data-filter=".tulisan">Tulisan</li>
            </ul>

          </div>

          <div class="portfolio-container">
            @foreach ($portofolio as $item)
            <div class="col-lg-4 col-md-6 portfolio-thumbnail all {{$item->kategori}} uikits webdesign">
              <a class="popup-img" href="{{asset('storage/portofolio/'. $item->foto)}}">
                <img src="{{asset('storage/portofolio/'. $item->foto)}}" alt="img">
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End section portfolio -->


  <!-- start section journal -->
  <!-- End section journal -->


  <!-- start sectoion contact -->
  <div id="contact" class="paddsection">
    <div class="container">
      <div class="contact-block1">
        <div class="row">

          <div class="col-lg-6">
            <div class="contact-contact">

              <h2 class="mb-30">GET IN TOUCH</h2>
                @foreach ($aboutMe as $item)
                <ul class="contact-details">
                    <li><span><a href="https://maps.app.goo.gl/nYaSDwQ9yN4pqDa79" target="_blank" rel="noopener noreferrer">{{$item->alamat}}</a></span></li>
                    <li><span><a href="https://wa.me/6289667916464" target="_blank">{{$item->no}}</a></span></li>
                    <li><span><a href="mailto:ikhtiarazra6@gmail.com" target="_blank" rel="noopener noreferrer">{{$item->email}}</a></span></li>
                </ul>
                @endforeach
            </div>
          </div>

          <div class="col-lg-6">
            <form id="contact-form" role="form">
              <div class="row">

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="col-lg-6">
                  <div class="form-group contact-block1">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="12" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                    <input type="submit" class="btn btn-defeault btn-send" value="Send message">
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- start sectoion contact -->


  <!-- start section footer -->
  <div id="footer" class="text-center">
    <div class="container">
        @foreach ($konfigurasi as $item)
      <div class="socials-media text-center">
        <ul class="list-unstyled">
          <li><a href="{{$item->facebook}}" target="_blank"><i class="ion-social-facebook"></i></a></li>
          <li><a href="{{$item->instagram}}" target="_blank"><i class="ion-social-instagram"></i></a></li>
          <li><a href="{{$item->linkedln}}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
        </ul>
      </div>
      @endforeach
      <p>&copy; Copyrights K1zura. All rights reserved.</p>
    </div>
  </div>
  <!-- End section footer -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/typed/typed.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const responsiveMenuIcon = document.querySelector('.responsive');
        const navMenu = document.querySelector('.nav-menu');

        responsiveMenuIcon.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });

        const menuLinks = document.querySelectorAll('.nav-menu a');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
            });
        });
    });
</script>


<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
  (function() {
    emailjs.init("InYoHcjWhsu_VWaMY");
  })();
</script>

<script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
      event.preventDefault();

      emailjs.sendForm('service_i4oiycc', 'template_cnpz3ri', this)
        .then(function(response) {
          alert('Message sent successfully!');
        }, function(error) {
          alert('Failed to send message.');
        });
    });
</script>



  @endforeach

</body>

</html>
