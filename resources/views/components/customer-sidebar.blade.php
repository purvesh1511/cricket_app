<div>
    <div class="Profile-Details list-group w-100 customer-sidebar">
        <a href="{{route('customer-dashboard')}}"
            class="list-group-item list-group-item-action {{\Request::is('customer-dashboard') ? 'active' : ''}}" aria-current="true">
            <i class="fa-solid fa-user"></i>
            <span class="ml-2">Profile Details</span>
        </a>
        <a href="{{route('my-orders')}}"
            class="list-group-item list-group-item-action {{\Request::is('my-orders') || \Request::is('my-order-details') ? 'active' : ''}}">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="ml-2">Orders</span>
        </a>
        <a href="{{route('my-event-orders')}}"
            class="list-group-item list-group-item-action {{\Request::is('my-event-orders') || \Request::is('my-event-orders') ? 'active' : ''}}">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="ml-2">Event Orders</span>
        </a>
        
		@if(session()->get('customer_type')=='coach')
		<a href="{{route('manual-booking')}}"
            class="list-group-item list-group-item-action {{\Request::is('manual-booking') ? 'active' : ''}}">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="ml-2">Manual Booking</span>
        </a>
		@endif
        <a href="{{route('change-password')}}"
            class="list-group-item list-group-item-action {{\Request::is('change-password') ? 'active' : ''}}">
            <i class="fa-solid fa-key"></i>
            <span class="ml-2">Change Password</span>
        </a>
        <a href="{{route('exit')}}" class="list-group-item list-group-item-action">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z">
                </path>
                <path fill-rule="evenodd"
                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                </path>
            </svg>
            <span class="ml-2">Logout</span>
        </a>
    </div>
</div>