<?php
namespace BigBear\System;

class Input
{
    public function get($inputName, $defaultValue = null)
    {
        if (!empty($_POST[$inputName])) {
            return $_POST[$inputName];
        }

        if (!empty($_GET[$inputName])) {
            return $_GET[$inputName];
        }

        if ($defaultValue) {
            return $defaultValue;
        }

        return null;
    }
}