<?php
namespace ConvertibleRomaji;

/**
 * ローマ字クラス
 * ひらがなやカタカナに変換して出力できる
 */
class ConvertibleRomaji
{
    public static $decision_table = [
        'kka' => 'っか',
        'kki' => 'っき',
        'kku' => 'っく',
        'kke' => 'っけ',
        'kko' => 'っこ',
        'ssa' => 'っさ',
        'sshi' => 'っし',
        'ssu' => 'っす',
        'sse' => 'っせ',
        'sso' => 'っそ',
        'tta' => 'った',
        'tti' => 'っち',
        'ttu' => 'っつ',
        'tte' => 'って',
        'tto' => 'っと',
        'ppa' => 'っぱ',
        'ppi' => 'っぴ',
        'ppu' => 'っぷ',
        'ppe' => 'っぺ',
        'ppo' => 'っぽ',
        'ga' => 'が',
        'gi' => 'ぎ',
        'gu' => 'ぐ',
        'ge' => 'げ',
        'go' => 'ご',
        'za' => 'ざ',
        'ji' => 'じ',
        'zu' => 'ず',
        'ze' => 'ぜ',
        'zo' => 'ぞ',
        'da' => 'だ',
        'ji' => 'ぢ',
        'zu' => 'づ',
        'de' => 'で',
        'do' => 'ど',
        'ba' => 'ば',
        'bi' => 'び',
        'bu' => 'ぶ',
        'be' => 'べ',
        'bo' => 'ぼ',
        'pa' => 'ぱ',
        'pi' => 'ぴ',
        'pu' => 'ぷ',
        'pe' => 'ぺ',
        'po' => 'ぽ',
        'kya' => 'きゃ',
        'kyu' => 'きゅ',
        'kyo' => 'きょ',
        'sha' => 'しゃ',
        'shu' => 'しゅ',
        'sho' => 'しょ',
        'cha' => 'ちゃ',
        'chu' => 'ちゅ',
        'cho' => 'ちょ',
        'nya' => 'にゃ',
        'nyu' => 'にゅ',
        'nyo' => 'にょ',
        'hya' => 'ひゃ',
        'hyu' => 'ひゅ',
        'hyo' => 'ひょ',
        'mya' => 'みゃ',
        'myu' => 'みゅ',
        'myo' => 'みょ',
        'rya' => 'りゃ',
        'ryu' => 'りゅ',
        'ryo' => 'りょ',
        'gya' => 'ぎゃ',
        'gyu' => 'ぎゅ',
        'gyo' => 'ぎょ',
        'ja' => 'じゃ',
        'ju' => 'じゅ',
        'jo' => 'じょ',
        'bya' => 'びゃ',
        'byu' => 'びゅ',
        'byo' => 'びょ',
        'pya' => 'ぴゃ',
        'pyu' => 'ぴゅ',
        'pyo' => 'ぴょ',
        'chi' => 'ち',
        'tsu' => 'つ',
        'ka' => 'か',
        'ki' => 'き',
        'ku' => 'く',
        'ke' => 'け',
        'ko' => 'こ',
        'sa' => 'さ',
        'shi' => 'し',
        'si' => 'し',
        'su' => 'す',
        'se' => 'せ',
        'so' => 'そ',
        'ta' => 'た',
        'te' => 'て',
        'to' => 'と',
        'na' => 'な',
        'ni' => 'に',
        'nu' => 'ぬ',
        'ne' => 'ね',
        'no' => 'の',
        'ha' => 'は',
        'hi' => 'ひ',
        'fu' => 'ふ',
        'he' => 'へ',
        'ho' => 'ほ',
        'ma' => 'ま',
        'mi' => 'み',
        'mu' => 'む',
        'me' => 'め',
        'mo' => 'も',
        'ya' => 'や',
        'yu' => 'ゆ',
        'yo' => 'よ',
        'ra' => 'ら',
        'ri' => 'り',
        'ru' => 'る',
        're' => 'れ',
        'ro' => 'ろ',
        'wa' => 'わ',
        'a' => 'あ',
        'i' => 'い',
        'u' => 'う',
        'e' => 'え',
        'o' => 'お',
        'n' => 'ん',
        'm' => 'ん',
    ];

    public function __construct($text = '')
    {
        $this->originText = $text;
        $this->lowerText = mb_strtolower($text);
    }

    public function toKatakana($removeIllegalFlag = true)
    {
        $text = $this->toHiragana($removeIllegalFlag);
        $text = mb_convert_kana($text, 'C');
        return $text;
    }

    public function toHiragana($removeIllegalFlag = true)
    {
        $text = $this->lowerText;
        foreach (self::$decision_table as $key => $value) {
            $text = mb_ereg_replace($key, $value, $text);
        }
        if ($removeIllegalFlag) {
            $text = preg_replace('/[^ぁ-ん]/u', '', $text);
        }
        return $text;
    }
}
