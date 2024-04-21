<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Imports\QnaImport;
use App\Models\Answer;
use App\Models\QnaExams;
use App\Models\QuestionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class QuestionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionItems = QuestionItem::with('answers')->where(['created_by' => Auth::user()->id])->get();
        return view('teacher.questionitems.index', [
            'questionItems' => $questionItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $questionItem = new QuestionItem();

        $questionItem->question = $request->input('question');
        $questionItem->created_by = Auth::user()->id;
        $questionItem->updated_by = Auth::user()->id;

        if ($questionItem->save()) {


            foreach ($request->input('answers') as $item) {
                $answer = new Answer();
                $is_correct = 0;
                if ($request->input('is_correct') == $item) {
                    $is_correct = 1;
                }
                $answer->answer = $item;
                $answer->item_id = $questionItem->id;
                $answer->is_correct = $is_correct;

                $answer->created_by = Auth::user()->id;
                $answer->updated_by = Auth::user()->id;
                $answer->save();
            }


            return response()->json(['success' => true, 'data' => $request->all()]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionItem $questionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionItem $questionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $questionItemsId = $request->input('item_id');

            QuestionItem::where('id', '=', $questionItemsId)->update([
                'question' => $request->input('editQuestion')
            ]);

            if (isset($request->answers)) {
                foreach ($request->answers as $key => $item) {

                    $is_correct = 0;

                    if ($request->is_correct == $item) {

                        $is_correct = 1;

                    }

                    Answer::where('id', $key)->update([
                        'item_id' => $questionItemsId,
                        'answer' => $item,
                        'is_correct' => $is_correct,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]);
                }

            }


            if (isset($request->edit_answers)) {
                foreach ($request->edit_answers as $value) {

                    $is_correct = 0;

                    if ($request->edit_is_correct == 1) {

                        $is_correct = 1;

                    }

                    Answer::insert([
                        'item_id' => $questionItemsId,
                        'answer' => $value,
                        'is_correct' => $is_correct,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]);
                }

            }

            return response()->json(['success' => true, 'msg' => "Ma'lumotlar tahrirlandi!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $answer = Answer::where('id', $request->id)->delete();

        if ($answer) {
            return response()->json(['success' => true, 'data' => "Ma'lumot o'chirildi"]);
        }
        return response()->json(['success' => true, 'data' => "Ma'lumot o'chirilmadi"]);
    }

    public function getData($id)
    {

        $questionItems = QuestionItem::with('answers')->where('id', $id)->first();

        if ($questionItems) {


            $data = [
                'questionItems' => $questionItems,
            ];

            return response()->json(['success' => true, 'data' => $data]);
        }

        return response()->json(['success' => false, 'data' => "Id mavjud emas !"]);
    }

    public function destroyQuestion(string $id)
    {
        QuestionItem::where('id', $id)->delete();

        return redirect()->route('teacher.questionItems.index');
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new QnaImport(), $request->file('file'));
            return response()->json(['success' => true, 'msg' => "Import Q & I successfully!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
