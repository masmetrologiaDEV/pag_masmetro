


<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary"><?= lang('Validation.resultsFor') ?></h2>
            <h1 class="display-5 fw-bold text-dark"><?= esc(strtoupper($keyword)) ?></h1>
        </div>

        <div class="row g-4">
            <?php if (!empty($resultados)): ?>
                <?php foreach ($resultados as $res): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary"><?= esc($res['title']) ?></h5>
                                <p class="card-text text-muted">
                                    <?= (substr(strip_tags($res['content']), 0, 200)) . '...' ?>
                                </p>
                                <div class="mt-auto">
                                    <a href="<?= base_url('home/' . esc($res['slug'])) ?>" class="btn btn-outline-primary btn-sm text-uppercase">
                                        <?= lang('Validation.readMore') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= lang('Validation.noResults') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>



