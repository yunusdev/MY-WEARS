<?php

namespace App\Repositories;

use App\Contracts\ConfigContract;
use App\Models\Config;
use App\Models\ForeignDeliveryCountry;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\DB;

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

    public function getForeignDeliveryCountries()
    {
        return ForeignDeliveryCountry::all();

    }

    public function updateForeignDeliveryCountries(array $params)
    {
        try {

            DB::beginTransaction();

            ForeignDeliveryCountry::truncate();

            foreach ($params as $item){

                ForeignDeliveryCountry::create($item);

            }

            DB::commit();

        }catch (\Throwable $throwable){

            DB::rollback();

            throw $throwable;

        }


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
