<?php
$footer_content=$footer_content[1];
?>
<?php
$contact=$contact[0];
?>
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
                            <div class="col-md-12">
                                <input id="telefono" type="tel" name="phone" class="form-control border-0 bg-light px-4 telefono-input" placeholder="<?= lang('Validation.phone') ?>" style="height: 55px;">
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
                                <a href="https://www.facebook.com/masmetrologia" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-facebook fa-2x" style="color: #1877F2;"></i>
                                </a>
                                <a href="https://x.com/Masmetrologia" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-x-twitter  fa-2x" style="color:rgb(0, 0, 0);"></i>
                                </a>
                                <a href="https://www.instagram.com/masmetrologia/" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-instagram fa-2x" style="color: #E1306C;"></i>
                                </a>
                                <a href="https://www.youtube.com/@masmetrologia" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-youtube fa-2x" style="color: #FF0000;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($contact->img); ?> alt="<?= esc($contact->img) ?>" class="img-fluid me-4" style="width: 400px; height: 100px;">
                        </div>

                </div>
                

                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    

                    <iframe id="mapFrame" class="position-relative rounded w-100" src="<?= esc($contact_content[0]->slug) ?>"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"  frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
               tabindex="0">
            </iframe>

                    <!-- Carrusel de testimonios debajo del mapa -->
            <div class="mt-4 wow fadeInUp" data-wow-delay="0.3s">
               <div class="section-title text-center position-relative ative pb-2 mb-3 mx-auto" style="max-width: 600px;">
                  <h6 class="mb-0 text-primary fw-bold">Atención a sus preguntas</h6>
               </div>
               <div class="owl-carousel testimonial-carousel sync-carousel sync2">
                  <?php foreach ($contact_content as $index => $elem): ?>
                  <div class="testimonial-item bg-light my-2" data-iframe="<?= esc($elem->slug) ?>">
                     <div class="d-flex align-items-center border-bottom pt-4 pb-2 px-6">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($footer_content->img); ?> alt="<?= esc($footer_content->img) ?>" class="img-fluid me-4" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                           <h6 class="text-primary mb-1"> <?= esc($elem->title) ?> </h6>
                        </div>
                     </div>
                     <div class="pt-4 pb-4 px-4 small">
                        <small class="text-uppercase"><?= esc($elem->content) ?></small>
                     </div>
                     <div class="pt-4 pb-4 px-4 small">
                        <small class="text-uppercase"><?= esc($elem->tags) ?></small>
                     </div>
                  </div>
                  <?php endforeach; ?>
               </div>
            </div>
                </div>   
            </div>                            
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Contact End --><script>
   $(document).ready(function () {
       let sync2 = $(".sync2");
       let mapFrame = document.getElementById("mapFrame");
   
       // Inicializar carrusel de testimonios
       sync2.owlCarousel({
           items: 1,
           dots: false,
           nav: false,
           smartSpeed: 1000,
           loop: true,
           responsiveRefreshRate: 100
       }).on('changed.owl.carousel', function (el) {
           let index = el.item.index;
           let iframeUrl = sync2.find(".owl-item").eq(index).find(".testimonial-item").data("iframe");
           if (iframeUrl) {
               mapFrame.src = iframeUrl;
           }
       });
   });
</script>



<!-- NUMERO DE TELEFONO - FORMULARIO -->
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

<script>
  const input = document.querySelector("#telefono");
  const iti = window.intlTelInput(input, {
    initialCountry: "mx", // México por defecto
    separateDialCode: false, // Muestra la lada separada
    preferredCountries: ["mx", "us", "es"] // Opcional: países favoritos
  });
</script>

