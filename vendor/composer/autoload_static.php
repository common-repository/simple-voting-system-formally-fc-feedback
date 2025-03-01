<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96cc946816225f891f580df4a0edb1c2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SVSFC_Feedback\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SVSFC_Feedback\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit96cc946816225f891f580df4a0edb1c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96cc946816225f891f580df4a0edb1c2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit96cc946816225f891f580df4a0edb1c2::$classMap;

        }, null, ClassLoader::class);
    }
}
