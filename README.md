# Google Hangouts Chat

Build the json payload to create or update messages using the Hangout Chat Webhooks

* [Official documentation](https://developers.google.com/hangouts/chat/reference/rest/v1/spaces.messages)

## Objects

* Card
* Header
* Message
* Section
* Widget
* Markup\ActionParameter
* Markup\Button
* Markup\FormAction
* Markup\Icon
* Markup\Image
* Markup\KeyValue
* Markup\OnClick

## Usage

```
<?php

use Dmouse\GoogleBot\Message;
use Dmouse\GoogleBot\Card;
use Dmouse\GoogleBot\Header;
use Dmouse\GoogleBot\Section;
use Dmouse\GoogleBot\Widget;
use Dmouse\GoogleBot\Markup\Image;
use Dmouse\GoogleBot\Markup\OnClick;
use Dmouse\GoogleBot\Markup\FormAction;
use Dmouse\GoogleBot\Markup\ActionParameter;
use Dmouse\GoogleBot\Markup\Button;
use Dmouse\GoogleBot\Markup\Icon;
use Dmouse\GoogleBot\Markup\KeyValue;

require __DIR__ . '/vendor/autoload.php';

$payload = new Message();

$param = ActionParameter::create()
    ->key('key')
    ->value('val val')
    ;

$form = FormAction::create()
    ->actionMethodName('form name')
    ->addParameter($param)
    ;

$onClick = OnClick::create()
    ->openLink('http://go.com')
    ->action($form)
    ;

$i = Image::create()
    ->imageUrl('http://image.com')
    ->aspectRatio(100)
    ->onClick($onClick)
;

$button = Button::create()
    ->textButton('text button', $onClick)
    ->imageButton($onClick, 'name image button', Icon::BOOKMARK)
;

$widget_a = Widget::create()
    ->textParagraph('text widget')
    ->image($i)
    ->addButton($button)
    ->keyValue(KeyValue::create()->topLabel("top label"))
;

$s = Section::create()
    ->header('yay up1')
    ->addWidget($widget_a)
;

$payload->text("sample text")
    ->name("My Name")
    ->createTime(time())
    ->previewText("preview text")
    ->fallbackText("fallback text")
    ->argumentText("argument text")
    ->thread("spaces/ABBAob4-eD8/threads/F3ZjK-OTJ3")

    ->addCard(
        Card::create()
            ->name("yay")
            ->header(
                Header::create()
                    ->title("yay")
                    ->subtitle("Subtitle")
                    ->imageUrl("http://example.com/...")
                    ->imageStyle(Header::IMAGE_STYLE_AVATAR)
            )
            ->addSection($s)
    )
;


print_r("" . $payload);

```