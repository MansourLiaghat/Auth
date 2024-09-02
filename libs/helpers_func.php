<?php

require_once './bootstrap/init.php';


function pathAssets (string $path): string {
    return BASE_URL .'assets/' . $path ;
}


function siteUrl (string $uri = null): string {
    return BASE_URL . $uri ;
}


function redirect (string $target = BASE_URL): void {
    header('Location:' . $target);
}


function setErrorrAndredirect(string $msg , string $target) : void {
    $_SESSION['error'] = $msg ;
    redirect(siteUrl($target));
    // redirect(BASE_URL . $target);
    die();
}


