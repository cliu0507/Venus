<?php defined("SYSPATH") or die("No direct script access.") ?>
<ul>
  <? foreach ($tags as $tag): ?>
  <? if ($page_tag == $tag->id): ?>
  <li class="size<?=(int)(4) /* [dfw]: all size to be 5 since now cloud only contain item associated tags */?>">
  <? else: ?>
  <li class="size<?=(int)(3) /* [dfw]: all size to be 5 since now cloud only contain item associated tags */?>">
  <? endif ?>  
    <span><?= $tag->count ?> photos are tagged with </span>
	<a href="<?= url::site("albums/fshow/" . $page_sort . "/" . $page_category . "/" . $tag->id) ?>"><?= html::clean($tag->name) ?></a>
  </li>
  <? endforeach ?>
</ul>
