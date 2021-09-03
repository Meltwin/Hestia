<?php

use Meltwin\Hestia\Page\Index;

$_PAGE = null;

function index() {
    require_once("./model/pages/Index.php");
    $_PAGE = new Index();
}