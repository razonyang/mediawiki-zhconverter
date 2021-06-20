:warning: 此项目由于以下原因将不再维护，推荐使用 [OpenCC](https://github.com/razonyang/php-opencc) 进行简繁体转换。

- 依赖 MediaWiki，为了简繁体转换，导致项目过于臃肿
- MediaWiki 不支持 PHP 8，并且该库状态为 [Abandoned](https://packagist.org/packages/mediawiki/core)
- MediaWiki 不支持 Composer 2

# 基于 MediaWiki 的简繁体转换

[![Build Status](https://travis-ci.org/razonyang/mediawiki-zhconverter.svg?branch=master)](https://travis-ci.org/razonyang/mediawiki-zhconverter)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/razonyang/mediawiki-zhconverter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/razonyang/mediawiki-zhconverter/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/razonyang/mediawiki-zhconverter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/razonyang/mediawiki-zhconverter/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/razonyang/mediawiki-zhconverter.svg)](https://packagist.org/packages/razonyang/mediawiki-zhconverter)
[![Total Downloads](https://img.shields.io/packagist/dt/razonyang/mediawiki-zhconverter.svg)](https://packagist.org/packages/razonyang/mediawiki-zhconverter)
[![LICENSE](https://img.shields.io/github/license/razonyang/mediawiki-zhconverter)](LICENSE)

源码参考自 [https://github.com/tszming/mediawiki-zhconverter](https://github.com/tszming/mediawiki-zhconverter)。
并在其基础上重写，以便用于 Composer 安装和方便使用。

## 要求

- PHP >= 5.5
- Mediawiki 请使用 [composer.json](composer.json) 指定的版本，其他版本可能不起作用。

## 使用

### 安裝

```
composer require razonyang/mediawiki-zhconverter
```

如果不打算使用 Composer 安装，需要主动设置 MediaWiki 的目录路径常量： `MEDIAWIKI_PATH`：

```php
define('MEDIAWIKI_PATH', '/path-to-mediawiki');
```

> 一般的，如果使用了 Composer 的类自动加载时，[ComposerHelper](src/ComposerHelper.php) 会自动识别 MediaWiki 的路径。
若无法正确识别，请手动定义 `MEDIAWIKI_PATH`。

### 示例

```php
$text = '书本';

// 中文简体
echo ZhConverter::toCN($text); // 书本

// 台湾繁体
echo ZhConverter::toTW($text); // 書本

// 香港繁体
echo ZhConverter::toHK($text); // 書本

// 澳门繁体
echo ZhConverter::toMO($text); // 書本

// 其他变种
$variant = 'zh-sg'; // 新加坡
echo ZhConverter::to($variant, $text); // 书本
```

