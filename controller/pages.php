<?php

use Meltwin\Hestia\Page\Index;

$_PAGE = null;

function index() {
    global $_PAGE;
    require_once("./model/pages/Index.php");
    $_PAGE = new Index();
}