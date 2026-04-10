<?php snippet('header') ?>

  <article class="recipe">
    <h1><?= $page->title()->esc() ?></h1>

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
