<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Models\GroupItem;
use App\Http\Requests\GroupItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $groupitems = DB::table('group_item')
            ->where('created_by', '=', Auth::user()->id)
            ->get();

        return view('teacher.groupitems.index', [
            'groupitems' => $groupitems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('teacher.groupitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupItemRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupItemRequest $request)
    {
        $groupitem = new GroupItem;
        $groupitem->group_id = $request->input('group_id');
        $groupitem->student_id = $request->input('student_id');
        $groupitem->started_at = $request->input('started_at');
        $groupitem->finished_at = $request->input('finished_at');
        $groupitem->status = $request->input('status');
        $groupitem->created_by = $request->input('created_by');
        $groupitem->updated_by = $request->input('updated_by');
        $groupitem->save();

        return to_route('teacher.groupitems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $groupitem = GroupItem::findOrFail($id);
        return view('teacher.groupitems.show', ['groupitem' => $groupitem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $groupitem = GroupItem::findOrFail($id);
        return view('teacher.groupitems.edit', ['groupitem' => $groupitem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupItemRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupItemRequest $request, $id)
    {
        $groupitem = GroupItem::findOrFail($id);
        $groupitem->group_id = $request->input('group_id');
        $groupitem->student_id = $request->input('student_id');
        $groupitem->started_at = $request->input('started_at');
        $groupitem->finished_at = $request->input('finished_at');
        $groupitem->status = $request->input('status');
        $groupitem->created_by = $request->input('created_by');
        $groupitem->updated_by = $request->input('updated_by');
        $groupitem->save();

        return to_route('teacher.groupitems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $groupitem = GroupItem::findOrFail($id);
        $groupitem->delete();

        return to_route('teacher.groupitems.index');
    }
}
