<?php
$service = $services[0];
?>

<?php 
$firstCategory = isset($header_content[0]->category) ? $header_content[0]->category : null;
?>


<!-- Service Start -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
       <div class="section-title text-center position-relative pb-3 mb-3 mx-auto" style="max-width: 600px;">

            <?php
               $item = $services[0];
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

    <h5 class="fw-bold text-primary text-uppercase"><?= $service->title ?></h5>
    <h1 class="mb-0"><?= $service->intro_text ?></h1>
    
    <a href="<?= base_url('home/contact/') ?>" target="_blank" class="btn btn-primary btn-sm shadow-sm d-inline-flex align-items-center gap-2 px-4 py-2">
      <i class="fa fa-envelope"></i>
      <span><?= lang('Validation.requestQuote') ?></span>
    </a>

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


        
<div class="row g-4">
    <?php foreach ($header_content as $index => $elem): ?>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">

            <div class="service-item bg-white rounded shadow-sm p-4 text-center h-100 d-flex flex-column justify-content-between position-relative">

                <a href="<?= esc($elem->slug) ?>" title="Clic aquí">
                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" 
                         alt="<?= esc($elem->title) ?>" 
                         class="img-fluid mx-auto mb-3" 
                         style="max-width: 240px; height: auto;">
                </a>

                <div>
                   <a href="<?= esc($elem->slug) ?>" title="Clic aquí">
                       <h5 class="fw-bold text-dark mb-2"><?= esc($elem->title) ?></h5>
                   </a>
                   <a href="<?= esc($elem->slug) ?>" title="Clic aquí">
                       <p class="text-muted small"><?= ($elem->content) ?></p>
                   </a>
                </div>

                <a class="btn btn-ver-mas-services mt-3 d-inline-flex align-items-center justify-content-center p-0" 
                   href="<?= esc($elem->slug) ?>" 
                   style="width: 70px; height: 450px; border-radius: 8px;">
                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->icon); ?>" 
                         alt="Ver más" 
                         style="width: 80px; height: auto;" title="Clic aquí">
                </a>

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

            </div> <!-- end service-item -->

        </div> <!-- end col -->
    <?php endforeach; ?>
</div>

    </div>
</div>
