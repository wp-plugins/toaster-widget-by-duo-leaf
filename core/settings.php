<?php

class dl_tw_Settings {

    public $title;
    public $width;
    public $titleHeight;
    public $contentHeight;

    public function __construct() {

        $this->title = get_option("dl_tw_title", "Hello!!!");
        $this->width = get_option("dl_tw_width", 400);
        $this->titleHeight = get_option("dl_tw_titleHeight", 40);
        $this->contentHeight = get_option("dl_tw_contentHeight", 300);
    }

    public function save() {
        update_option("dl_tw_title", $this->title);
        update_option("dl_tw_width", $this->width);
        update_option("dl_tw_titleHeight", $this->titleHeight);
        update_option("dl_tw_contentHeight", $this->contentHeight);
    }
}
