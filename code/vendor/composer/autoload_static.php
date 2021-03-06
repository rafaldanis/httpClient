<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit39d28f863137983021fb8389e73df9bd
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RestClient\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RestClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/rd/restClient/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit39d28f863137983021fb8389e73df9bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit39d28f863137983021fb8389e73df9bd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
