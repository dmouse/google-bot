<?php

namespace Dmouse\GoogleBot;

class Section
{

    private $fragment = [];

    public static function create(): Section
    {
        return new Section();
    }

    public function header(string $header): Section
    {
        $this->fragment['header'] = $header;

        return $this;
    }

    public function addWidget(Widget $widget): Section
    {
        $this->fragment['widgets'][] = $widget->getWidget();

        return $this;
    }

    public function getSection(): array
    {
        return $this->fragment;
    }
}
