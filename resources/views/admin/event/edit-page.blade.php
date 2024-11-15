@php
    $title = 'Add Page';
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
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-8">EDIT NEW EVENT</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('all-event') }}">Event</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Edit New Event
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="card">
                        <div class="card-body"> -->
                        <form action="{{ route('update-event') }}" method="POST" onsubmit="editAchivement(event,this)" enctype="multipart/form-data">
                        <input type="hidden" name="page_id" value="{{ $page->event_id }}">
                                @csrf
                            <div class="row">
                            <div class="col-md-12 mb-3">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="event_title" value="{{ $page->event_name }}" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input type="date" name="event_date" value="{{ $page->event_date }}" id="txtDate" autocomplete="off" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Time <span class="text-danger">*</span></label>
                                    <input type="text" name="event_time" value="{{ $page->event_time }}" autocomplete="off" class="form-control" required>
                                </div>
							</div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Capacity <span class="text-danger">*</span></label>
                                    <input type="text" name="event_capacity" value="{{ $page->event_no_of_person }}" autocomplete="off" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Event Price <span class="text-danger">*</span></label>
                                    <input type="text" name="event_price" value="{{ $page->event_price }}" autocomplete="off" class="form-control" required>
                                </div>
							</div>	

                                
                                
                                <div class="col-md-12 mb-3">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="page_description" id="pageDetails" class="form-control" cols="30" rows="10">{{ $page->event_descrption }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Venue <span class="text-danger">*</span></label>
                                    <input type="text" name="event_venue" value="{{ $page->event_address }}" autocomplete="off" class="form-control" required>
                                </div>
							

                                <!-- <div class="row" >
                                   
                                    <div class="col-md-4 mb-3">
                                        <label> Image</label>
                                        <input type="file" name="page_image" autocomplete="off" class="form-control form-control-file" required>
                                    </div>
                                </div> -->

                              

                                <div class="col-md-6">
                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">Submit</div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <!-- </div>
                    </div> -->
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
	$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    
    $('#txtDate').attr('min', maxDate);
});

function editAchivement(event, el) {
        if (editor.getData().length == 0) {
            event.preventDefault();
            iziToast.show({
                messageColor: '#FFFFFF',
                backgroundColor: '#dc3545',
                message: 'Please Enter Page Details'
            });
        }
    }
</script>
