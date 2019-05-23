<?php

namespace Dmouse\GoogleBot\Markup;


class Button implements MarkupInterface
{
    private $fragment = [];

    public function textButton(string $text, OnClick $click): Button
    {
        $this->fragment['textButton']['text'] = $text;
        $this->fragment['onClick'] = $click->getMarkup();

        return $this;
    }

    public function imageButton(OnClick $click, string $name, string $icon = '', string $iconUrl = ''): Button
    {
        $this->fragment['imageButton'] = [
            'onClick' => $click->getMarkup(),
            'name' => $name,
            'icon' => $icon,
            'iconUrl' => $iconUrl,
        ];

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