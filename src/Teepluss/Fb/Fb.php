<?php namespace Teepluss\Fb;

use Facebook as BaseFacebook;

class Fb extends BaseFacebook {

    public function __construct($config)
    {
        parent::__construct($config);
    }

}