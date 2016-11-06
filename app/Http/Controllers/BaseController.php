<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class BaseController extends Controller
{
    public function getRegions()
    {
        $state_id = Input::get('id');
        $regions = Region::inState($state_id);

        $option = array();
        foreach ($regions as $region) {
            $option[] = ['Value' => $region->id, 'Text' => $region->region_name];
        }
        return json_encode($option, $state_id);
    }

    public function showLogin()
    {
        return view('admin.login');
    }


}
