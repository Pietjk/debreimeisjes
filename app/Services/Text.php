<?php

namespace App\Services;

class Text
{
    public static function nl2p($text)
    {
        return '<p>'.preg_replace('/[\r\n]+/', '</p><p>', $text) . '</p>';
    }
}

?>
