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
                    $id = Request::segment(3);
                    $testi = DB::table('products')
                        ->where('id', $id)
                        ->first();
                @endphp
                <form  action="{{ route('admin.updateWorks') }}" enctype="multipart/form-data" data-parsley-validate  method="post">
                        @csrf
                        <input type="hidden" name="work_id" value="{{ $id }}"/>
                        <div class="card">
                            <h5 class="card-header">Products Adding</h5>

                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Category<span class="required">*</span></label>
                                    <select  id="category-dropdown"  name="category" class="form-select" required>
                                    @foreach($Category as $category)
                                        <option name="category_name" value="{{$category->category_name}}" @if($testi->category == $category->category_name ) selected @endif>{{$category->category_name}}</option>
                                    @endforeach
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Select Sub Category<span
                                        class="required">*</span></label>
                                <select id="subcategory-dropdown" name="subcategory"  class="form-select" required>
                                    
                                    <option  value="{{$testi->subcategory}}" >{{$testi->subcategory}}</option>
                                
                                </select>
                            </div>
                        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Uploaded Preview<span class="required">*</span></label>
                <img class="form-control" src="{{ asset('public/uploads/works_img/' . $testi->work_img) }}"
                    style=" height:300px ; width:300px">
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Uplaod Image Here<span class="required">*</span></label>
                <input class="form-control" type="file" name="works_img" value="{{ $testi->work_img }}"
                    id="formFile"  required/>
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



<script>
        $(document).ready(function () {
  
           
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#category-dropdown').on('change', function () {
                var idState = this.value;
                $("#subcategory-dropdown").html('');
                $.ajax({
                    url: "{{route('admin.fetchSubCategory')}}",
                    type: "POST",
                    data: {
                        category_name: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#subcategory-dropdown').html('<option value="">-- Select Sub Category --</option>');
                        $.each(res.subcategories, function (key, value) {
                            $("#subcategory-dropdown").append('<option value="' + value
                                .subcategory_name + '">' + value.subcategory_name + '</option>');
                        });
                    }
                });
            });
  
        });
    </script>
@endsection
