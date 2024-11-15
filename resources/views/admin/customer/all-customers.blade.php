@php
    $title = 'All Customers';
@endphp
<x-header :title="$title" />
<!--  Body Wrapper -->
    <!-- Sidebar Start -->
    <x-sidebar />
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-menu />
        <!--  Header End -->
        <div class="container-fluid">


            <!-- --------------------------------------------------- -->
            <!--  Table Datatable Basic Start -->
            <!-- --------------------------------------------------- -->
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">CUSTOMERS</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted "
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Customers</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mb-4">
                <a href="javascript:void(0)"><button data-bs-toggle="modal" data-bs-target="#addCustomer"
                        class="btn btn-primary">
                        <i class="fs-4 ti ti-plus"></i>
                        Add Customers
                    </button></a>
            </div>
            <section class="datatables">
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <!-- <div class="card">
                            <div class="card-body"> -->
                                <div class="table-responsive">
                                    <table id="zero_config"
                                        class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
											    <th>ID </th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Test Name</th>
                                                <th>Test Description</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            <!-- start row -->
                                            @foreach ($customers as $customer)
                                                <tr>
												    <td>{{ $customer->id }}</td>
                                                    <td>
                                                        {{ $customer->fname . ' ' . $customer->lname }}
                                                    </td>
                                                    <td>{{ $customer->username }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->test_name }}</td>
                                                    <td>{{ $customer->test_description }}</td>
                                                    <td>
                                                        @if ($customer->status == 1)
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#changeStatus{{ $customer->id }}"
                                                                class="btn btn-success btn-sm">Active</button>
                                                        @else
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#changeStatus{{ $customer->id }}"
                                                                class="btn btn-danger btn-sm">Inactive</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="dropdown-item d-flex align-items-center gap-3"
                                                            href="{{ route('edit-customer') }}?customer_id={{ $customer->id }}">
                                                            <i class="fs-4 ti ti-edit"></i>
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                @if ($customer->status == 1)
                                                    <div class="modal fade" id="changeStatus{{ $customer->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content rounded-1">
                                                                <div class="modal-body message-body text-center p-4"
                                                                    data-simplebar="">
                                                                    <h5 class="mb-0 fs-5 p-1 text-danger">De-Activate
                                                                        Customer
                                                                    </h5>
                                                                    <p>Are You Sure?</p>
                                                                    <div class="mt-4">
                                                                        <a href="{{ route('change-customer-status') }}?customer_id={{ $customer->id }}"
                                                                            class="btn btn-primary">Yes</a>
                                                                        <button data-bs-dismiss="modal"
                                                                            class="btn btn-light border">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="modal fade" id="changeStatus{{ $customer->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content rounded-1">
                                                                <div class="modal-body message-body text-center p-4"
                                                                    data-simplebar="">
                                                                    <h5 class="mb-0 fs-5 p-1 text-success">Activate
                                                                        Customer
                                                                    </h5>
                                                                    <p>Are You Sure?</p>
                                                                    <div class="mt-4">
                                                                        <a href="{{ route('change-customer-status') }}?customer_id={{ $customer->id }}"
                                                                            class="btn btn-primary">Yes</a>
                                                                        <button data-bs-dismiss="modal"
                                                                            class="btn btn-light border">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            <!-- </div>
                        </div> -->
                    </div>
                </div>
            </section>
            {{-- Add Customers --}}
            <div class="modal fade" id="addCustomer" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content rounded-1">
                        <div class="modal-header">
                            <h5 class="mb-0 fs-5 p-1 text-danger">Add New Customer</h5>
                        </div>
                        <form action="{{ route('store-customer') }}" method="POST">
                            <div class="modal-body message-body p-4" data-simplebar="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <small>First Name</small>
                                        <input type="text" autocomplete="off" placeholder="First Name" name="fname"
                                            class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Last Name</small>
                                        <input type="text" autocomplete="off" placeholder="Last Name" name="lname"
                                            class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Customer Email</small>
                                        <input type="text" autocomplete="off" placeholder="Customer Email"
                                            name="email" class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Customer Phone</small>
                                        <input type="number" autocomplete="off" placeholder="Customer Phone" name="phone"
                                        class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Username</small>
                                        <input type="text" autocomplete="off" placeholder="Username" name="username"
                                            class="form-control mb-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="position: relative;">
                                            <small>Customer Password</small>
                                            <input type="password" id="password" autocomplete="off"
                                            placeholder="***********" name="password" class="form-control mb-2" required>
                                            <span onclick="showHidePassword(this)"
                                            style="position: absolute; top:25px; right:10px;"
                                            class="input-group-text cursor-pointer "><i id="Iclass"
                                                class="ti ti-eye-off toggle-password"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" data-bs-dismiss="modal"
                                        class="btn btn-light border">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Add Customers End --}}
            <!-- --------------------------------------------------- -->
            <!--  Table Datatable Basic End -->
            <!-- --------------------------------------------------- -->
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
<x-footer />
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/datatable-basic.init.js"></script>
<script>
    function showHidePassword(el) {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("Iclass");
        var attribute = y.className;
        if (attribute == 'ti ti-eye-off toggle-password') {
            y.classList.replace("ti-eye-off", "ti-eye");
        } else {
            y.classList.replace("ti-eye", "ti-eye-off");
        }
    }
</script>
