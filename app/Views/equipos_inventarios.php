<?php
$inventario=$inventory[0];
?>

<?php 
$firstCategory = isset($inventory_content[0]->category) ? $inventory_content[0]->category : null;
?>

<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?php
               $item = $inventory[0];
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
                <h1 class="mb-0"><?= $inventario->title?></h1>
                <a href="<?= base_url('home/contact/') ?>" target="_blank" class="btn btn-primary btn-sm shadow-sm d-inline-flex align-items-center gap-2 px-4 py-2">
      <i class="fa fa-envelope"></i>
      <span>Solicitar cotización</span>
    </a>
                </div>

                <?php if (session()->has('id') && session()->rol == 'admin'): ?>
                    <div class="text-center mb-4" style="margin-top: -10px;">
                        <a href="<?= base_url('admin/add/' . $firstCategory); ?>" title="Agregar nuevo contenido">
                            <button type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-plus"></i> Agregar
                            </button>
                        </a>
                    </div>
                <?php endif; ?>      

                <div class="row g-5">

               <?php foreach ($inventory_content as $index => $elem): ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-white rounded shadow-sm p-4 text-center h-100 d-flex flex-column justify-content-between position-relative">
                        <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" 
                             alt="<?= esc($elem->title) ?>" 
                             class="img-fluid mx-auto mb-3" 
                             style="max-width: 240px; height: auto;" onclick='modal(<?=$elem->id?>)' title="Clic aquí">

                        <div>
                            <h5 class="fw-bold text-dark mb-2" onclick='modal(<?=$elem->id?>)' title="Clic aquí"><?= esc($elem->title) ?></h5>
                        </div>

                           <!-- Botón con ícono central (estilo unificado) -->
            <a class="btn btn-ver-mas mt-3 d-inline-flex align-items-center justify-content-center p-0" 
               onclick='modal(<?= $elem->id ?>)' 
               title="Clic aquí" 
               style="width: 70px; height: 120px; border-radius: 8px;">
                <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->icon); ?>" 
                     alt="Ver más" 
                     style="width: 80px; height: auto;">
            </a>
                <!-- Botones de acción solo para usuarios con sesión -->

                <?php if (session()->has('id')): ?>
                    <div class="mt-3 d-flex justify-content-center gap-2 flex-wrap">
                        <?php if (session()->rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $elem->id); ?>" title="Administrar este servicio">
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i> Admin
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if (in_array(session()->rol, ['admin', 'editor'])): ?>
                            <a href="<?= base_url('admin/edit/' . $elem->id); ?>" title="Editar este servicio">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
                
                
                
            </div>
        </div>
    </div>

    <!-- Scrollable modal -->
<div id="inventario" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog  modal-lg" role="document" >
    <div class="modal-content" id="contenido">
      <!-- Aquí se inyectará el contenido -->
    </div>
  </div>
</div>

<script src="<?= base_url('template/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('template/js/bootstrap.min.js') ?>"></script>

<script>
    const base_url = "<?= base_url() ?>";
function modal(id)  
{     
    var URL=base_url+"/home/content_inventory";
 
    $.ajax({
        type:'post',
        url:URL,
        data:{id:id},
        success: function(result){
    if (result) {
        var rs = JSON.parse(result);

        // Agregamos contenedor con botón Leer más
        const contenidoCompleto = `
           
            <div class="modal-body">
                <div id="contenido-recortado" style="max-height: 300px; overflow: hidden;">
                    ${rs.content}
                </div>
                <div class="text-center mt-3">
                    <button id="leerMasBtn" class="btn btn-primary btn-sm">Leer más</button>
                </div>
            </div>
        `;

        $('#contenido').html(contenidoCompleto);
        $('#inventario').modal('show');

        // Evento del botón "Leer más"
        $(document).on('click', '#leerMasBtn', function () {
            $('#contenido-recortado').css('max-height', 'none');
            $(this).remove(); // Ocultamos el botón
        });
    }
}



    });


}
</script>
