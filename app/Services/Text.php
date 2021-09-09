<?php

namespace App\Services;

class Text
{
    public static function createWhitespace($text)
    {
        return '<p>'.preg_replace('/[\r\n]+/', '</p><p>', $text) . '</p>';
    }
}

?>
