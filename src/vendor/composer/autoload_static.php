<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12514a4aed420d1ad9998b6cda577ada
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fgmarins\\Fpay\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fgmarins\\Fpay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Fpay',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12514a4aed420d1ad9998b6cda577ada::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12514a4aed420d1ad9998b6cda577ada::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit12514a4aed420d1ad9998b6cda577ada::$classMap;

        }, null, ClassLoader::class);
    }
}