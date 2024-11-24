<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    public function studentsExam ()
    {
       

        $user = Auth::user();

$exams = DB::table('exams')
    ->join('teachars', 'exams.teacher_id', '=', 'teachars.id')
    ->join('classses', 'classses.teacher_id', '=', 'teachars.id')
    ->join('users', 'users.class_id', '=', 'classses.id')
    ->where('users.id', $user->id)
    ->select('exams.*', 'users.name as student_name', 'classses.name as class_name', 'teachars.name as teacher_name')
    ->limit(25)
    ->get();

return view('studentsExam', compact('exams'));
}
}
