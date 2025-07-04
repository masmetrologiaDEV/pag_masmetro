
<?php
$inspection=$inspection[0];
?>
<?php
$footer_content=$footer_content[0];
?>
<!-- Service Start -->


    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0"><?= $inspection->title?></h1>
                </div>
                <div class="row g-5">

                <?php foreach ($inspection_content as $index => $elem): ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="">
                            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
                        </div>
                        
                        <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                        <a class="btn" onclick='modal(<?=$elem->id?>)'>
                             <img src=<?= 'data:image/bmp;base64,' . base64_encode($footer_content->img); ?> alt="<?= esc($footer_content->img) ?>" class="img-fluid me-4" style="width: 200px; height: auto;">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
                
                
            </div>
        </div>
    </div>


        <!-- Scrollable modal -->
<div id="inspeccion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
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
{     alert(1);
    var URL=base_url+"/home/content_inspection";
 alert(2);
    $.ajax({
        type:'post',
        url:URL,
        data:{id:id},
        success: function(result){
            alert(3);
            if (result) {
               alert(5);
                var rs=JSON.parse(result);
             
                $('#contenido').html(rs.content);
                $('#inspeccion').modal('show');
              alert(6); 
            }
                 alert(7); 
        }
             alert(8); 


    });
 alert(9); 

}
</script>

    