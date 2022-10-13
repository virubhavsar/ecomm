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


                @php
                    $id= Request::segment(3);
                    $testi = DB::table('categories')->where('id',$id)->first();
                @endphp
                <form " action="{{ route('admin.updateCategory') }}" enctype="multipart/form-data" data-parsley-validate  method="post">
                    @csrf
                    <input type="hidden" name="Category_id" value="{{$id}}"/>
                    <div class="card">



                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">CATEGORY NAME<span class="required">*</span></label>
                                <input class="form-control" type="text" name="category_name" value="{{$testi->category_name}}" id="formFile" />
                            </div>


                            


                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
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
