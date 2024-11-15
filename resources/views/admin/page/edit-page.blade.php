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
                            <h4 class="fw-semibold mb-8">EDIT PAGE</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('all-pages') }}">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Edit Page
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
                            <form action="{{ route('update-page') }}" method="POST" onsubmit="editPage(event,this)" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page_id" value="{{ $page->id }}">

                                <div class="col-md-12 mb-3">
                                    <label>Page Title <span class="text-danger">*</span></label>
                                    <input type="text" name="page_name" autocomplete="off" class="form-control mb-3" value="{{ $page->page_name }}" required>
                                </div>  

                                <div class="col-md-12 mb-3">
                                    <label>Page Description <span class="text-danger">*</span></label>
                                    <!-- <textarea name="page_description" class="form-control mb-4" cols="30" rows="10" id="pageDetails">{{ $page->page_description }}</textarea> -->
                                    <textarea name="page_description" class="form-control mb-4" cols="30" rows="10">{{ $page->page_description }}</textarea>
                                </div>

                                <div class="row" >
                                    <div class="col-md-4 mb-3">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" name="slug" autocomplete="off" class="form-control mb-3" value="{{ $page->slug }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Banner Image</label>
                                        <input type="file" name="page_image" autocomplete="off" class="form-control form-control-file">
                                    </div>
                                    <div class="col-md-4">
                                        @if($page->page_image != null || $page->page_image != '') 
                                        <div class="my-2 position-relative">
                                            <a href="javscript:void(0)" data-bs-toggle="modal" data-bs-target="#removeBanner" class="position-absolute badge bg-danger text-light p-0" style="left: 5px;top: 5px; cursor: pointer;">
                                                <i class="ti ti-x"></i>
                                            </a>
                                            <img src="{{$page->page_image}}" class="page-image-preview">
                                        </div>
                                        @else 
                                        <div class="my-2">
                                            <img src="assets/images/placeholder.png" class="page-image-preview">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                        
                                <fieldset class="form-group border p-3">
                                    <legend>For SEO</legend>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="mt-3">Meta Title</label>
                                            <input type="text" name="meta_title" autocomplete="off" class="form-control" value="{{ $page->meta_title }}" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mt-3">Meta Keyword</label>
                                            <input type="text" name="meta_keyword" autocomplete="off" class="form-control mb-3" value="{{ $page->meta_keyword }}" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" class="form-control mb-4" cols="30" rows="10"
                                                style="width:100%;" required>{!! html_entity_decode($page->meta_description) !!}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
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
                            <a href="{{route('delete-page-image')}}?page_id={{$page->id}}"
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
    loadEditor('#pageDetails');
</script>
<script>
    function editPage(event, el) {
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
