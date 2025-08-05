<?php
$acreditacion_head=$acreditacion[0];
?>

<?php
$info=$acreditacion_info[0];
?>

<?php 
$firstCategory = isset($acreditacion_content[0]->category) ? $acreditacion_content[0]->category : null;
?>

<!-- Testimonial Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">


            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto"
            style="display: flex; flex-direction: column; align-items: center;">

                <?php
                    $item = $acreditacion[0];
                    $rol = session()->get('rol');
                    if (session()->has('id')): 
                    ?>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <?php if ($rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $item->id); ?>">
                                <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                            <a href="<?= base_url('admin/edit/' . $item->id); ?>">
                                <button type="button" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            
            <h1 class="mb-4"><?= $acreditacion_head->title ?></h1>

            <div style="width: 300px;">
                <img src="<?= 'data:image/bmp;base64,' . base64_encode($acreditacion_head->img); ?>"
                    alt="<?= esc($acreditacion_head->title) ?>"
                    class="img-fluid"
                    style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            </div>

<?php if (session()->has('id') && session()->rol == 'admin'): ?>
    <div class="text-center mb-4" style="margin-top: -10px;">
        <a href="<?= base_url('admin/add/' . $firstCategory); ?>" title="Agregar nuevo contenido">
            <button type="button" class="btn btn-danger btn-sm">
                <i class="fa fa-plus"></i> <?= lang('Validation.add') ?>
            </button>
        </a>
    </div>
<?php endif; ?>

           
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
    <?php foreach ($acreditacion_content as $index => $elem): ?>
        <div class="testimonial-item bg-light my-4" style="height: 280px;">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5" style="min-height: 100px;">
                
                
                <div class="row text-center justify-content-center" data-wow-delay="0.2s">
            <img src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?> alt="<?= esc($elem->title) ?>" class="img-fluid rounded" style="width: 70px; height: 50px;">
         </div>
                <!-- CONTENEDOR DEL TEXTO -->
                <div class="ps-4" style="flex: 1;">
                    <h5 class="text-primary mb-0"
                        style="font-size: 16px; line-height: 1.2; height: 48px; overflow: hidden;
                               display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                        <?= esc($elem->title) ?>
                    </h5>
                </div>
            </div>

            <div class="pt-4 pb-5 px-5">
                <a href="<?= base_url('home/files/' . $elem->id) ?>"
                   target="_blank"
                   class="btn-descargar"
                   style="font-size: 16px; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; color: #007bff;">
                    <span>Descargar PDF</span>
                    <img style="width: 25px; height: 25px;" src="<?= base_url('template/images/files/pdf.png') ?>" alt="PDF">
                </a>
                  <!-- Botones de acción solo para usuarios con sesión -->
                <?php if (session()->has('id')): ?>
                    <div class="mt-3 d-flex justify-content-center gap-2 flex-wrap">
                        <?php if (session()->rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $elem->id); ?>" title="Administrar este servicio">
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if (in_array(session()->rol, ['admin', 'editor'])): ?>
                            <a href="<?= base_url('admin/edit/' . $elem->id); ?>" title="Editar este servicio">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>



                        <div class="text-center mt-4 wow fadeInUp" data-wow-delay="1.2s" data-wow-duration="1s">

                        <?php
                    $item = $acreditacion_info[0];
                    $rol = session()->get('rol');
                    if (session()->has('id')): 
                    ?>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <?php if ($rol === 'admin'): ?>
                            <a href="<?= base_url('admin/admin/' . $item->id); ?>">
                                <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> <?= lang('Validation.admin') ?>
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if ($rol === 'admin' || $rol === 'editor'): ?>
                            <a href="<?= base_url('admin/edit/' . $item->id); ?>">
                                <button type="button" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i> <?= lang('Validation.edit') ?>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                            
                           <h3 class="fw-bold text-primary"><?= $info->title?></h3>
                           <p class="mb-0 text-black">
                            <?= $info->content?>
                           </p>
                           <br>
                           <a href="<?=$info->slug?>" target="_blank" rel="noopener"><?= $info->intro_text?></a>
                        </div>
                    
        </div>
    </div>
    <!-- Testimonial End -->

    <script>
        function file_image(archivo) {
    if(archivo)
    {
       

        switch (archivo)
        {
            case "avi":
                return base_url + "template/images/files/avi.png";
            case "css":
                return base_url + "template/images/files/css.png";
            case "csv":
                return base_url + "template/images/files/csv.png";
            case "dbf":
                return base_url + "template/images/files/dbf.png";
            case "doc":
                return base_url + "template/images/files/doc.png";
            case "docx":
                return base_url + "template/images/files/doc.png";
            case "dwg":
                return base_url + "template/images/files/dwg.png";
            case "exe":
                return base_url + "template/images/files/exe.png";
            case "html":
                return base_url + "template/images/files/html.png";
            case "iso":
                return base_url + "template/images/files/iso.png";
            case "js":
                return base_url + "template/images/files/js.png";
            case "jpeg":
                return base_url + "template/images/files/jpg.png";
            case "jpg":
                return base_url + "template/images/files/jpg.png";
            case "json":
                return base_url + "template/images/files/json.png";
            case "mp3":
                return base_url + "template/images/files/mp3.png";
            case "mp4":
                return base_url + "template/images/files/mp4.png";
            case "pdf":
                return base_url + "template/images/files/pdf.png";
            case "png":
                return base_url + "template/images/files/png.png";
            case "ppt":
                return base_url + "template/images/files/ppt.png";
            case "pptx":
                return base_url + "template/images/files/ppt.png";
            case "ppsx":
                return base_url + "template/images/files/ppt.png";
            case "psd":
                return base_url + "template/images/files/psd.png";
            case "rtf":
                return base_url + "template/images/files/rtf.png";
            case "search":
                return base_url + "template/images/files/search.png";
            case "rar":
                return base_url + "template/images/files/rar.png";
            case "svg":
                return base_url + "template/images/files/svg.png";
            case "txt":
                return base_url + "template/images/files/txt.png";
            case "xls":
                return base_url + "template/images/files/xls.png";
            case "xlsx":
                return base_url + "template/images/files/xls.png";
            case "xml":
                return base_url + "template/images/files/xml.png";
            case "zip":
                return base_url + "template/images/files/zip.png";
            default:
                return base_url + "template/images/files/file.png";
        }
    }
}
    </script>