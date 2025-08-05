
   
  

    <div class="container py-5 d-flex justify-content-center">
      <div class="card custom-card d-flex flex-row flex-wrap">
        <!-- Imagen -->
        <div class="col-md-4">
          <img src="<?= 'data:image/*;base64,' . base64_encode($profile->img) ?>"  class="img-fluid w-100" alt="Anahí Roldán">
        </div>

        <!-- Información -->
        <div class="col-md-8 bg-white p-4">
          <h5 class="text-primary fw-bold mb-0"><?= $profile->title?></h5>
          <p class="text-muted text-uppercase small mb-3"><?= $profile->intro_text?></p>

          <?= $profile->data_profiles?>
          <a href="<?= base_url('directorio/descargar-vcard/' . $profile->slug) ?>" class="btn btn-outline-primary btn-sm">
    <i class="bi bi-download me-1"></i> <?= lang('Validation.downloadVCard') ?>
</a>
        </div>
      </div>
    </div>

 