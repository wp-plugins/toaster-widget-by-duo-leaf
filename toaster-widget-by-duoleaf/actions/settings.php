<?php

$this->view->settings = new dl_tw_Settings();

require(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/views/settings.php');
