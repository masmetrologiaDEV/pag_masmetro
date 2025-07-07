<section class="d-flex justify-content-center" style="background-color: #f8f9fc;">
  <div class="card mt-5 p-4 px-5 shadow-lg border-0 rounded-4" style="max-width: 420px; width: 100%;">
    <div class="text-center mb-4">
      <div class="bg-purple text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; font-size: 32px;">
        <i class="bi bi-person-fill"></i>
      </div>
      <h5 class="mt-3 fw-bold text-dark">Welcome Back</h5>
      <p class="text-muted small mb-0">Sign in to your account</p>
    </div>
    <form action="<?= site_url('auth/verify') ?>" method="post">
      <div class="mb-3">
        <label for="usuario" class="form-label text-muted small">Username</label>
        <input type="text" class="form-control bg-light border-0 rounded-3" name="usuario" id="usuario" placeholder="JZ-ADM-172" required>
      </div>
      <div class="mb-3">
        <label for="contrasena" class="form-label text-muted small">Password</label>
        <input type="password" class="form-control bg-light border-0 rounded-3" name="contrasena" id="contrasena" placeholder="••••••" required>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
          <label class="form-check-label small text-muted" for="remember">Remember Me</label>
        </div>
        <a href="#" class="small text-purple text-decoration-none">Forgot Password?</a>
      </div>
      <button type="submit" class="btn btn-purple w-100 py-2 fw-semibold rounded-3">Get Started</button>
    </form>
  </div>
</section>
