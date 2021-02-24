# yii2-share-buttons-widget
Social Media share buttons widget.

This Widget creates Social Media sharing buttons.

Note: Configure the required "og" fields in the view (og:title, og:image, etc) so that FaceBook and LinkedIn populate the post content automatically.

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

## Usage
```php
    echo ShareButtonsWidget::widget([
        'title' => $someTitle,
        'url' => Url::to([$someUrl], true),
    ])
```