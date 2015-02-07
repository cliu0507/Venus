<?php defined("SYSPATH") or die("No direct script access.") ?>
<? if ($item->id == 1): ?>
	<div id="g-tag-cloud">
		<ul>
		<? if ($page_sort == 'recent'): ?>
		<li class="size<?=(int)(4) ?>">
		<? else: ?>
		<li class="size<?=(int)(3) ?>">
		<? endif ?>
		<a href="<?= url::site("albums/fshow/recent/" . $page_category . "/" . $page_tag) ?>"><?= html::clean("Most recent") ?></a>
		</li>
		<? if ($page_sort == 'rating'): ?>
		<li class="size<?=(int)(4) ?>">
		<? else: ?>
		<li class="size<?=(int)(3) ?>">
		<? endif ?>		
		<a href="<?= url::site("albums/fshow/rating/" . $page_category . "/" . $page_tag) ?>"><?= html::clean("Highest rating") ?></a>
		</li>
		<? if ($page_sort == 'reviewed'): ?>
		<li class="size<?=(int)(4) ?>">
		<? else: ?>
		<li class="size<?=(int)(3) ?>">
		<? endif ?>		
		<a href="<?= url::site("albums/fshow/reviewed/" . $page_category . "/" . $page_tag) ?>"><?= html::clean("Most reviewed") ?></a>
		</li>
		</ul>
	</div>
<? else: ?>
	<ul class="g-metadata">
	  <li>
		<strong class="caption"><?= t("Title:") ?></strong>
		<?= html::purify($item->title) ?>
	  </li>
	  <li>
		<strong class="caption"><?= t("By:") ?></strong>
		<?= html::clean($item->owner->display_name()) ?>
	  </li>
	  <? if ($item->description): ?>
	  <li>
		<strong class="caption"><?= t("Description:") ?></strong>
		 <?= nl2br(html::purify($item->description)) ?>
	  </li>
	  <? endif ?>
	  <? if (!$item->is_album()): ?>
	  <li>
		<strong class="caption"><?= t("File name:") ?></strong>
		<?= html::clean($item->name) ?>
	  </li>
	  <? endif ?>
	  <? if ($item->is_album()): ?>
	  <li>
		<strong class="caption"><?= t("Number of photos:") ?></strong>
		<?= html::clean($item->viewable()->descendants_count()) ?>
	  </li>
	  <li>
		<strong class="caption"><?= t("Views:") ?></strong>
		<?= html::clean($item->view_count) ?>
	  </li>
	  <li>
		<strong class="caption"><?= t("Likes:") ?></strong>
		<?= html::clean(round($item->getLikePercentage() * 100) . '%') ?>
	  </li>
	  <li>
		<strong class="caption"><?= t("Created:") ?></strong>
		<?= date("D, d M Y H:i:s", $item->created); ?>
	  </li>
	  <? endif ?>
	  <? if ($item->captured): ?>
	  <li>
		<strong class="caption"><?= t("Captured:") ?></strong>
		<?= date("M j, Y H:i:s", $item->captured)?>
	  </li>
	  <? endif ?>
	</ul>
<? endif ?>
