<?php
   $blog_head = $blog[0];
   ?>
<?php 
   $firstCategory = isset($blog_content[0]->category) ? $blog_content[0]->category : null;
   ?>
<!-- Blog Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container py-3">
      <div class="section-title text-center position-relative pb-3 mb-3 mx-auto" style="max-width: 600px;">
         <?php
            $item = $blog[0];
            $rol = session()->get('rol');
            if (session()->has('id')): 
            ?>
         <?php if ($rol === 'admin'): ?>
         <a href="<?= base_url('admin/admin/' . $item->id); ?>">
         <button type="button" class="btn btn-success btn-sm" title="Administrar">
         <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
         </button>
         </a>
         <?php endif; ?>
         <?php if ($rol === 'admin' || $rol === 'editor'): ?>
         <a href="<?= base_url('admin/edit/' . $item->id); ?>">
         <button type="button" class="btn btn-warning btn-sm" title="Editar">
         <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
         </button>
         </a>
         <?php endif; ?>
         <?php endif; ?>
         <h1 class="mb-4"><?= $blog_head->title ?></h1>
      </div>
      <?php if (session()->has('id') && session()->rol == 'admin'): ?>
      <div class="text-center mb-4" style="margin-top: -10px;">
         <a href="<?= base_url('admin/add/' . $firstCategory); ?>" title="Agregar nuevo contenido">
         <button type="button" class="btn btn-danger btn-sm">
         <i class="fa fa-plus"></i> <?= lang('Validation.add') ?>
         </button>
         </a>
      </div>
      <?php endif; ?>
      <!-- Blog list Start -->
      <div class="col-lg-12">
         <div class="row g-5">
            <?php foreach ($blog_content as $index => $elem): ?>
            <div class="col-md-4 d-flex">
               <!-- Tarjeta flexible -->
               <div class="blog-item bg-light rounded overflow-hidden d-flex flex-column w-100" title="Clic aquí" onclick="window.location='<?= base_url('home/' . $elem->slug . '/' . $elem->id) ?>'"
                  style="cursor: pointer;">
                  <!-- Imagen -->
                  <div class="blog-img position-relative overflow-hidden">
                     <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" 
                        alt="<?= esc($elem->title) ?>" 
                        class="img-fluid w-100" 
                        style="height:220px; object-fit:cover;">
                  </div>
                  <!-- Contenido -->
                  <div class="p-4 pt-3 d-flex flex-column justify-content-between flex-grow-1">
                     <div>
                        <div class="d-flex mb-3">
                           <small class="me-3">
                           <i class="far fa-user text-primary me-2"></i><?= esc($elem->intro_text) ?>
                           </small>
                           <small>
                           <i class="far fa-calendar-alt text-primary me-2"></i><?= esc($elem->date) ?>
                           </small>
                        </div>
                        <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                        <p>
    <?= esc(mb_strimwidth(strip_tags($elem->content), 0, 150, '...')) ?>
</p>


                     </div>
                     <!-- Enlace y botones al final -->
                     <div>
                        <a href="<?= base_url('home/' . $elem->slug . '/' . $elem->id) ?>" 
                           class="text-uppercase" rel="noopener"> 
                        Más <i class="bi bi-arrow-right"></i> 
                        </a>
                        <?php if (session()->has('id')): ?>
                        <div class="mt-3 d-flex justify-content-center gap-2 flex-wrap">
                           <?php if (session()->rol === 'admin'): ?>
                           <a href="<?= base_url('admin/admin/' . $elem->id); ?>" title="Administrar este servicio">
                           <button type="button" class="btn btn-success btn-sm">
                           <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
                           </button>
                           </a>
                           <?php endif; ?>
                           <?php if (in_array(session()->rol, ['admin', 'editor'])): ?>
                           <a href="<?= base_url('admin/edit/' . $elem->id); ?>" title="Editar este servicio">
                           <button type="button" class="btn btn-warning btn-sm">
                           <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
                           </button>
                           </a>
                           <?php endif; ?>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>