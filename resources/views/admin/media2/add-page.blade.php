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
                            <h4 class="fw-semibold mb-8">ADD NEW MEDIA</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('all-achivement') }}">Media</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Add New Media
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
                            <form action="{{ route('store-media2') }}" method="POST" onsubmit="addPage(event,this)"
                                enctype="multipart/form-data">
                                @csrf
                                
                                

                                <div class="row" >
                                   
                                    <div class="col-md-4 mb-3">
                                        <label> Image</label>
                                        <input type="file" name="page_image" autocomplete="off" class="form-control form-control-file" required>
                                    </div>
                                </div>

                              

                                <div class="col-md-6">
                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">Submit</div>
                                        </button>
                                    </div>
                                </div>

                                @if(isset($image_url))
                                <div class="col-md-4 mb-3">
                                        <label> Image URL is</label>
                                        <input type="text" name="img_url" id="img_url" autocomplete="off" class="form-control form-control-file" value="@if(isset($image_url)){{$image_url}}@endif">
                                        <a href="javascript:void(0)" onclick="copy_url()">Copy</a>
                                    </div>
                                </div>
                                @endif
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

    function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        console.log('Text copied to clipboard successfully!');
    }).catch(function(err) {
        console.error('Error in copying text: ', err);
    });
}
function copy_url(){
    var imageURL=$("#img_url").val();
    copyToClipboard(imageURL);
}
</script>
