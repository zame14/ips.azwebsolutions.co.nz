<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/2018
 * Time: 11:21 AM
 */
class Setting extends IPSBase
{
    public function getPhone()
    {
        return $this->getPostMeta('phone');
    }
    public function getMobile()
    {
        return $this->getPostMeta('mobile');
    }
    public function getEmail()
    {
        return $this->getPostMeta('email');
    }
    public function getTermDates()
    {
        return wpautop($this->getPostMeta('term-dates'));
    }
    public function getSchoolRole()
    {
        return $this->getPostMeta('school-role');
    }
    public function getStationaryList()
    {
        return $this->getPostMeta('stationary-list');
    }
    public function getCalendarLink()
    {
        return $this->getPostMeta('calendar-link');
    }
}