<?php

namespace Dmouse\GoogleBot;

use Dmouse\GoogleBot\Markup\Button;
use Dmouse\GoogleBot\Markup\Image;
use Dmouse\GoogleBot\Markup\KeyValue;

class Widget
{
    private $fragment = [];

    public static function create(): Widget
    {
        return new Widget();
    }

    public function textParagraph(string $text): Widget
    {
        unset($this->fragment['image']);
        unset($this->fragment['keyValue']);

        $this->fragment['textParagraph'] = [
            'text' => $text,
        ];

        return $this;
    }

    public function image(Image $image)
    {
        unset($this->fragment['textParagraph']);
        unset($this->fragment['keyValue']);

        $this->fragment['image'] = $image->getMarkup();

        return $this;
    }

    public function addButton(Button $button): Widget
    {
        $this->fragment['buttons'][] = $button->getMarkup();

        return $this;
    }

    public function keyValue(KeyValue $keyValue): Widget
    {
        unset($this->fragment['textParagraph']);
        unset($this->fragment['image']);

        $this->fragment['keyValue'] = $keyValue->getMarkup();

        return $this;
    }

    public function getWidget(): array
    {
        return $this->fragment;
    }
}
