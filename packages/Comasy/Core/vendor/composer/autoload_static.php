<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit963ab70a2b66d5a83d3495d32569856b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Comasy\\Core\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Comasy\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit963ab70a2b66d5a83d3495d32569856b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit963ab70a2b66d5a83d3495d32569856b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit963ab70a2b66d5a83d3495d32569856b::$classMap;

        }, null, ClassLoader::class);
    }
}