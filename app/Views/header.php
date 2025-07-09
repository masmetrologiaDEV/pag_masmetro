<?php
$item=$contenido[0];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title><?=$item->title?></title>
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
      <link href="<?= base_url('template/lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
      <link href="<?= base_url('template/lib/animate/animate.min.css')?>" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?= base_url('template/css/bootstrap.min.css')?>" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="<?= base_url('template/css/style.css')?>" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            <a href="<?= base_url('/') ?>" class="navbar-brand p-0">
            <img class="w-100" src="<?= base_url('template/img/header.png')?>" alt="Image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <div class="navbar-nav ms-auto py-0">
                  <a href="<?= base_url('/') ?>" class="nav-item nav-link <?= uri_string() == '/' ? 'active' : '' ?>">Inicio</a>

               <div class="nav-item dropdown">
               <a href="<?= base_url('home/services') ?>" class="nav-link dropdown-toggle 
               <?= in_array(uri_string(), ['home/services', 'home/lab_calibracion', 'home/inspeccion_dimensional', 'home/equipos_inventarios']) ? 'active' : '' ?>">Servicios
               </a>

               <div class="dropdown-menu m-0">
                        <a href="<?= base_url('home/lab_calibracion/')?>" class="dropdown-item <?= uri_string() == 'home/lab_calibracion' ? 'active' : '' ?>">Laboratorio de Calibración</a>
                        <a href="<?= base_url('home/inspeccion_dimensional/')?>" class="dropdown-item <?= uri_string() == 'home/inspeccion_dimensional' ? 'active' : '' ?>">Inspección Dimensional</a>
                        <a href="<?= base_url('home/equipos_inventarios/')?>" class="dropdown-item <?= uri_string() == 'home/equipos_inventarios' ? 'active' : '' ?>">Equipos para Inventarios</a>
                     </div>
                  </div>
                  <a href="<?= base_url('home/acreditacion/') ?>" class="nav-item nav-link <?= uri_string() == 'home/acreditacion' ? 'active' : '' ?>">Acreditación</a>
                  <a href="<?= base_url('home/blog/') ?>" class="nav-item nav-link <?= uri_string() == 'home/blog' ? 'active' : '' ?>">Blog</a>
                  <a href="<?= base_url('home/about/') ?>" class="nav-item nav-link <?= uri_string() == 'home/about' ? 'active' : '' ?>">Nosotros</a>
                  <a href="<?= base_url('home/contact/') ?>" class="nav-item nav-link <?= uri_string() == 'home/contact' ? 'active' : '' ?>">Contacto</a>

                  
               </div>
               <form class="d-flex ms-3 align-items-center" role="search" action="<?= base_url('buscar') ?>" method="get">
                  <input class="form-control form-control-sm me-2 bg-dark text-white border-light" 
                        type="search" 
                        name="q" 
                        placeholder="Buscar..." 
                        aria-label="Buscar">
                  <button class="btn btn-sm btn-outline-light bg-dark" type="submit">
                     <i class="fa fa-search"></i>
                  </button>
               </form>

            </div>
         </nav>
         <div class="position-relative" style="height: 80vh; overflow: hidden;">
            <!-- Video de fondo -->
            <video autoplay muted loop playsinline class="position-absolute top-50 start-50 translate-middle object-fit-contain z-n1">
               <source src="<?= base_url('template/videos/'.$video_header) ?>" type="video/mp4">
            </video>
            <!-- Carrusel encima del video -->
            <div id="header-carousel" class="carousel slide h-100" data-bs-ride="carousel">
                   <div class="carousel-inner h-100 d-flex align-items-center justify-content-start" style="padding-left: 200px;">
                  <?php foreach ($header_content as $index => $elem): ?>
                     <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                           <div class="rounded p-4 shadow d-flex flex-column align-items-center text-center" style="max-width: 300px; background-color: rgba(255,255,255,0.2);">
                              <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" 
                                 alt="<?= esc($elem->title) ?>" 
                                 class="img-fluid mb-3" 
                                 style="width: 100%; max-height: 200px; object-fit: contain;">
                              <a href="<?=base_url('home/'.$elem->slug)?>" target="" rel="noopener">
                              <h4 class="fw-bold text-light"><?= esc($elem->title) ?></h4>
                              </a>
                              <p class="mb-0 text-white small"><?= esc($elem->content) ?></p>
                           </div>

                     </div>
                  <?php endforeach; ?>
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