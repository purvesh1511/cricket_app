@php
    $title = 'Orders';
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
                            <h4 class="fw-semibold mb-8">MANUAL BOOKING</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted "
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Manual Booking</li>
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
                        <!-- <div class="card">
                            <div class="card-body"> -->
                                <div class="table-responsive">
                                   
                                    <table id="zero_config"
                                        class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th >ID</th>
                                                <th>Coach Name</th>
                                                <th>Month</th>
                                                <th>Sheet Link</th>
                                                
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            <!-- start row -->
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($manual_booking as $booking)
                                                @php
                                                    $i += 1;
                                                    $sheet_link='<a href="'.$booking->sheet_link.'" target="_blank">Open Link</a>';
                                                @endphp
                                                <tr>
                                                    <td >{{$booking->id}}</td>
                                                    
                                                    <td>
                                                        {{ $booking->fname }} {{ $booking->lname }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->month }}
                                                    </td>
                                                    <td>
                                                        {!! $sheet_link !!}
                                                    </td>
                                                   
                                                </tr>
                                                
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
