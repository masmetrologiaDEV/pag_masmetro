<?php
$service=$services[0];
?>
<!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?=$service->title?></h5>
                <h1 class="mb-0"><?=$service->intro_text?></h1>
            </div>
            <div class="row g-5">


<?php foreach ($header_content as $index => $elem): ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="">
                            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
                        </div>
                        <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                        <p class="m-0"><?= esc($elem->content) ?></p>
                        <a class="btn btn-lg btn-primary rounded" href="<?= esc($elem->slug) ?>">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
               
               
                


            </div>
        </div>
    </div>
