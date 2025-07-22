 <?php
            $item = (object) $portada_certificado;

               $rol = session()->get('rol');
               if (session()->has('id')): 
            ?>
               <?php if ($rol === 'admin'): ?>
                  <a href="<?= base_url('admin/admin/' . $item->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i> Admin - Portada
                     </button>
                  </a>
               <?php endif; ?>

               <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                  <a href="<?= base_url('admin/edit/' . $item->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> Editar - Portada
                     </button>
                  </a>
               <?php endif; ?>
            <?php endif; ?>


<?php if (isset($portada_certificado)): ?>
<div id="bienvenida" class="modal-full">
    <img src="<?= 'data:image/bmp;base64,' . base64_encode($portada_certificado->img) ?>" 
         class="img-full" 
         alt="Reconocimiento portada">
    <button class="cerrar-modal" onclick="cerrarBienvenida()">✕</button>
</div>
<?php endif; ?>


 <?php
            $item = (object) $certificado;

               $rol = session()->get('rol');
               if (session()->has('id')): 
            ?>
               <?php if ($rol === 'admin'): ?>
                  <a href="<?= base_url('admin/admin/' . $item->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i> Admin
                     </button>
                  </a>
               <?php endif; ?>

               <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                  <a href="<?= base_url('admin/edit/' . $item->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> Editar
                     </button>
                  </a>
               <?php endif; ?>
            <?php endif; ?>


<div id="contenidoCertificado" style="display: none;">
    <div class="container text-center py-5">

      <a data-fancybox="gallery" href="<?= base_url('reconocimientos/verImagen/' . $certificado['slug']) ?>">
  <img src="<?= base_url('reconocimientos/verImagen/' . $certificado['slug']) ?>" 
       class="img-fluid mb-3"
       style="max-width: 500px; cursor: zoom-in;"
       alt="<?= esc($certificado['title']) ?>">
</a>
        <h2><?= esc($certificado['title']) ?></h2>
        <p><?= esc($certificado['content']) ?></p>
    </div>
</div>



<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Fancybox 3.5.7 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- Fancybox 3.5.7 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>

function cerrarBienvenida() {
    document.getElementById('bienvenida').style.display = 'none';
    document.getElementById('contenidoCertificado').style.display = 'block';
}

</script>



