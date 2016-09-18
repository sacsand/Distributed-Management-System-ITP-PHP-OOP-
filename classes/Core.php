<?php
class Core{


    public function run(){

        ob_start();//refer google to understndet
        require_once(Url::getPage());
        ob_get_flush();

    }
}
