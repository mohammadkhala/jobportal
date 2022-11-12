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
