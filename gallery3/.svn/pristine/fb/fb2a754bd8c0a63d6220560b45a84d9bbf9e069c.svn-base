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
	<? if ($page_category == 'MyAlbum'): ?>
	  <h1><?= html::purify('My Albums') ?></h1>
	<? else: ?>
      <h1><?= html::purify($item->title) ?></h1>
	<? endif ?>
  <? if ($item->id != 1 && access::can("edit", $item)): ?>
    <img id='g-img-albumedit' width="15" height="15" alt="<?= t("Album actions")->for_html_attr() ?>"
         src="<?= $theme->url("images/canvaslogo.png") ?>" onclick='show_popup_albumeditmenu()'/>
    <ul id='g-popup-albumedit' style='display:none' onmouseout='hide_popup_albumeditmenu()'>
        <li>Edit Album</li>
        <li>Delete Album</li>
    </ul>
  <? endif ?>
</div>

<ul id="g-album-grid" class="ui-helper-clearfix">
<? if (count($children)): ?>
  <? foreach ($children as $i => $child): ?>
    <? $item_class = "g-photo"; ?>
    <? if ($child->is_album()): ?>
      <? $item_class = "g-album"; ?>
    <? endif ?>
  <li id="g-item-id-<?= $child->id ?>" class="g-item <?= $item_class ?>">
    <?= $theme->thumb_top($child) ?>
	<? if ($useShadowBox && ( $item_class === "g-photo")) : ?>
      <a href="<?= $child->file_url() ?>" class="g-fullsize-link" rel="shadowbox[<?= $item->parent()->title ?>]" title="<?= html::purify($child->title) ?>">
    <? elseif ($useMagicPop && ( $item_class === "g-photo")) : ?>
          <a href="<?= $child->file_url() ?>" class="g-magicpop-link" rel="<?= html::purify($child->description) ?>" title="<?= html::purify($child->title) ?>">
    <? else: ?>
    <a href="<?= $child->url() ?>">
	<? endif ?>
      <? if ($child->has_thumb()): ?>
      <?= $child->thumb_img(array("class" => "g-thumbnail")) ?>
      <? endif ?>
    </a>
    <?= $theme->thumb_bottom($child) ?>
    <?= $theme->context_menu($child, "#g-item-id-{$child->id} .g-thumbnail") ?>
    <h2><span class="<?= $item_class ?>"></span>
	<? if ($useShadowBox && ($item_class === "g-photo")) : ?>
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($child->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
    <? else: ?>
    <a href="<?= $child->url() ?>">
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($child->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
      
	 </a>
	<? endif ?>
    </h2>
    <ul class="g-metadata">
      <?= $theme->thumb_info($child) ?>
    </ul>
  </li>
  <? endforeach ?>
<? else: ?>
  <? if ($user->admin || access::can("add", $item)): ?>
  <? $addurl = url::site("uploader/index/$item->id") ?>
  <li><?= t("There aren't any photos here yet! <a %attrs>Add some</a>.",
            array("attrs" => html::mark_clean("href=\"$addurl\" class=\"g-dialog-link\""))) ?></li>
  <? else: ?>
  <li><?= t("There aren't any photos here yet!") ?></li>
  <? endif; ?>
<? endif; ?>
</ul>
<?= $theme->album_bottom() ?>

<?= $theme->paginator() ?>
