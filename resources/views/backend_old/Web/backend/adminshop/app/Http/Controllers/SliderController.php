<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $slider = $this->slider->cursorPaginate(3);
        return view('sliders.index', compact('slider'));

    }
    public function create()
    {
        return view('sliders.add');
    }
    public function store(Request $request)
    {
     $datainsert = [
         'name' => $request->name,
         'description' => $request->description
     ];
        $dataupload = $this->StoreImageUpload($request, 'image_path', 'slider');
        if(!empty($dataupload)){
            $datainsert ['image_name'] = $dataupload['file_name'];
            $datainsert ['image_path'] = $dataupload['file_path'];
        }

        $this->slider->create($datainsert);
        return redirect()->route('slider_index');
    }
    public function edit($id)
    {
        $sliders = $this->slider->find($id);
        return view('sliders.edit', compact('sliders'));
    }
    public function update(Request $request, $id)
    {
        $dataupdate = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataupload = $this->StoreImageUpload($request, 'image_path', 'slider');
        if(!empty($dataupload)){
            $dataupdate ['image_name'] = $dataupload['file_name'];
            $dataupdate ['image_path'] = $dataupload['file_path'];
        }

        $this->slider->find($id)->update($dataupdate);
        return redirect()->route('slider_index');
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->slider);
    }
}
