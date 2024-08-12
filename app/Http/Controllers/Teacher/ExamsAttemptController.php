<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamsAttempt;

class ExamsAttemptController extends Controller
{
    public function index()
    {
        $examAttempts = ExamsAttempt::with(['examAnswers', 'exam'])
        ->where('created_at', '=', date('Y-m-d'))
        ->get();

        // dd($examAttempts);

        return view('teacher.examsattempt.index', [
            'examAttempts' => $examAttempts
        ]);
    }
}
