<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')->paginate(20);

        return view('backend.event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'img' => 'required',
            'location' => 'required',
            'title' => 'required',
        ]);


        $slider = new Event();

        if ($request->file('img')) {
            $slider->text = $request->text;
            $slider->location = $request->location;
            $slider->title = $request->title;
            $slider->day = $request->day;
            $slider->date_start = strtotime($request->date_start);
            $slider->date_end = strtotime($request->date_end);
            $slider->status = $request->status;
            $slider->img = $request->file('img')->store('/images/event', ['disk' => 'event']);
            if ($slider->save()) {
                return redirect('event/index')->with('success', 'Ma\'lumotlar kiritildi');
            }
            return redirect()->back()->with('errors', 'Ma\'lumotni saqlashda xatolik');
        }

        return redirect()->back()->with('errors', 'Rasm yuklanmadi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect()->back()->with(['error' => 'Ma\'lumot topilmadi'], 404);
        }

        $event->delete();
        $deleteImage = Storage::disk('event')->delete($event->getOriginal('img'));
        if ($event && $deleteImage) {
            return redirect()->back()->with(['success' => 'Ma\'lumot muvaffaqiyatli o\'chirildi']);
        }

        return redirect()->back()->with(['success' => 'Rasmni o\'chirishda muammo']);
    }
}
