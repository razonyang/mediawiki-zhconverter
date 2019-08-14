<?php
namespace RazonYang\MediaWiki\ZhConverter;

use Composer\Autoload\ClassLoader;

class ComposerHelper
{
    /**
     * Gets composer vendor path.
     *
     * @return string
     */
    public static function getVendorPath()
    {
        $reflection = new \ReflectionClass(ClassLoader::class);
        return dirname(dirname($reflection->getFileName()));
    }
}