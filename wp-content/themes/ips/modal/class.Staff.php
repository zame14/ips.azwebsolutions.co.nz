<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/17/2018
 * Time: 9:24 PM
 */
class Staff extends IPSBase
{
    public function getPosition()
    {
        return $this->getPostMeta('position');
    }
    public function getPosition2()
    {
        return $this->getPostMeta('position-2');
    }
    public function getClassroom()
    {
        return $this->getPostMeta('classroom');
    }
    public function getCategory()
    {
        return $this->getPostMeta('category');
    }
    public function getEmail()
    {
        return $this->getPostMeta('staff-email');
    }
    public function getImage()
    {
        return $this->getPostMeta('staff-profile');
    }
    public function getAdditionalInfo()
    {
        return $this->getPostMeta('additional-info');
    }
}