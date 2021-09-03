<?php

namespace Meltwin\Hestia\Config;

class MainConfig {
    private const CONFIG_PATH = "./config/main.json";
    private array $data;

    public static ?MainConfig $instance = null;

    private function __construct() {
        MainConfig::$instance = $this;
        $this->load_config();
    }

    private function load_config() : void {
        $temp = file_get_contents(MainConfig::CONFIG_PATH);
        $this->data = json_decode($temp, true);
    }

    public static function get_config() : array {
        if (is_null(MainConfig::$instance))
            new MainConfig();
        return MainConfig::$instance->data;
    }
}