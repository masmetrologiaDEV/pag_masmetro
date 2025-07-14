<?php

//echo var_dump($blog_details);die();
?>
<!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="img/blog-1.jpg" alt="">
                        <h1 class="mb-4"><?= esc($blog_details['title'])?></h1>
                        <p><?= esc($blog_details['content'])?></p>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- COMENTARIOS -->
<div class="mb-5">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Comentarios</h3>
    </div>
    <div id="comentarios-container"></div>
</div>

<!-- FORMULARIO DE COMENTARIO -->
<div class="bg-light rounded p-5">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Deja un comentario</h3>
    </div>
    <form id="formComentario">
        <div class="row g-3">
            <div class="col-12 col-sm-6">
                <input name="name" type="text" class="form-control bg-white border-0" placeholder="<?= lang('Validation.namePlaceholder') ?>" required>
            </div>
            <div class="col-12 col-sm-6">
                <input name="correo" type="email" class="form-control bg-white border-0" placeholder="<?= lang('Validation.emailPlaceholder') ?>" required>
            </div>
            <div class="col-12">
                <textarea name="comentario" class="form-control bg-white border-0" rows="5" placeholder="<?= lang('Validation.comment') ?>" required></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Enviar comentario</button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const contenedor = document.getElementById('comentarios-container');

    // Cargar comentarios y respuestas
    function cargarComentarios() {
        fetch("<?= base_url('comentario/lista') ?>")
        .then(res => res.json())
        .then(comentarios => {
            contenedor.innerHTML = '';
            comentarios.forEach(c => {
                const div = document.createElement('div');
                div.classList.add('mb-4');
                div.innerHTML = `
                    <div class="d-flex mb-2">
                        <img src="<?= base_url('img/user.jpg') ?>" class="img-fluid rounded" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><b>${c.nombre}</b> (<a href="mailto:${c.correo}">${c.correo}</a>) <small><i>${c.fecha}</i></small></h6>
                            <p>${c.comentario}</p>
                            <button class="btn btn-sm btn-light btnResponder" data-id="${c.id}">Responder</button>
                        </div>
                    </div>
                    <div class="ms-5 mt-2">
                        ${(c.replies || []).map(r => `
                            <div class="mb-2 border-start ps-3">
                                <p class="mb-1">${r.reply}</p>
                                <small class="text-muted">${r.fecha}</small>
                            </div>
                        `).join('')}
                    </div>
                    <div class="responder-form mt-2 ms-5" id="respuesta-${c.id}" style="display:none;">
                        <textarea class="form-control mb-2" rows="2" placeholder="Tu respuesta..."></textarea>
                        <button class="btn btn-sm btn-primary btnEnviarRespuesta" data-id="${c.id}">Enviar respuesta</button>
                    </div>
                `;
                contenedor.appendChild(div);
            });
        });
    }

    cargarComentarios();

    // Enviar comentario
    document.getElementById("formComentario").addEventListener("submit", function(e) {
        e.preventDefault();
        const form = new FormData(this);
        fetch("<?= base_url('comentario/guardar') ?>", {
            method: "POST",
            body: form
        })
        .then(res => res.json())
        .then(() => {
            this.reset();
            cargarComentarios();
        });
    });

    // Delegación para mostrar el formulario de respuesta
    contenedor.addEventListener("click", function(e) {
        if (e.target.classList.contains("btnResponder")) {
            const id = e.target.getAttribute("data-id");
            const form = document.getElementById(`respuesta-${id}`);
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }

        // Enviar respuesta
        if (e.target.classList.contains("btnEnviarRespuesta")) {
            const id = e.target.getAttribute("data-id");
            const textarea = document.querySelector(`#respuesta-${id} textarea`);
            const texto = textarea.value.trim();
            if (texto === '') return;
            fetch("<?= base_url('comentario/responder') ?>", {
                method: "POST",
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id_comment=${id}&reply=${encodeURIComponent(texto)}`
            }).then(res => res.json())
              .then(() => {
                  textarea.value = '';
                  cargarComentarios();
              });
        }
    });
});
</script>

                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                   <!-- Recent Post Start -->
<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Recent Post</h3>
    </div>

    <?php foreach ($recent_posts as $post): ?>
        <div class="d-flex rounded overflow-hidden mb-3">
            <img class="img-fluid" 
                 src="<?= 'data:image/bmp;base64,' . base64_encode($post['img']) ?>" 
                 alt="<?= esc($post['title']) ?>" 
                 style="width: 100px; height: 100px; object-fit: cover;">

            <a href="<?= base_url('home/' . $post['slug'] . '/' . $post['id']) ?>" 
               class="h6 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                <?= esc($post['title']) ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>

                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
    
                   
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->