<?php

namespace Dmouse\GoogleBot\Markup;

class KeyValue implements MarkupInterface
{

    private $fragment;

    public static function create(): KeyValue
    {
        return new KeyValue();
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }

    public function topLabel(string $label): KeyValue
    {
        $this->fragment['topLabel'] = $label;

        return $this;
    }

    public function content(string $content): KeyValue
    {
        $this->fragment['content'] = $content;

        return $this;
    }

    public function contentMultiline(bool $content): KeyValue
    {
        $this->fragment['contentMultiline'] = $content;

        return $this;
    }

    public function bottomLabel(string $label): KeyValue
    {
        $this->fragment['bottomLabel'] = $label;

        return $this;
    }

    public function onClick(OnClick $click): KeyValue
    {
        $this->fragment['onClick'] = $click->getMarkup();

        return $this;
    }

    public function icon(string $icon): KeyValue
    {
        $this->fragment['icon'] = $icon;

        return $this;
    }

    public function iconUrl(string $url): KeyValue
    {
        $this->fragment['iconUrl'] = $url;

        return $this;
    }

    public function button(Button $button): KeyValue
    {
        $this->fragment['button'] = $button->getMarkup();

        return $this;
    }
}