@php
    $title = 'My Profile';
@endphp
<x-header :title="$title" />
<link rel="stylesheet" type="text/css" href="assets/css/codemirror.min.css" />
<link rel="stylesheet" href="assets/css/blackboard.min.css" />
<link rel="stylesheet" href="assets/css/monokai.min.css" />
<link rel="stylesheet" href="assets/css/summernote-lite.min.css">
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
                            <h4 class="fw-semibold mb-8">My Profile</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Profile Setting
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ $admin->image == null ? 'assets/images/logos/logo.png' : $admin->image }}"
                                            class="img-thumbnail" id="blah"
                                            style="border-radius: 50%; width:100px; object-fit:cover;">
                                        <input type="file" name="image" accept="image/*" class="form-control my-3"
                                            id="imgInp">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                             <label>Name</label>
                                            <input type="text" value="{{ $admin->name }}" name="name"
                                                autocomplete="off" class="form-control mb-3" placeholder="Name...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                             <label>Username</label>
                                            <input type="text" value="{{ $admin->username }}" name="username"
                                                autocomplete="off" class="form-control mb-3" placeholder="Username...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                             <label>Email</label>
                                            <input type="email" value="{{ $admin->email }}" name="email"
                                                autocomplete="off" class="form-control mb-3" placeholder="Email...">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                             <label>Mobile No</label>
                                            <input type="number" value="{{ $admin->phone }}" name="phone"
                                                autocomplete="off" class="form-control mb-3" placeholder="Mobile...">
                                        </div>
                                    </div>


                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
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
<x-footer />
<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>
<script src="assets/js/summernote-lite.min.js"></script>
<script>
    /************************************/
    //default editor
    /************************************/
    $(".summernote").summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
    });

    /************************************/
    //inline-editor
    /************************************/
    $(".inline-editor").summernote({
        airMode: true,
    });

    /************************************/
    //edit and save mode
    /************************************/
    (window.edit = function() {
        $(".click2edit").summernote();
    }),
    (window.save = function() {
        $(".click2edit").summernote("destroy");
    });

    var edit = function() {
        $(".click2edit").summernote({
            focus: true
        });
    };

    var save = function() {
        var markup = $(".click2edit").summernote("code");
        $(".click2edit").summernote("destroy");
    };

    /************************************/
    //airmode editor
    /************************************/
    $(".airmode-summer").summernote({
        airMode: true,
    });
</script>
<script>
    $(".toggle-password").click(function() {

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
        //y.classList.add("KK");
        //alert(attribute);
    });


    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
