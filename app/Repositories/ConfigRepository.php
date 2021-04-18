<?php

namespace App\Repositories;

use App\Contracts\ConfigContract;
use App\Models\Config;
use App\Traits\UploadImage;

class ConfigRepository extends BaseRepository implements ConfigContract
{

    /**
     * ConfigRepository constructor.
     * @param Config $model
     */
    public function __construct(Config $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getConfig()
    {
        return $this->model->with('category', 'product')->first();
    }

    private function handleImageUpload($params)
    {
        $imageKeys = ['home_carousel_image_1', 'home_carousel_image_2', 'home_carousel_image_3'];
        foreach ($imageKeys as $key) {
            if (array_key_exists($key, $params) && !empty($params[$key])) {
                try {
                    $params[$key] = UploadImage::upload($params[$key], 'products');
                } catch (\Throwable $th) {
                    throw $th;
                }
            } else {
                unset($params[$key]);
            }
        }
        return $params;
    }

    public function updateConfig(array $params, string $id)
    {
        try {
            $params = $this->handleImageUpload($params);
        } catch (\Throwable $e) {
        }
        return $this->update($params, $id);

    }

}
