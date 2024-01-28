<?php

class MainCtrl
{
    public function render() {
        $filepath = 'Views' . DIRECTORY_SEPARATOR . 'MainPage.view.php';
        require_once($filepath);
    }
}

?>