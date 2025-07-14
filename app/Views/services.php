<?php
$service = $services[0];
?>

<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
       <div class="section-title text-center position-relative pb-3 mb-3 mx-auto" style="max-width: 600px;">
    <h5 class="fw-bold text-primary text-uppercase"><?= $service->title ?></h5>
    <h1 class="mb-0"><?= $service->intro_text ?></h1>
</div>

<?php if (session()->has('id') && session()->rol == 'admin'): ?>
    <div class="text-center mb-4" style="margin-top: -10px;">
        <a href="<?= base_url('admin/add/' . $service->category); ?>" title="Agregar nuevo contenido">
            <button type="button" class="btn btn-danger btn-sm">
                <i class="fa fa-plus"></i> Agregar
            </button>
        </a>
    </div>
<?php endif; ?>

        
<div class="row g-4">
    <?php foreach ($header_content as $index => $elem): ?>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
            <div class="service-item bg-white rounded shadow-sm p-4 text-center h-100 d-flex flex-column justify-content-between position-relative">
                <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" 
                     alt="<?= esc($elem->title) ?>" 
                     class="img-fluid mx-auto mb-3" 
                     style="max-width: 150px; height: auto;">

                <div>
                    <h5 class="fw-bold text-dark mb-2"><?= esc($elem->title) ?></h5>
                    <p class="text-muted small"><?= esc($elem->content) ?></p>
                </div>

                <a class="btn btn-ver-mas mt-3 d-inline-flex align-items-center justify-content-center" 
                   href="<?= esc($elem->slug) ?>" 
                   style="width: 45px; height: 45px; border-radius: 6px;">
                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->icon); ?>" 
                         alt="Ver más" 
                         style="width: 40px; height: auto;">
                </a>

                <!-- Botones de acción solo para usuarios con sesión -->
                <?php if (session()->has('id')): ?>
                    <div class="mt-3 d-flex justify-content-center gap-2 flex-wrap">
                        <?php if (session()->rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $elem->id); ?>" title="Administrar este servicio">
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i> Admin
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if (in_array(session()->rol, ['admin', 'editor'])): ?>
                            <a href="<?= base_url('admin/edit/' . $elem->id); ?>" title="Editar este servicio">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>

    </div>
</div>
