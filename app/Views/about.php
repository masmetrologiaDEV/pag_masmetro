<?php
$about=$about[0];
?>
 <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0"><?= $about->title?></h1>
            </div>
            <div class="row g-5">
                <?php foreach ($about_content as $index => $elem): ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">

                            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid w-100">
                            <div class="team-social">
                                <p class="text-uppercase m-0"><?= esc($elem->content) ?></p>
                                <p class="text-uppercase m-0"><?= esc($elem->title) ?></p> 
                            </div>
                            
                            
                        </div>
                        <div class="text-center py-4">
                            <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                            <p class="text-uppercase m-0"><?= esc($elem->intro_text) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                
            </div>
        </div>
    </div>
    <!-- Team End -->