<?php

namespace Sevavietl\EnglishToPigLatin\Test;

use PHPUnit\Framework\TestCase;
use Sevavietl\EnglishToPigLatin\Translator;

final class TranslatorTest extends TestCase
{
    /**
     * @dataProvider englishWordsDataProvider
     */
    public function testTranslatesEnglishWordsToLatin(string $englishWord, string $pigLatinWord): void
    {
        $translator = new Translator();

        $this->assertEquals($pigLatinWord, $translator->translate($englishWord));
    }

    public function englishWordsDataProvider(): array
    {
        return [
            // Words that begin with consonant sounds
            ['pig', 'igpay'],
            ['latin', 'atinlay'],
            ['banana', 'ananabay'],
            ['happy', 'appyhay'],
            ['duck', 'uckday'],
            ['me', 'emay'],
            ['too', 'ootay'],

            // Words that begin with consonant clusters
            ['smile', 'ilesmay'],
            ['string', 'ingstray'],
            ['stupid', 'upidstay'],
            ['glove', 'oveglay'],
            ['trash', 'ashtray'],
            ['floor', 'oorflay'],
            ['store', 'orestay'],

            // Words that begin with vowel sounds
            ['eat', 'eatay'],
            ['omelet', 'omeletay'],
            ['are', 'areay'],
            ['egg', 'eggay'],
            ['explain', 'explainay'],
            ['always', 'alwaysay'],
            ['ends', 'endsay'],
            ['I', 'Iay'],
        ];
    }
    
    public function testTranslatesEnglishToPigLatinUsingHyphen(): void
    {
        $translator = new Translator(Translator::MODE_HYPHENATED);

        $this->assertEquals('ig-pay', $translator->translate('pig'));
        $this->assertEquals('ile-smay', $translator->translate('smile'));
        $this->assertEquals('eat-ay', $translator->translate('eat'));
    }

    public function testTranslatesEnglishToPigLatinUsingHyphenAndWaySuffix(): void
    {
        $translator = new Translator(Translator::MODE_HYPHENATED, Translator::SUFFIX_WAY);

        $this->assertEquals('ig-pway', $translator->translate('pig'));
        $this->assertEquals('ile-smway', $translator->translate('smile'));
        $this->assertEquals('eat-way', $translator->translate('eat'));
    }

    public function testTranslatesEnglishTextToPigLatin(): void
    {
        $translator = new Translator(Translator::MODE_HYPHENATED);

        $masterpieceEnglishSong = <<<SONG
Oops, I did it again
I played with your heart, got lost in the game
Oh baby, baby
Oops, you think I'm in love
That I'm sent from above
I'm not that innocent
SONG;

        $masterpiecePigLatinSong = <<<SONG
Oops-ay, I-ay id-day it-ay again-ay
I-ay ayed-play ith-way your-ay eart-hay, ot-gay ost-lay in-ay e-thay ame-gay
Oh-ay aby-bay, aby-bay
Oops-ay, you-ay ink-thay I'm-ay in-ay ove-lay
At-thay I'm-ay ent-say om-fray above-ay
I'm-ay ot-nay at-thay innocent-ay
SONG;

        $this->assertEquals($masterpiecePigLatinSong, $translator->translate($masterpieceEnglishSong));
    }
}