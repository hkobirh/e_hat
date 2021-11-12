<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Slider:: all();
        return view('backend.sliders.manage', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data = Slider::where('id', $id)->first();
        return view('backend.sliders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function update(Request $request, $slider)
    {
        $slider = Slider::find($slider);
        $request->validate([
            'banner_title' => 'required',
            'background_image' => 'required',
        ]);
        if ($slider) {
            try {
                $slider->banner_title = $request->banner_title;
                $slider->background_image = $request->background_image;

                if ($request->file('background_image')) {

                    $file = $request->file('background_image');
                    $fileName = date('YmdHis.') . $file->getClientOriginalExtension();
                    $slider->background_image = $fileName;

                    if (file_exists(storage_path('uploads/sliders/' . $slider->background_image))) {

                        unlink(storage_path('uploads/sliders/' . $slider->background_image));
                    }
                    $file->storeAs('uploads/sliders/', $fileName);


                }
                $slider->update();
                $message = 'Data updated successfully.';

            } catch (Exception $e) {
                $status = false;
            }
            return response()->json([
                'status' => $status ?? true,
                'message' => $message,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
