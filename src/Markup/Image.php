<?php

namespace Dmouse\GoogleBot\Markup;

class Image implements MarkupInterface
{
    private $fragment = [];

    public static function create(): Image
    {
        return new Image();
    }

    public function imageUrl(string $url): Image
    {
        return $this;
    }

    public function onClick(OnClick $click): Image
    {
        $this->fragment['onClick'] = $click->getMarkup();

        return $this;
    }

    public function aspectRatio(int $radio): Image
    {
        $this->fragment['aspectRatio'] = $radio;

        return $this;
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }
}