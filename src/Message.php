<?php

namespace Dmouse\GoogleBot;

class Message
{
    /**
     * @var string
     */
    private $payload = [];

    public function name(string $name): Message
    {
        $this->payload['name'] = $name;

        return $this;
    }

    /**
     * @param string $time Timestamp
     *
     * @return Message
     */
    public function createTime(string $time): Message
    {
        $this->payload['createTime'] = $time;

        return $this;
    }

    public function previewText(string $text): Message
    {
        $this->payload['previewText'] = $text;

        return $this;
    }

    public function text(string $text): Message
    {
        $this->payload['text'] = $text;

        return $this;
    }

    public function fallbackText(string $text): Message
    {
        $this ->payload['fallbackText'] = $text;

        return $this;
    }

    public function argumentText(string $text): Message
    {
        $this ->payload['argumentText'] = $text;

        return $this;
    }

    public function thread(string $name)
    {
        $this->payload['thread'] = [
            'name' => $name,
        ];

        return $this;
    }

    public function addCard(Card $card)
    {
        $this->payload['cards'][] = $card::getCard();

        return $this;
    }

    public function __toString()
    {
        return json_encode($this->payload);
    }
}