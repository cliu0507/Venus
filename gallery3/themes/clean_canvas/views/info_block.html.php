<?php defined("SYSPATH") or die("No direct script access.") ?>
<ul class="g-metadata">
  <? if ($item->id == 1): ?>
  <li>
    <strong class="caption"><?= t("") ?></strong>
     <?= nl2br(html::purify($item->description)) ?>
  </li>
  <? else: ?>
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
  <? endif ?>
</ul>
