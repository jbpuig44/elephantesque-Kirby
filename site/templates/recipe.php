<?php snippet('header') ?>

  <article class="recipe">
    <h1><?= $page->title()->esc() ?></h1>

    <?php if ($page->tested()->isFalse()): ?>
    <p class="recipe-untested">⚠️ Recette non encore testée</p>
    <?php endif ?>

    <?php if ($cover = $page->cover()->toFile()): ?>
    <figure class="recipe-cover">
      <img src="<?= $cover->resize(1200)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
    </figure>
    <?php endif ?>

    <?php if ($page->time()->isNotEmpty() || $page->servings()->isNotEmpty()): ?>
    <ul class="recipe-meta">
      <?php if ($page->time()->isNotEmpty()): ?>
      <li><span class="recipe-meta-label">Temps</span> <?= $page->time()->esc() ?></li>
      <?php endif ?>
      <?php if ($page->servings()->isNotEmpty()): ?>
      <li><span class="recipe-meta-label">Portions</span> <?= $page->servings()->esc() ?></li>
      <?php endif ?>
    </ul>
    <?php endif ?>

    <?php if ($page->intro()->isNotEmpty()): ?>
    <div class="recipe-intro"><?= $page->intro()->kt() ?></div>
    <?php endif ?>

    <section class="recipe-ingredients">
      <h2>Ingrédients</h2>
      <?= $page->ingredients()->kt() ?>
    </section>

    <section class="recipe-steps">
      <h2>Préparation</h2>
      <?= $page->steps()->kt() ?>
    </section>

    <nav class="recipe-back">
      <a href="<?= $page->parent()->url() ?>">← Toutes les recettes</a>
    </nav>
  </article>

<?php snippet('footer') ?>
