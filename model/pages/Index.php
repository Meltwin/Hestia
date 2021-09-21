<?php
namespace Meltwin\Hestia\Page;

require_once("./model/base/BasePage.php");
use Meltwin\Hestia\Base\BasePage;

/**
 * Home page for Hestia
 * @author Meltwin
 * @since 1.0.0
 */
class Index extends BasePage {

    public function __construct() {
        $this->set_title("Hestia - Home");
    }


    public function construct_page() {
        echo "index page";
    }
}