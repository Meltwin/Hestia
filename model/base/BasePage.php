<?php

namespace Meltwin\Hestia\Base;

/**
 * Enum for link type
 * @author Meltwin
 * @since 1.0.0
 */
abstract class LinkType {

    public const STYLE = new LinkType();
    public const SCRIPT = new LinkType();

    private function __construct() {}
}

/**
 * Abstract class for building differents pages
 * @author Meltwin
 * @since 1.0.0
 */
abstract class BasePage {
    

    private array $style = [];
    private array $pre_scripts = [], $post_scripts = [];

    private ?string $footer_link = null;

    private string $page_title = "No Title";
    
    
    protected function __construct() {}

    /* =========================================
     *                SETTER LINK 
     * =========================================
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

    protected function set_footer(string $link) : void {
        $this->footer_link = $link;
    }
    protected function set_title(string $title) : void {
        $this->page_title = $title;
    }


    /*
     *          GETTER 
     */
    public function get_title() : string {return $this->page_title;}

    /*
    *           VIEW CONSTRUCTOR
    */
    private function construct_link(array $link_array, LinkType $type) : void {
        $view = ($type === LinkType::STYLE) ? "./view/global/header/link/css.php" : "./view/global/header/link/script.php";

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