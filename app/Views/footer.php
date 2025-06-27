    <?php
$item=$footer_content[0];
?>
     <?php
$precision=$footer_logo[0];
?>
                    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

            <div class="row gx-5">
                        <!-- Imagen 1 -->
                    <div class="row text-center justify-content-center" data-wow-delay="0.2s">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($precision->img); ?> alt="<?= esc($precision->title) ?>" class="img-fluid rounded" style="width: 600px; height: 125px;">
                    </div>

                        <div class="row text-center justify-content-center py-5 text-white fondo-footer">
                            <?php foreach ($footer_content as $index => $elem): ?>
                                <div class="col-6 col-md text-center px-3 <?= $index < count($footer_content) - 1 ? 'border-end border-white' : '' ?>">
                                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>"
                                         alt="<?= esc($elem->title) ?>"
                                         class="img-fluid mb-3"
                                         style="width: 50px; height: 50px;">
                                    <h5 class="fw-bold text-uppercase text-light"><?= esc($elem->title) ?></h5>
                                    <p class="small mb-0"><?= esc($elem->intro_text) ?></p>
                                </div>
                            <?php endforeach; ?>

                        </div>



            </div>
        </div>
    </div>
    
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">&copy; 2025 MAS Metrología | <a class="text-white border-bottom" href="#">Aviso de Privacidad</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/lib/wow/wow.min.js')?>"></script>
    <script src="<?= base_url('template/lib/easing/easing.min.js')?>"></script>
    <script src="<?= base_url('template/lib/waypoints/waypoints.min.js')?>"></script>
    <script src="<?= base_url('template/lib/counterup/counterup.min.js')?>"></script>
    <script src="<?= base_url('template/lib/owlcarousel/owl.carousel.min.js')?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/js/main.js')?>"></script>
