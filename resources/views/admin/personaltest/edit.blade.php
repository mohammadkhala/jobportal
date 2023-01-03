@extends('layouts.master')
@section('title')
    تعديل فحص مريض
@endsection
@section('css')
@endsection
@section('title_page1')
    تعديل فحص مريض
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
                                    <h4 class="card-title text-center" id="basic-layout-form"> تعديل فحص مريض </h4>
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
                                        <form class="form" action="{{ route('admin.ptest.update',['id'=>$ptest->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الفحص </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">national id   </label>
                                                            <input type="text" value="{{$ptest->customer_id}}" id="customer_id"
                                                                class="form-control"
                                                                name="customer_id">
                                                            @error('customer_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">test id </label>
                                                            <input type="text" value="{{$ptest->test_id}}" id="test_id"
                                                                class="form-control"
                                                                name="test_id">
                                                            @error('test_id')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1">distance </label>
                                                            <input type="text" value="{{$ptest->distance}}" id="distance"
                                                                class="form-control"
                                                                name="distance">
                                                            @error('distance')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1">right eye without corr</label>
                                                            <input type="text" value="{{$ptest->right_eye_without_corr}}" id="right_eye_without_corr"
                                                                class="form-control"
                                                                name="right_eye_without_corr">
                                                            @error('right_eye_without_corr')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="projectinput1">left eye without corr</label>
                                                            <input type="text" value="{{$ptest->left_eye_without_corr}}" id="left_eye_without_corr"
                                                                class="form-control"
                                                                name="left_eye_without_corr">
                                                            @error('left_eye_without_corr')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">right eye with corr  </label>
                                                            <input type="text" value="{{$ptest->right_eye_with_corr}}" id="right_eye_with_corr"
                                                                class="form-control"
                                                                name="right_eye_with_corr">
                                                            @error('right_eye_with_corr')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">left eye with corr  </label>
                                                            <input type="text" value="{{$ptest->left_eye_with_corr}}" id="left_eye_with_corr"
                                                                class="form-control"
                                                                name="left_eye_with_corr">
                                                            @error('left_eye_with_corr')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">vision actually test </label>
                                                        <input type="text" value="{{$ptest->vision_act_test}}" id="date"
                                                            class="form-control"
                                                            name="vision_act_test">
                                                        @error('vision_act_test')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">date </label>
                                                        <input type="date" value="{{$ptest->date}}" id="date"
                                                            class="form-control"
                                                            name="date">
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">cost </label>
                                                        <input type="text" value="{{$ptest->cost}}" id="cost"
                                                            class="form-control"
                                                            name="cost">
                                                        @error('cost')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">added By </label>
                                                        <input type="text" value="{{$ptest->addedBy}}" id="addedBy"
                                                            class="form-control"
                                                            name="addedBy">
                                                        @error('addedBy')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">corrected By </label>
                                                        <input type="text" value="{{$ptest->correctedBy}}" id="correctedBy"
                                                            class="form-control"
                                                            name="correctedBy">
                                                        @error('correctedBy')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="report">report </label>
                                                        <input type="file" value="{{$ptest->report}}" id="report"
                                                            class="form-control"
                                                            name="report">
                                                        @error('report')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="attach">attach </label>
                                                        <input type="file" value="{{$ptest->attach}}" id="attach"
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
                                        <a href="{{route('admin.ptest')}}"> <button type="button" class="btn btn-warning " >
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
