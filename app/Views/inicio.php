<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container py-5">
      <div class="row g-5">
         <div class="col-lg-7">
            <?php
               $item=$home_content[0];
               if (session()->has('id')): ?>
            <a href="<?= base_url('admin/admin/' . $item->id); ?>">
            <button type="button" class="btn btn-success btn-sm">
            <i class="fa fa-eye"></i> Admin
            </button>
            </a>
            <a href="<?= base_url('admin/edit/' . $item->id); ?>">
            <button type="button" class="btn btn-warning btn-sm">
            <i class="fa fa-pencil"></i> Editar
            </button>
            </a>
            <?php endif; ?>
            <div class="section-title position-relative pb-3 mb-5">
               <h3 class="mb-4"><?=$item->title?></h3>
               <p class="mb-4"><?=$item->intro_text?></p>
               <p class="mb-4">
                  <?=$item->content?>.
               </p>
               <h5 class="mb-4"></i><?=$item->tags?></h5>
            </div>
            <div class="row gx-3">
               <!-- Imagen 1 -->
               <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                  <?php
                     $mision=$home_content[1];
                     if (session()->has('id')): 
                        if (session()->rol=='admin'): 
                        ?>
                  <a href="<?= base_url('admin/admin/' . $mision->id); ?>">
                  <button type="button" class="btn btn-success btn-sm">
                  <i class="fa fa-eye"></i> Admin
                  </button>
                  </a>
                    <?php endif; ?>
                  <a href="<?= base_url('admin/edit/' . $mision->id); ?>">
                  <button type="button" class="btn btn-warning btn-sm">
                  <i class="fa fa-pencil"></i> Editar
                  </button>
                  </a>
                  <?php endif; ?>
                  <img src=<?= 'data:image/bmp;base64,' . base64_encode($mision->img); ?> alt="<?= esc($mision->title) ?>" class="img-fluid rounded">
                  <p class="mb-4"><?= $mision->content?></p>
               </div>
               <!-- Imagen 2 -->
               <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                  <?php
                     $vision=$home_content[2];
                     if (session()->has('id')): ?>
                  <a href="<?= base_url('admin/admin/' . $vision->id); ?>">
                  <button type="button" class="btn btn-success btn-sm">
                  <i class="fa fa-eye"></i> Admin
                  </button>
                  </a>
                  <a href="<?= base_url('admin/edit/' . $vision->id); ?>">
                  <button type="button" class="btn btn-warning btn-sm">
                  <i class="fa fa-pencil"></i> Editar
                  </button>
                  </a>
                  <?php endif; ?>
                  <img src=<?= 'data:image/bmp;base64,' . base64_encode($vision->img); ?> alt="<?= esc($vision->title) ?>" class="img-fluid rounded">
                  <p class="mb-4"><?= $vision->content?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>