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
        text: '{{ session('success') }}',
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

<div class="card">
    <div class="card-body">
        <h2 class="mb-5">المعلمين</h2>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTeacherModal">
            {{ __('إضافة معلم') }}
        </button>
        <br><br>
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @if ($errors->any())
                            <?php Alert::error($errors->all(), __('حدث خطأ'))->showConfirmButton(__('تم'), '#c0392b'); ?>
                        @endif
                        <div class="table-responsive">
                            <table id="order-listing" class="table  table-responsive p-0 table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('اسم المعلم') }}</th>
                                        <th>{{ __('البريد الإلكتروني') }}</th>
                                        <th>{{ __('التحكم') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#editTeacher{{ $teacher->id }}" title="{{ __('تعديل') }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="{{ __('حذف') }}"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
        
                                        <!-- نافذة التعديل -->
                                        <div class="modal fade" id="editTeacher{{ $teacher->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="editTeacherLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ __('تعديل بيانات المعلم') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="إغلاق">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                                                            @csrf
                                                            {{ method_field('POST') }}
                                                            <label>{{ __('اسم المعلم') }}:</label>
                                                            <input class="form-control" type="text" name="name"
                                                                value="{{ $teacher->name }}" required>
                                                            <label>{{ __('البريد الإلكتروني') }}:</label>
                                                            <input class="form-control" type="email" name="email"
                                                                value="{{ $teacher->email }}" required>
                                                            <label>{{ __('كلمة المرور') }}:</label>
                                                            <input class="form-control" type="password" name="password">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ __('رجوع') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ __('حفظ') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <!-- نافذة الحذف -->
                                       
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- نافذة الإضافة -->
        <div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog" aria-labelledby="addTeacherLabel"
            aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('إضافة معلم جديد') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('teacher.store') }}" method="POST">
                            @csrf
                            <label>{{ __('اسم المعلم') }}:</label>
                            <input class="form-control" type="text" name="name" required>
                            <label>{{ __('البريد الإلكتروني') }}:</label>
                            <input class="form-control" type="email" name="email" required>
                            <label>{{ __('كلمة المرور') }}:</label>
                            <input class="form-control" type="password" name="password" required>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('رجوع') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('حفظ') }}</button>
                            </div>
                        </form>
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
