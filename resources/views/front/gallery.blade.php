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

  <!-- <h1 class="text-center mb-4">Our Gallery</h1> -->
  <!--<section class="image-grid">-->
  <!--  <div class="container-xxl">-->
  <!--    <div class="row gy-4">-->
  <!--    @if($gallery_list)-->
  <!--     @foreach($gallery_list as $gallery)-->
  <!--      <div class="col-12 col-sm-6 col-md-4">-->
  <!--        <figure>-->
  <!--          <a class="d-block" href="">-->
  <!--            <img width="1920" height="1280" src="{{asset('page_image')}}/{{$gallery->file_name}}" class="img-fluid"  >-->
  <!--          </a>-->
  <!--        </figure>-->
  <!--      </div>-->
  <!--      @endforeach-->
  <!--      @endif-->


  <!--    </div>-->
  <!--  </div>-->
  <!--</section><br><br><br>-->

  <section class="gallerycatagory mb-5" id="gal-cat">
    <div class="container">
      <div class="row">
        @if($gallery_category)
        @foreach($gallery_category as $gal_category)
        <?php
        $categoryImgCount = DB::table('media')->where('category_id', $gal_category->id)->count();
        ?>

        <div class="col-lg-4 col-12 gal">
          <a href="{{route('gallery-details')}}?category_id={{$gal_category->id}}">
            <div class="card m-1 p-3">
              <div class="position-relative">
                <img src="{{asset('page_image')}}/{{$gal_category->image}}" class="img-fluid" alt="..." style="height: 245px;" width="100%">
                <span class="d-flex gal-counter position-absolute ">
                  <img class="border-0" src="https://web.cricademia.com/public/page_image/1722426936gallery-icon.png" width="57%" style="border: 0px !important;" />
                  {{$categoryImgCount}} </span>
              </div>
              <div class="card-body p-0 py-3 pb-0">
                <h5 class="card-title">{{$gal_category->heading}}</h5>
              </div>
          </a>
        </div>
      </div>

      @endforeach
      @endif






    </div>
</div>

</section>

<div class="modal lightbox-modal" id="lightbox-modal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="container-fluid p-0">
          <!-- JS content here -->
        </div>
      </div>
    </div>
  </div>
</div>


</div>

<!--main section end-->
<x-front_footer />


<script>
  const imageGrid = document.querySelector(".image-grid");
  const links = imageGrid.querySelectorAll("a");
  const imgs = imageGrid.querySelectorAll("img");
  const lightboxModal = document.getElementById("lightbox-modal");
  const bsModal = new bootstrap.Modal(lightboxModal);
  const modalBody = document.querySelector(".modal-body .container-fluid");

  for (const link of links) {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      const currentImg = link.querySelector("img");
      const lightboxCarousel = document.getElementById("lightboxCarousel");
      if (lightboxCarousel) {
        const parentCol = link.parentElement.parentElement;
        const index = [...parentCol.parentElement.children].indexOf(parentCol);
        const bsCarousel = bootstrap.Carousel.getInstance(lightboxCarousel) || new bootstrap.Carousel(lightboxCarousel);
        bsCarousel.to(index);
      } else {
        createCarousel(currentImg);
      }
      bsModal.show();
    });
  }

  function createCarousel(img) {
    const markup = `
            <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-interval="false">
                <div class="carousel-inner">
                    ${createSlides(img)}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        `;

    modalBody.innerHTML = markup;
  }

  function createSlides(img) {
    let markup = "";
    const currentImgSrc = img.getAttribute("src");

    for (const img of imgs) {
      const imgSrc = img.getAttribute("src");
      const imgAlt = img.getAttribute("alt");
      const imgCaption = img.getAttribute("data-caption");

      markup += `
                <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
                    <img src="${imgSrc}" alt="${imgAlt}">
                    ${imgCaption ? createCaption(imgCaption) : ""}
                </div>
            `;
    }

    return markup;
  }

  function createCaption(caption) {
    return `<div class="carousel-caption">
            <p class="m-0">${caption}</p>
        </div>`;
  }
</script>