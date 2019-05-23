<?php

namespace Dmouse\GoogleBot\Markup;

class FormAction implements MarkupInterface
{
    private $fragment = [];

    public static function create(): FormAction
    {
        return new FormAction();
    }

    public function actionMethodName(string $name): FormAction
    {
        $this->fragment['actionMethodName'] = $name;

        return $this;
    }

    public function addParameter(ActionParameter $parameter): FormAction
    {
        $this->fragment['parameters'][] = $parameter->getMarkup();
        return $this;
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }
}
