<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-11-23 18:17:58 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:18:21 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:19:32 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:19:34 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:19:38 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:01 +00:00 --- error: @todo ITEM_ALREADY_ADDED 11
#0 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/gallery_event.php(122): access_Core::add_item(Object(Item_Model))
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/module.php(402): gallery_event_Core::item_created(Object(Item_Model))
#2 /home/wtfm2000/share/src/gallery3/modules/gallery/models/item.php(416): module_Core::event('item_created', Object(Item_Model))
#3 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/uploader.php(75): Item_Model_Core->save()
#4 [internal function]: Uploader_Controller->add_photo('1')
#5 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Uploader_Controller), Array)
#6 [internal function]: Kohana_Core::instance(NULL)
#7 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#8 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#9 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#10 {main}
2014-11-23 18:24:06 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:16 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:22 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:28 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:28 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:28 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:45 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:58 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:24:45 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:25:12 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:25:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:25:14 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:25:50 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:27:44 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:27:48 +00:00 --- error: fsockopen(): php_network_getaddresses: getaddrinfo failed: Name or service not known in /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/MY_remote.php at line 74:
#0 [internal function]: gallery_error_Core::error_handler(2, 'fsockopen(): ph...', '/home/wtfm2000/...', 74, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/MY_remote.php(74): fsockopen('galleryproject....', 80, 0, 'php_network_get...', 5)
#2 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/upgrade_checker.php(57): remote::do_request('http://galleryp...')
#3 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/admin_upgrade_checker.php(23): upgrade_checker_Core::fetch_version_info()
#4 [internal function]: Admin_Upgrade_Checker_Controller->check_now()
#5 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/admin.php(62): call_user_func_array(Array, Array)
#6 [internal function]: Admin_Controller->__call('upgrade_checker', Array)
#7 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Admin_Controller), Array)
#8 [internal function]: Kohana_Core::instance(NULL)
#9 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#10 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#11 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#12 {main}
2014-11-23 18:27:48 +00:00 --- error: ErrorException [ 0 ]: Undefined property: stdClass::$data
/home/wtfm2000/share/src/gallery3/modules/gallery/helpers/upgrade_checker.php [ 86 ]
#0 /home/wtfm2000/share/src/gallery3/modules/gallery/helpers/upgrade_checker.php(86): gallery_error_Core::error_handler(8, 'Undefined prope...', '/home/wtfm2000/...', 86, Array)
#1 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/admin_upgrade_checker.php(24): upgrade_checker_Core::get_upgrade_message()
#2 [internal function]: Admin_Upgrade_Checker_Controller->check_now()
#3 /home/wtfm2000/share/src/gallery3/modules/gallery/controllers/admin.php(62): call_user_func_array(Array, Array)
#4 [internal function]: Admin_Controller->__call('upgrade_checker', Array)
#5 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Admin_Controller), Array)
#6 [internal function]: Kohana_Core::instance(NULL)
#7 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#8 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#9 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#10 {main}
2014-11-23 18:31:47 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:31:48 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:34:13 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:34:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:17 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:34:19 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:19 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:17 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:34:20 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:20 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:20 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:20 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:20 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:20 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:20 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:20 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:20 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:20 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:20 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:24 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:21 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:34:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:34:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:34:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:41:39 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:17 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:17 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:17 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:17 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:22 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:22 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:22 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:22 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:20 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:22 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:22 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:20 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:23 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:23 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:23 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:23 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:23 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:23 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:23 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:23 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:23 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:23 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:23 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:23 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:26 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:26 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:26 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:26 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:26 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:26 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:26 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:27 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:27 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:27 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:24 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:27 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:27 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:27 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:27 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:27 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:27 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:45:27 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:45:27 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:45:28 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:45:33 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:46:45 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:45 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:45 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:50 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:48 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:46:50 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:48 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:46:50 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:50 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:51 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:51 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:51 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:51 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:54 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:54 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:54 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:54 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:54 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:54 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:54 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:54 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:52 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:46:54 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:54 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:54 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:54 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:55 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:55 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:55 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:46:55 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:46:55 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:46:55 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:08 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:50:09 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:09 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:09 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:09 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:11 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:14 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:14 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:14 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:18 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:15 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:50:18 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:18 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:18 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:18 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:18 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:18 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:18 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:18 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:18 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:18 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:18 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:18 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:18 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:18 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:19 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:50:19 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:50:19 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:50:26 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:50:26 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:25 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:27 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:32 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:53:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:53:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:53:36 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:53:36 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:55:01 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:01 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:01 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:06 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:06 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:06 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:06 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:06 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:06 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:06 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:06 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:04 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:04 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:55:06 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:07 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:07 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:07 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:07 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:10 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:10 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:10 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:10 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:10 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:10 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:10 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:10 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:10 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:10 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:10 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:10 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:08 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:55:10 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:11 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:55:11 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:11 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:11 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:55:11 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:55:16 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:56:25 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:56:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:26 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:56:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:30 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:30 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:30 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:31 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:31 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:31 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:31 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:31 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:31 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:31 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:31 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:31 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:31 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:31 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:31 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:32 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:36 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 18:56:36 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 18:56:45 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 18:56:45 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 19:06:25 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:06:25 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:06:25 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:07:49 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:07:49 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:07:49 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:16:17 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:16:17 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:16:17 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:26:35 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:26:35 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:26:35 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:27:03 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:27:03 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:27:03 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:29:13 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:29:13 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:29:13 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:29:45 +00:00 --- error: date.timezone setting not detected in /etc/php5/apache2/php.ini falling back to UTC.  Consult http://php.net/manual/function.get-cfg-var.php for help.
2014-11-23 19:29:47 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php [ 30 ]
#0 [internal function]: Rest_Controller->index()
#1 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#2 [internal function]: Kohana_Core::instance(NULL)
#3 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#4 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#5 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#6 {main}
2014-11-23 19:29:47 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:29:47 +00:00 --- error: Rest error details: Array
(
)

2014-11-23 19:30:32 +00:00 --- error: Rest_Exception [ 403 ]: Forbidden
/home/wtfm2000/share/src/gallery3/modules/rest/helpers/rest.php [ 75 ]
#0 /home/wtfm2000/share/src/gallery3/modules/rest/controllers/rest.php(98): rest_Core::set_active_user(NULL)
#1 [internal function]: Rest_Controller->__call('item', Array)
#2 /home/wtfm2000/share/src/gallery3/system/core/Kohana.php(331): ReflectionMethod->invokeArgs(Object(Rest_Controller), Array)
#3 [internal function]: Kohana_Core::instance(NULL)
#4 /home/wtfm2000/share/src/gallery3/system/core/Event.php(208): call_user_func_array(Array, Array)
#5 /home/wtfm2000/share/src/gallery3/application/Bootstrap.php(67): Event_Core::run('system.execute')
#6 /home/wtfm2000/share/src/gallery3/index.php(118): require('/home/wtfm2000/...')
#7 {main}
2014-11-23 19:30:32 +00:00 --- error: Missing messages entry kohana/core.errors.403 for message kohana/core
2014-11-23 19:30:32 +00:00 --- error: Rest error details: Array
(
)

