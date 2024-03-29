<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index(){
        $setting = $this->setting->Simplepaginate(5);
        return view('settings.index', compact('setting'));
    }
    public function create(){
        return view('settings.add');
    }
    public function store(Request $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        return redirect()->route('setting_index');
    }
    public function edit($id){
        $settings = $this->setting->find($id);
        return view('settings.edit', compact('settings'));

    }
    public function update(Request $request, $id){
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        return redirect()->route('setting_index');
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->setting);
    }
}
