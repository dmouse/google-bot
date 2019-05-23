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
        unset($this->fragment['openLink']);

        $this->fragment['action'] = $formAction->getMarkup();

        return $this;
    }

    public function openLink(string $url): OnClick
    {
        unset($this->fragment['action']);

        $this->fragment['openLink']['url'] = $url;

        return $this;
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }

}