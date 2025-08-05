<div class="container mt-5">
    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table table-bordered table-hover align-middle text-center" style="min-width: 2500px; width: 100%;">
            <thead>
                <tr>
                    <th><?= lang('Validation.title') ?></th>
                    <th><?= lang('Validation.slug') ?></th>
                    <th><?= lang('Validation.tags') ?></th>
                    <th><?= lang('Validation.category') ?></th>
                    <th><?= lang('Validation.introText') ?></th>
                    <th><?= lang('Validation.content') ?></th>
                    <th><?= lang('Validation.imageShort') ?></th>
                    <th><?= lang('Validation.icon') ?></th>
                    <th><?= lang('Validation.files') ?></th>
                    <th><?= lang('Validation.published') ?></th>
                    <th><?= lang('Validation.publishedAt') ?></th>
                    <th><?= lang('Validation.language') ?></th>
                    <th><?= lang('Validation.user') ?></th>
                    <th><?= lang('Validation.date') ?></th>
                    <th><?= lang('Validation.lastModified') ?></th>
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
                                    <img src="data:image/*;base64,<?= base64_encode($elem->img); ?>" alt="<?= lang('Validation.imageShort') ?>" class="img-thumbnail" width="100">
                                <?php else: ?>
                                    <span class="text-muted"><?= lang('Validation.noImage') ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($elem->icon)): ?>
                                    <img src="data:image/*;base64,<?= base64_encode($elem->icon); ?>" alt="<?= lang('Validation.icon') ?>" class="img-thumbnail" width="50">
                                <?php else: ?>
                                    <span class="text-muted"><?= lang('Validation.noIcon') ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($elem->files)): ?>
                                    <a href="<?= base_url('admin/download/' . $elem->idPrimaria) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="bi bi-download"></i> <?= lang('Validation.download') ?>
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted"><?= lang('Validation.noFile') ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $elem->is_published ? lang('Validation.yes') : lang('Validation.no') ?></td>
                            <td><?= esc($elem->published_at) ?></td>
                            <td><?= esc($elem->language) ?></td>
                            <td><?= esc($elem->fullname) ?></td>
                            <td><?= esc($elem->date) ?></td>
                            <td><?= esc($elem->last_modified) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="16" class="text-center text-muted"><?= lang('Validation.noRecords') ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
