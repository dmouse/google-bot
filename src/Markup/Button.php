<?php

namespace Dmouse\GoogleBot\Markup;


class Button implements MarkupInterface
{
    private $fragment = [];

    public function textButton(string $text, OnClick $click): Button
    {
        unset($this->fragment['imageButton']);

        $this->fragment['textButton']['text'] = $text;
        $this->fragment['textButton']['onClick'] = $click->getMarkup();

        return $this;
    }

    public function imageButton(OnClick $click, string $name, string $icon = null, string $iconUrl = null): Button
    {
        unset($this->fragment['textButton']);

        if ($icon) {
            $this->fragment['imageButton']['icon'] = $icon;
            unset($this->fragment['imageButton']['iconUrl']);
        }
        elseif ($iconUrl) {
            $this->fragment['imageButton']['iconUrl'] = $iconUrl;
            unset($this->fragment['imageButton']['icon']);
        }

        $this->fragment['imageButton']['onClick'] = $click->getMarkup();
        $this->fragment['imageButton']['name'] = $name;

        return $this;
    }

    public static function create(): Button
    {
        return new Button();
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }

}