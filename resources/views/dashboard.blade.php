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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/customized.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
   <!-- Theme style -->
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
      <!-- Info boxes -->
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

      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <!-- /.card-header -->

            <!-- ./card-body -->
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up">شيكل</i> </span>
                    <h5 class="description-header">{{ App\Models\Finance::sum('amount') }}</h5>

                    <span class="description-text">مجموع الدخل</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>شيكل </span>
                    <h5 class="description-header">{{ App\Models\Transaction::sum('payment') }}</h5>

                    <span class="description-text">مجموع الدفعات</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> شيكل</span>
                    <h5 class="description-header">{{ App\Models\Finance::sum('remaining') }}</h5>
                    <span class="description-text">مجموع الدفعات غير المكتملة</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="card" dir="rtl">
            <div class="card-header " >


              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> <h3 class="card-title"> اخر المرضى
            </h3>
            </div>
            <!-- /.card-header -->


                <table id="example1" class="table table-bordered table-striped">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>رقم الهوية</th>



                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->personal_id }}</td>
                                <td>{{ $customer->name }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>



            <!-- /.card-body -->
          </div>
          <div class="card" >
            <div class="card-header">

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> <h3 class="card-title"> اخر الفحوصات
                </h3>
            </div>
            <!-- /.card-header -->


            <table id="example1" class="table table-bordered table-striped" >


                <thead >

                    <tr dir="rtl">

                        <th>رقم الفحص</th>
                        <th>رقم الهوية</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($tests as $key => $test)
                        <tr>
                            <td >{{ $test->id }}</td>
                            <td>{{ $test->customer->personal_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->

          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">المرضى</span>
              <span class="info-box-number">{{ App\Models\customer::count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <!-- /.info-box -->

          <div class="card bg-gradient-success">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                    <i class="fas fa-bars"></i>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">November 2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="10/30/2022" class="day old weekend">30</td><td data-action="selectDay" data-day="10/31/2022" class="day old">31</td><td data-action="selectDay" data-day="11/01/2022" class="day">1</td><td data-action="selectDay" data-day="11/02/2022" class="day">2</td><td data-action="selectDay" data-day="11/03/2022" class="day">3</td><td data-action="selectDay" data-day="11/04/2022" class="day">4</td><td data-action="selectDay" data-day="11/05/2022" class="day weekend">5</td></tr><tr><td data-action="selectDay" data-day="11/06/2022" class="day weekend">6</td><td data-action="selectDay" data-day="11/07/2022" class="day active">7</td><td data-action="selectDay" data-day="11/08/2022" class="day">8</td><td data-action="selectDay" data-day="11/09/2022" class="day">9</td><td data-action="selectDay" data-day="11/10/2022" class="day">10</td><td data-action="selectDay" data-day="11/11/2022" class="day">11</td><td data-action="selectDay" data-day="11/12/2022" class="day weekend">12</td></tr><tr><td data-action="selectDay" data-day="11/13/2022" class="day weekend">13</td><td data-action="selectDay" data-day="11/14/2022" class="day">14</td><td data-action="selectDay" data-day="11/15/2022" class="day">15</td><td data-action="selectDay" data-day="11/16/2022" class="day">16</td><td data-action="selectDay" data-day="11/17/2022" class="day">17</td><td data-action="selectDay" data-day="11/18/2022" class="day">18</td><td data-action="selectDay" data-day="11/19/2022" class="day weekend">19</td></tr><tr><td data-action="selectDay" data-day="11/20/2022" class="day weekend">20</td><td data-action="selectDay" data-day="11/21/2022" class="day">21</td><td data-action="selectDay" data-day="11/22/2022" class="day today">22</td><td data-action="selectDay" data-day="11/23/2022" class="day">23</td><td data-action="selectDay" data-day="11/24/2022" class="day">24</td><td data-action="selectDay" data-day="11/25/2022" class="day">25</td><td data-action="selectDay" data-day="11/26/2022" class="day weekend">26</td></tr><tr><td data-action="selectDay" data-day="11/27/2022" class="day weekend">27</td><td data-action="selectDay" data-day="11/28/2022" class="day">28</td><td data-action="selectDay" data-day="11/29/2022" class="day">29</td><td data-action="selectDay" data-day="11/30/2022" class="day">30</td><td data-action="selectDay" data-day="12/01/2022" class="day new">1</td><td data-action="selectDay" data-day="12/02/2022" class="day new">2</td><td data-action="selectDay" data-day="12/03/2022" class="day new weekend">3</td></tr><tr><td data-action="selectDay" data-day="12/04/2022" class="day new weekend">4</td><td data-action="selectDay" data-day="12/05/2022" class="day new">5</td><td data-action="selectDay" data-day="12/06/2022" class="day new">6</td><td data-action="selectDay" data-day="12/07/2022" class="day new">7</td><td data-action="selectDay" data-day="12/08/2022" class="day new">8</td><td data-action="selectDay" data-day="12/09/2022" class="day new">9</td><td data-action="selectDay" data-day="12/10/2022" class="day new weekend">10</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month active">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year active">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
            </div>
          <!-- /.card -->

          <!-- PRODUCT LIST -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
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
