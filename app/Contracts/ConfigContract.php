<?php

namespace App\Contracts;

interface ConfigContract
{

    public function getConfig();

    public function getForeignDeliveryCountries();

    public function updateConfig(array $params, string $id);

    public function updateForeignDeliveryCountries(array $params);


}
