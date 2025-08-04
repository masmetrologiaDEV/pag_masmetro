<?php
   $item=$contenido[0];
   $icon = 'data:image/bmp;base64,' . base64_encode($item->icon);
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
      <link rel="icon" type="image/bmp" href="<?= $icon ?>">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="<?= base_url('template/css/css2.css')?>" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="<?= base_url('template/css/bootstrap.icons.css')?>" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="<?= base_url('template/lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
      <link href="<?= base_url('template/lib/animate/animate.min.css')?>" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?= base_url('template/css/bootstrap.min.css')?>" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="<?= base_url('template/css/style.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="<?= base_url('template/css/all.min.css')?>">

      
       
                     
   </head>

   <body>

      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner"></div>
      </div>
      <!-- Spinner End -->
      <!-- Navbar & Carousel Start -->
      <div class="container-fluid position-relative p-0">
         <nav class="navbar navbar-expand-lg navbar-dark px-5 custom-navbar">

            <a href="<?= base_url('/') ?>" class="navbar-brand p-0">
            <img class="w-100" src="<?= 'data:image/bmp;base64,' . base64_encode($item->img); ?>" alt="Image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <div class="navbar-nav ms-auto py-0">
                  <a href="<?= base_url('/') ?>" class="nav-item nav-link <?= uri_string() == '/' ? 'active' : '' ?>"> <?= lang('Validation.home')?> </a>
                  <div class="nav-item dropdown">
                     <a href="<?= base_url('home/services/') ?>" class="nav-link dropdown-toggle 
                        <?= in_array(uri_string(), ['home/services', 'home/lab_calibracion', 'home/inspeccion_dimensional', 'home/equipos_inventarios', 'home/cross_section']) ? 'active' : '' ?>"> <?= lang('Validation.services')?> 
                     </a>
                     <div class="dropdown-menu m-0">
                        <a href="<?= base_url('home/lab_calibracion/')?>" class="dropdown-item <?= uri_string() == 'home/lab_calibracion' ? 'active' : '' ?>"> <?= lang('Validation.calibration')?> </a>
                        <a href="<?= base_url('home/inspeccion_dimensional/')?>" class="dropdown-item <?= uri_string() == 'home/inspeccion_dimensional' ? 'active' : '' ?>"> <?= lang('Validation.dimensional')?> </a>
                        <a href="<?= base_url('home/equipos_inventarios/')?>" class="dropdown-item <?= uri_string() == 'home/equipos_inventarios' ? 'active' : '' ?>"> <?= lang('Validation.inventory')?> </a>
                        <a href="<?= base_url('home/cross_section/')?>" class="dropdown-item <?= uri_string() == 'home/cross_section' ? 'active' : '' ?>"> <?= lang('Validation.test')?> </a>
                     </div>
                  </div>
                  <a href="<?= base_url('home/acreditacion/') ?>" class="nav-item nav-link <?= uri_string() == 'home/acreditacion' ? 'active' : '' ?>"> <?= lang('Validation.accreditation')?> </a>
                  <a href="<?= base_url('home/blog/') ?>" class="nav-item nav-link <?= uri_string() == 'home/blog' ? 'active' : '' ?>"> <?= lang('Validation.blog')?> </a>



                  <div class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle 
                        <?= in_array(uri_string(), ['home/about', 'home/directorio']) ? 'active' : '' ?>" data-bs-toggle="dropdown" data-bs-toggle="dropdown"> <?= lang('Validation.about')?>
                     </a>
                     <div class="dropdown-menu m-0">
                        <a href="<?= base_url('home/about/')?>" class="dropdown-item <?= uri_string() == 'home/about' ? 'active' : '' ?>"> <?= lang('Validation.staff')?> </a>
                        <a href="<?= base_url('home/directorio/')?>" class="dropdown-item <?= uri_string() == 'home/directorio' ? 'active' : '' ?>"> <?= lang('Validation.directory')?> </a>
                     </div>
                  </div>


                  <a href="<?= base_url('home/contact/') ?>" class="nav-item nav-link <?= uri_string() == 'home/contact' ? 'active' : '' ?>"> <?= lang('Validation.contact')?> </a>
               </div>
               <form class="d-flex ms-3 align-items-center" role="search" action="<?= base_url('buscar') ?>" method="get" style="max-width: 250px;">
                  <input
                     id="searchInput"
                     class="form-control form-control-sm me-2 bg-transparent border border-light text-light"
                     type="search"
                     name="q"
                     placeholder=<?= lang('Validation.search')?>
                     aria-label="Buscar"
                     style="min-width: 0;"
                     >
                  <button class="btn btn-sm d-flex justify-content-center align-items-center p-0"
                     type="submit"
                     style="width:34px;height:34px;border-radius:4px;">
                  <i id="searchIcon" class="fa fa-search text-light"></i>
                  </button>
               </form>
             <!--  <form class="ms-3 d-flex align-items-center" method="get" action="<?= current_url() ?>">
  <select name="lang" class="form-select form-select-sm bg-transparent border border-light text-light"
          onchange="this.form.submit()" style="width: 130px; cursor: pointer;">
    <option value="es" <?= service('request')->getLocale() === 'es' ? 'selected' : '' ?>>
      🇲🇽 ESP MX
    </option>
    <option value="en" <?= service('request')->getLocale() === 'en' ? 'selected' : '' ?>>
      🇺🇸 ENG
    </option>
  </select>

  <?php foreach ($_GET as $key => $value): ?>
    <?php if ($key !== 'lang'): ?>
      <input type="hidden" name="<?= esc($key) ?>" value="<?= esc($value) ?>">
    <?php endif; ?>
  <?php endforeach; ?>
</form>-->

            </div>

         </nav>

         <div class="position-relative video-container" style="height: 80vh; overflow: hidden;">
            <!-- Video de fondo -->

            <video autoplay muted loop playsinline class="video-bg-limited position-absolute top-50 start-50 translate-middle">
    <source src="<?= base_url('template/videos/'.$video_header) ?>" type="video/mp4">
  </video>

            <!-- Carrusel encima del video -->
            <div id="header-carousel" class="carousel slide h-100" data-bs-ride="carousel">
               <div class="carousel-inner h-100 d-flex align-items-center justify-content-start" style="padding-left: 200px;">
                  <?php foreach ($header_content as $index => $elem): ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                     <?php   if (session()->has('id')): 
                        if (session()->rol=='admin'): ?>
                     <a href="<?= base_url('admin/admin/' . $elem->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                     <i class="fa fa-eye"></i> Admin
                     </button>
                     </a>
                     <?php endif; ?>
                     <a href="<?= base_url('admin/edit/' . $elem->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                     <i class="fa fa-pencil"></i> Editar
                     </button>
                     </a>
                     <?php endif; ?>
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

            <video autoplay muted loop playsinline class="position-absolute top-50 start-50 translate-middle object-fit-contain z-n1">
               <source src="<?= base_url('template/videos/'.$video_header) ?>" type="video/mp4">
            </video>
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