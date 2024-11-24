@extends('home')



@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="mb-5">الفصول</h2>

       <!-- Button to trigger modal -->
<a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addClassModal">اضافة فصل جديد</a>


        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ر.ت</th>
                                <th>الاسم</th>
                                <th>المعلم</th>
                                <th>تاريخ الاضافة</th>
                                <th>اجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->teacher->name ?? '' }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>
                                    <!-- زر تعديل -->
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editClassModal" onclick="editClass({{ $d->id }})">تعديل</a>
                                    <!-- زر حذف -->
                                    <form action="{{ route('class.destroy', $d->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<!-- Modal for adding class -->
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">إضافة فصل جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('class.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">اسم الفصل:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="اسم الفصل" required>
                    </div>

                    <div class="form-group">
                        <label for="teacher_id">المعلم:</label>
                        <select name="teacher_id" class="form-control" id="teacher_id" required>
                            <option value="">اختر المعلم</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">إضافة الفصل</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassModalLabel">تعديل الفصل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="editClassForm">
                    @csrf
                    @method('POST') <!-- إخبار المتصفح أننا بصدد تنفيذ عملية PUT -->
                    
                    <!-- حقل اسم الفصل -->
                    <div class="form-group">
                        <label for="name">اسم الفصل:</label>
                        <input type="text" name="name" class="form-control" id="editName" placeholder="اسم الفصل">
                    </div>

                    <!-- حقل المعلم -->
                    <div class="form-group">
                        <label for="teacher_id">المعلم:</label>
                        <select name="teacher_id" class="form-control" id="editTeacher">
                            <option value="">اختر المعلم</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">تعديل الفصل</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('admin/js/data-table.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  function editClass(id) {
    $.ajax({
        url: '/class/' + id + '/edit',
        method: 'GET',
        success: function(response) {
            if (response.class) {
                $('#editName').val(response.class.name);
                $('#editTeacher').val(response.class.teacher_id);
                $('#editClassForm').attr('action', '/class/' + id);
            } else {
                alert('حدث خطأ في جلب البيانات');
            }
        },
        error: function() {
            alert('حدث خطأ في جلب البيانات');
        }
    });
}

</script>

@endsection