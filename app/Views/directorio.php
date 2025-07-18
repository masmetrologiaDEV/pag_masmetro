<style>
.img-wrapper {
    width: 100%;
    height: 100%;
    max-width: 300px;
    max-height: 400px;
    position: relative;
    overflow: hidden;
    margin: 0 auto;
}

.img-wrapper:before {
    content: '';
    position: absolute;
    top: 0;
    left: 180%;
    height: 100%;
    width: 100%;
    background: rgba(255,255,255,.3);
    z-index: 1;
    transform: skew(45deg);
    transition: .5s;
}

.img-wrapper:hover:before {
    left: -180%;
}

.img-wrapper img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: 2s;
}

.img-wrapper:hover img {
    filter: grayscale(0%);
    transform: scale(1.1);
}



.img-wrapper ul {
    position: absolute;
    top: 10px; /* Ajusta para separarlo del borde */
    left: 10px;
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-direction: column; /* 👉 Esto los alinea verticalmente */
    gap: 8px; /* 👉 Espacio entre iconos */
}
.img-wrapper ul li {
    background: #333;
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 40px;
    transform: perspective(800px) rotateY(90deg);
    transition: .5s;
    transform-origin: left;
    display: block; /* 👉 Evita el comportamiento inline */
}

.img-wrapper:hover ul li {
    transform: perspective(800px) rotateY(0deg);
}
.info-slide {
    background: #091E3E;
    color: #EEF9FF;
    text-align: center;
    text-transform: uppercase;
    margin: 0;
    padding: 10px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
    transform: perspective(400px) rotateY(90deg);
    transform-origin: right;
    transition: 1s;
    font-family: Arial, sans-serif;
}

.info-slide h4 {
    margin: 0;
     color: #EEF9FF;
    font-size: 16px;
}

.info-slide label {
    display: block;
    font-weight: normal;
    font-size: 13px;
    text-transform: none;
    color: #d4e3f0;
    margin-top: 2px;
}

.img-wrapper:hover .info-slide {
    transform: perspective(400px) rotateY(0deg);
}


.img-wrapper:hover ul li:nth-child(1) { transition-delay: .2s; }
.img-wrapper:hover ul li:nth-child(2) { transition-delay: .6s; }
.img-wrapper:hover ul li:nth-child(3) { transition-delay: .8s; }
.img-wrapper:hover ul li:nth-child(4) { transition-delay: 1s; }
</style>
<?php
$directorio_head=$directorio[0];
$firstCategory = isset($directorio_content[0]->category) ? $directorio_content[0]->category : null;

?>
<!-- PHP Rendered Section -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <?php
                $item = $directorio[0];
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

            <h1 class="mb-0"><?= $directorio_head->title?></h1>
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

        <div class="row g-4 justify-content-center">
            <?php foreach ($directorio_content as $index => $elem): ?>
            <div class="col-sm-10 col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="bg-white rounded shadow-sm p-3 text-center" >
                    <div class="image-area">
                        <div class="img-wrapper">
                            <img src="<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>" alt="<?= esc($elem->title) ?>">
                            <div class="info-slide">
    <h4><?= esc($elem->title) ?></h4>
    <label><?= esc($elem->intro_text) ?></label>
</div>
                            <ul>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-envelope"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>