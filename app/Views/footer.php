
<?php
   $precision=$footer_logo[0];
   ?>
<?php
   $privacy=$privacy_content[0];
   ?>

<?php 
$firstCategory = isset($footer_content[0]->category) ? $footer_content[0]->category : null;
?>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container">
      <div class="row gx-5">
         <!-- Imagen 1 -->
         <div class="row text-center justify-content-center position-relative pb-3 mb-3 mx-auto" data-wow-delay="0.2s">

            <?php
               $item = $footer_logo[0];
               $rol = session()->get('rol');
               if (session()->has('id')): 
            ?>
            <div class="d-flex justify-content-center gap-2 mb-3" style="margin-top: 20px;">
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
               </div>
            <?php endif; ?>
            <img src=<?= 'data:image/bmp;base64,' . base64_encode($precision->img); ?> alt="<?= esc($precision->title) ?>" class="img-fluid rounded" style="width: 600px; height: 125px;">
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

         <div class="row text-center justify-content-center py-5 text-white fondo-footer">
            <?php foreach ($footer_content as $index => $elem): ?>
            <div class="col-6 col-md text-center px-3 <?= $index < count($footer_content) - 1 ? 'border-end border-white' : '' ?>">
               <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>"
                  alt="<?= esc($elem->title) ?>"
                  class="img-fluid mb-3"
                  style="width: 50px; height: 50px;">
               <h5 class="fw-bold text-uppercase text-light"><?= esc($elem->title) ?></h5>
               <p class="small mb-0"><?= esc($elem->intro_text) ?></p>

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
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid text-white" style="background: #061429;">
   <div class="container text-center">
      <div class="row justify-content-center">
         <div class="col-lg-8 col-md-6">

          <?php
               $priv = $privacy_content[0];
               $rol = session()->get('rol');
               if (session()->has('id')): 
            ?>
            <div class="d-flex justify-content-center gap-2 mb-3" style="margin-top: 20px;">
               <?php if ($rol === 'admin'): ?>
                  <a href="<?= base_url('admin/admin/' . $priv->id); ?>">
                     <button type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i> Admin
                     </button>
                  </a>
               <?php endif; ?>

               <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                  <a href="<?= base_url('admin/edit/' . $priv->id); ?>">
                     <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> Editar
                     </button>
                  </a>
               <?php endif; ?>
               </div>
            <?php endif; ?>
            <div class="d-flex align-items-center justify-content-center" style="height: 75px;">

           

               <p class="mb-0"><a class=" btn text-white border-bottom" onclick='modal_pr(<?=$privacy->id?>)'>&copy;2025 MAS Metrología | Aviso de Privacidad</a>
                <?php if (session()->has('id')): ?>
                    <a href="<?= base_url('admin/logout') ?>" title="Log Out">
                        <i class="fa-solid fa-arrow-right-from-bracket" style="transform: scaleX(-1);"></i> 
                    </a>
                     <a href="<?= base_url('admin/panel') ?>" title="Panel">
                        <i class="fa-solid fa-user" style="transform: scaleX(-1);"></i> 
                    </a>
                    <?php
                else:
                    ?>
                    <a href="<?= base_url('admin/') ?>" title="Sign in">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                    <?php
                endif;
                    ?>
                   
                </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Scrollable modal -->
<div id="privacidad" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
   <div class="modal-dialog  modal-lg" role="document" >
      <div class="modal-content" id="contenido_privacidad" style='height: 80vh; overflow-y: auto;'>
         <!-- Aquí se inyectará el contenido -->
      </div>
   </div>
</div>
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
<a href="https://web.whatsapp.com/send?phone=5216561995459" target="_blank" class="text-decoration-none content-w" aria-label="Ir al sitio oficial de WhatsApp">
<i class="fab fa-whatsapp fa-2x" style="color:rgb(255, 255, 255);"></i>
</a>
<script>
   function modal_pr(id)  
   {     
       var base_url = "<?= base_url() ?>";
      var URL=base_url+"/home/content_privacy";
    
       $.ajax({
           type:'post',
           url:URL,
           data:{id:id},
           success: function(result){
              
               if (result) {
                  
                   var rs=JSON.parse(result);
                
                   $('#contenido_privacidad').html(rs.content);
                   $('#privacidad').modal('show');
                   
               }
               
           }
   
   
       });
   }
</script>
<!-- Footer End -->
<!-- Back to Top -->
<script src="<?= base_url('template/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('template/js/bootstrap.min.js') ?>"></script>
<!-- JavaScript Libraries -->
<script src="<?= base_url('template/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('template/lib/wow/wow.min.js')?>"></script>
<script src="<?= base_url('template/lib/easing/easing.min.js')?>"></script>
<script src="<?= base_url('template/lib/waypoints/waypoints.min.js')?>"></script>
<script src="<?= base_url('template/lib/counterup/counterup.min.js')?>"></script>
<script src="<?= base_url('template/lib/owlcarousel/owl.carousel.min.js')?>"></script>
<!-- Template Javascript -->
<script src="<?= base_url('template/js/main.js')?>"></script>