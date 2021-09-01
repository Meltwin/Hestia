<?php

namespace Meltwin\Hestia\Base;

abstract class LinkType {

    public const STYLE = new LinkType();
    public const SCRIPT = new LinkType();

    private function __construct() {}
}

abstract class BasePage {
    

    private array $style = [];
    private array $pre_scripts = [], $post_scripts = [];

    private ?string $footer_link = null;
    
    
    protected function __construct() {}

    /*
     *          SETTER LINK 
     */
    private function add_array(array $arr, $link) : void {
        array_push($arr, $link);
    }
    protected function add_style(string $link) : void {
        $this->add_array($this->style, $link);
    }
    protected function add_pre_script(string $link) : void {
        $this->add_array($this->pre_scripts, $link);
    }
    protected function add_post_script(string $link) : void {
        $this->add_array($this->post_scripts, $link);
    }

    private function set_footer(string $link) {
        $this->footer_link = $link;
    }

    /*
    *           VIEW CONSTRUCTOR
    */
    private function construct_link(array $link_array, LinkType $type) : void {
        $view = ($type === LinkType::STYLE) ? "./view/link/css.php" : "./view/link/script.php";

        foreach ($link_array as $link) {
            require($view);
        }
    }

    public function construct_header() {
        $this->construct_link($this->style, LinkType::STYLE);
        $this->construct_link($this->pre_scripts, LinkType::SCRIPT);
    }
    public abstract function construct_page();
    public function construct_footer() {
        $this->construct_link($this->post_scripts, LinkType::SCRIPT);
        if (!is_null($this->footer_link)) {
            require($this->footer_link);
        }
    }

}