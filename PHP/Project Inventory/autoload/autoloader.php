<?php

spl_autoload_register(function ($className) {
    require __DIR__. "/../$className.php";
});
