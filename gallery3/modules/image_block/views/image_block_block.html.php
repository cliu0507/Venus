<?php defined("SYSPATH") or die("No direct script access.") ?>
<? foreach ($items as $item): ?>
<div class="g-image-block">
  <a href="<?= url::site("image_block/random/" . $item->id); ?>">
   <?= $item->thumb_img(array("class" => "g-thumbnail")) ?>
  </a>
  <br>
  <ul class="g-metadata">
    <?= $theme->thumb_info($item) ?>
  </ul>	
</div>
<? endforeach ?>
