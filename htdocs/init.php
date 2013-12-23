<?

require_once(dirname(__FILE__) . "/config.php");

require_once(WE_ROOT . "/function.php");
// add class
require_once(WE_CLASS_DIR . "/class.db.php");
require_once(WE_CLASS_DIR . "/class.admin.php");
require_once(WE_CLASS_DIR . "/class.address.php");
require_once(WE_CLASS_DIR . "/class.food.php");
require_once(WE_CLASS_DIR . "/class.order.php");
require_once(WE_CLASS_DIR . "/class.phone.php");
require_once(WE_CLASS_DIR . "/class.user.php");

require_once(WE_ROOT . "/libs/Smarty.class.php");
//自动加载
// function WEClassAutoload($classname)
// {
//     //Can't use __DIR__ as it's only in PHP 5.3+
//     $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'class.'.strtolower($classname).'.php';
//     if (is_readable($filename)) {
//         require $filename;
//     }
// }

// if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
//     //SPL autoloading was introduced in PHP 5.1.2
//     if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
//         spl_autoload_register('WEClassAutoload', true, true);
//     } else {
//         spl_autoload_register('WEClassAutoload');
//     }
// } else {
//     /**
//      * Fall back to traditional autoload for old PHP versions
//      * @param string $classname The name of the class to load
//      */
//     function __autoload($classname)
//     {
//         WEClassAutoload($classname);
//     }
// }

$db	 = new db(DB_HOST,DB_USER,DB_PWD,DB_NAME);
?>