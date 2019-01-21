<?php
/**
 * @copyright 2019 Razon Yang <razonyang@gmail.com>
 */
namespace RazonYang\MediaWiki\ZhConverter;

use MediaWiki\Logger\NullSpi;

define('MEDIAWIKI', true);
!defined('MEDIAWIKI_PATH') && define('MEDIAWIKI_PATH', ComposerHelper::getVendorPath() . '/mediawiki/core');

require_once __DIR__ . '/functions.php';
require_once MEDIAWIKI_PATH . '/includes/GlobalFunctions.php';
require_once MEDIAWIKI_PATH . '/includes/AutoLoader.php';

set_include_path(get_include_path() . PATH_SEPARATOR . MEDIAWIKI_PATH);

global $IP;
$IP = MEDIAWIKI_PATH;

class ZhConverter
{
    const ZH_CN = 'zh-cn'; // 中文简体
    const ZH_TW = 'zh-tw'; // 台湾繁体
    const ZH_HK = 'zh-hk'; // 香港繁体
    const ZH_MO = 'zh-mo'; // 澳门繁体

    private static $converter;

    /**
     * @return \LanguageConverter
     */
    public static function getConverter()
    {
        if (static::$converter === null) {
            /* Initialize some global variables needed */
            global $wgRequest, $wgMemc;
            global $wgLocalisationCacheConf, $wgDisabledVariants, $wgExtraLanguageNames;
            global $wgLangConvMemc, $wgMessageCacheType, $wgObjectCaches;
            global $wgLanguageConverterCacheType, $wgMWLoggerDefaultSpi, $wgMainWANCache, $wgWANObjectCaches;
            $wgRequest = new WebRequest();
            $wgMemc = new FakeMemCachedClient();
            $wgLocalisationCacheConf['class'] = FakeMemCachedClient::class;
            $wgLocalisationCacheConf['storeClass'] = 'LCStore_Null';
            $wgDisabledVariants = [];
            $wgExtraLanguageNames = [];
            $wgLangConvMemc = new FakeMemCachedClient;
            define('CACHE_NONE', 'FAKE');
            $wgObjectCaches = [
                'FAKE' => ['class' => FakeMemCachedClient::class],
            ];
            $wgMessageCacheType = 'FAKE';
            $wgLanguageConverterCacheType = 'FAKE';
            $wgMainWANCache = 'FAKE';
            $wgWANObjectCaches = [
                'FAKE' => [
                    'class' => 'WANObjectCache',
                    'cacheId' => 'FAKE',
                    'pool' => 'mediawiki-main-none',
                    'relayerConfig' => ['class' => 'EventRelayerNull']
                ]
            ];
            $wgMWLoggerDefaultSpi = ['class' => NullSpi::class];

            $lang = new \LanguageZh();
            static::$converter = $lang->mConverter;
        }

        return static::$converter;
    }

    /**
     * Converts text to zh-*.
     *
     * @param string $variant
     * @param string $text
     *
     * @return string
     */
    public static function to($variant, $text)
    {
        return static::getConverter()->translate($text, $variant);
    }

    /**
     * Converts text to zh-cn.
     *
     * @param string $text
     * @return string
     */
    public static function toCN($text)
    {
        return self::to(self::ZH_CN, $text);
    }

    /**
     * Converts text to zh-tw.
     *
     * @param string $text
     * @return string
     */
    public static function toTW($text)
    {
        return self::to(self::ZH_TW, $text);
    }

    /**
     * Converts text to zh-hk.
     *
     * @param string $text
     * @return string
     */
    public static function toHK($text)
    {
        return self::to(self::ZH_HK, $text);
    }

    /**
     * Converts text to zh-mo.
     *
     * @param string $text
     * @return string
     */
    public static function toMO($text)
    {
        return self::to(self::ZH_MO, $text);
    }
}