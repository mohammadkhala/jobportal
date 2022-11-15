@extends('layouts.master')

@section('title')
    الرئيسية
@endsection
@section('css')
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
@endsection
@section('title_page1')
    الرئيسية
@endsection
@section('title_page2')
    لوحة التحكم
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ App\Models\customer::count() }}</h3>

                            <p>المرضى</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ App\Models\Test::count() }}</h3>

                            <p>الفحوصات</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">

                            <h3>{{ App\Models\Test::count() }}</h3>
                            <p> المواعيد</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ App\Models\Finance::count() }}</h3>

                            <p>الوثائق المالية</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign    "></i></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row ">
                <!-- Left col -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <div class="column connectedSortable">

                    <!-- Map card -->

                    <!-- /.card -->



                    <div id="calendar">
                        <div id="calendar_header">
                            <i class="icon-chevron-left"></i>
                            <h1></h1>
                            <i class="icon-chevron-right"></i>
                        </div>
                        <div id="calendar_weekdays"></div>
                        <div id="calendar_content"></div>
                    </div>

                    <!-- /.card -->
                </div>

                <div class="col-6" >

                    <table id="example1" class="table table-bordered table-striped">
                        <h3>اخر المرضى</h3>

                        <thead >

                            <tr >
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الهوية</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->personal_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table id="example1" class="table table-bordered table-striped" >
                        <h3>اخر الفحوصات</h3>

                        <thead >

                            <tr >

                                <th>رقم الفحص</th>
                                <th>رقم الهوية</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tests as $key => $test)
                                <tr>
                                    <td dir="rtl">{{ $test->id }}</td>
                                    <td>{{ $test->customer->personal_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                 <div class="row ">
                <div class="column" dir="rtl">


                </div>
                </div>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <style>
        .column {
            display: flex;
            float: left;
            width: 50%;

        }

        .row:after {
            flex: 50%;
            content: "";
            display: table;
            clear: both;
        }
    </style>



























    <style>
        body {
            background-color: #F5F1E9;
        }

        .col-lg-12 {
            margin-left: auto;
            margin-right: auto;
            width: 320px;
            font-family: 'Lato', sans-serif;
        }

        #calendar_weekdays div {
            display: inline-block;
            vertical-align: top;
        }

        #calendar_content,
        #calendar_weekdays,
        #calendar_header {
            position: relative;
            width: 320px;
            overflow: hidden;
            float: left;
            z-index: 10;
        }

        #calendar_weekdays div,
        #calendar_content div {
            width: 40px;
            height: 40px;
            overflow: hidden;
            text-align: center;
            background-color: #FFFFFF;
            color: #787878;
        }

        #calendar_content {
            -webkit-border-radius: 0px 0px 12px 12px;
            -moz-border-radius: 0px 0px 12px 12px;
            border-radius: 0px 0px 12px 12px;
        }

        #calendar_content div {
            float: left;
        }

        #calendar_content div:hover {
            background-color: #F8F8F8;
        }

        #calendar_content div.blank {
            background-color: #E8E8E8;
        }

        #calendar_header,
        #calendar_content div.today {
            zoom: 1;
            filter: alpha(opacity=70);
            opacity: 0.7;
        }

        #calendar_content div.today {
            color: #FFFFFF;
        }

        #calendar_header {
            width: 100%;
            height: 37px;
            text-align: center;
            background-color: #FF6860;
            padding: 18px 0;
            -webkit-border-radius: 12px 12px 0px 0px;
            -moz-border-radius: 12px 12px 0px 0px;
            border-radius: 12px 12px 0px 0px;
        }

        #calendar_header h1 {
            font-size: 1.5em;
            color: #FFFFFF;
            float: left;
            width: 70%;
        }

        i[class^=icon-chevron] {
            color: #FFFFFF;
            float: left;
            width: 15%;
            border-radius: 50%;
        }
    </style>
@endsection






@section('scripts')
    <script>
        $(function() {
            function c() {
                p();
                var e = h();
                var r = 0;
                var u = false;
                l.empty();
                while (!u) {
                    if (s[r] == e[0].weekday) {
                        u = true;
                    } else {
                        l.append('<div class="blank"></div>');
                        r++;
                    }
                }
                for (var c = 0; c < 42 - r; c++) {
                    if (c >= e.length) {
                        l.append('<div class="blank"></div>');
                    } else {
                        var v = e[c].day;
                        var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
                        l.append(m + "" + v + "</div>");
                    }
                }
                var y = o[n - 1];
                a.css("background-color", y)
                    .find("h1")
                    .text(i[n - 1] + " " + t);
                f.find("div").css("color", y);
                l.find(".today").css("background-color", y);
                d();
            }

            function h() {
                var e = [];
                for (var r = 1; r < v(t, n) + 1; r++) {
                    e.push({
                        day: r,
                        weekday: s[m(t, n, r)]
                    });
                }
                return e;
            }

            function p() {
                f.empty();
                for (var e = 0; e < 7; e++) {
                    f.append("<div>" + s[e].substring(0, 3) + "</div>");
                }
            }

            function d() {
                var t;
                var n = $("#calendar").css("width", e + "px");
                n.find((t = "#calendar_weekdays, #calendar_content"))
                    .css("width", e + "px")
                    .find("div")
                    .css({
                        width: e / 7 + "px",
                        height: e / 7 + "px",
                        "line-height": e / 7 + "px",
                    });
                n.find("#calendar_header")
                    .css({
                        height: e * (1 / 7) + "px"
                    })
                    .find('i[class^="icon-chevron"]')
                    .css("line-height", e * (1 / 7) + "px");
            }

            function v(e, t) {
                return new Date(e, t, 0).getDate();
            }

            function m(e, t, n) {
                return new Date(e, t - 1, n).getDay();
            }

            function g(e) {
                return y(new Date()) == y(e);
            }

            function y(e) {
                return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate();
            }

            function b() {
                var e = new Date();
                t = e.getFullYear();
                n = e.getMonth() + 1;
            }
            var e = 480;
            var t = 2013;
            var n = 9;
            var r = [];
            var i = [
                "JANUARY",
                "FEBRUARY",
                "MARCH",
                "APRIL",
                "MAY",
                "JUNE",
                "JULY",
                "AUGUST",
                "SEPTEMBER",
                "OCTOBER",
                "NOVEMBER",
                "DECEMBER",
            ];
            var s = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ];
            var o = [
                "#16a085",
                "#1abc9c",
                "#c0392b",
                "#27ae60",
                "#FF6860",
                "#f39c12",
                "#f1c40f",
                "#e67e22",
                "#2ecc71",
                "#e74c3c",
                "#d35400",
                "#2c3e50",
            ];
            var u = $("#calendar");
            var a = u.find("#calendar_header");
            var f = u.find("#calendar_weekdays");
            var l = u.find("#calendar_content");
            b();
            c();
            a.find('i[class^="icon-chevron"]').on("click", function() {
                var e = $(this);
                var r = function(e) {
                    n = e == "next" ? n + 1 : n - 1;
                    if (n < 1) {
                        n = 12;
                        t--;
                    } else if (n > 12) {
                        n = 1;
                        t++;
                    }
                    c();
                };
                if (e.attr("class").indexOf("left") != -1) {
                    r("previous");
                } else {
                    r("next");
                }
            });
        });
    </script>
@endsection
