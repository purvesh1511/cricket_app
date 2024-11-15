@php
    $title = 'Edit Lane';
@endphp
<x-header :title="$title" />
<link rel="stylesheet" type="text/css" href="assets/css/codemirror.min.css" />
<link rel="stylesheet" href="assets/css/blackboard.min.css" />
<link rel="stylesheet" href="assets/css/monokai.min.css" />
<link rel="stylesheet" href="assets/css/summernote-lite.min.css">
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
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">EDIT Slot</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('lanes') }}">Slots</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Edit Slots
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-slot') }}" method="POST">
                                @csrf
                                <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Slot Name*</label>
                                        <input type="text" name="slot_name" autocomplete="off" class="form-control mb-3"
                                            placeholder="Slot Name..." value="{{ $slot->slot_name }}" required>
                                    </div>
                                   
                                    
                                </div>
                                <div class="text-start mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
                                        <div class="d-flex align-items-center">
                                            Update
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="dark-transparent sidebartoggler"></div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<x-footer />
<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>
<script>
    function showHidePassword(el) {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        var y = document.getElementById("Iclass");
         var attribute=y.className;
         if(attribute=='ti ti-eye-off toggle-password'){
               y.classList.replace("ti-eye-off", "ti-eye");
         }else{
             y.classList.replace("ti-eye", "ti-eye-off"); 
         }
    }
</script>