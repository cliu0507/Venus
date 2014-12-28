<?php defined("SYSPATH") or die("No direct script access.") ?>
<ul>
  <? foreach ($tags as $tag): ?>
  <li class="size<?=(int)(3) /* [dfw]: all size to be 5 since now cloud only contain item associated tags */?>">
    <span><?= $tag->count ?> photos are tagged with </span>
    <a href="<?= $tag->url() ?>"><?= html::clean($tag->name) ?></a>
  </li>
  <? endforeach ?>
</ul>
