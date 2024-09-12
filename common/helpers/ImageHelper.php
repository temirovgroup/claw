<?php
/**
 * Created by PhpStorm.
 */

namespace common\helpers;

class ImageHelper
{
    /**
     * @param $model
     * @param $size
     * @param $hideIsMain
     * @return string
     */
    public static function getImageUrl($model, $size = '', $hideIsMain = false): string
    {
        if ($hideIsMain) {
            $images = $model->getImages();

            foreach ($images as $image) {
                if (!$image->isMain) {
                    return $image->getUrl($size);
                }
            }
        }

        $image = $model->getImage(false);

        return $image->getUrl($size);
    }

    /**
     * @param $model
     * @param $size
     * @param $hideIsMain
     * @return mixed
     */
    public static function getImagesUrl($model, $size = '', $hideIsMain = false)
    {
        $images = $model->getImages();

        return array_reduce($images, function ($imagesUrl, $image) use ($size, $hideIsMain) {
            if ($hideIsMain && $image->isMain) {
                return $imagesUrl;
            }

            $imagesUrl[] = $image->getUrl($size);

            return $imagesUrl;
        }, []);
    }

    /**
     * @param $model
     * @param $size
     * @param $hideIsMain
     * @return mixed
     */
    public static function getImages($model, $size = '', $hideIsMain = false)
    {
        $images = $model->getImages();

        return array_reduce($images, function ($images, $image) use ($size, $hideIsMain) {
            if ($hideIsMain && $image->isMain) {
                return $images;
            }

            $images[] = [
                'id' => $image['id'],
                'url' => $image->getUrl($size),
            ];

            return $images;
        }, []);
    }

    /**
     * @param $model
     * @param $size
     * @return string
     */
    public static function getSlideImageUrl($model, $size = '')
    {
        $images = $model->getImages();

        return array_reduce($images, function ($images, $image) use ($size) {
            if ($image->isMain) {
                $images = $image->getUrl($size);
            }

            return $images;
        }, '');
    }
}
