<?php

namespace App\Http\Controllers;

use App\Contracts\ConfigContract;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //

    private $configRepository;

    /**
     * ConfigController constructor.
     * @param ConfigContract $configRepository
     */
    public function __construct(ConfigContract $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function index(){

        return $this->configRepository->getConfig();

    }
}
