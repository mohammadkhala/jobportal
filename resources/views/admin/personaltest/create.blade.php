@extends('layouts.master')
@section('title')
    اضافة فحص مريض
@endsection
@section('css')
@endsection
@section('title_page1')
    اضافة فحص مريض
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
                                    <h4 class="card-title text-center" id="basic-layout-form"> إضافة فحص مريض </h4>
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
                                        <form class="form" action="{{ route('admin.customer.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الفحص </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">رقم الهوية  </label>
                                                            <input type="text" value="" id="name"
                                                                class="form-control"
                                                                name="p_id">
                                                            @error('p_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">رقم الفحص</label>
                                                            <input type="text" value="" id="name"
                                                                class="form-control"
                                                                name="test_id">
                                                            @error('test_id')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">المسافة</label>
                                                            <input type="text" value="" id="name"
                                                                class="form-control"
                                                                name="distance ">
                                                            @error('distance ')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">درجة العين اليمنى</label>
                                                            <input type="text" value="" id="name"
                                                                class="form-control"
                                                                name="right_eye_degree ">
                                                            @error('right_eye_degree')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">درجة العين اليسرى</label>
                                                        <input type="text" value="" id="name"
                                                            class="form-control"
                                                            name="left_eye_degree">
                                                        @error('left_eye_degree')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">السنة </label>
                                                        <input type="text" value="" id="name"
                                                            class="form-control"
                                                            name="year">
                                                        @error('year')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الشهر </label>
                                                        <input type="text" value="" id="name"
                                                            class="form-control"
                                                            name="month">
                                                        @error('month')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">اليوم </label>
                                                        <input type="text" value="" id="name"
                                                            class="form-control"
                                                            name="day">
                                                        @error('day')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تقرير </label>
                                                        <input type="file" value="" id="name"
                                                            class="form-control"
                                                            name="report">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">التكلفة </label>
                                                        <input type="text" value="" id="name"
                                                            class="form-control"
                                                            name="cost">
                                                        @error('cost')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">مرفقات </label>
                                                        <input type="file" value="" id="name"
                                                            class="form-control"
                                                            name="attach">
                                                        @error('attach')
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
                                    <a href="{{route('admin.customer')}}"> <button type="button" class="btn btn-warning " >
                                        المرضى
                                        </button></a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
@endsection