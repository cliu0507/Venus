<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-12-22 00:52:53 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:53:05 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:53:06 +00:00 --- error: ErrorException [ 0 ]: stream_socket_client(): unable to connect to tcp://localhost:9117 (Connection refused)
/home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php [ 78 ]
#0 [internal function]: gallery_error_Core::error_handler(2, 'stream_socket_c...', '/home/wtfm2000/...', 78, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php(78): stream_socket_client('tcp://localhost...', 111, 'Connection refu...', 30)
#2 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/quick.php(101): dresssearch_Core::remove_photo(Object(Item_Model))
#3 [internal function]: Quick_Controller->delete('61')
#4 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Quick_Controller), Array)
#5 [internal function]: Kohana_Core::instance(NULL)
#6 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#7 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#8 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#9 {main}
2014-12-22 00:54:42 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:54:43 +00:00 --- error: ErrorException [ 0 ]: stream_socket_client(): unable to connect to tcp://localhost:9117 (Connection refused)
/home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php [ 78 ]
#0 [internal function]: gallery_error_Core::error_handler(2, 'stream_socket_c...', '/home/wtfm2000/...', 78, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php(78): stream_socket_client('tcp://localhost...', 111, 'Connection refu...', 30)
#2 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/quick.php(101): dresssearch_Core::remove_photo(Object(Item_Model))
#3 [internal function]: Quick_Controller->delete('61')
#4 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Quick_Controller), Array)
#5 [internal function]: Kohana_Core::instance(NULL)
#6 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#7 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#8 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#9 {main}
2014-12-22 00:54:47 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:54:49 +00:00 --- error: fopen(/home/wtfm2000/share/src/gallery3/var/modules/ratings/db.settings.php): failed to open stream: No such file or directory
#0 [internal function]: gallery_error_Core::error_handler(2, 'fopen(/home/wtf...', '/home/wtfm2000/...', 11, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings_db.php(11): fopen('/home/wtfm2000/...', 'w')
#2 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(56): include('/home/wtfm2000/...')
#3 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(90): RabidRatings->configuration()
#4 /home/wtfm2000/share/src/gallery3/modules/ratings/views/ratings_block.html.php(51): RabidRatings->RabidRatings()
#5 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#6 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#7 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#8 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#9 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/block.html.php(8): View_Core->__toString()
#10 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#11 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#12 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#13 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#14 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Block.php(28): View_Core->__toString()
#15 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/block_manager.php(116): Block_Core->__toString()
#16 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Theme_View.php(182): block_manager_Core::get_html('site_sidebar', Object(Theme_View))
#17 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/sidebar.html.php(15): Theme_View_Core->sidebar_blocks()
#18 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#19 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#20 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#21 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#22 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/page.html.php(200): View_Core->__toString()
#23 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#24 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#25 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#26 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#27 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/albums.php(77): View_Core->__toString()
#28 [internal function]: Albums_Controller->show(Object(Item_Model))
#29 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Albums_Controller), Array)
#30 [internal function]: Kohana_Core::instance(NULL)
#31 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#32 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#33 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#34 {main}
2014-12-22 00:54:49 +00:00 --- error: fopen(/home/wtfm2000/share/src/gallery3/var/modules/ratings/db.settings.php): failed to open stream: No such file or directory
#0 [internal function]: gallery_error_Core::error_handler(2, 'fopen(/home/wtf...', '/home/wtfm2000/...', 11, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings_db.php(11): fopen('/home/wtfm2000/...', 'w')
#2 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(56): include('/home/wtfm2000/...')
#3 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(90): RabidRatings->configuration()
#4 /home/wtfm2000/share/src/gallery3/modules/ratings/views/ratings_block.html.php(51): RabidRatings->RabidRatings()
#5 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#6 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#7 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#8 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#9 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/block.html.php(8): View_Core->__toString()
#10 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#11 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#12 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#13 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#14 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Block.php(28): View_Core->__toString()
#15 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/block_manager.php(116): Block_Core->__toString()
#16 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Theme_View.php(182): block_manager_Core::get_html('site_sidebar', Object(Theme_View))
#17 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/sidebar.html.php(15): Theme_View_Core->sidebar_blocks()
#18 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#19 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#20 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#21 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#22 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/page.html.php(200): View_Core->__toString()
#23 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#24 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#25 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#26 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#27 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/albums.php(77): View_Core->__toString()
#28 [internal function]: Albums_Controller->show(Object(Item_Model))
#29 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Albums_Controller), Array)
#30 [internal function]: Kohana_Core::instance(NULL)
#31 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#32 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#33 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#34 {main}
2014-12-22 00:55:18 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:55:20 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:55:22 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:55:26 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:55:30 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:56:02 +00:00 --- error: fopen(/home/wtfm2000/share/src/gallery3/var/modules/ratings/db.settings.php): failed to open stream: No such file or directory
#0 [internal function]: gallery_error_Core::error_handler(2, 'fopen(/home/wtf...', '/home/wtfm2000/...', 11, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings_db.php(11): fopen('/home/wtfm2000/...', 'w')
#2 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(56): include('/home/wtfm2000/...')
#3 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(90): RabidRatings->configuration()
#4 /home/wtfm2000/share/src/gallery3/modules/ratings/views/ratings_block.html.php(51): RabidRatings->RabidRatings()
#5 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#6 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#7 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#8 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#9 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/block.html.php(8): View_Core->__toString()
#10 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#11 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#12 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#13 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#14 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Block.php(28): View_Core->__toString()
#15 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/block_manager.php(116): Block_Core->__toString()
#16 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Theme_View.php(182): block_manager_Core::get_html('site_sidebar', Object(Theme_View))
#17 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/sidebar.html.php(15): Theme_View_Core->sidebar_blocks()
#18 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#19 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#20 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#21 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#22 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/page.html.php(200): View_Core->__toString()
#23 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#24 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#25 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#26 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#27 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/albums.php(77): View_Core->__toString()
#28 [internal function]: Albums_Controller->show(Object(Item_Model))
#29 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Albums_Controller), Array)
#30 [internal function]: Kohana_Core::instance(NULL)
#31 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#32 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#33 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#34 {main}
2014-12-22 00:56:02 +00:00 --- error: fopen(/home/wtfm2000/share/src/gallery3/var/modules/ratings/db.settings.php): failed to open stream: No such file or directory
#0 [internal function]: gallery_error_Core::error_handler(2, 'fopen(/home/wtf...', '/home/wtfm2000/...', 11, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings_db.php(11): fopen('/home/wtfm2000/...', 'w')
#2 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(56): include('/home/wtfm2000/...')
#3 /home/wtfm2000/share/src/gallery3/modules/ratings/vendor/ratings.php(90): RabidRatings->configuration()
#4 /home/wtfm2000/share/src/gallery3/modules/ratings/views/ratings_block.html.php(51): RabidRatings->RabidRatings()
#5 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#6 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#7 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#8 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#9 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/block.html.php(8): View_Core->__toString()
#10 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#11 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#12 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#13 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#14 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Block.php(28): View_Core->__toString()
#15 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/block_manager.php(116): Block_Core->__toString()
#16 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Theme_View.php(182): block_manager_Core::get_html('site_sidebar', Object(Theme_View))
#17 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/sidebar.html.php(15): Theme_View_Core->sidebar_blocks()
#18 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#19 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#20 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#21 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#22 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/page.html.php(200): View_Core->__toString()
#23 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(318): include('/home/wtfm2000/...')
#24 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(260): View_Core->load_view('/home/wtfm2000/...', Array)
#25 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#26 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(226): View->render()
#27 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/albums.php(77): View_Core->__toString()
#28 [internal function]: Albums_Controller->show(Object(Item_Model))
#29 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Albums_Controller), Array)
#30 [internal function]: Kohana_Core::instance(NULL)
#31 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#32 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#33 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#34 {main}
2014-12-22 00:57:56 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:58:29 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:58:31 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:58:33 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:58:35 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:58:46 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:59:19 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 00:59:32 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 01:00:39 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 01:00:42 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 01:00:43 +00:00 --- error: ErrorException [ 0 ]: stream_socket_client(): unable to connect to tcp://localhost:9117 (Connection refused)
/home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php [ 78 ]
#0 [internal function]: gallery_error_Core::error_handler(2, 'stream_socket_c...', '/home/wtfm2000/...', 78, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/dresssearch.php(78): stream_socket_client('tcp://localhost...', 111, 'Connection refu...', 30)
#2 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/quick.php(101): dresssearch_Core::remove_photo(Object(Item_Model))
#3 [internal function]: Quick_Controller->delete('61')
#4 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Quick_Controller), Array)
#5 [internal function]: Kohana_Core::instance(NULL)
#6 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#7 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#8 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#9 {main}
2014-12-22 02:06:21 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-12-22 02:06:22 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.