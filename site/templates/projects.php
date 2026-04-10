<?php snippet('header') ?>

  <h1><?= $page->title()->esc() ?></h1>

  <?php if ($page->children()->listed()->count()): ?>
  <ul class="grid-cards">
    <?php foreach ($page->children()->listed() as $project): ?>
    <li>
      <a href="<?= $project->url() ?>">
        <?php if ($cover = $project->cover()): ?>
        <img src="<?= $cover->resize(400, 300)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
        <?php endif ?>
        <span><?= $project->title()->esc() ?></span>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php else: ?>
  <p class="empty">Aucun projet pour l'instant.</p>
  <?php endif ?>

<?php snippet('footer') ?>
