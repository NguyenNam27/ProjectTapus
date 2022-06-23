<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4a94b6955b901d0748c2c3b1b545eb8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4a94b6955b901d0748c2c3b1b545eb8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4a94b6955b901d0748c2c3b1b545eb8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb4a94b6955b901d0748c2c3b1b545eb8::$classMap;

        }, null, ClassLoader::class);
    }
}