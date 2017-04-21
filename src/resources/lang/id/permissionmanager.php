<?php

// --------------------------------------------------------
// This is only a pointer file, not an actual language file
// --------------------------------------------------------
//
// Backpack\Base loads the language files for all Backpack packages.
// The base.php file is "for realsies".
// All other files are just pointers towards where the real files.
// The actual translated lines live each in the CRUD package.
//
// If you've copied this file to your /resources/lang/vendor/backpack/
// folder, please delete it, it's no use there. You need to copy/publish the
// actual language file, from the package.

if (file_exists(__DIR__.'/../../../../../permissionmanager/src/resources/lang/'.basename(__DIR__).'/permissionmanager.php')) {
    return include __DIR__.'/../../../../../permissionmanager/src/resources/lang/'.basename(__DIR__).'/permissionmanager.php';
}

return [];
