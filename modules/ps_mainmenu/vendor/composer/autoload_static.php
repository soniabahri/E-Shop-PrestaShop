<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bc3cdc903748921f8be8659676bc688
{
    public static $classMap = array (
        'Ps_MainMenu' => __DIR__ . '/../..' . '/ps_mainmenu.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0bc3cdc903748921f8be8659676bc688::$classMap;

        }, null, ClassLoader::class);
    }
}
