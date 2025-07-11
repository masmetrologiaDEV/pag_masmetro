
<?php
$cross=$cross[0];
?>
<!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0"><?= $cross->intro_text?></h1>
                </div>
                <div class="row g-5">

                 <?php foreach ($cross_content as $index => $elem): ?>
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
                    </div>
                </div>
            <?php endforeach; ?>
                
                
                
            </div>
        </div>
    </div>

    <!-- Scrollable modal -->
<div id="cross" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
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
    var URL=base_url+"/home/content_cross";
 
    $.ajax({
        type:'post',
        url:URL,
        data:{id:id},
        success: function(result){
           console.log("Respuesta:", result); 
            if (result) {
               
                var rs=JSON.parse(result);
             
                $('#contenido').html(rs.content);
                $('#cross').modal('show');
                
            }
        }


    });


}
</script>