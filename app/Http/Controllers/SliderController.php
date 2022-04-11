<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use App\Traits\StorageImage;

class SliderController extends Controller
{
    //
    use StorageImage;

    private $sliders;
    public function __construct(Slider $slider)
    {
        $this->sliders = $slider;
    }
    public function index()
    {

        $sliders = $this->sliders->paginate(5);
        return view('admin.slider.indexSlider', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.addSlider');
    }
    public function store(SliderAddRequest $request)
    {
        $dataSliderCreate = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataSliderImage = $this->starogeUpload($request, 'image_path', '/slider');
        if (!empty($dataSliderImage)) {
            $dataSliderCreate['image_path'] = $dataSliderImage['file_path'];
        }
        // dd($dataSliderCreate);
        $this->sliders->create($dataSliderCreate);
        return redirect(route('slider.index'));
    }
    public function edit($id)
    {
        $slider = $this->sliders->find($id);
        return view('admin.slider.editSlider', compact('slider'));
    }
    public function update(SliderEditRequest $request, $id)
    {
        $dataSliderUpdate = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataSliderImage = $this->starogeUpload($request, 'image_path', '/slider');
        if (!empty($dataSliderImage)) {
            $dataSliderUpdate['image_path'] = $dataSliderImage['file_path'];
        }
        $this->sliders->find($id)->update($dataSliderUpdate);
        return redirect(route('slider.index'));
    }
    public function del($id)
    {
        try {
            //code...
            $this->sliders->find($id)->delete();
            return response()->json([
                'code' => 200,
                'status' => 'success'
            ], status: 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'code' => 500,
                'status' => 'fail'
            ], status: 500);
        }
    }
}
