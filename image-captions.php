<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class ImageCaptionsPlugin
 * @package Grav\Plugin
 */
class ImageCaptionsPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        $this->enable([
            'onPageContentProcessed' => ['onPageContentProcessed', 0]
        ]);
    }

    /**
     * @param Event $e
     */
    public function onPageContentProcessed(Event $e)
    {
        // Load jQuery
        $this->grav['assets']->addJs('jquery');

        // Search scope
        $scope = trim($this->grav['config']->get('plugins.image-captions.scope'));
        ($scope == '') ? 'body' : $scope;

        // Search class
        $class = '.' . $this->grav['config']->get('plugins.image-captions.class');
        $class = trim(str_replace(' ', '.', $class));

        $init = "jQuery(document).ready(function() {\n";
        $init .= "    jQuery('". $scope ."').each(function(index) {\n";
        $init .= "        var scope = jQuery(this);\n";
        $init .= "        jQuery('img". $class ."', scope).each(function(index, element) {\n";
        $init .= "            var image = jQuery(this);\n";
        $init .= "            if (image.attr('title').length > 0) {\n";
        $init .= "                var title = image.attr('title');\n";
        $init .= "                image.wrap('<figure class=\"image-with-caption\"></figure>');\n";
        $init .= "                image.after('<figcaption class=\"image-caption\">' + title + '</figcaption>');\n";
        $init .= "            }\n";
        $init .= "        });\n";
        $init .= "    });\n";
        $init .= "});\n";

        $this->grav['assets']->addInlineJs($init, ['group' => 'bottom']);
    }
}
