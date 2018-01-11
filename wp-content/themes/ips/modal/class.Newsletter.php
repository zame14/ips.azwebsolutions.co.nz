<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/2018
 * Time: 9:26 AM
 */
class Newsletter extends IPSBase
{
    public function getFile()
    {
        return $this->getPostMeta('file');
    }
}