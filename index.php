<?php
    require_once("./controller/pages.php");

    // Page Routing
    if (!isset($_GET["p"])) {
        index();
        goto building;
    } 

    switch ($_GET["p"]) {
        default:
            index();
            break;
    }

    building:
    include "./view/global/page.php";