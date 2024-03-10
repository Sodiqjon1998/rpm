<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Http\Requests\GroupRequest;
use App\Models\GroupItem;
use App\Models\Teacher\GroupTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $groups = GroupTeacher::find()->with('course')->get();


        return view('teacher.groups.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('teacher.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupRequest $request)
    {

        $group = new GroupTeacher();
        $group->name = $request->input('name');
        $group->teacher_id = Auth::getUser()->id;
        $group->course_id = $request->input('course_id');
        $group->lesson_per_month = strtotime($request->input('lesson_per_month'));
        if(empty($request->input('status'))){
            $group->status = 0;
        }
        else{
            $group->status = 1;
        }
        $group->created_by = Auth::user()->id;
        $group->updated_by = Auth::user()->id;
        $group->save();

        return to_route('teacher.groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $group = GroupTeacher::findOrFail($id);

        $groupItemActives = DB::table('group_item')
            ->where('group_id', '=', $id)
            ->where('status', '=', GroupItem::STATUS_ACTIVE)
            ->get();

        $groupItemInActives = DB::table('group_item')
            ->where('group_id', '=', $id)
            ->where('status', '=', GroupItem::STATUS_FINISHED)
            ->get();

        return view('teacher.groups.show', [
            'group' => $group,
            'groupItemActives' => $groupItemActives,
            'groupItemInActives' => $groupItemInActives,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $group = GroupTeacher::findOrFail($id);
        return view('teacher.groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupRequest $request, $id)
    {
        $group = GroupTeacher::findOrFail($id);
        $group->name = $request->input('name');
        $group->course_id = $request->input('course_id');
        $group->teacher_id = Auth::getUser()->id;
        $group->lesson_per_month = strtotime($request->input('lesson_per_month'));
        if(empty($request->input('status'))){
            $group->status = 0;
        }
        else{
            $group->status = 1;
        }
        $group->save();

        return to_route('teacher.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $group = GroupTeacher::findOrFail($id);
        $group->delete();

        return to_route('teacher.groups.index');
    }

    public function multiple(Request $request)
    {
        if ($request->multiple != null) {
            foreach ($request->multiple as $value) {

                $groupItems = new GroupItem();

                $groupItems->group_id = $request->input('group_id');
                $groupItems->student_id = $value;
                $groupItems->started_at = strtotime('now');
                $groupItems->finished_at = null;
                $groupItems->status = GroupItem::STATUS_ACTIVE;
                $groupItems->created_by = Auth::user()->id;
                $groupItems->updated_by = Auth::user()->id;

                if (!$groupItems->save()) {
                    return redirect()->back();
                }
            }
        }

        return redirect()->back();
    }


    public function removeStudent($id)
    {
        $groupItem = GroupItem::findOrFail($id);

        $groupItem->finished_at = strtotime('now');
        $groupItem->status = GroupItem::STATUS_FINISHED;

        if ($groupItem->save()) {
            return redirect()->back();
        }
    }
}
