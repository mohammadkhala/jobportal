@extends('layouts.master')
@section('title')
    فحص المريض
@endsection
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('title_page1')
    فحص المريض
@endsection
@section('title_page2')
    لوحة التحكم
@endsection
@section('content')
    @method('PUT')
    <input type="hidden" name="id">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped" dir="rtl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>رقم الهوية</th>
                    <th>رقم الفحص </th>
                    <th>المسافة</th>
                    <th>درجة العين اليمنى </th>
                    <th>درجة العين اليسرى</th>
                    <th>السنة</th>
                    <th>الشهر</th>
                    <th>اليوم</th>
                    <th>تقرير </th>
                    <th>التكلفة </th>
                    <th>مرفقات </th>


                    <th>تعديل\حذف</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($ptest as $key => $row)
                    <td>{{ $key = $key + 1 }}</td>

                    <td>{{ $row->p_id }}</td>
                    <td> {{ $row->test_id }}</td>
                    <td> {{ $row->distance }}</td>
                    <td>{{ $row->Right_eye_degree  }} </td>
                    <td>{{ $row->left_eye_degree  }}</td>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->month }}</td>
                    <td>{{ $row->day }}</td>
                    <td>{{ $row->report }}</td>
                     <td>{{ $row->cost }}</td>
                     <td>{{ $row->attach }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td><a href="{{ route('admin.ptest.edit', ['id' => $row->id]) }}"><button
                                style="hight=12px;width=15px;" class="btn btn-primary editbtn">تعديل</button></a>
                        <a href="{{ route('admin.ptest.delete', ['id' => $row->id]) }}" class="btn btn-danger"
                            id="delete">حذف</a>
                    </td>



                    </tr>
                @endforeach
        </table>
    </div>
@endsection






@section('scripts')
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.j') }}s"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'هل تريد تأكيد الحذف
                icon: 'question',
                iconHtml: '؟',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                showCancelButton: true,
                showCloseButton: true

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'تم الحذف!',
                        'تم الحذف بنجاح.',
                        'نجاح'
                    )
                }
            });
        });
    </script>
@endsection