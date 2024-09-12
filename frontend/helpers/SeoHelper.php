<?php
/**
 * Created by PhpStorm.
 */

namespace frontend\helpers;

class SeoHelper
{
    /**
     * @param $context
     * @param $title
     * @param $keywords
     * @param $description
     * @return void
     */
    public static function setMeta($context, $title = null, $keywords = null, $description = null)
    {
        $context->view->title = strip_tags($title);
        $context->view->registerMetaTag(['name' => 'keywords', 'content' => "\"" . strip_tags($keywords) . "\""]);
        $context->view->registerMetaTag(['name' => 'description', 'content' => "\"" . strip_tags($description) . "\""]);
    }
}
