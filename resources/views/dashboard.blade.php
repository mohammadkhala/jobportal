@extends('layouts.master')

@section('title')
الرئيسية
@endsection
@section('css')
@include('calendar-style')
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
              <h3>{{App\Models\customer::count()}}</h3>

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
              <h3>{{App\Models\Test::count()}}</h3>

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
              <h3> المواعيد</h3>

              <p>{{App\Models\Test::count()}}</p>
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
              <h3>{{App\Models\Finance::count()}}</h3>

              <p>الوثائق المالية</p>
            </div>
            <div class="icon">
              <i class="fas fa-dollar-sign    "></i>"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map card -->

          <!-- /.card -->


          <!-- Calendar -->

          <div class="container">
            <div class="calendar">
              <div class="front">
                <div class="current-date">
                  <h1>Friday 15th</h1>
                  <h1>January 2016</h1>
                </div>

                <div class="current-month">
                  <ul class="week-days">
                    <li>MON</li>
                    <li>TUE</li>
                    <li>WED</li>
                    <li>THU</li>
                    <li>FRI</li>
                    <li>SAT</li>
                    <li>SUN</li>
                  </ul>

                  <div class="weeks">
                    <div class="first">
                      <span class="last-month">28</span>
                      <span class="last-month">29</span>
                      <span class="last-month">30</span>
                      <span class="last-month">31</span>
                      <span>01</span>
                      <span>02</span>
                      <span>03</span>
                    </div>

                    <div class="second">
                      <span>04</span>
                      <span>05</span>
                      <span class="event">06</span>
                      <span>07</span>
                      <span>08</span>
                      <span>09</span>
                      <span>10</span>
                    </div>

                    <div class="third">
                      <span>11</span>
                      <span>12</span>
                      <span>13</span>
                      <span>14</span>
                      <span class="active">15</span>
                      <span>16</span>
                      <span>17</span>
                    </div>

                    <div class="fourth">
                      <span>18</span>
                      <span>19</span>
                      <span>20</span>
                      <span>21</span>
                      <span>22</span>
                      <span>23</span>
                      <span>24</span>
                    </div>

                    <div class="fifth">
                      <span>25</span>
                      <span>26</span>
                      <span>27</span>
                      <span>28</span>
                      <span>29</span>
                      <span>30</span>
                      <span>31</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="back">
                <input placeholder="What's the event?">
                <div class="info">
                  <div class="date">
                    <p class="info-date">
                    Date: <span>Jan 15th, 2016</span>
                    </p>
                    <p class="info-time">
                      Time: <span>6:35 PM</span>
                    </p>
                  </div>
                  <div class="address">
                    <p>
                      Address: <span>129 W 81st St, New York, NY</span>
                    </p>
                  </div>
                  <div class="observations">
                    <p>
                      Observations: <span>Be there 15 minutes earlier</span>
                    </p>
                  </div>
                </div>

                <div class="actions">
                  <button class="save">
                    Save <i class="ion-checkmark"></i>
                  </button>
                  <button class="dismiss">
                    Dismiss <i class="ion-android-close"></i>
                  </button>
                </div>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @include('calendar-js')
@endsection






@section('scripts')

@endsection
