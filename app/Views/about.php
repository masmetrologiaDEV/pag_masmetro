<?php
$about_head=$about[0];
?>

<?php 
$firstCategory = isset($about_content[0]->category) ? $about_content[0]->category : null;
?>
 <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
               
            <?php
               $item = $about[0];
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

                <h1 class="mb-0"><?= $about_head->title?></h1>
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
                <?php foreach ($about_content as $index => $elem): ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">

                            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid w-100">
                            <div class="team-social">
                                <p class="text-uppercase m-0"><?= esc($elem->content) ?></p>
                                <p class="text-uppercase m-0"><?= esc($elem->title) ?></p> 
                            </div>
                            
                            
                        </div>
                        <div class="text-center py-4">
                            <h4 class="mb-3"><?= esc($elem->title) ?></h4>
                            <p class="text-uppercase m-0"><?= esc($elem->intro_text) ?></p>
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
                </div>
                <?php endforeach; ?>
                
                
            </div>
        </div>
    </div>
    <!-- Team End -->