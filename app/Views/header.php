<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Startup - Startup Website Template</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free HTML Templates" name="keywords">
      <meta content="Free HTML Templates" name="description">
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner"></div>
      </div>
      <!-- Spinner End -->
      <!-- Navbar & Carousel Start -->
      <div class="container-fluid position-relative p-0">
         <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0" >
            <img class="w-100" src="img/header.png" alt="Image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <div class="navbar-nav ms-auto py-0">
                  <a href="index.html" class="nav-item nav-link active">Home</a>
                  <a href="about.html" class="nav-item nav-link">About</a>
                  <a href="service.html" class="nav-item nav-link">Services</a>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                     <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="detail.html" class="dropdown-item">Blog Detail</a>
                     </div>
                  </div>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item">Pricing Plan</a>
                        <a href="feature.html" class="dropdown-item">Our features</a>
                        <a href="team.html" class="dropdown-item">Team Members</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                     </div>
                  </div>
                  <a href="contact.html" class="nav-item nav-link">Contact</a>
               </div>
            </div>
         </nav>
         <div class="position-relative" style="height: 80vh; overflow: hidden;">
            <!-- Video de fondo -->
            <video autoplay muted loop playsinline class="position-absolute top-50 start-50 translate-middle object-fit-contain z-n1">
               <source src="<?= base_url('template/videos/MAS Cobertura H.mov') ?>" type="video/mp4">
            </video>
            <!-- Carrusel encima del video -->
            <div id="header-carousel" class="carousel slide h-100" data-bs-ride="carousel">
               <div class="carousel-inner h-100 d-flex align-items-center justify-content-start" style="padding-left: 200px;">

                  <!-- Slide 1: Calibración -->
                  <div class="carousel-item active">
                     <div class="rounded p-4 d-flex align-items-center shadow" style="max-width: 500px; background-color: rgba(255,255,255,0.2);">
                        <img src="img/calibracion.jpg" alt="Calibración" class="img-fluid me-4" style="width: 200px; height: auto;">
                        <div>
                           <h3 class="fw-bold text-light">Laboratorio de Calibración</h3>
                           <p class="mb-0 text-white">
                              Más de 20 magnitudes acreditadas para cubrir los requerimientos de calibración de instrumentos de medición de clase mundial.
                           </p>
                        </div>
                     </div>
                  </div>
                  <!-- Slide 2: Inspección Dimensional -->
                  <div class="carousel-item">
                     <div class="rounded p-4 d-flex align-items-center shadow" style="max-width: 500px; background-color: rgba(255,255,255,0.2);">
                        <img src="img/dimensional.jpg" alt="Inspección Dimensional" class="img-fluid me-4" style="width: 200px; height: auto;">
                        <div>
                           <h3 class="fw-bold text-light">Inspección Dimensional</h3>
                           <p class="mb-0 text-white">
                              Tecnología de vanguardia para validar la calidad de sus productos con servicios acreditados. Ideal para moldeado, maquinado y troquelado.
                           </p>
                        </div>
                     </div>
                  </div>
                  <!-- Slide 3: Equipos para Inventarios -->
                  <div class="carousel-item">
                     <div class="rounded p-4 d-flex align-items-center shadow" style="max-width: 500px; background-color: rgba(255,255,255,0.2);">
                        <img src="img/inventarios.jpg" alt="Inventarios" class="img-fluid me-4" style="width: 200px; height: auto;">
                        <div>
                           <h3 class="fw-bold text-light">Equipos para Inventarios</h3>
                           <p class="mb-0 text-white">
                              Tecnología inteligente con un alto grado de precisión, rapidez y flexibilidad en el proceso de inventarios.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Controles del carrusel -->
               <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
               <span class="carousel-control-prev-icon"></span>
               <span class="visually-hidden">Anterior</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
               <span class="carousel-control-next-icon"></span>
               <span class="visually-hidden">Siguiente</span>
               </button>
            </div>
         </div>
      </div>
      <!-- Navbar & Carousel End -->
      <!-- Full Screen Search Start -->
      <div class="modal fade" id="searchModal" tabindex="-1">
         <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
               <div class="modal-header border-0">
                  <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body d-flex align-items-center justify-content-center">
                  <div class="input-group" style="max-width: 600px;">
                     <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                     <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Full Screen Search End -->