<?php defined("SYSPATH") or die("No direct script access."); 
$album_length	= module::get_var("text_truncate", "album");
$sidebar_length	= module::get_var("text_truncate", "sidebar");
$photo_length	= module::get_var("text_truncate", "photo");
$comment_length	= module::get_var("text_truncate", "comment");
$m				= t('more...');
$l				= t('less');
?>
<? if ($theme->item->is_album()) { ?>
<!-- Truncate album decription -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.g-description').truncate({max_length: <?= $album_length ?>,more: "<?= $m ?>", less: "<?= $l ?>"});
    });
  </script>
<? } else if ($theme->item->is_photo()) { ?>
<!-- Truncate photo description -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#g-info').truncate({max_length: <?= $photo_length ?>,more: "<?= $m ?>", less: "<?= $l ?>"});
	  $('#g-comment-detail div').truncate({max_length: <?= $comment_length ?>,more: "<?= $m ?>", less: "<?= $l ?>"});
    });
  </script>
<? } ?>
<!-- Truncate sidebar description -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('ul.g-metadata>li:contains("<?= t('Description:') ?>")').truncate({max_length: <?= $sidebar_length ?>,more: "<?= $m ?>", less: "<?= $l ?>"});
    });
  </script>

