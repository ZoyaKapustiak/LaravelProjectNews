<?php foreach ($categoryNews as $n): ?>
    <div style="border: 1px solid black">
        <h2><?=$n['title'] ?></h2>
        <a href="<?=route('categoryNews.show', ['id' => $n['id']]) ?>">Подробнее</a>

    </div>
<?php endforeach; ?>
