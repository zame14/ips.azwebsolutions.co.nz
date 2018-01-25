<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/23/2018
 * Time: 9:41 PM
 */
class Excursion extends IPSBase
{
    public function getArchive()
    {
        return $this->getPostMeta('archive');
    }
    public function getRecipient()
    {
        return $this->getPostMeta('recipient');
    }
}