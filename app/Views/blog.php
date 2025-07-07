
<!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
<!-- Blog list Start -->
 <?php foreach ($blog_content as $index => $elem): ?>
                <div class="col-lg-12">
                     
                    <div class="row g-5">
                   
                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid w-100">

                                    
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                                </div>

                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= esc($elem->intro_text) ?></small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><?= esc($elem->date) ?></small>
                                    </div>
                                    <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                                    <p><?= esc($elem->content) ?></p>
                                    <a href="<?=base_url('home/'.$elem->slug.'/'.$elem->id)?>" class="text-uppercase" rel="noopener"> Read More <i class="bi bi-arrow-right"></i> </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                      
                </div>
                   <?php endforeach; ?>
            </div>
        </div>