<?php
/**
 * @copyright 2019 Razon Yang <razonyang@gmail.com>
 */
namespace RazonYang\MediaWiki\ZhConverter;

use Composer\Autoload\ClassLoader;

/**
 * Class ComposerHelper
 *
 * @author Razon Yang <razonyang@gmail.com>
 */
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