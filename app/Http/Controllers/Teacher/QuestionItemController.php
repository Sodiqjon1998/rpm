<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\QuestionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionItems = QuestionItem::with('answers')->get();
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
                if ($request->input('is_correct') == $item){
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionItem $questionItem)
    {
        //
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
}
