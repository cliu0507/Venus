<?php defined("SYSPATH") or die("No direct script access.") ?>
<? if (comment::can_comment()): ?>
<div>
<a href="<?= url::site("form/add/comments/{$item->id}") ?>#comment-form" id="g-add-comment"
   class="g-button ui-corner-all ui-icon-left ui-state-default" style="right:80px;height:25px;">
  <span class="ui-icon ui-icon-comment"></span>
  <?= t("Add a comment") ?>
</a>
<div align="left" class="g-rating-block">
    <div class="tooltip" style="position:absolute;">
        <span class="ilikethis">
        I like this
        </span>
    </div>
    <div class="tooltip2" style="position:absolute;">
        <span class="idislikethis">
        I dislike this
        </span>
    </div>
</div>
<div id="g-rating-buttons" class="g-button ui-corner-all ui-state-default">
<button type="button" class="like_button" onclick="vote('like', <?= "{$item->id}" ?>);" id="like" >
	<img src="<?= url::file("modules/comment/images/pixel-vfl73.gif"); ?>" alt=""> 
</button>
<button  type="button" class="dislike_button" onclick="vote('dislike', <?= "{$item->id}" ?>);" id="dislike" >
<img src="<?= url::file("modules/comment/images/pixel-vfl73.gif"); ?>" alt=""> 
</button> 
</div>
</div>

<? endif ?>

<div id="g-comment-detail">
  <? if (!$comments->count()): ?>
  <p class="g-no-comments">
    <?= t("No comments yet.") ?>
   </p>
  <ul>
    <li class="g-no-comments">&nbsp;</li>
  </ul>
  <? endif ?>

  <? if ($comments->count()): ?>
  <ul>
    <? foreach ($comments as $comment): ?>
    <li id="g-comment-<?= $comment->id ?>">
      <p class="g-author">
        <? if ($comment->author()->guest): ?>
        <?= t('%date %name said',
            array("date" => gallery::date_time($comment->created),
                  "name" => html::clean($comment->author_name()))); ?>
        <? else: ?>
        <?= t('%date <a href="%url">%name</a> said',
              array("date" => gallery::date_time($comment->created),
                    "url" => user_profile::url($comment->author_id),
                    "name" => html::clean($comment->author_name()))); ?>
        <? endif ?>
      </p>
      <div>
        <?= nl2br(html::purify($comment->text)) ?>
      </div>
    </li>
    <? endforeach ?>
  </ul>
  <? endif ?>
  <a name="comment-form" id="g-comment-form-anchor"></a>
</div>
