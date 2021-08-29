## What is this?
This is a library to convert romaji into hiragana and katakana.

## Usage

```
use Kinosuke01\ConvertibleRomaji\ConvertibleRomaji;

$romaji = new ConvertibleRomaji('irohanihoheto');
echo $romaji->toHiragana(); // いろはにほへと
echo $romaji->toKatakana(); // イロハニホヘト
```
