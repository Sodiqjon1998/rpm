<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::find()->paginate(20);
        return view('teacher.quiz.index', [
            'quizzes' => $quizzes
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
            $quiz = new Quiz();
            $quiz->name = $request->input('name');
            $quiz->teacher_id = Auth::user()->id;
            $quiz->created_by = Auth::user()->id;
            $quiz->updated_by = Auth::user()->id;
            if (empty($request->input('status'))) {
                $quiz->status = 0;
            } else {
                $quiz->status = 1;
            }
            $quiz->save();
            return response()->json(['success' => true, 'msg' => "Ma'lumot saqlandi!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('teacher.quiz.show', [
            'quiz' => Quiz::with('teacher')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('teacher.quiz.edit', [
            'quiz' => Quiz::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->teacher_id = Auth::user()->id;
        $quiz->created_by = Auth::user()->id;
        $quiz->updated_by = Auth::user()->id;
        if (empty($request->input('status'))) {
            $quiz->status = 0;
        } else {
            $quiz->status = 1;
        }
        $quiz->update();

        return redirect()->route('teacher.quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('teacher.quiz.index');
    }
}
