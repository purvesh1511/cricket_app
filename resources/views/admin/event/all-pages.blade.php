@php
    $title = 'All Pages';
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
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">ALL EVENT</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted "
                                        href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a class="text-muted " href="javascript:void(0)">Pages</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">All Event</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="datatables">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <!-- <div class="card w-100">
                        <div class="card-body"> -->
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
										    <th>ID</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Title</th>
                                            
                                            <th>Venue</th>
                                            <th>Capacity</th>
                                            <th> Price</th>
                                            <th>Status</th>
                                          
                                            <th>Actions</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach ($pages as $page)
                                            <tr>
                                                <td>{{ $page->event_id }}</td>
                                                <td>{{ $page->event_date }}</td>
                                                <td>{{ $page->event_time }}</td>
                                                <td>{{ $page->event_name }} </td>
                                                
                                                <td>{{ $page->event_address }} </td>
                                                <td>{{ $page->event_no_of_person }} </td>
                                                <td>{{ $page->event_price }} </td>
                                                <td>
                                                    @if ($page->event_status == 1)
                                                        <button data-bs-toggle="modal"
                                                            data-bs-target="#changeStatus{{ $page->event_id }}"
                                                            class="btn btn-success btn-sm">Active</button>
                                                    @else
                                                        <button data-bs-toggle="modal"
                                                            data-bs-target="#changeStatus{{ $page->event_id }}"
                                                            class="btn btn-danger btn-sm">Inactive</button>
                                                    @endif
                                                </td>
                                                
                                                <td>
												<a href="{{ route('edit-event') }}?page_id={{ $page->event_id }}">
                                                                    <i class="fs-4 ti ti-edit"></i></a>
                                                                    
                                                                
												<a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#deletePage{{ $page->event_id }}"><i
                                                                        class="fs-4 ti ti-trash"></i></a>				
                                                    <!--<div class="dropdown dropstart">
                                                        <a href="#" class="text-muted" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                            style="">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                    href="{{ route('edit-event') }}?page_id={{ $page->event_id }}">
                                                                    <i class="fs-4 ti ti-edit"></i>
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                    href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#deletePage{{ $page->event_id }}"><i
                                                                        class="fs-4 ti ti-trash"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>-->
                                                </td>
                                            </tr>
                                            @if ($page->event_status == 1)
                                                <div class="modal fade" id="changeStatus{{ $page->event_id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content rounded-1">
                                                            <div class="modal-body message-body text-center p-4"
                                                                data-simplebar="">
                                                                <h5 class="mb-0 fs-5 p-1 text-danger">De-Activate
                                                                    Page
                                                                </h5>
                                                                <p>Are You Sure?</p>
                                                                <div class="mt-4">
                                                                    <a href="{{ route('change-event-status') }}?page_id={{ $page->event_id }}"
                                                                        class="btn btn-primary">Yes</a>
                                                                    <button data-bs-dismiss="modal"
                                                                        class="btn btn-light border">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="modal fade" id="changeStatus{{ $page->event_id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content rounded-1">
                                                            <div class="modal-body message-body text-center p-4"
                                                                data-simplebar="">
                                                                <h5 class="mb-0 fs-5 p-1 text-success">Activate
                                                                    Page
                                                                </h5>
                                                                <p>Are You Sure?</p>
                                                                <div class="mt-4">
                                                                    <a href="{{ route('change-event-status') }}?page_id={{ $page->event_id }}"
                                                                        class="btn btn-primary">Yes</a>
                                                                    <button data-bs-dismiss="modal"
                                                                        class="btn btn-light border">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="modal fade" id="deletePage{{ $page->event_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content rounded-1">
                                                        <div class="modal-body message-body text-center p-4"
                                                            data-simplebar="">
                                                            <h5 class="mb-0 fs-5 p-1 text-danger">Delete Page</h5>
                                                            <p>Are You Sure?</p>
                                                            <div class="mt-4">
                                                                <a href="{{ route('delete-event') }}?page_id={{ $page->event_id }}"
                                                                    class="btn btn-primary">Yes</a>
                                                                <button data-bs-dismiss="modal"
                                                                    class="btn btn-light border">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!-- </div>
                    </div> -->
                </div>
            </div>
        </section>
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