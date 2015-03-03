<?php defined("SYSPATH") or die("No direct script access.") ?>
<? if ($theme->page_category == "dresssearch"): ?>
  <?= $theme->uploaded_img($theme->uploaded_file, array("class" => "g-thumbnail")) ?>
<? else: ?>
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
<? endif ?>
