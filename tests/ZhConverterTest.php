<?php
use PHPUnit\Framework\TestCase;
use RazonYang\MediaWiki\ZhConverter\ZhConverter;

class ZhConverterTest extends TestCase
{
    public function textsProvider()
    {
        return [
            ['书本', '書本'],
            ['面包', '麵包'],
        ];
    }

    /**
     * @param string $text
     * @param string $expected
     *
     * @dataProvider textsProvider
     */
    public function testToCN($expected, $text)
    {
        $this->assertEquals($expected, ZhConverter::toCN($text));
    }

    /**
     * @param string $text
     * @param string $expected
     *
     * @dataProvider textsProvider
     */
    public function testToTW($text, $expected)
    {
        $this->assertEquals($expected, ZhConverter::toTW($text));
    }

    /**
     * @param string $text
     * @param string $expected
     *
     * @dataProvider textsProvider
     */
    public function testToHk($text, $expected)
    {
        $this->assertEquals($expected, ZhConverter::toHK($text));
    }

    /**
     * @param string $text
     * @param string $expected
     *
     * @dataProvider textsProvider
     */
    public function testToMo($text, $expected)
    {
        $this->assertEquals($expected, ZhConverter::toMO($text));
    }

    /**
     * @param string $text
     * @param string $expected
     *
     * @dataProvider textsProvider
     */
    public function testTo($expected, $text)
    {
        $this->assertEquals($expected, ZhConverter::to('zh-sg', $text));
    }
}