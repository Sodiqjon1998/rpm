<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\QnaExams;
use App\Models\QuestionItem;
use App\Models\Teacher\Question;
use Illuminate\Http\JsonResponse;
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
    public function show(Request $request)
    {
        try {

            $questions = Question::with('quiz')->where(['id' => $request->question_id])->first();

            return response()->json(['success' => true, 'data' => $questions]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'msg' => $exception->getMessage()]);
        }
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
            $question = Question::where('id', $request->input('question_id'))->first();

            $question->name = $request->input('name');
            $question->date = $request->input('date');
            $question->time = $request->input('time');
            $question->attempt = $request->input('attempt');
            $question->quiz_id = $request->input('quiz_id');

            $question->save();

            return response()->json(['success' => true, 'data' => "O'zgartirildi!"]);
        } catch (\Exception $e) {
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


    /**
     * @param $id
     * @return JsonResponse
     */
    public function getData($id)
    {

        $question = Question::where('id', $id)->get();

        if ($question) {
            return response()->json(['success' => true, 'data' => $question]);
        }


        return response()->json(['success' => false, 'data' => "Id mavjud emas !"]);
    }


    public function getQuestionItems(Request $request)
    {
        try {
            $questions = QuestionItem::all();

            if (count($questions) > 0) {
                $data = [];
                $counter = 0;

                foreach ($questions as $question) {
                    $qnaExams = QnaExams::where(['question_id' => $request->question_id, 'question_item_id' => $question->id])->get();
                    if (count($qnaExams) == 0) {
                        $data[$counter]['id'] = $question->id;
                        $data[$counter]['question'] = $question->question;
                        $counter++;
                    }
                }
                return response()->json(['success' => true, 'msg' => "QuestionItems data!", "data" => $data]);
            } else {
                return response()->json(['success' => false, 'msg' => "QuestionItems data not Found!"]);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'msg' => $exception->getMessage()]);
        }
    }

    public function setData(Request $request)
    {
        try {
            if (isset($request->questionItems_ids)) {
                foreach ($request->questionItems_ids as $id) {
                    QnaExams::insert([
                        'question_id' => $request->question_id,
                        'question_item_id' => $id,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]);
                }

                return response()->json(['success' => true, 'msg' => "Successfully!"]);
            } else {
                return response()->json(['success' => false, 'msg' => "Not Successfully!"]);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'msg' => $exception->getMessage()]);
        }
    }
}
