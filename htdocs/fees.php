<?php
 /**
 * Example Application

 * @package Example-application
 */

require 'init.php';

$smarty = new Smarty;

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);

// $smarty->testInstall();

// $smarty->force_compile = true;
// $smarty->debugging = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

$smarty->display('fees.html');
