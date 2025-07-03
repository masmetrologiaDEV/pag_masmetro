<?php
$item=$contenido[0];
?>
        <div id="header-carousel" class="carousel slide h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100 d-flex align-items-center justify-content-start" style="padding-left: 200px;">
                  <?php foreach ($header_content as $index => $elem): ?>
                     <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                           <div class="rounded p-4 d-flex align-items-center shadow" style="max-width: 500px; background-color: rgba(255,255,255,0.2);">
                              <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
                              <div>
                                 <h3 class="fw-bold text-light"><?= esc($elem->title) ?></h3>
                                 <p class="mb-0 text-white"><?= esc($elem->content) ?></p>
                              </div>
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
        </div>

<?php
$item=$home_content[0];
?>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h3 class="mb-4"><?=$item->title?></h3>
                    <p class="mb-4"><?=$item->intro_text?></p>
                    <p class="mb-4">
                    <?=$item->content?>.</p>
                    <h5 class="mb-4"></i><?=$item->tags?></h5>
                </div>
                <div class="row gx-3">
                    <?php
$mision=$home_content[1];
?>
                    <!-- Imagen 1 -->
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($mision->img); ?> alt="<?= esc($mision->title) ?>" class="img-fluid rounded">
                        <p class="mb-4"><?= $mision->content?></p>
                    </div>
<?php
$vision=$home_content[2];
?>
                    <!-- Imagen 2 -->
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($vision->img); ?> alt="<?= esc($vision->title) ?>" class="img-fluid rounded">
                        <p class="mb-4"><?= $vision->content?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
