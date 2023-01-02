@extends('layouts.master')
@section('title')
    اضافة مريض
@endsection
@section('css')
@endsection
@section('title_page1')
    اضافة مريض
@endsection
@section('title_page2')
    لوحة التحكم
@endsection

@section('content')
    <form action="{{ route('admin.customer.checkidAction') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">enter national id</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="personal_id" placeholder="Enter id"
                    fdprocessedid="f3s7fb">
            </div>
        </div>

        <div class="card-footer">
            <div class="form-actions">

                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> enter
                </button>

            </div>
        </div>
    </form>
@endsection
@section('scripts')
@endsection
