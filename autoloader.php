<?php
// Список файлов которые будут исключины
// List of files to exclude
$excludefiles = array(
    __DIR__."/autoloader.php",
    __DIR__."/index.php",
    __DIR__ ."/register.php",
    __DIR__ ."/welcome.php",
    __DIR__ ."/reset-password.php",
    __DIR__ ."/logout.php",
    __DIR__."/login.php"
);

// List of folders to exclude
// Список папок которые надо исключить
$excludefolders = array(
    __DIR__."/requests",
    __DIR__."/vendor"
);

autoloaderOfAllPHPFiles(__DIR__."/", $excludefiles, $excludefolders);


//Зазружает все файлы которые кроме тех которые в $excludefiles или в папках которые в $excludefolders.
// Loads all php files in project without files that are in $excludefiles array and folders that are in $excludefolders.
function autoloaderOfAllPHPFiles($path, $excludefun, $excludefol)
{
    if (count(glob($path . "*.php")) > 0){
        foreach (glob($path . "*.php") as $file){
            if (!in_array($file, $excludefun)){
                require_once str_replace(__DIR__."/", "", $file);
            }
        }
    }
    foreach (glob($path . "*", GLOB_ONLYDIR) as $foldername){
        if (!in_array($foldername, $excludefol)){
            autoloaderOfAllPHPFiles($foldername . "/", $excludefun, $excludefol);
        }
    }
}
