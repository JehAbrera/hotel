<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e2a8c8028da070d036585628207a54c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e2a8c8028da070d036585628207a54c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e2a8c8028da070d036585628207a54c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9e2a8c8028da070d036585628207a54c::$classMap;

        }, null, ClassLoader::class);
    }
}
