<?php

require_once("./model/config/HestiaConfig.php");

namespace Meltwin\Hestia\Modules;

use Meltwin\Hestia\Config\MainConfig;

class ModuleList {

    private function get_modules() : array {
        $module_list = [];
        $module_dir = MainConfig::get_config()["modules"]["folder"];
        foreach(scandir($module_dir) as $dir) {
            if (in_array($dir, [".", ".."]))
                continue;

            // TODO Module Vérif

            $module_list[$dir] = $module_dir.$dir;
        }
        return $module_dir;
    }
}