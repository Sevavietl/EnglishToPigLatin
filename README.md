# Translate English to Pig Latin

[![Build Status](https://travis-ci.com/Sevavietl/EnglishToPigLatin.svg?branch=master)](https://travis-ci.com/Sevavietl/EnglishToPigLatin)
[![Coverage Status](https://coveralls.io/repos/github/Sevavietl/EnglishToPigLatin/badge.svg)](https://coveralls.io/github/Sevavietl/EnglishToPigLatin)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

Library that translates English text into Pig Latin:

```php
$translator = new \Sevavietl\EnglishToPigLatin\Translator();

$translator->translate('pig'); // => 'igpay'
$translator->translate('smile'); // => 'ilesmay'
$translator->translate('eat'); // => 'eatay'
```