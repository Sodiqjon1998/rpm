<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $quiz_id)
    {
        $questions = Question::find($quiz_id)->paginate();

        return view('teacher.question.index', [
            'questions' => $questions,
            'quiz_id' => $quiz_id
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
        try {
            $question = new Question();
            $question->name = $request->input('name');
            $question->date = $request->input('date');
            $question->time = $request->input('time');
            $question->attempt = $request->input('attempt');
            $question->quiz_id = $request->input('quiz_id');
            $question->created_by = Auth::user()->id;
            $question->updated_by = Auth::user()->id;
            $question->save();
            return response()->json(['success' => true, 'msg' => "Ma'lumot saqlandi!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $question = Question::where('id',$request->input('question_id'))->first();

            $question->name = $request->input('name');
            $question->date = $request->input('date');
            $question->time = $request->input('time');
            $question->attempt = $request->input('attempt');
            $question->quiz_id = $request->input('quiz_id');

            $question->save();

            return response()->json(['success' => true, 'data' => "O'zgartirildi!"]);
        }catch (\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::findOrFail($id)->delete();

        return redirect()->route('teacher.quiz.index');
    }


    public function getData($id)
    {

        $question = Question::where('id', $id)->get();

        if ($question) {
            return response()->json(['success' => true, 'data' => $question]);
        }


        return response()->json(['success' => false, 'data' => "Id mavjud emas !"]);
    }
}
