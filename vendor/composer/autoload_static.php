<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite7cc6bbb35a5b0634b39b5967830e9d3
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/etc',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite7cc6bbb35a5b0634b39b5967830e9d3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite7cc6bbb35a5b0634b39b5967830e9d3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}