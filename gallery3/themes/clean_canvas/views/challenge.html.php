<?php defined("SYSPATH") or die("No direct script access.") ?>

<? $useShadowBox = ( module::is_active("shadowbox") && module::get_var("theme_clean_canvas", "use_shadowbox_instead_photopage") )?>

<? if ( $useShadowBox ) : ?>
<!-- Use javascript to show the full size as an overlay on the current page -->
<script type="text/javascript">
Shadowbox.init({
    handleOversize: "resize",
    viewportPadding: 5
});
</script>

<? else : ?>
<!-- [dfw]: use magnific popup to show photo -->
<? $useMagicPop = TRUE ?>

<script type="text/javascript">
 function show_popup_albumeditmenu(){
   document.getElementById("g-popup-albumedit").style.display="block";
 }
 function hide_popup_albumeditmenu(){
   document.getElementById("g-popup-albumedit").style.display="none";
 }
</script>
<? endif ?>

<? // @todo Set hover on AlbumGrid list items for guest users ?>
<div id="g-info">
  <?= $theme->album_top() ?>
  <h1>Fashion Challenges</h1>
</div>

<ul id="g-album-grid" class="ui-helper-clearfix">
<? if (count($children)): ?>
  <? foreach ($children as $child): ?>
    <? $item_class = "g-photo"; ?>
    <? $left_album = $child->left_album(); ?>
    <? $right_album = $child->right_album(); ?>

  <li id="g-item-id-<?= $left_album->id ?>" class="g-item <?= $item_class ?>">
    <?= $theme->thumb_top($left_album) ?>
	<? if ($useShadowBox && ( $item_class === "g-photo")) : ?>
      <a href="<?= $left_album->file_url() ?>" class="g-fullsize-link" rel="shadowbox[<?= $item->parent()->title ?>]" title="<?= html::purify($left_album->title) ?>">
    <? elseif ($useMagicPop && ( $item_class === "g-photo")) : ?>
          <a href="<?= $left_album->file_url() ?>" class="g-magicpop-link" rel="<?= html::purify($left_album->description) ?>" title="<?= html::purify($left_album->title) ?>">
    <? else: ?>
    <a href="<?= $left_album->url() ?>">
	<? endif ?>
      <? if ($left_album->has_thumb()): ?>
      <?= $left_album->thumb_img(array("class" => "g-thumbnail")) ?>
      <? endif ?>
    </a>
    <?= $theme->thumb_bottom($left_album) ?>
    <? //=$theme->context_menu($left_album, "#g-item-id-{$left_album->id} .g-thumbnail") ?>
    <h2><span class="<?= $item_class ?>"></span>
	<? if ($useShadowBox && ($item_class === "g-photo")) : ?>
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($left_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
    <? else: ?>
    <a href="<?= $left_album->url() ?>">
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($left_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
      
	 </a>
	<? endif ?>
    </h2>
    <ul class="g-metadata">
      <?= $theme->thumb_info($left_album) ?>
    </ul>
  </li>
  <li id="g-item-id-<?= $left_album->id ?>" class="g-item">
    VS
  </li>
  <li id="g-item-id-<?= $right_album->id ?>" class="g-item <?= $item_class ?>">
    <?= $theme->thumb_top($right_album) ?>
	<? if ($useShadowBox && ( $item_class === "g-photo")) : ?>
      <a href="<?= $right_album->file_url() ?>" class="g-fullsize-link" rel="shadowbox[<?= $item->parent()->title ?>]" title="<?= html::purify($right_album->title) ?>">
    <? elseif ($useMagicPop && ( $item_class === "g-photo")) : ?>
          <a href="<?= $right_album->file_url() ?>" class="g-magicpop-link" rel="<?= html::purify($right_album->description) ?>" title="<?= html::purify($right_album->title) ?>">
    <? else: ?>
    <a href="<?= $right_album->url() ?>">
	<? endif ?>
      <? if ($right_album->has_thumb()): ?>
      <?= $right_album->thumb_img(array("class" => "g-thumbnail")) ?>
      <? endif ?>
    </a>
    <?= $theme->thumb_bottom($right_album) ?>
    <? //=$theme->context_menu($right_album, "#g-item-id-{$right_album->id} .g-thumbnail") ?>
    <h2><span class="<?= $item_class ?>"></span>
	<? if ($useShadowBox && ($item_class === "g-photo")) : ?>
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($right_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
    <? else: ?>
    <a href="<?= $right_album->url() ?>">
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($right_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
      
	 </a>
	<? endif ?>
    </h2>
    <ul class="g-metadata">
      <?= $theme->thumb_info($right_album) ?>
    </ul>
  </li>
  <? endforeach ?>
<? endif; ?>
</ul>
<? //= $theme->album_bottom() ?>

<? //= $theme->paginator() ?>
