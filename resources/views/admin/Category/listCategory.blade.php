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
        <div class="card" style="min-height: 400px;">
            <h5 class="card-header">Category Listing</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                        @foreach ($Category as $testimo)
                            <tr class="mb-5">
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $testimo->id }}</strong></td>


                                <td>
                                    {{$testimo->category_name}}
                                </td>

                               
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{url('admin/editCategory/'.$testimo->id)}}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="{{url('admin/deleteCategory/'.$testimo->id)}}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




@section('admin-scripts')
@endsection
