<?php

namespace App\Http\Controllers;

use App\Models\classs;
use App\Models\teachar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class teacherController extends Controller
{

    public function index()
    {
        $teachers = teachar::all();
        return view('admin.users.teacher', compact('teachers'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
    
    $data = $request->only([
        'name',
        'email',
        'password',
    ]);

    $data['password'] = hash::make($data['password']);

    $user = teachar::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'],
    ]);


     user::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'],
        'role' => 'Teacher',
    ]);

    return redirect()->route('teacher')->with('success', 'تم إضافة المستخدم بنجاح');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
    ]);

    $data = $request->only([
        'name',
        'email',
    ]); 
    if ($request->password && !empty($request->password)) {
        $userdata['password'] = Hash::make($request->password);
    }

    User::where('email', $request->email)->update($data);

    $user = teachar::findOrFail($id)->update($data);

    
    return redirect()->route('teacher')->with('success', 'تم تعديل المستخدم بنجاح');    
}

public function destroy($id)
{
    $teacher = teachar::findOrFail($id);

    $teacher->delete();
    $user = User::where('email', $teacher->email)->first(); 
    if ($user) {
        $user->delete();
    }

    return redirect()->route('teacher')->with('success', 'تم حذف المستخدم بنجاح');    


}
public function showClasses()
{
    $teacher = teachar::where('email', Auth::user()->email)->firstOrFail();

    $classes = classs::where('teacher_id', $teacher->id)->get();

    // عرض الفصول
    return view('teacher.classes', compact('classes'));
}

public function showStudentsInClass($classId)
{
    $class = classs::with('students')->findOrFail($classId);

    return view('teacher.students', compact('class'));
}



}