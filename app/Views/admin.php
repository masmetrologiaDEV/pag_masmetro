<div class="container mt-5">
    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table table-bordered table-hover align-middle text-center" style="min-width: 2500px; width: 100%;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Tags</th>
                    <th>Category</th>
                    <th>Intro Text</th>
                    <th>Content</th>
                    <th>Img</th>
                    <th>Icon</th>
                    <th>Files</th>
                    <th>Publicado</th>
                    <th>Publicado en</th>
                    <th>Idioma</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Última Modificación</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($datos): ?>
                    <?php foreach ($datos as $elem): ?>
                        <tr>
                            <td class="text-wrap"><?= esc($elem->title) ?></td>
                            <td class="text-wrap"><?= esc($elem->slug) ?></td>
                            <td class="text-wrap"><?= esc($elem->tags) ?></td>
                            <td><?= esc($elem->category) ?></td>
                            <td class="text-wrap"><?= esc($elem->intro_text) ?></td>
                            <td class="text-wrap"><?= esc($elem->content) ?></td>
                            <td>
                                <?php if (!empty($elem->img)): ?>
                                    <img src="data:image/*;base64,<?= base64_encode($elem->img); ?>" alt="Img" class="img-thumbnail" width="100">
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($elem->icon)): ?>
                                    <img src="data:image/*;base64,<?= base64_encode($elem->icon); ?>" alt="Icon" class="img-thumbnail" width="50">
                                <?php else: ?>
                                    <span class="text-muted">Sin icono</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($elem->files)): ?>
                                    <a href="<?= base_url('admin/download/' . $elem->idPrimaria) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="bi bi-download"></i> Descargar
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Sin archivo</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $elem->is_published ? 'Sí' : 'No' ?></td>
                            <td><?= esc($elem->published_at) ?></td>
                            <td><?= esc($elem->language) ?></td>
                            <td><?= esc($elem->fullname) ?></td>
                            <td><?= esc($elem->date) ?></td>
                            <td><?= esc($elem->last_modified) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="16" class="text-center text-muted">No hay registros disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
