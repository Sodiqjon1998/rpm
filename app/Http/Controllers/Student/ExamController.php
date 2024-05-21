<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamsAnswer;
use App\Models\ExamsAttempt;
use App\Models\QnaExams;
use App\Models\Teacher\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExamController extends Controller
{
    public function index()
    {
        $exams = Question::with('quiz')->orderBy('date', 'DESC')->get();

        return view('student.exam.index', [
            'exams' => $exams
        ]);
    }

    public function show(string $id)
    {
        $exam = Question::with('getQnaExam')->where('enterance_id', $id)->get();
        if (count($exam) > 0) {
            $attemptCount = ExamsAttempt::where(['exam_id' => $exam[0]['id'], 'user_id' => \Auth::user()->id])->count();
            if ($attemptCount >= $exam[0]['attempt']) {
                return view('student.exam.show', [
                    'success' => false,
                    'msg' => 'Urunishlar qolmadi',
                    'exam' => $exam
                ]);
            } else if ($exam[0]['date'] == date('Y-m-d')) {
                if (count($exam[0]['getQnaExam']) > 0) {
                    $qnAnswers = QnaExams::where('question_id', $exam[0]['id'])->with('questionItems', 'answers')->inRandomOrder()->get();
                    return view('student.exam.show', [
                        'success' => true,
                        'exam' => $exam,
                        'qnAnswers' => $qnAnswers
                    ]);
                } else {
                    return view('student.exam.show', [
                        'success' => false,
                        'msg' => 'Qo\'yilgan imtihonda testlar to\'liq emas!',
                        'exam' => $exam
                    ]);
                }
            } elseif ($exam[0]['date'] > date('Y-m-d')) {
                return view('student.exam.show', [
                    'success' => false,
                    'msg' => 'Qo\'yilgan imtihonlar vaqti kelmadi!' . $exam[0]['date'],
                    'exam' => $exam
                ]);
            } else {
                return view('student.exam.show', [
                    'success' => false,
                    'msg' => 'Qo\'yilgan imtihonlar vaqti tugadi!' . $exam[0]['date'],
                    'exam' => $exam
                ]);
            }
        } else {
            return view('404');
        }
    }


    public function submitExam(Request $request)
    {
        $attempt_id = ExamsAttempt::insertGetId([
            'exam_id' => $request->exam_id,
            'user_id' => Auth::user()->id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        $qCount = count($request->q);

        for ($i = 0; $i < $qCount; $i++) {
            if (!empty(request()->input('ans_' . ($i + 1)))) {
                ExamsAnswer::insert([
                    'attempt_id' => $attempt_id,
                    'question_item_id' => $request->q[$i],
                    'answer_id' => request()->input('ans_' . ($i + 1)),
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id
                ]);
            }
        }

        return redirect()->route('thank-you', $request->exam_id);
    }

    public function thankYou(string $exam_id)
    {
        $attempts = ExamsAttempt::with(['examAnswers', 'exam', 'answer'])
            ->where('exam_id', $exam_id)
            ->where('user_id', Auth::user()->id)
            ->leftJoin('exams_answer', 'exams_attempt.id', '=', 'exams_answer.attempt_id')
            ->orderBy('exam_id', 'DESC')
            ->first();

            // dd($attempts);

        return view('student.exam.thank-you', [
            'attempts' => $attempts
        ]);
    }
}
