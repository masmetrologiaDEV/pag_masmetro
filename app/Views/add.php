<?php 
$slug = null;
if ($data == 'blog_content') {
   $slug = 'blog_details';
}
 ?>
<div class="container my-5">
   <h2 class="mb-4"><?= lang('Validation.addContent') ?></h2>

   <form method="POST" action="<?= base_url('admin/add_insert') ?>" enctype="multipart/form-data">

      <!-- Título -->
      <div class="mb-3">
         <label for="title" class="form-label"><?= lang('Validation.title') ?></label>
         <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <!-- Slug -->
      <div class="mb-3">
         <label for="slug" class="form-label"><?= lang('Validation.slug') ?></label>
         <input type="text" class="form-control" id="slug" name="slug" value="<?= esc($slug ?? '') ?>" >
      </div>

      <!-- Categoría -->
      <div class="mb-3">
         <label for="category" class="form-label"><?= lang('Validation.category') ?></label>
         <input type="text" class="form-control" id="category" name="category" value="<?= esc($data ?? '') ?>" readonly>
      </div>

      <!-- Intro Text -->
      <div class="mb-3">
         <label for="intro_text" class="form-label"><?= lang('Validation.introText') ?></label>
         <input type="text" class="form-control" id="intro_text" name="intro_text">
      </div>

      <!-- Content -->
      <div class="mb-3">
         <label for="content" class="form-label"><?= lang('Validation.content') ?></label>
         <textarea class="form-control" id="content" name="content" rows="5"></textarea>
      </div>

      <!-- Tags -->
      <div class="mb-3">
         <label for="tags" class="form-label"><?= lang('Validation.tags') ?></label>
         <input type="text" class="form-control" id="tags" name="tags">
      </div>

      <!-- Publicado -->
      <div class="form-check mb-3">
         <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1">
         <label class="form-check-label" for="is_published"><?= lang('Validation.published') ?></label>
      </div>

      <!-- Idioma -->
      <div class="mb-3">
         <label for="language" class="form-label"><?= lang('Validation.language') ?></label>
         <select class="form-select" id="language" name="language">
            <option value="es"><?= lang('Validation.spanish') ?></option>
            <option value="en"><?= lang('Validation.english') ?></option>
         </select>
      </div>

      <!-- Imagen -->
      <div class="mb-3">
         <label for="foto" class="form-label"><?= lang('Validation.image') ?></label>
         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
      </div>

      <!-- Ícono -->
      <div class="mb-3">
         <label for="icon" class="form-label"><?= lang('Validation.icon') ?></label>
         <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
      </div>

      <!-- Archivos -->
      <div class="mb-3">
         <label for="files" class="form-label"><?= lang('Validation.files') ?></label>
         <input type="file" class="form-control" id="files" name="files">
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-success">
         <i class="fa fa-plus"></i> <?= lang('Validation.add') ?>
      </button>
   </form>
</div>
<script type="text/javascript">
     var slug = "<?= $slug ?>";
     if (slug == 'blog_details') {
     $('#slug').prop('readonly', true); 
  }

</script>