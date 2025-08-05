<section class="d-flex justify-content-center" style="background-color: #f8f9fc;">
  <div class="card mt-5 p-4 px-5 shadow-lg border-0 rounded-4" style="max-width: 420px; width: 100%;">
    <div class="text-center mb-4">
      <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; font-size: 32px;">
        <i class="bi bi-person-fill"></i>
      </div>
      <h5 class="mt-3 fw-bold text-dark"><?= lang('Validation.welcomeBack') ?></h5>
      <p class="text-muted small mb-0"><?= lang('Validation.signInAccount') ?></p>
    </div>
    <form method="POST" action=<?= base_url('admin/autenticar')?> novalidate>
      <div class="mb-3">
        <label for="usuario" class="form-label text-muted small"><?= lang('Validation.username') ?></label>
        <input type="text" class="form-control bg-light border-0 rounded-3" name="user" id="user" placeholder="JZ-ADM-172" required>
      </div>
      <div class="mb-3">
        <label for="contrasena" class="form-label text-muted small"><?= lang('Validation.password') ?></label>
        <input type="password" class="form-control bg-light border-0 rounded-3" name="pass" id="pass" placeholder="••••••" required>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="#" class="small text-primary text-decoration-none"><?= lang('Validation.forgotPassword') ?></a>
      </div>
      <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3"><?= lang('Validation.getStarted') ?></button>
    </form>
  </div>
</section>