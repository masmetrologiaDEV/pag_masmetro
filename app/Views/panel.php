<!-- Panel de Perfil -->
<div class="container my-5">
  <div class="card shadow-sm">
    <div class="card-body d-flex align-items-start gap-4">
      <div class="text-center">
  <img src="<?= 'data:image/bmp;base64,' . base64_encode(session()->foto); ?>" class="rounded-circle border" width="80" height="80" alt="avatar">

  <!-- Formulario para cambiar la foto -->
  <form action="<?= base_url('admin/cambiar_foto') ?>" method="post" enctype="multipart/form-data" class="mt-2" style="width: 100px;">
    <input type="file" name="foto" accept="image/*" class="form-control form-control-sm mb-2" required>
    <button type="submit" class="btn btn-sm btn-outline-secondary w-100">Actualizar</button>
  </form>

  <!-- Botón para abrir modal cambiar contraseña -->
  <button type="button" class="btn btn-sm btn-outline-warning mt-2 w-100" data-bs-toggle="modal" data-bs-target="#modalCambiarContrasena">
    Cambiar contraseña
  </button>
</div>


      <div class="flex-grow-1">`
        <h5 class="mb-1"><?= session()->fullname ?></h5>
        <p class="mb-0 text-muted"><?= session()->email ?></p>
        <span class="badge bg-secondary"><?= session()->rol ?></span>
      </div>

      <div class="ms-auto">
        <?php if (session()->rol == 'admin'): ?>
          <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
            Ver Usuarios
          </button>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">
            Agregar Usuario
          </button>
          <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalAgregarReconocimiento">
      Agregar Reconocimiento
    </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Lista de Usuarios -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="modalUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalUsuariosLabel">Usuarios y Privilegios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Estatus</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
<?php if (!empty($users)): ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user->fullname) ?></td>
            <td><?= esc($user->email) ?></td>
            <td>
                <form class="d-flex" action="<?= base_url('admin/cambiar_rol') ?>" method="post">
                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                    <select class="form-select form-select-sm me-2" name="rol">
                        <option value="admin" <?= $user->rol === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="editor" <?= $user->rol === 'editor' ? 'selected' : '' ?>>Editor</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-success">Guardar</button>
                </form>
            </td>
            <td>
                <?= $user->status ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' ?>
            </td>
            <td>
                <form action="<?= base_url('admin/eliminar_usuario') ?>" method="post" onsubmit="return confirm('¿Eliminar este usuario?');">
                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="5" class="text-center text-muted">No hay usuarios registrados.</td></tr>
<?php endif; ?>
</tbody>

        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Agregar Usuario -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('admin/crear') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalAgregarLabel">Agregar Nuevo Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="mb-3">
            <label class="form-label">No. Empleado</label>
            <input type="text" class="form-control" name="no_empleado" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Rol</label>
            <select class="form-select" name="rol" required>
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Crear Usuario</button>
        </div>

        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalAgregarReconocimiento">
        + Reconocimiento
    </button>
        
      </div>
    </form>
  </div>
</div>

<!-- Modal: Agregar Reconocimiento -->
<div class="modal fade" id="modalAgregarReconocimiento" tabindex="-1" aria-labelledby="modalAgregarReconocimientoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?= base_url('admin/add_insert_rec') ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalAgregarReconocimientoLabel">Agregar Reconocimiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <!-- Título -->
          <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>

          <!-- Slug -->
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
          </div>

          <!-- Contenido -->
          <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
          </div>

          <!-- Imagen -->
          <div class="mb-3">
            <label for="foto" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
          </div>

          <!-- Campos ocultos -->
          <input type="hidden" name="category" value="certificados_content">
          <input type="hidden" name="language" value="es">
          <input type="hidden" name="is_published" value="1">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="modalCambiarContrasena" tabindex="-1" aria-labelledby="modalCambiarContrasenaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('admin/cambiar_contrasena') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title" id="modalCambiarContrasenaLabel">Cambiar contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="password_nueva" class="form-label">Nueva contraseña</label>
            <input type="password" class="form-control" id="password_nueva" name="password_nueva" required>
          </div>
          <div class="mb-3">
            <label for="password_confirmar" class="form-label">Confirmar nueva contraseña</label>
            <input type="password" class="form-control" id="password_confirmar" name="password_confirmar" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Guardar cambios</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('#modalCambiarContrasena form');
  const passNueva = document.getElementById('password_nueva');
  const passConfirmar = document.getElementById('password_confirmar');

  form.addEventListener('submit', function (e) {
    if (passNueva.value !== passConfirmar.value) {
      e.preventDefault();
      alert('Las contraseñas no coinciden. Por favor, verifica.');
      passConfirmar.focus();
    }
  });
});
</script>
