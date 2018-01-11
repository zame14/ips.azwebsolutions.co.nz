<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/2018
 * Time: 2:37 PM
 */
class Event extends IPSBase
{
    public function getFeatureImage()
    {
        return $this->getPostMeta('gallery-feature-image');
    }
    public function getGalleryImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-gallery-image'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }
}