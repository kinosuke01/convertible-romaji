<?php
namespace Kinosuke01\ConvertibleRomaji;

use PHPUnit\Framework\TestCase;
use Kinosuke01\ConvertibleRomaji\ConvertibleRomaji;

class ConvertibleRomajiTest extends TestCase
{
    public function testIsToHiragana()
    {
        $romaji = new ConvertibleRomaji('irohanihoheto');
        $text = $romaji->toHiragana();
        $this->assertEquals("いろはにほへと", $text);

        // ローマ字以外をトリミングしない
        $romaji = new ConvertibleRomaji('irohanihoheto_漢字');
        $text = $romaji->toHiragana(false);
        $this->assertEquals("いろはにほへと_漢字", $text);

        // ローマ字以外をトリミングする
        $romaji = new ConvertibleRomaji('irohanihoheto_漢字');
        $text = $romaji->toHiragana();
        $this->assertEquals("いろはにほへと", $text);
    }

    public function testIsToKatakana()
    {
        $romaji = new ConvertibleRomaji('tonarinokyakuha');
        $text = $romaji->toKatakana();
        $this->assertEquals("トナリノキャクハ", $text);

        // ローマ字以外をトリミングしない
        $romaji = new ConvertibleRomaji('tonarinokyakuha_漢字');
        $text = $romaji->toKatakana(false);
        $this->assertEquals("トナリノキャクハ_漢字", $text);

        // ローマ字以外をトリミングする
        $romaji = new ConvertibleRomaji('tonarinokyakuha_漢字');
        $text = $romaji->toKatakana();
        $this->assertEquals("トナリノキャクハ", $text);
    }
}
