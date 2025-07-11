
<div class="container my-5">
   <h2 class="mb-4">Editar Contenido</h2>

   <form method="POST" action="<?= base_url('admin/update') ?>" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?= esc($data->id) ?>">

      <!-- Título -->
      <div class="mb-3">
         <label for="title" class="form-label">Título</label>
         <input type="text" class="form-control" id="title" name="title" value="<?= esc($data->title ?? '') ?>" required>
      </div>

      <!-- Slug -->
      <div class="mb-3">
         <label for="slug" class="form-label">Slug</label>
         <input type="text" class="form-control" id="slug" name="slug" value="<?= esc($data->slug ?? '') ?>">
      </div>

      <!-- Categoría -->
      <div class="mb-3">
         <label for="category" class="form-label">Categoría</label>
         <input type="text" class="form-control" id="category" name="category" value="<?= esc($data->category ?? '') ?>">
      </div>

      <!-- Intro Text -->
      <div class="mb-3">
         <label for="intro_text" class="form-label">Texto Introductorio</label>
         <input type="text" class="form-control" id="intro_text" name="intro_text" value="<?= esc($data->intro_text ?? '') ?>">
      </div>

      <!-- Content -->
      <div class="mb-3">
         <label for="content" class="form-label">Contenido</label>
         <textarea class="form-control" id="content" name="content" rows="5"><?= esc($data->content ?? '') ?></textarea>
      </div>

      <!-- Tags -->
      <div class="mb-3">
         <label for="tags" class="form-label">Tags</label>
         <input type="text" class="form-control" id="tags" name="tags" value="<?= esc($data->tags ?? '') ?>">
      </div>

      <!-- Publicado -->
      <div class="form-check mb-3">
         <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
            <?= !empty($data->is_published) ? 'checked' : '' ?>>
         <label class="form-check-label" for="is_published">¿Publicado?</label>
      </div>

      <!-- Idioma -->
      <div class="mb-3">
         <label for="language" class="form-label">Idioma</label>
         <select class="form-select" id="language" name="language">
            <option value="es" <?= ($data->language ?? '') === 'es' ? 'selected' : '' ?>>Español</option>
            <option value="en" <?= ($data->language ?? '') === 'en' ? 'selected' : '' ?>>Inglés</option>
         </select>
      </div>

      <!-- Imagen -->
      <div class="mb-3">
         <label for="foto" class="form-label">Imagen</label>
         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
         <?php if (!empty($data->img)): ?>
            <div class="mt-3">
               <label class="form-label d-block">Imagen actual:</label>
               <img src="<?= 'data:image/*;base64,' . base64_encode($data->img) ?>" class="img-fluid rounded" style="max-height: 200px;">
            </div>
         <?php endif; ?>
      </div>

      <!-- Ícono -->
      <div class="mb-3">
         <label for="icon" class="form-label">Ícono</label>
         <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
         <?php if (!empty($data->icon)): ?>
            <div class="mt-3">
               <label class="form-label d-block">Ícono actual:</label>
               <img src="<?= 'data:image/*;base64,' . base64_encode($data->icon) ?>" class="img-fluid rounded" style="max-height: 100px;">
            </div>
         <?php endif; ?>
      </div>

      <!-- Archivos -->
      <div class="mb-3">
         <label for="files" class="form-label">Archivos (PDF, DOC, etc.)</label>
         <input type="file" class="form-control" id="files" name="files">
         <?php if (!empty($data->files)): ?>
            <div class="mt-3">
               <label class="form-label d-block">Archivo actual:</label>
               <a href="<?= base_url('admin/download/' . $data->id) ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                  <i class="bi bi-download"></i> Descargar archivo
               </a>
            </div>
         <?php endif; ?>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-warning">
         <i class="fa fa-pencil"></i> Editar
      </button>
   </form>
</div>
