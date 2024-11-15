@php
    $title = '404';
@endphp
<x-front_header :title="$title" />
<div class="site-section">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="assets/images/404.png" width="350px">
                        <div class="text-muted h5">
                            Opps! Page Not Found
                        </div>
                        <a href="{{route('home')}}" class="btn btn-primary mt-4">
                        Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-front_footer />
