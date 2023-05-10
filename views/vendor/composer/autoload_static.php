<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14b29e6fe429369a482fdcd1c265de2a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14b29e6fe429369a482fdcd1c265de2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14b29e6fe429369a482fdcd1c265de2a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit14b29e6fe429369a482fdcd1c265de2a::$classMap;

        }, null, ClassLoader::class);
    }
}
