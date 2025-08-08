<div class="container my-5">
   <h2 class="mb-4"><?= lang('Validation.editContent') ?></h2>

   <form method="POST" action="<?= base_url('admin/update') ?>" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?= esc($data->id) ?>">

      <!-- Título -->
      <div class="mb-3">
         <label for="title" class="form-label"><?= lang('Validation.title') ?></label>
         <input type="text" class="form-control" id="title" name="title" value="<?= esc($data->title ?? '') ?>" required>
      </div>

      <!-- Slug -->
      <div class="mb-3">
         <label for="slug" class="form-label"><?= lang('Validation.slug') ?></label>
         <input type="text" class="form-control" id="slug" name="slug" value="<?= esc($data->slug ?? '') ?>">
      </div>

      <!-- Categoría -->
      <div class="mb-3">
         <label for="category" class="form-label"><?= lang('Validation.category') ?></label>
         <input type="text" class="form-control" id="category" name="category" value="<?= esc($data->category ?? '') ?>">
      </div>

      <!-- Intro Text -->
      <div class="mb-3">
         <label for="intro_text" class="form-label"><?= lang('Validation.introText') ?></label>
         <input type="text" class="form-control" id="intro_text" name="intro_text" value="<?= esc($data->intro_text ?? '') ?>">
      </div>

      <!-- Content -->
     <div class="mb-3">
        <label for="content" class="form-label"><?= lang('Validation.content') ?></label>
        <textarea class="form-control" id="content" name="content" rows="10">
            <?= esc($data->content ?? '') ?>
        </textarea>
     </div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'insertTable', 'blockQuote', 'undo', 'redo'
            ]
        })
        .catch(error => {
            console.error(error);
        });
</script>

    <!-- Tags -->
<div class="mb-3">
    <label for="tags" class="form-label"><?= lang('Validation.tags') ?></label>
    <textarea class="form-control" id="tags" name="tags" rows="4"><?= esc($data->tags ?? '', 'html') ?></textarea>
</div>



      <!-- Publicado -->
      <div class="form-check mb-3">
         <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
            <?= !empty($data->is_published) ? 'checked' : '' ?>>
         <label class="form-check-label" for="is_published"><?= lang('Validation.published') ?></label>
      </div>

      <!-- Idioma -->
      <div class="mb-3">
         <label for="language" class="form-label"><?= lang('Validation.language') ?></label>
         <select class="form-select" id="language" name="language">
            <option value="es" <?= ($data->language ?? '') === 'es' ? 'selected' : '' ?>><?= lang('Validation.spanish') ?></option>
            <option value="en" <?= ($data->language ?? '') === 'en' ? 'selected' : '' ?>><?= lang('Validation.english') ?></option>
         </select>
      </div>

      <!-- Imagen -->
      <div class="mb-3">
         <label for="foto" class="form-label"><?= lang('Validation.image') ?></label>
         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
         <?php if (!empty($data->img)): ?>
            <div class="mt-3">
               <label class="form-label d-block"><?= lang('Validation.currentImage') ?></label>
               <img src="<?= 'data:image/*;base64,' . base64_encode($data->img) ?>" class="img-fluid rounded" style="max-height: 200px;">
            </div>
         <?php endif; ?>
      </div>

      <!-- Ícono -->
      <div class="mb-3">
         <label for="icon" class="form-label"><?= lang('Validation.icon') ?></label>
         <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
         <?php if (!empty($data->icon)): ?>
            <div class="mt-3">
               <label class="form-label d-block"><?= lang('Validation.currentIcon') ?></label>
               <img src="<?= 'data:image/*;base64,' . base64_encode($data->icon) ?>" class="img-fluid rounded" style="max-height: 100px;">
            </div>
         <?php endif; ?>
      </div>

      <!-- Archivos -->
      <div class="mb-3">
         <label for="files" class="form-label"><?= lang('Validation.files') ?></label>
         <input type="file" class="form-control" id="files" name="files">
         <?php if (!empty($data->files)): ?>
            <div class="mt-3">
               <label class="form-label d-block"><?= lang('Validation.currentFile') ?></label>
               <a href="<?= base_url('admin/download/' . $data->id) ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                  <i class="bi bi-download"></i> <?= lang('Validation.downloadFile') ?>
               </a>
            </div>
         <?php endif; ?>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-warning">
         <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
      </button>
   </form>
</div>
