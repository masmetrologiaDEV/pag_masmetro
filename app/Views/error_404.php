<?php
$error=$error_content[0];
?>

<style>
.error-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    min-height: 70vh;
    background-color: #ffffffff;
    padding: 40px 20px;
}

.error-container h1 {
    font-size: 3rem;
    font-weight: 800;
    color: #1f2a44; /* Azul corporativo */
    margin-bottom: 20px;
}

.error-container p {
    font-size: 1.2rem;
    color: #444;
    max-width: 600px;
    margin-bottom: 30px;
}

.error-container a.btn-home {
    background-color: #00508d; /* Botón azul corporativo */
    color: #fff;
    padding: 12px 25px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease;
}

.error-container a.btn-home:hover {
    background-color: #00385e;
}
</style>

<div class="error-container">

<?php
               $item = $error_content[0];
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

    <h1><?= $error->title ?></h1>
    <p><?= $error->content ?></p>
    <a href="<?= base_url('/') ?>" class="btn-home"><?= $error->intro_text ?></a>

    <!--  
    <h1>PARECE QUE ESTA PÁGINA NO EXISTE</h1>
    <p>El enlace que apuntaba aquí no es válido o fue movido.  
       Puedes volver al inicio y continuar navegando.</p>
    <a href="<?= base_url('/') ?>" class="btn-home">Volver al inicio</a>
    -->
</div>

