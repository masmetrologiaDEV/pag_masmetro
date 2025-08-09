
<?php
$contact_info=$contact[0];
?>

<?php 
$firstCategory = isset($contact_content[0]->category) ? $contact_content[0]->category : null;
?>
<!-- Contact Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <?php
               $item = $contact[0];
               $rol = session()->get('rol');
               if (session()->has('id')): 
            ?>
               <?php if ($rol === 'admin'): ?>
                  <a href="<?= base_url('admin/admin/' . $item->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i>  <?= lang('Validation.admin') ?>
                     </button>
                  </a>
               <?php endif; ?>

               <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                  <a href="<?= base_url('admin/edit/' . $item->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i>  <?= lang('Validation.edit') ?>
                     </button>
                  </a>
               <?php endif; ?>
            <?php endif; ?>

                <h1 class="fw-bold text-uppercase"><?= $contact_info->title ?></h1>
            </div>

            

            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="POST" action="<?= base_url('home/correo_contacto') ?>" novalidate>
    <div class="row g-3">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.namePlaceholder') ?>" style="height: 55px;" required>
        </div>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.emailPlaceholder') ?>" style="height: 55px;" required>
        </div>
        <div class="col-md-12">
            <input id="telefono" type="tel" name="phone" class="form-control border-0 bg-light px-4 telefono-input" placeholder="<?= lang('Validation.phoneLabel') ?>" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <input type="text" name="subject" class="form-control border-0 bg-light px-4" placeholder="<?= lang('Validation.subjectLabel') ?>" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <textarea name="message" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="<?= lang('Validation.messageLabel') ?>" required></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit"><?= lang('Validation.submit') ?></button></div>
    </div>
                    </form>

                    <!-- Redes sociales debajo del formulario -->
                        <div class="mt-4 text-center">
                            <h6 class="text-primary fw-bold mb-3"><?= $contact_info->content ?></h6>

                            <?php
                            $link = base_url();
                            echo str_replace('{BASE_URL}', $link, $contact_info->tags);
                            ?>


                        </div>
                        <div class="mt-4 text-center">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($contact_info->img); ?> alt="<?= esc($contact_info->title) ?>" class="img-fluid me-4" style="width: 400px; height: 100px;">
                        </div>

                </div>
                

                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    

                    <iframe id="mapFrame" class="position-relative rounded w-100" src="<?= esc($contact_content[0]->slug) ?>"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"  frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
               tabindex="0">
            </iframe>

                    <!-- Carrusel de testimonios debajo del mapa -->
            <div class="mt-4 wow fadeInUp" data-wow-delay="0.3s">
               <div class="section-title text-center position-relative ative pb-2 mb-3 mx-auto" style="max-width: 600px;">
                  <h6 class="mb-0 text-primary fw-bold"><?= $contact_info->intro_text ?></h6>
               </div>
               <?php if (session()->has('id') && session()->rol == 'admin'): ?>
                <div class="text-center mb-4" style="margin-top: -10px;">
                    <a href="<?= base_url('admin/add/' . $firstCategory); ?>" title="Agregar nuevo contenido">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="fa fa-plus"></i>  <?= lang('Validation.add') ?>
                        </button>
                    </a>
                </div>
            <?php endif; ?>
               <div class="owl-carousel testimonial-carousel sync-carousel sync2">
    <?php foreach ($contact_content as $index => $elem): ?>
        <div class="testimonial-item bg-light my-2" data-iframe="<?= esc($elem->slug) ?>">

            <!-- Encabezado: Imagen + Título -->
            <div class="d-flex align-items-center gap-3 px-4 pt-4 pb-2 border-bottom">
                <div style="flex-shrink: 0;">
                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>"
                         alt="<?= esc($elem->img) ?>"
                         class="img-fluid"
                         style="width: 40px; height: 40px; object-fit: contain;">
                </div>
                <div class="flex-grow-1">
                    <h6 class="text-primary mb-0" style="font-size: 14px; line-height: 1.3;">
                        <?= esc($elem->title) ?>
                    </h6>
                </div>
            </div>

            <!-- Contenido -->
            <div class="pt-4 pb-2 px-4 small">
                <small class="text-uppercase"><?= ($elem->content) ?></small>
            </div>

            <div class="pb-2 px-4 small">
                <small class="text-uppercase"><?= ($elem->tags) ?></small>
            </div>

            <!-- Botones de acción -->
            <?php if (session()->has('id')): ?>
                <div class="px-4 pb-3">
                    <div class="d-flex justify-content-center">
                        <?php if (session()->rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $elem->id); ?>" title="Administrar">
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i>  <?= lang('Validation.admin') ?>
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if (in_array(session()->rol, ['admin', 'editor'])): ?>
                            <a href="<?= base_url('admin/edit/' . $elem->id); ?>" title="Editar">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>  <?= lang('Validation.edit') ?>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
</div>

            </div>
                </div>   
            </div>                            
        </div>
    </div>
<script src="<?= base_url('template/js/jquery-3.6.0.min.js')?>"></script>
<script href="<?= base_url('template/css/owl.carousel.min.css')?>"></script>
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
<link rel="stylesheet" href="<?= base_url('template/css/intlTelInput.min.css')?>"/>

<!-- JS -->
<script src="<?= base_url('template/js/intlTelInput.js')?>"></script>
<script src="<?= base_url('template/js/utils.js')?>"></script>

<script>
  const input = document.querySelector("#telefono");
  const iti = window.intlTelInput(input, {
    initialCountry: "mx", // México por defecto
    separateDialCode: false, // Muestra la lada separada
    preferredCountries: ["mx", "us", "es"] // Opcional: países favoritos
  });
</script>

