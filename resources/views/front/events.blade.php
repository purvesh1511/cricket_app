@php
    $title = 'Home';
@endphp
<x-front_header :title="$title" />
<!--main section start-->
<style>
    @media (max-width: 1024px) {
    .event-title #cm-title .horizental-line {
    margin-top: -17px !important;
    width: 60%;
}
}
@media (max-width: 700px) {
     .event-title #cm-title .horizental-line {
    margin-top: -17px !important;
    width: 70%;
}
}
</style>
<div class="event-title">
    <div class="main-title " id="cm-title">
        <h4><span>EVENTS</span></h4>
        <div class="horizental-line"></div>
    </div>
</div>
<div class="w-50 m-auto text-center" id="description" style="margin-bottom:85px!important;">
    Here I want to be able to add all the events cricademia runs such as up and coming camps as well as fixtures. If possible I'd like there to be a filter section on this page so people can filter by date or the club they play at
</div>

<div class="container">
    @if($event_list)
    @foreach($event_list as $events)
    @php 
    $event_id =encrypt($events->event_id);
    $EventDateTime   =strtotime($events->event_date);
    $CurrentDateTime =strtotime(date('Y-m-d'));
    
    $EventOrderCount=DB::table('event_order')->where('event_id',$events->event_id)->where('status','Complete')->orwhere('status','Refund Pending')->count();
    $availableEvent=$events->event_no_of_person - $EventOrderCount;

    @endphp

 <?php if($EventDateTime>$CurrentDateTime)   { ?>
<div class="row loop-content mt-5 mb-5">
    <div class="col-lg-3 col-md-3 col-sm-12">
        <span class="d-block">{{date('D',strtotime($events->event_date))}}</span> <h3>{{date('M',strtotime($events->event_date))}} <br id="brake"/>{{date('d',strtotime($events->event_date))}}rd</h3>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 small-des text-start">
        <h3>{{$events->event_name}}</h3>
        {!! substr($events->event_descrption,0,150) !!}<br>
        
       <h3>Total Capacity : <b>{{$events->event_no_of_person}}</b></h3>
       <h3>Available : <b>{{$availableEvent}}</b></h3>
    
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 small-des text-end ps-5" id="event-ang">
        <div class="event-other-des">
        <h3>{{$events->event_time}}</h3>
        <p>
        {{$events->event_address}}
        </p>
        <h3>£ {{$events->event_price}}</h3>
        </div>
        @if($availableEvent>0)
        <div>
        <a href="event-booking?id={{$event_id}}" class="btn custom-btn" id="event-booking-btn" ><span style="color:white;">Book Now </span></a>
        </div>
        @else
        <div>
        <a href="javascript:void(0)" class="btn custom-btn" id="event-booking-btn" ><span style="color:white;">House Full</span></a>
        </div>
        @endif
        
    </div>
</div>
<hr/>
<?php } ?>
@endforeach
@endif

<!-- <div class="more-event-btn">
    <span class="pe-2">More Events</span>
    <svg viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" data-ux="Icon" data-aid="chevronRight" class="x-el x-el-svg c2-1 c2-2 c2-1g c2-r c2-s c2-3 c2-4 c2-5 c2-6 c2-7 c2-8"><path fill-rule="evenodd" d="M7.861 4.125c-.335-.293-.84-.039-.84.424L7 19.362c0 .446.481.697.811.424l8.693-7.203a.56.56 0 0 0 .011-.836L7.861 4.125z"></path>
    </svg>
</div> -->
</div>
</div>

<!--main section end-->
<x-front_footer />