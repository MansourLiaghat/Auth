<?php

require_once './bootstrap/init.php';


function pathAssets (string $path): string {
    return BASE_URL .'assets/' . $path ;
}


function siteUrl (string $uri = null): string {
    return BASE_URL . $uri ;
}
