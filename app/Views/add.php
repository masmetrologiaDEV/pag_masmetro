<div class="container my-5">
   <h2 class="mb-4">Agregar Contenido</h2>

   <form method="POST" action="<?= base_url('admin/add_insert') ?>" enctype="multipart/form-data">

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

      <!-- Categoría -->
      <div class="mb-3">
         <label for="category" class="form-label">Categoría</label>
         <input type="text" class="form-control" id="category" name="category" value="<?= esc($data ?? '') ?>" readonly>
      </div>

      <!-- Intro Text -->
      <div class="mb-3">
         <label for="intro_text" class="form-label">Texto Introductorio</label>
         <input type="text" class="form-control" id="intro_text" name="intro_text">
      </div>

      <!-- Content -->
      <div class="mb-3">
         <label for="content" class="form-label">Contenido</label>
         <textarea class="form-control" id="content" name="content" rows="5"></textarea>
      </div>

      <!-- Tags -->
      <div class="mb-3">
         <label for="tags" class="form-label">Tags</label>
         <input type="text" class="form-control" id="tags" name="tags">
      </div>

      <!-- Publicado -->
      <div class="form-check mb-3">
         <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1">
         <label class="form-check-label" for="is_published">¿Publicado?</label>
      </div>

      <!-- Idioma -->
      <div class="mb-3">
         <label for="language" class="form-label">Idioma</label>
         <select class="form-select" id="language" name="language">
            <option value="es">Español</option>
            <option value="en">Inglés</option>
         </select>
      </div>

      <!-- Imagen -->
      <div class="mb-3">
         <label for="foto" class="form-label">Imagen</label>
         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
      </div>

      <!-- Ícono -->
      <div class="mb-3">
         <label for="icon" class="form-label">Ícono</label>
         <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
      </div>

      <!-- Archivos -->
      <div class="mb-3">
         <label for="files" class="form-label">Archivos (PDF, DOC, etc.)</label>
         <input type="file" class="form-control" id="files" name="files">
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-success">
         <i class="fa fa-plus"></i> Agregar
      </button>
   </form>
</div>
