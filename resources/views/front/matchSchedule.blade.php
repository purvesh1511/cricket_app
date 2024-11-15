@php
    $title = 'Match Schedule';
@endphp
<x-front_header :title="$title" />
<!-- main body -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BC Cricket Championship</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

.main-section {
margin: 20px;
margin-bottom: 70px;
}
.main-section {
    margin: 0;
    margin-bottom: 0;
    background-color: #ffc050;
}
 .main-table-header {
    background-color: #ffc050!important;
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
}
.heading {
    background: transparent!important;}
.main-table-header .text-center {
    font-weight: bold;
}
/*#date {*/
/*    font-weight: 600;*/
/*}*/
.main {
  width: 80%;
  height: 100%;
  margin: 20px;
  margin: auto;
  padding: 10px;
}
.main-table-header {
  background-color: black;
  color: #fff;
  font-weight: 700;
  text-transform: uppercase;
}
.bg-0 {
  background-color: #ffc050;
}
.bg-1 {
  background-color: #e68a65;
}
.left-box {
  width: 40%;
  height: 40px !important;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0px 11px 0px 0px !important;
  font-weight: 600;
  text-transform: uppercase;
}
.right-box {
  width: 40%;
  height: 40px !important;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 11px 0px 0px 0px !important;
  font-weight: 600;
  text-transform: uppercase;
}
.triangle {
  width: 0;
  height: 0;
  border-left: 50px solid transparent;
  border-bottom: 38px solid white;
  position: absolute;
  bottom: 0;
  left: -46px;
}
.triangle2 {
  width: 0;
  height: 0;
  border-right: 50px solid transparent;
  border-bottom: 38px solid white;
  position: absolute;
  bottom: 0;
  right: -46px;
}
.table-body {
  font-weight: 600;
}
.heading {
  background: #000000;
  color: #df5f29;
  width: 54%;
  margin: auto;
  padding: 8px;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 35px;
}
.sub-heading {
  background: #eaa489;
  padding: 5px;
  color: #fff;
  width: 30%;
  margin: auto;
}
.inner-wrapper {
  display: flex;
  color: black;
}
@media only screen and (max-width: 1024px) {
    .main {
        width: 100%;
    }
    .heading{
        width: 80%;
    }
    .sub-heading{
      width: 40%;
    }
}
@media only screen and (max-width: 676px) {
  .main {
    width: 100%;
    padding-top: 0px;
    padding:0px;
  }
  .main-section {
    margin: 0px;
  }
  .main-section .container {
    padding: 0;
  }
  .main-table-header{
      width:100%;
  }
  .inner-wrapper {
    display: block !important;
  }
  .row-item {
    height: 136px !important;
    text-align: center;
  }
  .left-box {
    width: 82%;
  }

  .right-box {
    width: 82%;
    height: 37px !important;
    margin-left: 46px;
  }
  .triangle {
    width: 0;
    height: 0;
    border-right: 50px solid transparent;
    border-bottom: 35px solid white;
    position: absolute;
    bottom: 0;
    right: -46px;
  }
  #date {
    display: block !important;
    padding-top: 36px !important;
  }
  .heading{
    width: 100%;
    font-size: 26px;
  }
  .sub-heading{
    width: 100%;
  }
}

    </style>
  </head>

  <body>
    <div class="main-section">
      <div class="container">
        <div class="main-heading text-center pb-2">
          <h4 class="sub-heading">T20 Cricket Is Back!</h4>
          <h4 class="heading">BC Cricket Championship</h4>
        </div>
        <div class="main">
          <!-- table header -->
          <div class="row main-table-header py-2 w-100">  
            <div class="col-2 text-center d-flex align-items-center justify-content-center th-item">Date</div>
            <div class="col-8 text-center d-flex align-items-center justify-content-center th-item">Match</div>
            <div class="col-2 text-center d-flex align-items-center justify-content-center th-item">Canadian Time</div>
          </div>
          <!-- table body -->
          <div class="table-body w-100">
            <div class="row row-item" style="height: 75px">
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                id="date"
              >
                7<sup>th</sup> Aug 2020
              </div>
              <div class="col-8 bg-1">
                <div class="pt-2">
                  <div
                    class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                  >
                    <div class="left-box card border-0">
                      VANCOUVER VIBES
                      <div class="triangle2"></div>
                    </div>

                    <b>VS</b>
                    <div class="right-box card border-0">
                      VICORIA WAVES
                      <div class="triangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
              >
                9.00 am
              </div>
            </div>
            <div class="row row-item" style="height: 75px">
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                id="date"
              >
                7<sup>th</sup> Aug 2020
              </div>
              <div class="col-8 bg-1">
                <div class="pt-1">
                  <div
                    class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                  >
                    <div class="left-box card border-0">
                      King 11 Kelowna 
                      <div class="triangle2"></div>
                    </div>

                    <b>VS</b>
                    <div class="right-box card border-0">
                      Surrey Shines
                      <div class="triangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
              >
                1.00 pm
              </div>
            </div>
            <div class="row row-item" style="height: 75px">
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                id="date"
              >
                8<sup>th</sup> Aug 2020
              </div>
              <div class="col-8 bg-1">
                <div class="pt-1">
                  <div
                    class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                  >
                    <div class="left-box card border-0">
                      BC.Champions 
                      <div class="triangle2"></div>
                    </div>

                    <b>VS</b>
                    <div class="right-box card border-0">
                      Vancouver Vibes
                      <div class="triangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
              >
                9.00 am
              </div>
            </div>
            <div class="row row-item" style="height: 75px">
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                id="date"
              >
                8<sup>th</sup> Aug 2020
              </div>
              <div class="col-8 bg-1">
                <div class="pt-1">
                  <div
                    class="inner-wrapper position-relative justify-content-between align-items-center p-2"
                  >
                    <div class="left-box card border-0">
                      Kings 11 Kelowna
                      <div class="triangle2"></div>
                    </div>

                    <b>VS</b>
                    <div class="right-box card border-0">
                      Victoria Waves
                      <div class="triangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
              >
                1.00 pm
              </div>
            </div>
            <div class="row row-item" style="height: 75px">
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                id="date"
              >
                9<sup>th</sup> Aug 2020
              </div>
              <div class="col-8 bg-1">
                <div class="pt-1">
                  <div
                    class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                  >
                    <div class="left-box card border-0">
                      Victoria Waves
                      <div class="triangle2"></div>
                    </div>

                    <b>VS</b>
                    <div class="right-box card border-0">
                      Surrey Shines
                      <div class="triangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
              >
                9.00 am
              </div>
            </div>
            <div class="row row-item" style="height: 75px">
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                  id="date"
                >
                  9<sup>th</sup> Aug 2020
                </div>
                <div class="col-8 bg-1">
                  <div class="pt-1">
                    <div
                      class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                    >
                      <div class="left-box card border-0">
                       Bc.Champions
                        <div class="triangle2"></div>
                      </div>
  
                      <b>VS</b>
                      <div class="right-box card border-0">
                        King 11 Kelowna
                        <div class="triangle"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
                >
                  1.00 pm
                </div>
            </div>
            <div class="row row-item" style="height: 75px">
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                  id="date"
                >
                  10<sup>th</sup> Aug 2020
                </div>
                <div class="col-8 bg-1">
                  <div class="pt-1">
                    <div
                      class="inner-wrapper position-relative  justify-content-between align-items-center p-2"
                    >
                      <div class="left-box card border-0">
                       Vancouver Vibes
                        <div class="triangle2"></div>
                      </div>
  
                      <b>VS</b>
                      <div class="right-box card border-0">
                        Surrey Shines
                        <div class="triangle"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
                >
                  9.00 am
                </div>
            </div>
            <div class="row row-item" style="height: 75px">
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                  id="date"
                >
                  10<sup>th</sup> Aug 2020
                </div>
                <div class="col-8 bg-1">
                  <div class="pt-1">
                    <div
                      class="inner-wrapper position-relative justify-content-between align-items-center p-2"
                    >
                      <div class="left-box card border-0">
                       Bc.Champions
                        <div class="triangle2"></div>
                      </div>
  
                      <b>VS</b>
                      <div class="right-box card border-0">
                        Victoria Waves
                        <div class="triangle"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
                >
                  1.00 pm
                </div>
            </div>
            <div class="row row-item" style="height: 75px">
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                  id="date"
                >
                  11<sup>th</sup> Aug 2020
                </div>
                <div class="col-8 bg-1">
                  <div class="pt-1">
                    <div
                      class="inner-wrapper position-relative justify-content-between align-items-center p-2"
                    >
                      <div class="left-box card border-0">
                      Vancouver Vibes
                        <div class="triangle2"></div>
                      </div>
  
                      <b>VS</b>
                      <div class="right-box card border-0">
                        King 11 kelowna
                        <div class="triangle"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
                >
                  9.00 am
                </div>
            </div>
            <div class="row row-item" style="height: 75px">
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center font-weight-bold"
                  id="date"
                >
                  11<sup>th</sup> Aug 2020
                </div>
                <div class="col-8 bg-1">
                  <div class="pt-1">
                    <div
                      class="inner-wrapper position-relative justify-content-between align-items-center p-2"
                    >
                      <div class="left-box card border-0">
                     Surrey Shines
                        <div class="triangle2"></div>
                      </div>
  
                      <b>VS</b>
                      <div class="right-box card border-0">
                       Bc.Champions
                        <div class="triangle"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-2 d-flex align-items-center p-3 bg-0 text-dark justify-content-center"
                >
                  1.00 pm
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



<!-- main body end -->
<x-front_footer />