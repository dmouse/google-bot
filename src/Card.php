<?php

namespace Dmouse\GoogleBot;

class Card
{
    private static $fragment = [];

    public static function create(): Card
    {
        return new Card();
    }

    public static function name(string $name): Card
    {
        static::$fragment['name'] = $name;

        return new static();
    }

    public static function header(Header $header)
    {
        static::$fragment['header'] = $header::getHeader();

        return new static();
    }

    public static function addSection(Section $section)
    {
        static::$fragment['sections'][] = $section->getSection();

        return new static();
    }

    public static function addCardAction(string $sample)
    {
        static::$fragment['action'] = $sample;

        return new static();
    }

    public static function getCard(): array
    {
        return self::$fragment;
    }
}
