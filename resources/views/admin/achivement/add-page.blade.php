@php
$title = 'Add Page';
@endphp
<x-header :title="$title" />
{{$title}}
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
                        <h4 class="fw-semibold mb-8">ADD NEW NEWS</h4>
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
                                    Add New News
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
                <form action="{{ route('store-achivement') }}" method="POST" onsubmit="addPage(event,this)"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12 mb-3">
                        <label>Heading <span class="text-danger">*</span></label>
                        <input type="text" name="page_name" autocomplete="off" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea name="page_description" id="pageDetails" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label> Image</label>
                            <input type="file" name="page_image" autocomplete="off" class="form-control form-control-file">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Sort Order <span class="text-danger">*</span></label>
                        <input type="number" name="sort_order" autocomplete="off" class="form-control sort_order" required>
                    </div>



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
</script>