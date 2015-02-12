<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-02-09 07:08:03 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 07:08:05 +00:00 --- error: Undefined variable: page_tag
#0 /home/wtfm2000/share/src/gallery3/modules/tag/views/tag_cloud.html.php(4): gallery_error_Core::error_handler(8, 'Undefined varia...', '/home/wtfm2000/...', 4, Array)
#1 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(323): include('/home/wtfm2000/...')
#2 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(264): View_Core->load_view('/home/wtfm2000/...', Array)
#3 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#4 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(230): View->render()
#5 /home/wtfm2000/share/src/gallery3/modules/tag/views/tag_block.html.php(28): View_Core->__toString()
#6 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(323): include('/home/wtfm2000/...')
#7 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(264): View_Core->load_view('/home/wtfm2000/...', Array)
#8 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#9 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(230): View->render()
#10 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/block.html.php(8): View_Core->__toString()
#11 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(323): include('/home/wtfm2000/...')
#12 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(264): View_Core->load_view('/home/wtfm2000/...', Array)
#13 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#14 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(230): View->render()
#15 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Block.php(28): View_Core->__toString()
#16 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/block_manager.php(116): Block_Core->__toString()
#17 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/Theme_View.php(183): block_manager_Core::get_html('site_sidebar', Object(Theme_View))
#18 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/sidebar.html.php(15): Theme_View_Core->sidebar_blocks()
#19 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(323): include('/home/wtfm2000/...')
#20 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(264): View_Core->load_view('/home/wtfm2000/...', Array)
#21 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#22 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(230): View->render()
#23 /home/wtfm2000/share/src/gallery3/themes/clean_canvas/views/page.html.php(191): View_Core->__toString()
#24 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(323): include('/home/wtfm2000/...')
#25 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(264): View_Core->load_view('/home/wtfm2000/...', Array)
#26 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_View.php(75): View_Core->render(false, false, false)
#27 /home/wtfm2000/share/src/gallery3/system/libraries/View.php(230): View->render()
#28 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/albums.php(81): View_Core->__toString()
#29 [internal function]: Albums_Controller->show(Object(Item_Model))
#30 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(339): ReflectionMethod->invokeArgs(Object(Albums_Controller), Array)
#31 [internal function]: Kohana_Core::instance(NULL)
#32 /home/wtfm2000/share/src/gallery3/system/core/Event.php(210): call_user_func_array(Array, Array)
#33 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#34 /home/wtfm2000/share/src/gallery3/index.php(119): require('/home/wtfm2000/...')
#35 {main}
2015-02-09 07:31:45 +00:00 --- error: File not found: form
2015-02-09 07:35:46 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 07:36:12 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 07:50:03 +00:00 --- error: ErrorException [ 0 ]: mysqli::real_escape_string() expects parameter 1 to be string, array given
/home/wtfm2000/share/src/gallery3/system/libraries/Database_Mysqli.php [ 90 ]
#0 [internal function]: gallery_error_Core::error_handler(2, 'mysqli::real_es...', '/home/wtfm2000/...', 90, Array)
#1 /home/wtfm2000/share/src/gallery3/system/libraries/Database_Mysqli.php(90): mysqli->real_escape_string(Array)
#2 /home/wtfm2000/share/src/gallery3/system/libraries/Database.php(432): Database_Mysqli_Core->escape(Array)
#3 [internal function]: Database_Core->quote(Array)
#4 /home/wtfm2000/share/src/gallery3/system/libraries/Database_Builder.php(823): array_map(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/system/libraries/Database_Builder.php(1008): Database_Builder_Core->compile_values()
#6 /home/wtfm2000/share/src/gallery3/modules/kohana23_compat/libraries/MY_Database_Builder.php(48): Database_Builder_Core->compile()
#7 /home/wtfm2000/share/src/gallery3/system/libraries/Database_Builder.php(958): Database_Builder->compile()
#8 /home/wtfm2000/share/src/gallery3/system/libraries/ORM.php(831): Database_Builder_Core->execute(Object(Database_Mysqli))
#9 /home/wtfm2000/share/src/gallery3/modules/gallery/libraries/MY_ORM.php(34): ORM_Core->save()
#10 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/log.php(84): ORM->save()
#11 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/log.php(33): log_Core::_add('cliu', Array, '', 1)
#12 /home/wtfm2000/share/src/gallery3/system/libraries/Router.php(234): log_Core::success('cliu', Array)
#13 [internal function]: Router_Core::find_uri(NULL)
#14 /home/wtfm2000/share/src/gallery3/system/core/Event.php(210): call_user_func_array(Array, Array)
#15 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(61): Event_Core::run('system.routing')
#16 /home/wtfm2000/share/src/gallery3/index.php(119): require('/home/wtfm2000/...')
#17 {main}
2015-02-09 07:50:15 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 07:54:00 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 07:59:16 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:03:00 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:03:55 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:33:23 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:35:02 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:35:58 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2015-02-09 08:40:21 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
