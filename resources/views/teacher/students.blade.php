@extends('home')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="mb-5">طلاب الفصل: {{ $class->name }}</h2>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ر.ت</th>
                                    <th>اسم الطالب</th>
                                    <th>البريد الإلكتروني</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($class->students as $key => $student)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
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
