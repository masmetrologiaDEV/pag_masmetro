<style>
    .resultados-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.resultado-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
    width: 300px;
    transition: transform 0.2s ease-in-out;
}

.resultado-card:hover {
    transform: translateY(-5px);
}

.resultado-card h4 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #00508d;
}

.resultado-card p {
    font-size: 14px;
    color: #333;
}

</style>
<h2 class="text-center mt-4">Resultados para: "<?= esc($keyword) ?>"</h2>

<?php if (empty($resultados)): ?>
    <p class="text-center">No se encontraron resultados.</p>
<?php else: ?>
    <div class="resultados-container">
        <?php foreach ($resultados as $res): ?>
            <div class="resultado-card">
                <h4><?= esc($res['title']) ?></h4>
                <p><strong><?= esc($res['intro_text']) ?></strong></p>
                <p><?= character_limiter(strip_tags($res['content']), 10000) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
