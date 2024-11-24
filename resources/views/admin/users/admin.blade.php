@extends('home')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'نجاح',
        text: '{{ session('success') }}', // عرض الرسالة من الجلسة
        confirmButtonText: 'حسنًا',
        customClass: {
            confirmButton: 'confirm-button-custom'
        }
    });
</script>
<style>
    .confirm-button-custom {
        background-color: #0e95d5; 
        color: #fff;
    }
</style>
@endif


        <!-- جدول عرض المسؤولين -->
        <div class="card">
            <div class="card-body">
                <h2 class="mb-5">المسؤولين</h2>
        
                <button class="btn btn-success" data-toggle="modal" data-target="#addAdminModal">إضافة مسؤول جديد</button>

                </button>
                <br><br>
                <div class="row">
            <div class="col-md-12">
                <table id="order-listing" class="table table-hover table-responsive p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone ?? 'غير متوفر' }}</td>
                                <td>{{ $admin->address ?? 'غير متوفر' }}</td>
                                <td>
                                    <!-- زر تعديل -->
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAdminModal{{ $admin->id }}"><i class="fa fa-edit"></i></button></a>
                                    <!-- زر حذف -->
                                    <form action="{{ route('users.destroy', $admin->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></button>
                                    </form>
                                </td>
                            </tr>

                            <!-- نافذة تعديل المسؤول -->
                            <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAdminModalLabel{{ $admin->id }}">تعديل بيانات المسؤول</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('users.update', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">الاسم</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">البريد الإلكتروني</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">رقم الهاتف</label>
                                                    <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">العنوان</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $admin->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">كلمة المرور (اختياري)</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                                <button type="submit" class="btn btn-primary">تعديل</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       

                <!-- نافذة إضافة مسؤول -->
                <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAdminModalLabel">إضافة مسؤول جديد</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">الاسم</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">كلمة المرور</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">رقم الهاتف</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">العنوان</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <input type="hidden" name="role" value="admin" />

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="btn btn-success">إضافة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/js/data-table.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


@endsection
