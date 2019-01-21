# 基于 MediaWiki 的简繁体转换

源码参考自 [https://github.com/tszming/mediawiki-zhconverter](https://github.com/tszming/mediawiki-zhconverter)。
并在其基础上重写，以便用于 Composer 安装和方便使用。

## 要求

- PHP >= 5.5

## 使用

### 安裝

```
comspoer require razonyang/mediawiki-zhconverter
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

