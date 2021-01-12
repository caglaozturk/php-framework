<?php
namespace BigBear\System;
use Cocur\Slugify\Slugify;

class Helpers {
    public function getRootDir()
    {
        return dirname(__DIR__);
    }

    public function getViewDir()
    {
        return $this->getRootDir() . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'View';
    }

    public function url($url, $relative = true)
    {
        $url = trim($url, '/');
        $url = '/' . $url;
        if ($relative) {
            return $url;
        } else {
            return ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $url;
        }
    }

    public function slug($url)
    {
        return (new Slugify())->slugify($url);
    }
}