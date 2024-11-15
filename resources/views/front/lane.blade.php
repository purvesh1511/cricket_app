@php
    $title = 'Lane';
@endphp

@php
    $site_name_exists = \App\Models\Option::where('option_name', 'site_description')->exists();
    if ($site_name_exists) {
        $site_name = \App\Models\Option::where('option_name', 'site_description')->first()->option_value;
        $site_name = $site_name;
    } else {
        $site_name = '';
    }
@endphp

<x-front_header :title="$title" />
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Axiforma, sans-serif;
}

html,
/* body {
    width: 100%;
    height: 100%;
} */

/* .main {
    width: 100%;
    min-height: 100vh;
    /* background-color: aquamarine; */
    padding-inline: 15vw;
} */

.main>h1 {
    text-align: center;
}

.calender {
    height: auto;

}

.calender>.box {
    width: 100%;
    height: auto;
    /* background-color: rgb(255, 255, 255); */
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    border-radius: 10px;
}

.calender>.box>.header {
    width: 100%;
    height: 50px;
    /* background-color: red; */
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

}

.calender-p {
    font-size: 20px;
    margin-top: 15px;
}

.header>span {
    font-size: 18px
}

.year {
    font-weight: 600
}


.header>.prev,
.header>.next {
    background-color: #ffa500;
    height: 100%;
    width: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 600;
    cursor: pointer;
    color: #fff;
}

.box>ul>li {
    list-style-type: none;
}


.all-days {
    font-weight: 600
}

.days,
.allDates {
    list-style: none;
    padding-top: 20px;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    display: flex;
    height: auto;
    align-items: center;
    justify-content: space-evenly;
}

.days li,
.allDates li {
    width: calc(100% / 7);
    text-align: center;
    margin-bottom: 15px;
}

.allDates li.inactive {
    color: #ccc;
}

.allDates li.today {
    color: green;
    font-weight: 800;
}


.schedule {
    height: auto;
    display: flex;
}

.sec-1 {
    width: 28%;
    height: 100%;
    background-color: #228B22;
}

.sec-1>ul>.d-m-y {
    font-weight: 600;
    background-color: #000;
    color: #fff;
}

.sec-1>ul>li {
    width: 100%;
    height: calc(75vh / 15);
    border-bottom: 1px solid rgb(255, 255, 255);
    list-style-type: none;
    padding-block: 8px;
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    color: #FFF;
}




.sec-2 {
    width: 18%;
    height: 100%;
    background-color: #afafaf;
    border-left: 1px solid white;
}

.sec-2>ul>.lane {
    font-size: 19px;
    font-weight: 600;
    background-color: black;
    color: #fff;
}


.sec-2>ul>li {
    width: 100%;
    height: calc(75vh / 15);
    border-bottom: 1px solid rgb(255, 255, 255);
    list-style-type: none;
    font-size: 12px;
    color: #FFF;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}



.selection-date{
    width: 100%;
    height: auto;
    margin-top: 10px;
}

.selection-date>.wrapper{
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.wrap-1{
    line-height: 40px;
}

.wrap-2{
    display: flex;
    align-items: center;
    justify-content: center;
}

.selection-date>button{
    width: 170px;
    padding-block: 15px;
    font-weight: 700;
    font-size: 19px;
    position: relative;
    left: 80%;
    top: 8%;
    background-color: #ffa500;
    border: none;
    border-radius: 8px;
    color: #fff;
    cursor: pointer;
}

.active{
    font-size: 10px; color: rgb(153, 153, 153); 
    background: url('https://yorkshirecricketnets.com/wp-content/themes/kadence-child/assets/bat.png') center center no-repeat rgb(50, 168, 50);background-color:#e46e3d;
    text-align:center;color:white;
}

.tdClss{
 text-align:center;
 border: 1px solid #ddd;
 width:200px;
 cursor:pointer;
 background-color:#fff;
}
.bookedCls {
    background-color:red;
}
.ui-state-active, .ui-widget-content .ui-state-active{
    border: 1px solid #e89877 !important;
    background: #e89877 !important;
}
.ui-datepicker td a {
    text-align: center !important;
}



/* Mobile View */
@media only screen and (max-width: 767px) {
    .main {
        
        padding-inline: 5px;
    }

    .main>h1 {
        font-size: 20px;
    }

    .container {
        display: block;
        margin-top: 15px; 
        margin-bottom: 30px;
    }

    .calender {
        width: 95%;
        margin: auto;
        margin-bottom: 20px;
    }

    .schedule {
        width: 95%;
        margin: auto;
    }
    .selection-date{
        width:95%;
       margin: auto;
    }

    .selection-date>button{
        left: 0;
        width: 80%;
    }

}

.schedule>table{
    background-color:#dadada;
}

.calender-heading{
    background-color: black;
}

/* Calender Design */
.ui-datepicker-inline{
    width:100%;
}




/* Date Picker Css */

.ui-datepicker .ui-datepicker-header{
    background-color:black;color:white !important;
}
.ui-widget.ui-widget-content {
 width:100% !important
}


@media (max-width: 1024px) {
   div#cm-title .horizental-line{
    width: 90% !important;
    }
}


@media (max-width: 700px) {
    .event-title #cm-title .horizental-line {
    width: 100%;
}
#noticewrap h1{
    width: 58%;
    margin: auto;
    text-align: center;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.notice-content {
    border: 2px solid #ddd;
    padding: 30px;
    margin-bottom: 30px !important;
    border-radius: 6px;
    width: 95%;
    margin: auto;
}
#noticewrap #cm-title .horizental-line {
    margin-top: -32px !important;
}
}



</style>
<!-- main body -->

<?php date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
//echo date('d-m-Y H:i:s');
?> 

<section class="EXPERIENCE" id="lan">
    <div class="container">
        
        <div class="row" id="noticewrap">
            <div class="main-title " id="cm-title">
                <h1><span>Book a one to one Session </span></h1>
                <div class="horizental-line"></div>
            </div>
            
            <div class="notice-content">
               {!! $site_name !!} 
            </div>
        </div>
         <div class="row" id="noticewrap">
            
        <div class="main-title " id="cm-title">
                <h1><span>Book a Lane</span></h1>
                <div class="horizental-line"></div>
            </div>
            
</div>
      <div class="container">
          <div class="row">
              <div class="col-lg-5 col-md-12 col-12">
                  <div class="calender">
          <div class="box">
            <div id="datePicker" style="width: 100%;"></div>
            <p id="selectedDate">Selected Date: </p>
          </div>
          <p class="calender-p">
            Whilst we will always try to meet each customer's specific needs, at
            times we cannot guarantee that the booked Lane will be the Lane that
            you will be placed in.
          </p>
        </div>
       
              </div>
              <div class="col-lg-7 col-md-12 col-12">
    <div class="schedule w-100 overflow-auto">
        <form name="slot_form" id="slot_form" method="post" >
            <input type="hidden" id="current_date" name="current_date" value="<?php echo $_GET['date'];?>">
					@csrf
        <table width="100%" id="custable">
            @php 
            if(isset($_GET['date'])){
                $date=$_GET['date'];
            }else{
                $date=date('Y-m-d');
            }
            @endphp

        <tr class="calender-heading">
                <th  width="30%" style="color:#fff;text-align:center">{{date('D d M Y',strtotime($date))}}</th> 
                @if($lane_master)
                @foreach($lane_master as $lane)
                <th style="text-align:center;color:#fff;border: 1px solid #fff; width:30%;">{{$lane->lane_name}} 
                
            </th> 
                @endforeach
                @endif
        </tr>
        @if($slot_master)
            @foreach($slot_master as $slot)

            
            @php
            if(isset($_GET['date'])){
                $date=$_GET['date'];
            }else{
                $date=date('Y-m-d');
            }
            $timestamp = strtotime($date);
            $day = date('l', $timestamp);
            
            $selLaneArr=[];
            $single_slot=DB::table('lane_slot')->where('slot_id',$slot->id)->where('day',$day)->get();
            
            if(count($single_slot)>0){
                $selLaneArr=explode(',',$single_slot[0]->lane_ids);
            }


            $DisableLaneArr=[];
            $disable_slot=DB::table('disable_lane_slot')->where('slot_id',$slot->id)->where('date',$date)->get();
            
            if(count($disable_slot)>0){
                $DisableLaneArr=explode(',',$disable_slot[0]->lane_ids);
            }
            
            @endphp
        <tr>
            
            <td style="background-color: #e89877;text-align:center;color:#fff">{{$slot->slot_name}} <input type="hidden" name="slot_{{$slot->id}}" value="{{$slot->id}}"></td>
                        @if($lane_master)
                        @foreach($lane_master as $lane)
                        @php 
                        $checked="";
                        $class="";   
                        if (in_array($lane->id, $selLaneArr)){
                            if(in_array($lane->id, $DisableLaneArr)){
                                $checked="";
                                
                            }else{
                                if($_GET['date']==date('Y-m-d'))
                                {
                                    $current_time = date('H:i');
                                    $slot_timeArr=explode("-",$slot->slot_name);
                                    if($current_time>$slot_timeArr[0]){
                                        $checked="";   
                                    }else{
                                        $checked="AVAILABLE";
                                        $class="addLane";    
                                    }

                                    
                                }else{
                                    $checked="AVAILABLE"; 
                                    $class="addLane";  
                                }

                            }
                            
                        }else{
                            $checked=""; 
                        }

                      // Check If Slot is Added
                        $activeCls='';
                        if(session()->has('customer')) {
                        $customer_id = \App\Models\Customer::where('email',session('customer'))->first(['email','id'])->id;
                        $session_id = 0;
                        $slotCartExist=DB::table('cart')->where('customer_id',$customer_id)->where('slot_id',$slot->id)->where('lane_id',$lane->id)->where('select_date',$_GET['date'])->exists();
                        if($slotCartExist){
                            $activeCls='active';
                            $checked="";
                            
                            $class="";
                        }
    
                        }else {
                            $customer_id = 0;
                            if(session()->has('session_id')) {
                                $session_id = session('session_id');
                            }
                            $slotCartExist=DB::table('cart')->where('session_id',$session_id)->where('slot_id',$slot->id)->where('lane_id',$lane->id)->where('select_date',$_GET['date'])->exists();
                            if($slotCartExist){
                                $activeCls='active';
                                $checked="";
                                $class="";  
                            }
                        
                        }


                        // Check If Slot is Booked
                        
                        
                        $session_id = 0;
                        $slotBookedExist=DB::table('orders')->where('slot_id',$slot->id)->where('lane_id',$lane->id)->where('slot_date',$_GET['date'])->where('status','Complete')->exists();
                        $slotBookedExist2=DB::table('orders')->where('slot_id',$slot->id)->where('lane_id',$lane->id)->where('slot_date',$_GET['date'])->where('status','Refund Pending')->exists();
                        if($slotBookedExist || $slotBookedExist2){
                            $activeCls='bookedCls';
                            $checked="BOOKED";
                            
                            $class="";
                        }
    
                        
                        
                        @endphp
                        <td  class='tdClss {{$class}} {{$activeCls}}' id="slot_<?php echo $slot->id;?>_<?php echo $lane->id;?>"  data-id1="<?php echo $slot->id;?>" data-id2="<?php echo $lane->id;?>">
                        <!-- <input type="checkbox" value="{{$lane->id}}" name="lane_{{$lane->id}}_{{$slot->id}}" >   -->
                        {!!$checked!!}
                    </td> 
                        @endforeach
                        @endif
            
        </tr>
        @endforeach
            @endif
        </table>
                    </form>
          
        </div>
              </div>
          </div>
        
      </div>
      @php $class="none"; $dclass="none"; @endphp
        @if(count($cart_list)>0)
        @php
        $class="block";
        $dclass="block";
        @endphp
        @endif 

      
      <p style="font-size: 26px;display:{{$dclass}}" id="your-selection">Your Selection:</p>
      
      <div class="selection-date" id="selection_div">
      
      @if($cart_list)
            @foreach($cart_list as $cart)
            @php 
            $Slotarr=explode('-',$cart->slot_name);
            $givenDateTimeStr = $cart->select_date.' '.$Slotarr[0];
            $givenDateTime = new DateTime($givenDateTimeStr);
            $currentDateTime = new DateTime();
            if($currentDateTime>=$givenDateTime){
                
                DB::table('cart')->where('id',$cart->cartid)->delete();
            }
            @endphp
                <div class="wrapper">
                <div class="wrap-1">
                <p style="font-size: 26px">{{date('F j, Y', strtotime($cart->select_date))}}  {{$cart->slot_name}}</p>
                
                <div class="date"></div>
               </div>
                <div class="wrap-2">
                <p style="font-size: 19px">{{$cart->lane_name}} (£ {{$cart->lane_price}})</p>
                </div>
               </div>
           @endforeach
           @endif    
        
      </div>
         
            <div class="col-lg-12 " id="book-now-btn" style="display:{{$class}}">
               <a class="btn custom-btn"  href="{{route('checkout')}}">BOOK NOW</a>
            </div>
        
      </div>
     
      
    </div>
        </div>
    </div>
</section>
<?php 
 if(isset($_GET['date'])){
    $defult_date =$_GET['date'];
 }else{
    $defult_date =date('Y-m-d');
 }
 $DateArr=explode("-",$defult_date);

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    
        $(function() {
            // Initialize Datepicker on the input field
            $("#datePicker").datepicker({
                // dateFormat: "D d M yy",
                dateFormat: "yy-mm-dd",
                minDate: 0, // Disable all previous dates
                defaultDate: "<?php echo $defult_date; ?>", 
                onSelect: function(dateText, inst) {
                    // Display the selected date
                    $("#selectedDate").text("Selected Date: " + dateText);
                    window.location.href="book-a-lane?date="+dateText;
                }
            });
        });
</script>

<!-- <script src="frontend/js/script.js"></script> -->
<script>
           

    let slideIndex = 0;
    const slideContainer = document.querySelector('.slide-container');
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function moveSlide(direction) {
        slideIndex = (slideIndex + direction + totalSlides) % totalSlides;
        slideContainer.style.transform = 'translateX(-' + slideIndex * 100 + '%)';
    }

    $(document).ready(function(){

      var checkstr="";
        $(".addLane").click(function(){
            
       $(this).removeClass("tdClss");     
       $(this).addClass("active");
       $('.active').text('');
        var slot_id =$(this).attr('data-id1');
        var lane_id =$(this).attr('data-id2');
        var uniqstr=slot_id+','+lane_id;
        
        // const result = checkstr.match(uniqstr);
        // if (result) {
        //     $(this).addClass("tdClss");     
        //     $(this).removeClass("active");
        //     checkstr=""
        //  }else{


        //  } 
        
    
    checkstr=checkstr+'~'+uniqstr;

        let cartFormData = new FormData($('#slot_form')[0]);
        cartFormData.append('post_sloat_id',slot_id);
        cartFormData.append('post_lane_id',lane_id);
        var Selected_date=$("#current_date").val();
        cartFormData.append('post_date',Selected_date);
        // const date = new Date(Selected_date);
        // const options = { year: 'numeric', month: 'long', day: 'numeric' };
        // const formattedDate = date.toLocaleDateString('en-US', options);
        
        $("#selection_div").html('');    
        
        $.ajax({
            url: "add-to-cart",
            processData: false,
            contentType: false,
            type: "POST",
            data: cartFormData,
            success: function (Response) {
                //console.log(Response); 
                
               if(Response.status=='already exists'){
                //$(this).addClass("tdClss");     
                 $('#slot_'+slot_id+'_'+lane_id).removeClass("active");
                 $('#slot_'+slot_id+'_'+lane_id).addClass("tdClss");
                 $('#slot_'+slot_id+'_'+lane_id).html("AVAILABLE");   
               }
            var Content="";   
            for(var i=0;i<Response.data.length;i++){

                var Selecteddate=Response.data[i].select_date;
                const date = new Date(Selecteddate);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);

                Content+='<div class="wrapper">';
                Content+='<div class="wrap-1 py-3">';
                Content+='<p style="font-size: 26px!important">'+formattedDate+'</p> <bt/><p class="py-1">( '+Response.data[i].slot_name+' )</p>';
                Content+='<div class="date"></div>';
                Content+='</div>';
                Content+='<div class="wrap-2">';
                Content+='<p style="font-size: 19px; font-weight:700">'+Response.data[i].lane_name+'</p><p style="font-size: 26px;"> (£'+Response.data[i].lane_price+')</p>';
                Content+='</div>';
                Content+='</div>';



            }
            $("#selection_div").append(Content);  
            if(Response.data.length==0){
                $("#book-now-btn").hide(); 
                $("#your-selection").hide();  
            }else{
                $("#book-now-btn").show(); 
                $("#your-selection").show();  
            } 
            
            },
            error: function (addToCartErrors) {
                console.log(addToCartErrors);
            },
        });
    });

});
</script>
<!-- main body end -->
<x-front_footer />
