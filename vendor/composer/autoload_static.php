<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit136cf27f0d018e8bb5843c5c1aa69658
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AppFinances\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AppFinances\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit136cf27f0d018e8bb5843c5c1aa69658::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit136cf27f0d018e8bb5843c5c1aa69658::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit136cf27f0d018e8bb5843c5c1aa69658::$classMap;

        }, null, ClassLoader::class);
    }
}
