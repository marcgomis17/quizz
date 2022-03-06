<?php

// Root directory
define('ROOT', str_replace('public/index.php', "", $_SERVER['SCRIPT_FILENAME']));

//src
define('PATH_SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);

//PATH_VIEWS
define('PATH_TEMPLATES', ROOT . 'templates' . DIRECTORY_SEPARATOR);

define('PATH_VIEWS', PATH_TEMPLATES . 'views' . DIRECTORY_SEPARATOR);

//db
define('PATH_DB', ROOT . 'data' . DIRECTORY_SEPARATOR . 'db.json');

define('PATH_PUBLIC', str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));

define('WEB_ROOT', 'http://localhost:8000/');
