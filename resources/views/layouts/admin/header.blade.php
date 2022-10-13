<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->

        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">


            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar ">
                        <img src="{{ asset('public/admin/assets/img/avatars/1.png') }}" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="{{ asset('public/admin/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block" style="margin-top: 12px;">{{ Auth::user()->name }}</span>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle" data-bs-toggle="modal" data-bs-target="#basicModal">Change
                                Password</span>
                        </a>
                    </li>





                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <form method="post"  action="{{ route('admin.update_password') }}">
        @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">New Password</label>
                        <input type="password" name="password" id="nameBasic" class="form-control" placeholder="Enter New Password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">New Password</label>
                        <input type="password" name="confirm_password" id="nameBasic" class="form-control" placeholder="Enter Confirm Password" />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
    </form>
</div>
