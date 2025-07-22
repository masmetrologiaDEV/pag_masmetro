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


            <?php
            $item = (object) $blog_details;

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

            

            <?php if (!empty($blog_details['img'])): ?>
         <img 
            src="data:image/jpeg;base64,<?= base64_encode($blog_details['img']) ?>" 
            alt="<?= esc($blog_details['title']) ?>" 
            class="img-fluid rounded mb-3">
         <?php endif; ?>
               <h1 class="mb-4"><?= esc($blog_details['title'])?></h1>
               <p><?= esc($blog_details['content'])?></p>

               
            </div>
            <!-- Blog Detail End -->


            <!-- COMENTARIOS -->
            <div class="mb-5">
               <div class="section-title section-title-sm position-relative pb-3 mb-4">
                  <h3 class="mb-0" id="count_comments">Comments</h3>
               </div>
               <div id='comments_container'></div>
            </div>
            <!-- Comment List End -->

            <!-- FORMULARIO DE COMENTARIO -->
            <div class="bg-light rounded p-5">
               <div class="section-title section-title-sm position-relative pb-3 mb-4">
                  <h3 class="mb-0">Deja un comentario</h3>
               </div>
               <form id="" method="POST" action="<?= base_url('home/save_comments') ?>" enctype="multipart/form-data">
                  <div class="row g-3">
                     <div class="col-12 col-sm-6">
                        <input name="id_blog" type="hidden" class="form-control bg-white border-0" value="<?=$blog_details['id']?>">
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
         </div>

         <!-- Sidebar Start -->
         <div class="col-lg-4">
            <!-- Recent Post Start -->
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
               <div class="section-title section-title-sm position-relative pb-3 mb-4">
                  <h3 class="mb-0">Recent Post</h3>
               </div>
               <?php
                  if ($recent_posts):
                  foreach ($recent_posts as $post): ?>
               <div class="d-flex rounded overflow-hidden mb-3 bg-light" style="height: 100px;">
    <div style="width: 100px; height: 100px; flex-shrink: 0;">
        <img class="img-fluid h-100 w-100" 
             src="<?= 'data:image/bmp;base64,' . base64_encode($post['img']) ?>" 
             alt="<?= esc($post['title']) ?>" 
             style="object-fit: cover;">
    </div>
    <a href="<?= base_url('home/' . $post['slug'] . '/' . $post['id']) ?>" 
       class="h6 fw-semi-bold d-flex align-items-center px-3 mb-0 w-100">
       <?= esc($post['title']) ?>
    </a>
</div>

               <?php endforeach; 
                  endif;?>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Blog End -->
 <script>
const base_url = "<?= base_url() ?>";
var id_blog=<?= $blog_details['id']?>;
function get_comments()  
{  
    var URL=base_url+"/ComentarioController/obtenerComentarios";
    $.ajax({
        type:'post',
        url:URL,
        data:{id_blog:id_blog},
        success: function(result){
            if (result) {
                var rs=JSON.parse(result);
                let content = $("#comments_container");
                $('#count_comments').text(rs.length + (rs.length == 1 ? " Comment" : " Comments"));
                rs.forEach(rs => {
                    let html = `
    <div class="pt-3 border-top">
        <div class="ps-1">
            <h6 class="mb-1 fw-bold">
                ${rs.nombre}
<small class="d-block">
    <a href="mailto:${rs.correo}" class="text-primary fw-semibold">${rs.correo}</a> – 
    <span class="text-muted">${rs.fecha}</span>
</small>
            </h6>
            <p class="mb-2">${rs.comentario}</p>

            <button class="btn btn-outline-secondary btn-sm mb-2" onclick="ReplyBox(${rs.id})">
                <i class="bi bi-reply"></i> Responder
            </button>

            <!-- Caja de respuesta -->
            <div class="reply-box mt-2" id="reply-box-${rs.id}" style="display:none;">
                <textarea id="reply-text-${rs.id}" class="form-control mb-2" rows="2" placeholder="Escribe una respuesta..." required></textarea>
                <button class="btn btn-sm btn-primary" onclick="save_reply(${rs.id})">Enviar</button>
            </div>

            <!-- Contenedor de respuestas -->
            <div id="replies-${rs.id}" class="mt-3 ms-3 border-start ps-3"></div>
        </div>
    </div>
`;

                        content.append(html);
                        
                        //Obtener respuestas después de mostrar el comentario
                        get_replies(rs.id);
                })
              
            }
        }
    });
}

function ReplyBox(commentId) {
    const replyBox = document.getElementById('reply-box-' + commentId);
    replyBox.style.display = replyBox.style.display === 'none' ? 'block' : 'none';
}

function save_reply(commentId){
    const replyText = document.getElementById('reply-text-' + commentId).value;

    if (!replyText.trim()) {
    alert("Escribe una respuesta válida");
    return;
}

    $.ajax({
        type: 'POST',
        url: base_url + "/ComentarioController/guardarRespuesta",
        data: {
            id_comment: commentId,
            reply: replyText
        },
        success: function(response) {
            document.getElementById('reply-text-' + commentId).value = '';
            document.getElementById('reply-box-' + commentId).style.display = 'none';
            get_replies(commentId);
        },
        error: function() {
            alert("Error al guardar respuesta");
        }
    });    
}

function get_replies(commentId) {
    $.ajax({
        type: 'POST',
        url: base_url + '/ComentarioController/obtenerRespuestas',
        data: { id_comment: commentId },
        success: function (response) {
            const container = document.getElementById('replies-' + commentId);
            container.innerHTML = ''; // limpiar por si ya había respuestas

            response.forEach(reply => {
                const html = `
                    <div class="d-flex mb-2">
                        <div class="ps-2">
                            <h6><small><i>${reply.fecha || ''}</i></small></h6>
                            <p class="mb-0">${reply.reply}</p>
                        </div>
                    </div>
                `;
                container.innerHTML += html;
            });
        }
    });
}


$(document).ready(function() {
    get_comments();
});
</script>