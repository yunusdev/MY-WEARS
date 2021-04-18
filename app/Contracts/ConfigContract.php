<?php

namespace App\Contracts;

interface ConfigContract
{

    public function getConfig();

    public function updateConfig(array $params, string $id);


}
