<?php
   $directorio_head=$directorio[0];
   $firstCategory = isset($directorio_content[0]->category) ? $directorio_content[0]->category : null;
   
   ?>
<!-- PHP Rendered Section -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container py-3">
      <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
         <?php
            $item = $directorio[0];
            $rol = session()->get('rol');
            if (session()->has('id')): 
            ?>
         <?php if ($rol === 'admin'): ?>
         <a href="<?= base_url('admin/admin/' . $item->id); ?>">
         <button type="button" class="btn btn-success btn-sm">
         <i class="fa fa-eye"></i> Admin
         </button>
         </a>
         <?php endif; ?>
         <?php if ($rol === 'admin' || $rol === 'editor'): ?>
         <a href="<?= base_url('admin/edit/' . $item->id); ?>">
         <button type="button" class="btn btn-warning btn-sm">
         <i class="fa fa-pencil"></i> Editar
         </button>
         </a>
         <?php endif; ?>
         <?php endif; ?>
         <h1 class="mb-0"><?= $directorio_head->title?></h1>
      </div>
      <?php if (session()->has('id') && session()->rol == 'admin'): ?>
      <div class="text-center mb-4" style="margin-top: -10px;">
         <a href="<?= base_url('admin/add/' . $firstCategory); ?>" title="Agregar nuevo contenido">
         <button type="button" class="btn btn-danger btn-sm">
         <i class="fa fa-plus"></i> Agregar
         </button>
         </a>
      </div>
      <?php endif; ?>

      <div class="row g-4 justify-content-center">
         <?php foreach ($directorio_content as $index => $elem):?>
            

         <div class="col-sm-10 col-md-6 col-lg-4 d-flex justify-content-center">
            <div class="bg-white rounded shadow-sm p-3 text-center" >
               <div class="image-area">
                  <div class="img-wrapper">
                     <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" alt="<?= esc($elem->title) ?>">
                     <a href="<?= base_url('directorio/' . $elem->slug) ?>" class="text-decoration-none text-dark">
                     <div class="info-slide">
                        <h4><?= esc($elem->title) ?></h4>
                        <label><?= esc($elem->intro_text) ?></label>
                     </div>
                     <?php
                        $vcard_link = base_url('directorio/descargar-vcard/' . $elem->slug);
                        echo str_replace('{vcard_link}', $vcard_link, $elem->tags);
                        ?>
                  </div>
               </div>
                <?php if ($rol === 'admin'): ?>
                  <a href="<?= base_url('admin/admin/' . $elem->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i> Admin
                     </button>
                  </a>
               <?php endif; ?>
               <?php  
             $rol = session()->get('rol');
               if (session()->has('id')): 
             if ($rol === 'admin' || $rol === 'editor'): ?>
                  <a href="<?= base_url('admin/edit/' . $elem->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> Editar
                     </button>
                  </a>
               <?php endif; ?>
            <?php endif; ?>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>