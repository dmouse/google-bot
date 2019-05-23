<?php

namespace Dmouse\GoogleBot\Markup;

class OnClick implements MarkupInterface
{
    private $fragment = [];

    public static function create(): OnClick
    {
        return new OnClick();
    }

    public function action(FormAction $formAction): OnClick
    {
        $this->fragment['action'] = $formAction->getMarkup();

        return $this;
    }

    public function openLink(string $url): OnClick
    {
        $this->fragment['openLink'] = $url;

        return $this;
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }

}