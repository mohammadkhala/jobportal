@extends('layouts.master')
@section('title')
    اضافة موعد
@endsection
@section('css')
@endsection
@section('title_page1')
    اضافة موعد
@endsection
@section('title_page2')
    لوحة التحكم
@endsection
@section('content')
    <div class="app-content ">
        <div class="content text-right">
            <div class="content-header row text-center">
                <div class="content-header-left col-md-6 col-12 mb-2">

                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts" dir="rtl">
                    <div class="row match-height">
                        <div class="col-md-12  ">
                            <div class="card ">
                                <div class="card-header text-center">
                                    <h4 class="card-title text-center" id="basic-layout-form"> إضافة موعد </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('admin.appointment.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الموعد </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">رقم الهوية </label>
                                                            <input type="text" value="" id="txt_9"
                                                                class="form-control" name="customer_id">
                                                            @error('customer_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الاسم </label>
                                                            <input type="text" value="" id="txt_10" '
                                                                    class="form-control" name="name">
                                                                @error(' name') <span
                                                                    class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">التاريخ </label>
                                                            <input type="date" value="" id="txt_11"
                                                                class="form-control" name="date">
                                                            @error('date')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الساعة </label>
                                                            <input type="time" value="" id="txt_12" o
                                                                class="form-control" name="hour">
                                                            @error('hour')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>







                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">العيادة </label>
                                                            <input type="text" value="" id="txt_13" '
                                                                    class="form-control" name="clinic">
                                                                @error(' clinic') <span
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">المعالج </label>
                                                            <input type="text" value="" id="txt_14"
                                                                class="form-control" name="physician">
                                                            @error('physician')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">ملاحظات </label>
                                                            <textarea type="text" value="" id="txt_15" class="form-control" name="note"></textarea>
                                                            @error('note')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                    </div>


                                    <div class="form-actions">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                        <a href="{{ route('admin.appointment') }}"> <button type="button"
                                                class="btn btn-warning ">
                                                المواعيد
                                            </button></a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
    </div>
@endsection






@section('scripts')
@endsection
