@php
    $title = 'Edit Page';
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
                            <h4 class="fw-semibold mb-8">EDIT NEWS</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('all-achivement') }}">News</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Edit News
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-achivement') }}" method="POST" onsubmit="editAchivement(event,this)" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page_id" value="{{ $page[0]->id }}">

                                <div class="col-md-12 mb-3">
                                    <label>Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="page_name" autocomplete="off" class="form-control mb-3" value="{{ $page[0]->heading }}" required>
                                </div>  

                                <div class="col-md-12 mb-3">
                                    <label> Description <span class="text-danger">*</span></label>
                                    <textarea name="page_description" class="form-control mb-4" cols="30" rows="10" id="pageDetails">{{ $page[0]->description }}</textarea>
                                </div>

                                <div class="row" >
                                    
                                    <div class="col-md-4 mb-3">
                                        <label> Image</label>
                                        <input type="file" name="page_image" autocomplete="off" class="form-control form-control-file">
                                    </div>
                                    <div class="col-md-4">
                                        @if($page[0]->image != null || $page[0]->image != '') 
                                        <div class="my-2 position-relative">
                                            <a href="javscript:void(0)" data-bs-toggle="modal" data-bs-target="#removeBanner" class="position-absolute badge bg-danger text-light p-0" style="left: 5px;top: 5px; cursor: pointer;">
                                                <i class="ti ti-x"></i>
                                            </a>
                                            <img src="{{asset('page_image')}}/{{$page[0]->image}}" class="page-image-preview">
                                        </div>
                                        @else 
                                        <div class="my-2">
                                            <img src="assets/images/placeholder.png" class="page-image-preview">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Sort Order <span class="text-danger">*</span></label>
                                    <input type="number" name="sort_order" class="form-control mb-3 sort_order" value="{{ $page[0]->sort_order }}" required>
                                </div> 
                                        
                               
                                <div class="col-md-12 mb-3">
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
        <div class="modal fade" id="removeBanner"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content rounded-1">
                    <div class="modal-body message-body text-center p-4"
                    data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1 text-success">Remove Banner</h5>
                        <p>Are You Sure?</p>
                        <div class="mt-4">
                            <a href="{{route('delete-achivement-image')}}?page_id={{$page[0]->id}}"
                            class="btn btn-primary">Yes</a>
                            <button data-bs-dismiss="modal" class="btn btn-light border">No</button>
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
<x-c-k-editor/>
<script>
    //loadEditor('#pageDetails');
</script>
<script>
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

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pageDetails');
</script>
