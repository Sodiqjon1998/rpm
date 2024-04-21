<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QnaExams;
use App\Models\Teacher\Question;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Question::with('quiz')->orderBy('date')->get();

        return view('student.exam.index', [
            'exams' => $exams
        ]);
    }

    public function show(string $id)
    {
        $exam = Question::with('getQnaExam')->where('enterance_id', $id)->get();
        if (count($exam) > 0) {
            if ($exam[0]['date'] == date('Y-m-d')) {
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
}
