<?php
$service = $services[0];
$footer_content = $footer_content[0];
?>

<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?= $service->title ?></h5>
            <h1 class="mb-0"><?= $service->intro_text ?></h1>
        </div>
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
                            <img src="<?= 'data:image/bmp;base64,' . base64_encode($footer_content->img); ?>" 
                                 alt="Ver más" 
                                 style="width: 40px; height: AUTO;">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
