@php
    $title = 'Manual Booking';

    
                
                $months = [];
                $currentDate = new DateTime();
                for ($i = 0; $i < 24; $i++) {
                    $months[] = $currentDate->format('M-Y');
                    $currentDate->modify('+1 month');
                }

               

@endphp
<x-front_header :title="$title" />
<!-- benar -->
<section class="shop" style="background-image: url({{$banner_image}});">
    <div class="container">
        <div class="row">
            <h3 class="Shop-text">Manual Booking</h3>
            <p class="link-products"><a href="{{route('home')}}">Home</a> / <span>Change Password</span></p>
        </div>
    </div>
</section>
<!-- benar end-->
<style>
    .disableCls{
        color:red;
    }
 </style>   
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-5">
                <x-customer-sidebar/>
            </div>

            <div class="col-md-8">
                <div class="box-my-account">
                    <form action="{{ route('save-manual-booking') }}" method="POST">
                        <input type="hidden" name="hid_booking_id" id="hid_booking_id">
                        @csrf
                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Month *</label>
                                <select  class="form-control" name="month" id="month" required>
                                    <option value="">Select Month</option>
                                    @if($months)
                                    @foreach($months as $month)
                                    @php
                                    $coach_id = \App\Models\Customer::where('email',session('customer'))->first(['email','id'])->id;
    
                                    $BookingExists=DB::table('manual_booking')->where('coach_id',$coach_id)->where('month',$month)->exists();
                                    $class="";
                                    $disable="";
                                    if($BookingExists){
                                        $class="disableCls";
                                        $disable="disabled";
                                    }
                                    @endphp
                                    <option value="{{$month}}" class="{{$class}}" {{$disable}}>{{$month}}</option>
                                    @endforeach
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Sheet Link *</label>
                                <input type="text"  name="sheet_link" id="sheet_link" class="form-control" autocomplete="off"
                                required>
                            </div>

                            <div class="col-md-3 mb-3 pt-4">
                                <button type="submit" id="Register" class="btn">ADD</button>
                            </div>
                        </div>                        
                    </form>
                </div>
                <div class="box-my-account">
                    <div class="table-responsive">
                
                                    <table class="table table-bordered" id="product-order">
                                        <tr>
                                        <th>SL</th>    
                                        <th>Date</th>
                                            <th>Sheet Link</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        @if($manual_booking_list)
                                        @php 
                                         $count=0;
                                        @endphp
                                           @foreach($manual_booking_list as $manual_booking)
                                           @php $count++ @endphp
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$manual_booking->month}}</td>
                                                <td><a href="{{$manual_booking->sheet_link}}" target="_blank">Open</a></td>
                                                    <td> <a href="javascript:void(0)" onclick="edit_bookig({{$manual_booking->id}},'{{$manual_booking->month}}','{{$manual_booking->sheet_link}}')">Edit</a>
                                                     <a href="{{route('delete-manual-booking',['id'=>$manual_booking->id])}}">Delete</a>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                       
                                    </table>
                                </div>
                                </div> 
                  </div>                           

            </div>
        </div>
    </div>
</section>
<x-front_footer />
<script>
    function showHidePassword(el) {
       var password_type = $(el).parent().find('.form-control:first').attr('type');
       if(password_type == 'password') {
        $(el).parent().find('.form-control:first').attr('type','text');
        $(el).find('i').attr('class','bi bi-eye');
       }
       if(password_type == 'text') {
        $(el).parent().find('.form-control:first').attr('type','password');
        $(el).find('i').attr('class','bi bi-eye-slash');
       }
    }

    function edit_bookig(id,month_name,sheet_link){
        $("#month").val(month_name);
        $("#sheet_link").val(sheet_link);
        $("#hid_booking_id").val(id);
    }
</script>
