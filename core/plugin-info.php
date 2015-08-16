<?php

class dl_tw_PluginInfo {

    /**
     * Properties
     */
    public $name;
    public $smallDisplayName;
    public $displayName;

    /**
     * Constructor
     */
    public function __construct() {

        $this->name = "toaster-widget-by-duo-leaf";
        $this->smallDisplayName = "Toaster Widget";
        $this->displayName = $this->smallDisplayName . " by Duo Leaf";
    }

}
