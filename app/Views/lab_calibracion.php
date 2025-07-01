
<?php
$calibration=$calibration[0];
?>
<!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0"><?= $calibration->title?></h1>
                </div>
                <div class="row g-5">

                <?php foreach ($calibration_content as $index => $elem): ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="">
                            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
                        </div>
                        <br>
                        <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                        <a class="btn btn-lg btn-primary rounded" onclick='modal(<?=$elem->id?>)'>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
                
                
            </div>
        </div>
    </div>

    <!-- Scrollable modal -->
<div id="calibracion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog  modal-lg" role="document" >
    <div class="modal-content" id="contenido">
      <!-- Aquí se inyectará el contenido -->
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    
function modal(id)  
{     
    var base_url = "<?= base_url() ?>";
    var URL=base_url+"/home/content_calibration";
 
    $.ajax({
        type:'post',
        url:URL,
        data:{id:id},
        success: function(result){
           
            if (result) {
               
                var rs=JSON.parse(result);
             
                $('#contenido').html(rs.content);
                $('#calibracion').modal('show');
                
            }
        }


    });


}
</script>