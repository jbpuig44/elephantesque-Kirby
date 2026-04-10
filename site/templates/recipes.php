<?php snippet('header') ?>

  <h1><?= $page->title()->esc() ?></h1>

  <ul class="recipes-list">
    <?php foreach ($page->children()->listed() as $recipe): ?>
    <li>
      <a href="<?= $recipe->url() ?>"><?= $recipe->title()->esc() ?></a>
    </li>
    <?php endforeach ?>
  </ul>

<?php snippet('footer') ?>
