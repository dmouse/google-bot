<?php
/**
 * Created by PhpStorm.
 * User: dmouse
 * Date: 5/22/19
 * Time: 2:39 PM
 */

namespace Dmouse\GoogleBot\Markup;


class ActionParameter implements MarkupInterface
{
    private $fragment;

    public static function create(): ActionParameter
    {
        return new ActionParameter();
    }

    public function key(string $key): ActionParameter
    {
        $this->fragment['key'] = $key;

        return $this;
    }

    public function value(string $value): ActionParameter
    {
        $this->fragment['value'] = $value;

        return $this;
    }

    public function getMarkup(): array
    {
        return $this->fragment;
    }

}