<?php snippet('header') ?>

  <article class="project">
    <h1><?= $page->title()->esc() ?></h1>

    <?php if ($page->text()->isNotEmpty()): ?>
    <div class="project-text">
      <?= $page->text()->kt() ?>
    </div>
    <?php endif ?>

    <?php if ($page->images()->count()): ?>
    <ul class="project-gallery">
      <?php foreach ($page->images() as $image): ?>
      <li>
        <img src="<?= $image->resize(800)->url() ?>" alt="<?= $image->alt()->esc() ?>">
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

    <nav class="recipe-back">
      <a href="<?= $page->parent()->url() ?>">← Tous les projets</a>
    </nav>
  </article>

<?php snippet('footer') ?>
