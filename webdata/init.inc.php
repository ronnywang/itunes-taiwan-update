<?php

include(__DIR__ . '/libs/pixframework/Pix/Loader.php');
set_include_path(
    __DIR__ . '/libs/pixframework'
    . PATH_SEPARATOR . __DIR__ . '/models'
);

Pix_Loader::registerAutoload();
