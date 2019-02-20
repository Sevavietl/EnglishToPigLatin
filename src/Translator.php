<?php

namespace Sevavietl\EnglishToPigLatin;

final class Translator
{
    public const MODE_HYPHENATED = 0;
    public const MODE_NON_HYPHENATED = 1;

    public const SUFFIX_YAY = 'yay';
    public const SUFFIX_HAY = 'hay';
    public const SUFFIX_WAY = 'way';
    public const SUFFIX_AY = 'ay';

    /** @var int */
    private $mode;

    /** @var string */
    private $suffix;

    public function __construct(int $mode = self::MODE_NON_HYPHENATED, string $suffix = self::SUFFIX_AY)
    {
        $this->mode = $mode;
        $this->suffix = $suffix;
    }

    public function translate(string $text): ?string
    {
        return preg_replace_callback('/([BCDFGHJKLMNPQRSTVWXZ]*)([AEIOUY][A-Z\']*)/i', function (array $matches): string {
            $pigLatin = ('' !== $matches[1] && ucfirst($matches[1]) === $matches[1]) ? ucfirst($matches[2]) : $matches[2];
            $pigLatin .= (self::MODE_HYPHENATED === $this->mode) ? '-' : '';
            $pigLatin .= lcfirst($matches[1]);
            $pigLatin .= $this->suffix;

            return $pigLatin;
        }, $text);
    }
}