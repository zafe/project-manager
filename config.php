<?php
define("DB_HOST", "localhost");
define("DB_USR", "root");
define("DB_PASS", "");
define("DB_BASE", "bdgestion");


function __autoload($classname){    
    include "classes/".$classname.".php";
}
