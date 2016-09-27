<?php

namespace Backpack\Base\Traits;

trait Enqueue
{
    public static $enqueuedScripts = [];
    public static $enqueuedStyles = [];

    public static function enqueueAsset($type, $id, $source, $dependencies = [])
    {
        switch ($type) {
            case 'css':
            case 'style':
                return self::enqueueStyle($id, $source, $dependencies);
                break;
            case 'script':
            case 'javascript':
            case 'js':
                return self::enqueueScript($id, $source, $dependencies);
                break;
        }
    }

    public static function enqueueScript($id, $source, $dependencies)
    {
        if (!str_contains($source, '//')) {
            $path = '/'.ltrim($source, '/');
            $v = filemtime(realpath(ltrim($path, '/')));
            $sourceComputed = asset($path.'?v='.$v);
        } else {
            $sourceComputed = $source;
        }

        $sourceObj = (object) [
            'id'     => $id,
            'source' => $sourceComputed,
            'deps'   => $dependencies,
        ];

        self::$enqueuedScripts[$id] = $sourceObj;

        return $sourceObj;
    }

    public static function enqueueStyle($id, $source, $dependencies)
    {
        if (!str_contains($source, '//')) {
            $path = '/'.ltrim($source, '/');
            $v = filemtime(realpath(ltrim($path, '/')));
            $sourceComputed = asset($path.'?v='.$v);
        } else {
            $sourceComputed = $source;
        }

        $sourceObj = (object) [
            'id'     => $id,
            'source' => $sourceComputed,
            'deps'   => $dependencies,
        ];

        self::$enqueuedStyles[$id] = $sourceObj;

        return $sourceObj;
    }

    private static function handleDependencies($items)
    {
        $items = array_unique($items, SORT_REGULAR); //Strip out duplicate requests
        $resolutions = [];
        $dependenciesFound = [];
        $circularDependencyCounter = 0;

        while (count($items) > count($resolutions) && $circularDependencyCounter < 20) {
            $circularDependencyCounter++;

            foreach ($items as $itemIndex => $item) {

                //If I'm an existing depdendency - skip me!
                if (isset($dependenciesFound[$item->id])) {
                    continue;
                }

                //We assume its found, unless stated below
                $resolved = true;

                //Check through each depdendency to see if its alrady desolved
                if (isset($item->deps) && !empty($item->deps)) {
                    foreach ($item->deps as $dep) {
                        if (!isset($dependenciesFound[$dep])) {
                            $resolved = false;
                            break;
                        }
                    }
                }

                if ($resolved) {
                    $dependenciesFound[$item->id] = true;
                    $resolutions[] = $item;
                }
            }
        }

        return $resolutions;
    }

    public static function getScripts()
    {
        return self::handleDependencies(self::$enqueuedScripts);
    }

    public static function getStyles()
    {
        return self::handleDependencies(self::$enqueuedStyles);
    }
}
