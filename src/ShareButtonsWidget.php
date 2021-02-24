<?php
namespace saavtek\ShareButtonsWidget;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This Widget creates Social Media sharing buttons
 * Configure the required "og" fields in the view
 * (og:title, og:image, etc) so that FaceBook and LinkedIn 
 * populate the post content automatically.
 */

class ShareButtonsWidget extends Widget
{
    public $title;
    public $url;
    
    public function init()
    {
        parent::init();
        
        if ($this->title === null) {
            $this->title = urlencode(Yii::$app->name);
        } else {
            $this->title = urlencode($this->title);
        }

        if ($this->url === null) {
            $this->url = urlencode(Url::base(true));
        } else {
            $this->url = urlencode($this->url);
        }
    }

    public function run()
    {   
        $FB = Html::a(
            '<svg class="icon"><use xlink:href="/icons/icons.svg#facebook-square"></use></svg> Share', 
            "https://www.facebook.com/sharer/sharer.php?u=$this->url",
            ['class' => 'btn btn-sm btn-fb text-white', 'target' => '_blank']
        );

        $TW = Html::a(
            '<svg class="icon"><use xlink:href="/icons/icons.svg#twitter-square"></use></svg> Tweet', 
            "https://twitter.com/share?text=$this->title&url=$this->url", //&hashtags=hashtag1,hashtag2,hashtag3
            ['class' => 'btn btn-sm btn-tw text-white', 'target' => '_blank']
        );

        $LI = Html::a(
            '<svg class="icon"><use xlink:href="/icons/icons.svg#linkedin"></use></svg>&nbsp;&nbsp;Post&nbsp;', 
            "https://www.linkedin.com/sharing/share-offsite/?url=$this->url",
            ['class' => 'btn btn-sm btn-li text-white', 'target' => '_blank']
        );

        $ML = Html::mailto(
            '<svg class="icon"><use xlink:href="/icons/icons.svg#envelope-square"></use></svg>&nbsp;&nbsp;Mail&nbsp;', 
            "?subject=$this->title&body=$this->url", 
            ['class' => 'btn btn-sm btn-secondary text-white']
        );

        return "$FB $TW $LI $ML";
    }
}
?>