<?php
$acreditacion=$acreditacion[0];
?>

<?php
$info=$acreditacion_info[0];
?>

<!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="mb-0"><?= $acreditacion->title?></h1>
            </div>

           
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
    <?php foreach ($acreditacion_content as $index => $elem): ?>
        <div class="testimonial-item bg-light my-4" style="height: 280px;">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5" style="min-height: 100px;">
                
                <!-- CONTENEDOR DEL LOGO CON ANCHO FIJO -->
                <div style="flex: 0 0 80px; max-width: 80px;">
                    <img src="<?= 'data:image/bmp;base64,' . base64_encode($info->img); ?>"
                         alt="<?= esc($info->title) ?>"
                         class="img-fluid" style="width: 60px; height: 60px; object-fit: contain;">
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
            </div>
        </div>
    <?php endforeach; ?>
</div>



                        <div class="text-center mt-4 wow fadeInUp" data-wow-delay="1.2s" data-wow-duration="1s">
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