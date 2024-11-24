<?php

namespace App\Http\Controllers;

use App\Models\exam;
use App\Models\quizzes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\log;
use App\Models\teachar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;


class quizzesController extends Controller
{

    public function index()
    {
        $quizes = DB::table('quizzes')->get();
        return view('quizzes', compact('quizes'));
    }

    public function create()
    {
        return view('createQuiz');
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات الواردة
        $request->validate([
            'quiz_data' => 'required|json',
        ]);
        $teacher = teachar::where('email', Auth::user()->email)->firstOrFail();

        $quiz = new exam();
        $quiz->user_id = $teacher->id;
        $quiz->quiz_data = $request->quiz_data;
    
        DB::table('exams')->insert([
            'quiz_data' => $quiz->quiz_data,
            'teacher_id' => $teacher->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json(['message' => 'تم حفظ الاختبار بنجاح!'], 200);
    }
    
    

    public function show($id)
    {
        $quiz = quizzes::find($id);
        return view('showQuiz', compact('quiz'));
    }

}
