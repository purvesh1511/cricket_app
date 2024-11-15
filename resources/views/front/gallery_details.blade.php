@php
    $title = 'Gallery';
@endphp
<x-front_header :title="$title" />
<!--main section start-->
<style>
    
    :root {
  --yellow: #fffbbc;
  --lightbox: #242424;
}

body {
  margin: 0px;
  font: 20px / 28px "Marck Script", cursive;
}

.notification {
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 5px 15px;
  margin: 0;
  text-align: center;
  z-index: 1;
  background: var(--yellow);
}
@media (max-width: 1024px) {
    .event-title #cm-title .horizental-line {
    margin-top: -17px !important;
    width: 60%;
}
}
@media (max-width: 700px) {
  .notification {
    display: none;
  }
  .event-title #cm-title .horizental-line {
    margin-top: -17px !important;
    width: 70%;
}
}


/* IMAGE GRID STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.image-grid figure {
  margin-bottom: 0;
}

.image-grid img {
  box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.15);
  transition: box-shadow 0.2s;
}

.image-grid a:hover img {
  box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.35);
}


/* LIGHTBOX STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.lightbox-modal .modal-content {
  background: var(--lightbox);
}

.lightbox-modal .btn-close {
  position: absolute;
  top: 20px;
  right: 18px;
  font-size: 1.2rem;
  z-index: 10;
}

.lightbox-modal .modal-body {
  display: flex;
  align-items: center;
  padding: 0;
  text-align: center;
}

.lightbox-modal img {
  width: auto;
  max-height: 100vh;
  max-width: 100%;
}

.lightbox-modal .carousel-caption {
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(36, 36, 36, 0.75);
}

.lightbox-modal .carousel-control-prev,
.lightbox-modal .carousel-control-next {
  top: 50%;
  bottom: auto;
  transform: translateY(-50%);
  width: auto;
}

.lightbox-modal .carousel-control-prev {
  left: 10px;
}

.lightbox-modal .carousel-control-next {
  right: 10px;
}


/* FOOTER STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.page-footer {
  position: fixed;
  right: 0;
  bottom: 60px;
  display: flex;
  align-items: center;
  font-size: 1rem;
  padding: 5px;
  background: rgba(255, 255, 255, 0.65);
}

.page-footer a {
  display: flex;
  margin-left: 9px;
}


</style>
<div class="event-title">
     <div class="main-title " id="cm-title">
        <h4><span>GALLERY</span></h4>
        <div class="horizental-line"></div>
    </div>
</div>


<div class="container">

<!--<h1 class="text-center mb-4">Our Gallery</h1> -->
<section class="image-grid">
 <div class="container-xxl">
   <div class="row gy-4">
    @if($gallery_list)
     @foreach($gallery_list as $gallery)
     <div class="col-12 col-sm-6 col-md-4">
       <figure>
          <a class="d-block" href="">
          <img width="1920" height="1280" src="{{asset('page_image')}}/{{$gallery->file_name}}" class="img-fluid"  >
       </a>
        </figure>
      </div>
     @endforeach
     @endif
      
      
    </div>
  </div>
</section><br><br><br>


