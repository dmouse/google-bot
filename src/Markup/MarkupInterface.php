<?php

namespace Dmouse\GoogleBot\Markup;

interface MarkupInterface
{

    public static function create();

    public function getMarkup(): array ;

}
