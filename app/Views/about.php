<?php
   $about_head=$about[0];
   ?>
<?php 
   $firstCategory = isset($about_content[0]->category) ? $about_content[0]->category : null;
   ?>
<!-- Team Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container py-3">
      <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
         <?php
            $item = $about[0];
            $rol = session()->get('rol');
            if (session()->has('id')): 
            ?>
         <?php if ($rol === 'admin'): ?>
         <a href="<?= base_url('admin/admin/' . $item->id); ?>">
         <button type="button" class="btn btn-success btn-sm">
         <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
         </button>
         </a>
         <?php endif; ?>
         <?php if ($rol === 'admin' || $rol === 'editor'): ?>
         <a href="<?= base_url('admin/edit/' . $item->id); ?>">
         <button type="button" class="btn btn-warning btn-sm">
         <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
         </button>
         </a>
         <?php endif; ?>
         <?php endif; ?>
         <h1 class="mb-0"><?= $about_head->title?></h1>
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
      <div class="row g-3">
         <?php foreach ($about_content as $index => $elem): ?>
         <div class="col-sm-10 col-md-6 col-lg-4 d-flex ">
            <div class="team-item bg-white rounded-0 shadow-sm p-3 text-center img-small">

               <div class="team-img position-relative overflow-hidden">
                  <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid w-100">
                  <div class="team-social">
                     <p class="text-uppercase m-0"><?= ($elem->content) ?></p>
                     <p class="text-uppercase m-0"><?= esc($elem->title) ?></p>
                  </div>
               </div>
               <div class="info-slide position-relative ">
                  <h4><?= esc($elem->title) ?></h4>
                        <label><?= esc($elem->intro_text) ?></label>
                  <!-- Botones de acción solo para usuarios con sesión -->
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
         <?php endforeach; ?>
      </div>
   </div>
</div>
<!-- Team End -->