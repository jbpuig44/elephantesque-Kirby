<?php snippet('header') ?>

  <h1><?= $page->title()->esc() ?></h1>

  <?php if ($page->children()->listed()->count()): ?>
  <ul class="grid-cards">
    <?php foreach ($page->children()->listed() as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <?php if ($cover = $album->cover()): ?>
        <img src="<?= $cover->resize(400, 300)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
        <?php endif ?>
        <span><?= $album->title()->esc() ?></span>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php else: ?>
  <p class="empty">Aucun album pour l'instant.</p>
  <?php endif ?>

<?php snippet('footer') ?>
