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
                    <h5 class="mb-4"></i><?=$item->title?></h5>
                </div>
                <div class="row gx-3">
                    <!-- Imagen 1 -->
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <img src="template/img/text_mision.png" alt="Imagen 1" class="img-fluid rounded">
                        <p class="mb-4">Satisfacer la necesidad de certeza metrológica en los procesos productivos del cliente promoviendo un entorno de riqueza y beneficio mutuo.</p>
                    </div>

                    <!-- Imagen 2 -->
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <img src="template/img/text_vision.png" alt="Imagen 2" class="img-fluid rounded">
                        <p class="mb-4">Ser una empresa líder en servicios de metrología con prácticas de clase mundial y altamente competitiva, preferida por brindar calidad y confianza, contribuyendo al desarrollo de sus clientes, colaboradores y comunidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
