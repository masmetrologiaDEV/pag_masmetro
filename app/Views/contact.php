
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-papAaF+G8DAkBnNGt0GuA1pRrGgxz3FbKi4CmLo3zUy6zLVb60vJfdHDKqU9MByxqwdzkMgEUX7GHdpAKC4zXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contactanos</h5>
                
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="POST" action=<?= base_url('home/correo_contacto')?> novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.namePlaceholder') ?>" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.email') ?>" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.subject') ?>" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="<?= lang('Validation.message') ?>"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensaje</button>
                            </div>
                        </div> 
                    </form>
                    <!-- Redes sociales debajo del formulario -->
                        <div class="mt-4 text-center">
                            <h6 class="text-primary fw-bold mb-3">Síguenos en nuestras redes</h6>
                            <div class="d-flex justify-content-center gap-4">
                                <a href="https://facebook.com/" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-facebook fa-2x" style="color: #1877F2;"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-x-twitter  fa-2x" style="color:rgb(0, 0, 0);"></i>
                                </a>
                                <a href="https://instagram.com/" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-instagram fa-2x" style="color: #E1306C;"></i>
                                </a>
                                <a href="https://youtube.com/" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-youtube fa-2x" style="color: #FF0000;"></i>
                                </a>
                            </div>
                        </div>
                </div>

                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4215.521564684928!2d-106.36969962375483!3d31.62869114178125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75c5774096439%3A0xccdf9ccf12d45307!2sMetrologia%20Aplicada%20y%20Servicios%20S%20de%20RL%20de%20CV!5e1!3m2!1ses-419!2smx!4v1750692067241!5m2!1ses-419!2smx"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"  frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>

                    <!-- Carrusel de testimonios debajo del mapa -->
                    <div class="mt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="section-title text-center position-relative pb-2 mb-3 mx-auto" style="max-width: 600px;">
                            <h6 class="mb-0 text-primary fw-bold">Atención a sus preguntas</h6>
                        </div>
                        <div class="owl-carousel testimonial-carousel">
                            <?php foreach ($contact_content as $index => $elem): ?>
                            <div class="testimonial-item bg-light my-2">
                                <div class="d-flex align-items-center border-bottom pt-4 pb-4 px-6">
                                    <img class="img-fluid rounded" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                                    <div class="ps-3">
                                        <h6 class="text-primary mb-1"> <?= esc($elem->title) ?> </h6>
                                    </div>
                                </div>
                                <div class="pt-4 pb-4 px-4 small">
                                    <small class="text-uppercase"><?= esc($elem->content) ?></small>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>   
            </div>                            
        </div>
    </div>

    <!-- Contact End -->