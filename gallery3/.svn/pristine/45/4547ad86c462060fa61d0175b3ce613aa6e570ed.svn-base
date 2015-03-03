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

<? endif ?>

<? // @todo Set hover on AlbumGrid list items for guest users ?>
<div id="g-info">
  <?= $theme->album_top() ?>
  <? if ($theme->page_category != "myChallenge"): ?>
    <h1>Fashion Challenges</h1>
  <? else: ?>
    <h1>My Challenges</h1>
  <? endif ?>	
</div>

<ul id="g-album-grid" class="ui-helper-clearfix">
<? if (count($children)): ?>
  <? foreach ($children as $child): ?>
    <? $item_class = "g-album"; ?>
    <? $left_album = $child->left_album(); ?>
    <? $right_album = $child->right_album(); ?>

  <li id="g-item-id-<?= $left_album->id ?>" class="g-item <?= $item_class ?>">
    <?= $theme->thumb_top($left_album) ?>
    <a href="<?= $left_album->url() ?>">
      <? if ($left_album->has_thumb()): ?>
      <?= $left_album->thumb_img(array("class" => "g-thumbnail")) ?>
      <? endif ?>
    </a>
    <?= $theme->thumb_bottom($left_album) ?>
	<?= $theme->context_menu_challenge($child->id, $left_album, "#g-item-id-{$left_album->id} .g-thumbnail") ?>
    <h2><span class="<?= $item_class ?>"></span>
    <a href="<?= $left_album->url() ?>">
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($left_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
      
	 </a>
    </h2>
    <ul class="g-metadata">
      <?= $theme->thumb_info($left_album) ?>
    </ul>
  </li>
  <li id="g-item-id-<?= $left_album->id ?>" class="g-item">
	<div>
	<button type="button" class="like_button" onclick="voteChallenge('Left', <?= "{$child->id}" ?>, <?= "{$left_album->id}" ?>);" id="voteLeft-<?= $child->id ?>" style="float:left" >
		<img src="<?= url::file("modules/comment/images/pixel-vfl73.gif"); ?>" alt=""> 
	</button>	  
    <span id="challengeVote-<?= $child->id ?>"><?= t($child->left_album_vote . " votes VS " . $child->right_album_vote) . " votes"?></span>
	<button type="button" class="like_button" onclick="voteChallenge('Right', <?= "{$child->id}" ?>, <?= "{$right_album->id}" ?>);" id="voteRight-<?= $child->id ?>" style="float:right" >
		<img src="<?= url::file("modules/comment/images/pixel-vfl73.gif"); ?>" alt=""> 
	</button>
	</div>
  </li>
  <li id="g-item-id-<?= $right_album->id ?>" class="g-item <?= $item_class ?>">
    <?= $theme->thumb_top($right_album) ?>
    <a href="<?= $right_album->url() ?>">
      <? if ($right_album->has_thumb()): ?>
      <?= $right_album->thumb_img(array("class" => "g-thumbnail")) ?>
      <? endif ?>
    </a>
    <?= $theme->thumb_bottom($right_album) ?>
    <?= $theme->context_menu_challenge($child->id, $right_album, "#g-item-id-{$right_album->id} .g-thumbnail") ?>
    <h2><span class="<?= $item_class ?>"></span>
    <a href="<?= $right_album->url() ?>">
              <? // limit the title length to something reasonable (defaults to 15) ?>
              <?= html::purify(text::limit_chars($right_album->title,
                    module::get_var("gallery", "visible_title_length"))) ?>
      
	 </a>
    </h2>
    <ul class="g-metadata">
      <?= $theme->thumb_info($right_album) ?>
    </ul>
  </li>
  <? endforeach ?>
<? endif; ?>
</ul>
<?= $theme->album_bottom() ?>

<?= $theme->paginator() ?>
