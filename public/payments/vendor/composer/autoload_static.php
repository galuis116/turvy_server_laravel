<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb7cd76d890cc6b52e49c60e3a1cc993
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb7cd76d890cc6b52e49c60e3a1cc993::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb7cd76d890cc6b52e49c60e3a1cc993::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
