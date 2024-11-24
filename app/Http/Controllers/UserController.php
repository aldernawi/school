<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\classs;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function student()
    {
        $classes = classs::all();
        $students = User::where('role', 'student')->get();
        return view('admin.users.student', compact('students', 'classes'));
    }

   

    public function admin()
    {
        $classes = classs::all();
        $admins =  User::where('role', 'admin')->get();
        return view('admin.users.admin', compact('admins', 'classes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
       ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'class_id' => $request->class_id
        ]);

        return redirect()->back()->with('success', 'تم اضافة المستخدم بنجاح');
    }

    public function update(Request $request, $id)
    {
       /* $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // تأكد من وجود حد أدنى لطول كلمة المرور
            'role' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);
    */
        $user = User::findOrFail($id);

        $data = $request->only([
            'name',
            'email',
            'role',
            'phone',
            'address',
            'class_id'
        ]);
    
        if ($request->password && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data);
    
        return redirect()->back()->with('success', 'تم تعديل المستخدم بنجاح');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء محاولة الحذف.')->withInput();
        }
    }
    
}
