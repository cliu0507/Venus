<?php defined("SYSPATH") or die("No direct script access.") ?>
<form action="<?= url::site("search") ?>" id="g-quick-search-form" class="g-short-form">
  <? if (isset($item)): ?>
    <? $album_id = $item->is_album() ? $item->id : $item->parent_id; ?>
  <? else: ?>
    <? $album_id = item::root()->id; ?>
  <? endif; ?>
  <ul style='vertical-align: middle; display:table-row;'>
    <!--<li><div><a ref='#'><img src='<?= url::base() . "modules/search/images/similar-dress.png"?>'/></a>&nbsp;&nbsp;&nbsp;</div></li>-->
    <li>
    <div id="g-dress-search-menu" style="visibility: hidden">
    <?
    $menu = Menu::factory("root");
    $menu->append($my_dress_search_menu = Menu::factory("submenu")
                    ->id("search_dress")
                    ->img(url::base() . "modules/search/images/similar-dress.png")
                    ->label(t("Search Dress")));
    $my_dress_search_menu->append(Menu::factory("link")
                        ->id("search_by_file")
                        ->label(t("Search by File"))
                        ->url(url::site("albums/fshow/recent/my/12")));
    $my_dress_search_menu->append(Menu::factory("link")
                        ->id("search_by_url")
                        ->label(t("Search by Url"))
                        ->url(url::site("albums/fshow/recent/my/12")));
    $my_dress_search_menu->append(Menu::factory("link")
                        ->id("search_by_photo")
                        ->label(t("Search by Photo"))
                        ->url(url::site("albums/fshow/recent/my/12")));
    ?>
    <?= $menu->render() ?>
    </div>
    <script type="text/javascript"> $(document).ready(function() { $("#g-dress-search-menu").css("visibility", "visible"); }) </script>
    </li>
    <li>
      <? if ($album_id == item::root()->id): ?>
        <label for="g-search"><?= t("Search the gallery") ?></label>
      <? else: ?>
        <label for="g-search"><?= t("Search this album") ?></label>
      <? endif; ?>
      <input type="hidden" name="album" value="<?= $album_id ?>" />
      <input type="text" name="q" id="g-search" class="text" />
    </li>
    <li>
      <input type="submit" value="<?= t("Go")->for_html_attr() ?>" class="submit" />
    </li>
  </ul>
</form>
