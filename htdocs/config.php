<?
@define("DB_HOST", "hdm-062.hichina.com");	
@define("DB_USER", "hdm0620114");
@define("DB_PWD" , "lyu66559033");	
@define("DB_NAME", "hdm0620114_db");


@define("WE_ROOT", dirname(__FILE__) . "/");			
@define("WE_CLASS_DIR", WE_ROOT . "class/");	
// about smarty
@define("WE_TEMPLATE_DIR", WE_ROOT . "../templates/");	
@define("WE_COMPILE_DIR", WE_ROOT . "../templates_c/");	
@define("WE_CONFIG_DIR", WE_ROOT . "../configs/");	
@define("WE_CACHE_DIR", WE_ROOT . "../cache/");

// 用户模式：当true:有缓存;false:无缓存
@define("USE_MOD", true);
// if (defined("USE_SMT")) 
// {
// 	$_CONFIG['template_dir']			= CMS_TEMPLATE_PATH;
// 	$_CONFIG['smarttemplate_compiled']	= CMS_TEMP;
// 	$_CONFIG['smarttemplate_cache']		= CMS_TEMP;
// 	$_CONFIG['cache_lifetime']			= 30*60*60*24;
// }

@define("APP_NAME", "WELIFEMALL");

?>