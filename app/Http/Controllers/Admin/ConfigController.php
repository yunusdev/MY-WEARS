<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ConfigContract;
use App\Http\Controllers\Controller;
use App\Models\Config;
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

        $data['config'] =  $this->configRepository->getConfig();
        return view('admin.config.index')->with($data);

    }

    public function update(Request $request, Config $config){

        $this->validate($request, [

            'home_caption_top_1' => 'required',
            'home_caption_bottom_1' => 'required',
            'home_caption_top_2' => 'required',
            'home_caption_bottom_2' => 'required',
            'home_caption_top_3' => 'required',
            'home_caption_bottom_3' => 'required',

            'delivery_free' => 'required',
            'min_amount_free_delivery' => 'required',
            'flat_lagos_delivery_fee' => 'required',
            'flat_farther_lagos_delivery_fee' => 'required',
            'farther_lagos_lgas' => 'required|array|min:1',
            'flat_outside_lagos_delivery_fee' => 'required',

            'contact_email' => 'required',
            'contact_phone' => 'required',

        ]);

        $params = $request->all();

        $params['farther_lagos_lgas'] = implode(',', $params['farther_lagos_lgas']);

        $this->configRepository->updateConfig($params, $config->id);

        return $config->fresh();

    }
}
