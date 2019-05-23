<?php

namespace Dmouse\GoogleBot;


class Header
{
    const IMAGE_STYLE_UNSPECIFIED = 'IMAGE_STYLE_UNSPECIFIED';

    const IMAGE_STYLE_IMAGE = 'IMAGE';

    const IMAGE_STYLE_AVATAR = 'AVATAR';

    private static $fragment = [];

    public static function create(): Header
    {
        return new static();
    }

    public static function title(string $title): Header
    {
        self::$fragment['title'] = $title;

        return new static();
    }

    public function subtitle(string $sub): Header
    {
        self::$fragment['subtitle'] = $sub;

        return new static();
    }

    public function imageUrl(string $url): Header
    {
        self::$fragment['imageUrl'] = $url;

        return new static();
    }

    public function imageStyle(string $style): Header
    {
        self::$fragment['imageStyle'] = $style;

        return new static();
    }

    public static function getHeader()
    {
        return self::$fragment;
    }
}
