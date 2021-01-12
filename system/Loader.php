<?php
namespace BigBear\System;

class Loader
{
    public static function loadModel($modelName)
    {
        $currentNamespaceExploded = explode('\\', __NAMESPACE__);
        $namespace = $currentNamespaceExploded[0];
        $className = implode('\\', [$namespace, 'Model', $modelName . 'Model']);
        try {
            $object = new $className;
        } catch (\Throwable $e) {
            return null;
        }
        return $object;
    }

    public static function loadController($controllerName)
    {
        $currentNamespaceExploded = explode('\\', __NAMESPACE__);
        $namespace = $currentNamespaceExploded[0];
        $className = implode('\\', [$namespace, 'Controller', $controllerName . 'Controller']);
        try {
            $object = new $className;
        } catch (\Throwable $e) {
            return null;
        }
        return $object;
    }
}