<?php
require_once 'inc/PostType.php';
require_once 'inc/CustomFieldsSize.php';

class Theme {

public function init() {
    (new \Theme\PostType())->register();
    (new \Theme\CustomFieldsSize())->register();

}

}

(new Theme())->init();
