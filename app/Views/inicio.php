<?php
$item=$contenido[0];
?>

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
