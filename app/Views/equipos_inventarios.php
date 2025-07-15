<?php
$inventario=$inventory[0];
?>

<?php 
$firstCategory = isset($inventory_content[0]->category) ? $inventory_content[0]->category : null;
?>

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
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
                             style="max-width: 150px; height: auto;">

                        <div>
                            <h5 class="fw-bold text-dark mb-2"><?= esc($elem->title) ?></h5>
                        </div>

                         <a class="btn" onclick='modal(<?=$elem->id?>)'>
                             <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->icon); ?> alt="<?= esc($elem->icon) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
               
                var rs=JSON.parse(result);
             
                $('#contenido').html(rs.content);
                $('#inventario').modal('show');
                
            }
        }


    });


}
</script>
