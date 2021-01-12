<?php
namespace BigBear\System;

class Session
{
    public function get($sessionName, $defaultValue = null)
    {
        if (isset($_SESSION[$sessionName])) {
            return $_SESSION[$sessionName];
        }
        if ($defaultValue) {
            return $defaultValue;
        }
        return null;
    }

    public function set($sessionName, $value)
    {
        $_SESSION[$sessionName] = $value;
        return true;
    }
}