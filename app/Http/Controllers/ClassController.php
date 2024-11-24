<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\classs;
use App\Models\teachar;

class ClassController extends Controller
{
    public function index()
    {
        $classes = classs::all();
        $teachers = teachar::all();
        return view('admin.class.index', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required',
        ]);

        $class = classs::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->back()->with('success', 'تم اضافة الصف بنجاح');
    }

    public function update(Request $request, $id)
    {
        $class = classs::find($id);
        $class->update([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id
        ]);
        return redirect()->back()->with('success', 'تم تعديل الصف بنجاح');
    }

    public function destroy($id)
    {
        $class = classs::find($id);
        $class->delete();
        return redirect()->back()->with('success', 'تم حذف الصف بنجاح');
    }

    public function showStudents($classId)
    {
        // جلب الفصل المحدد والطلبة الذين ينتمون إليه
        $class = classs::findOrFail($classId);
        $students = $class->students; // استعلام للحصول على الطلبة المرتبطين بالفصل

        // جلب كل الفصول لعرضها في القائمة
        $classes = classs::all();

        // إعادة العرض مع الفصول والطلبة المرتبطين بالفصل المحدد
        return view('admin.class.index', compact('class', 'students', 'classes'));
    }
}
