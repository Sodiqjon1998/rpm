<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('slider')->paginate(20);

        return view('backend.slider.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'img' => 'required',
            'sub_title' => 'required',
            'title' => 'required',
        ]);


        $slider = new Slider();

        if ($request->file('img')) {
            $slider->text = $request->text;
            $slider->sub_title = $request->sub_title;
            $slider->title = $request->title;
            $slider->status = $request->status;
            $slider->img = $request->file('img')->store('/images/slider', ['disk' => 'slider']);
            if ($slider->save()) {
                return redirect('slider/index')->with('success', 'Ma\'lumotlar kiritildi');
            }
            return redirect()->back()->with('errors', 'Ma\lumotni saqlashda xatolik');
        }

        return redirect()->back()->with('errors', 'Rasm yuklanmadi');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $slider = Slider::find($id);

        return view('backend.slider.show', [
            'slider' => $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->back()->with(['error' => 'Ma\'lumot topilmadi'], 404);
        }

        return view('backend.slider.edit', [
            'slider' => $slider
        ]);
    }


    /**
     * @param Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $slider->text = $request->text;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->status = $request->status;

        if ($request->file('img') != null && Storage::disk('slider')->delete($slider->getOriginal('img'))) {
            $slider->img = $request->file('img')->store('/images/slider', ['disk' => 'slider']);
            if ($slider->update()) {
                return redirect('slider/index')->with('success', 'Ma\'lumotlar kiritildi');
            }
        } else {
            $slider->img = $slider->getOriginal('img');
            if ($slider->update()) {
                return redirect('slider/index')->with('success', 'Ma\'lumotlar kiritildi');
            }
        }

        return redirect()->back()->with('danger', 'Rasm yuklanmadi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->back()->with(['error' => 'Ma\'lumot topilmadi'], 404);
        }

        $slider->delete();
        $deleteImage = Storage::disk('my_files')->delete($slider->getOriginal('img'));
        if ($slider && $deleteImage) {
            return redirect()->back()->with(['success' => 'Ma\'lumot muvaffaqiyatli o\'chirildi']);
        }

        return redirect()->back()->with(['success' => 'Rasmni o\'chirishda muammo']);
    }
}
