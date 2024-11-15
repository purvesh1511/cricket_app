@php
    $title = 'Add Page';
@endphp
<x-header :title="$title" />
<!--  Body Wrapper -->
    <!-- Sidebar Start -->
    <x-sidebar />
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <style>
        select option:disabled {
    color: red; /* Change the color to gray */
}
</style>
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-menu />
        <!--  Header End -->
        <div class="container-fluid">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-8">MANAGE DISABLE LANE SLOT</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('all-achivement') }}">Disable Lane Slot</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Manage Disable Lane Slot
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('store-disable-slot') }}" method="POST" onsubmit="addPage(event,this)"
                                enctype="multipart/form-data">
                                @csrf
                                
                                <div class="col-md-12 mb-3">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input type="date" name="day" id="day" class="form-control">
                                </div>
                                
                               

                                <div class="row" >
                                   
                                    <div class="col-md-12 mb-3">
                                        <table width="100%">
                                        <tr>
                                             <th width="40%">Slot </th> 
                                             @if($lane_master)
                                             @foreach($lane_master as $lane)
                                             <th style="text-align:center">{{$lane->lane_name}} 
                                             
                                            </th> 
                                             @endforeach
                                             @endif
                                        </tr>
                                        @if($slot_master)
                                            @foreach($slot_master as $slot)
                                        <tr>
                                            
                                            <td>{{$slot->slot_name}} <input type="hidden" name="slot_{{$slot->id}}" value="{{$slot->id}}"></td>
                                                        @if($lane_master)
                                                        @foreach($lane_master as $lane)

                                                        <td  style="text-align:center"><input type="checkbox" value="{{$lane->id}}" name="lane_{{$lane->id}}_{{$slot->id}}" > </td> 
                                                        @endforeach
                                                        @endif
                                           
                                        </tr>
                                        @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>

                              

                                <div class="col-md-6">
                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">Submit</div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dark-transparent sidebartoggler"></div>
<div class="dark-transparent sidebartoggler"></div>
<x-footer />
<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->
<!-- <x-c-k-editor/>
<script>
    loadEditor('#pageDetails');
</script>
<script>
    function addPage(event, el) {
        if (editor.getData().length == 0) {
            event.preventDefault();
            iziToast.show({
                messageColor: '#FFFFFF',
                backgroundColor: '#dc3545',
                message: 'Please Enter Page Details'
            });
        }
    }
</script>-->

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pageDetails');
</script>
