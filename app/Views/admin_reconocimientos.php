<!-- Modal: Lista de Reconocimientos -->
<div class="modal fade" id="modalCertificados" tabindex="-1" aria-labelledby="modalCertificadosLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="modalCertificadosLabel">Reconocimientos cargados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <table class="table table-hover table-bordered align-middle text-center">
          <thead class="table-light">
            <tr>
              <th>Título</th>
              <th>Slug</th>
              <th>Categoría</th>
              <th>Contenido</th>
              <th>Imagen</th>
              <th>Archivo</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($datos)): ?>
              <?php foreach ($datos as $elem): ?>
                <?php if ($elem->category === 'certificados_content'): ?>
                  <tr>
                    <td class="text-wrap"><?= esc($elem->title) ?></td>
                    <td class="text-wrap"><?= esc($elem->slug) ?></td>
                    <td><?= esc($elem->category) ?></td>
                    <td class="text-wrap"><?= esc($elem->content) ?></td>
                    <td>
                      <?php if (!empty($elem->img)): ?>
                        <img src="data:image/*;base64,<?= base64_encode($elem->img); ?>" alt="Imagen" class="img-thumbnail" width="80">
                      <?php else: ?>
                        <span class="text-muted">Sin imagen</span>
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
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted">No hay reconocimientos registrados.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
