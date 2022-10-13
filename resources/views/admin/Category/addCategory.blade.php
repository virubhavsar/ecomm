@extends('layouts.admin.main')


@section('admin-styles')
@endsection

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mt-4 login-form">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">

                <form action="{{ route('admin.saveCategory') }}" enctype="multipart/form-data" data-parsley-validate  method="post">
                    @csrf

                    <div class="card">
                        <h5 class="card-header">Category Adding Form</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Category  Name<span class="required">*</span></label>
                                <input class="form-control" type="text" name="category_name" placeholder="Category Name"  id="formFile" required/>
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-end">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection





@section('admin-scripts')
@endsection
