    <?php
$item=$footer_content[0];
?>
     <?php
$precision=$footer_logo[0];
?>
 <?php
$privacy=$privacy_content[0];
?>
                    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

            <div class="row gx-5">
                        <!-- Imagen 1 -->
                    <div class="row text-center justify-content-center" data-wow-delay="0.2s">
                        <img src=<?= 'data:image/bmp;base64,' . base64_encode($precision->img); ?> alt="<?= esc($precision->title) ?>" class="img-fluid rounded" style="width: 600px; height: 125px;">
                    </div>

                        <div class="row text-center justify-content-center py-5 text-white fondo-footer">
                            <?php foreach ($footer_content as $index => $elem): ?>
                                <div class="col-6 col-md text-center px-3 <?= $index < count($footer_content) - 1 ? 'border-end border-white' : '' ?>">
                                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>"
                                         alt="<?= esc($elem->title) ?>"
                                         class="img-fluid mb-3"
                                         style="width: 50px; height: 50px;">
                                    <h5 class="fw-bold text-uppercase text-light"><?= esc($elem->title) ?></h5>
                                    <p class="small mb-0"><?= esc($elem->intro_text) ?></p>
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
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                                                

                    <p class="mb-0"><a class=" btn text-white border-bottom" onclick='modal_pr(<?=$privacy->id?>)'>&copy;2025 MAS Metrología | Aviso de Privacidad</a></p>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/lib/wow/wow.min.js')?>"></script>
    <script src="<?= base_url('template/lib/easing/easing.min.js')?>"></script>
    <script src="<?= base_url('template/lib/waypoints/waypoints.min.js')?>"></script>
    <script src="<?= base_url('template/lib/counterup/counterup.min.js')?>"></script>
    <script src="<?= base_url('template/lib/owlcarousel/owl.carousel.min.js')?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/js/main.js')?>"></script>
