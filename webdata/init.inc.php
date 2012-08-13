<?php

include(__DIR__ . '/libs/pixframework/Pix/Loader.php');
set_include_path(
    __DIR__ . '/libs/pixframework'
    . PATH_SEPARATOR . __DIR__ . '/models'
);

Pix_Loader::registerAutoload();

if (file_exists(__DIR__ . '/config.php')) {
    include(__DIR__ . '/config.php');
} else {
    if (getenv('DATABASE_URL')) {
        if (preg_match('#postgres://([^:]*):([^@]*)@([^/]*)/(.*)#', strval(getenv('DATABASE_URL')), $matches)) {
            $user = $matches[1];
            $pass = $matches[2];
            $host = $matches[3];
            $dbname = $matches[4];
            Pix_Table::setDefaultDb(new Pix_Table_Db_Adapter_PgSQL(array('user' => $user, 'password' => $pass, 'host' => $host, 'dbname' => $dbname)));
        }
    }
}
