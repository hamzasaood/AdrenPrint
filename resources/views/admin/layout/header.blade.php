<div class="container-fluid g-0">
  <style>
   .profile_info_details {
    
    background-color: #000201; /* Default background color */
}
.profile_info_details a{
     /* Change background color on hover */
    text-align:center;
    background-color: #fbaf1c;
    color: azure !important;
    cursor: pointer;"
    

}

.profile_info_details a:hover {
  opacity:1 ; /* Change background color on hover */
    text-decoration: dashed !important;
}
.divider {
    width: 80%; /* Full width of the container */
    height: 1px; /* Thickness of the line */
    background-color: white; /* White color for the line */
    margin: 3px 21px; /* Optional: add space around the divider */
}

.low-stock-menu {
    background: #fff;
    box-shadow: 0 10px 15px rgba(6, 0, 8, .22);
    border-radius: 10px;
    position: absolute;
    right: 0;
    width: 350px;
    transform: translateY(30px) translateX(20px);
    opacity: 0;
    visibility: hidden;
    transition: .3s;
}

.low-stock-menu .low_Header {
    padding: 15px 20px;
    border-radius: 10px 10px 0 0;
    background: #fbaf1c;
}

.low-stock-menu .low_body {
    padding: 20px;
    height: 300px;
    overflow: auto;
}

.low-stock-menu .low_footer {
    padding: 13px 20px;
    background: #f5f7f9;
    border-radius: 0 0 10px 10px;
}

.low-stock-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(20px) translateX(20px);
}

.low-stock-menu .low_Header h4 {
    font-size: 15px;
    font-weight: 500;
    color: #fff;
    margin-bottom: 0;
}



    </style>
<div class="row">
<div class="col-lg-12 p-0 ">
  <div class="header_iner d-flex justify-content-between align-items-center" style="background-color:azure !important;">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="line_icon open_miniSide d-none d-lg-block">
<img src="{!! asset('admin/assets/img/line_img.png') !!}" alt="">
</div>




    




<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">

<li>
    <a class="CHATBOX_open" href="#" id="lowStockBell"> 
    <i id="lowStockIcon" class="fas fa-exclamation-triangle" title="Low Stock Alert!"></i>
        <span>{{ 0 }}</span>
    </a>
    {{--
    <div class="low-stock-menu">
        <div class="low_Header">
            <h4>Low Stock Products</h4>
        </div>
        <div class="low_body">
           
            @if($lowStockProducts->count() > 0)
                @foreach($lowStockProducts as $p)
                    <div class="single_notify d-flex align-items-center">
                        <div class="notify_thumb">
                            <a href="#"><img src="{{$p->featured_img}}" alt="" width="50px" height="50px"></a>
                        </div>
             
                        <div class="notify_content">
                            <a href="{{route('show', ['id' => $p->id])}}"><h5>{{$p->name}}</h5></a>
                            <p class="badge" style="background-color: #f01a26;
    color: white;">Stock is {{$p->stock}}</p>
                        </div>

                    </div>
                    <div class="divider" style="border: 1px solid black;
    width: 90%;">
                    </div>
                @endforeach
            @else
                No Low Stock Products
            @endif
        </div>
        <div class="low_footer">
            <div class="submit_button text-center pt_20">
                <a href="{{url('/admin/products/')}}" class="btn_1">See All Products</a>
            </div>
        </div>
    </div>
    --}}
</li>


<li>
        <a class="bell_notification_clicker ordernotification" id="orderBell" href="#"> 
            <img src="/admin/assets/img/icon/bell.svg" alt="">
            <span id="order-count">0</span> <!-- Live count of new orders -->
        </a>

        <div class="Menu_NOtification_Wrap order-menu">
            <div class="notification_Header" style="background:#000201;">
                <h4>Notifications</h4>
            </div>
            <div class="Notification_body ordernotificationbody">
                
                  
            </div>

            <div class="nofity_footer">
                <div class="submit_button text-center pt_20">
                    <a href="/admin/orders" class="btn_1">See All Orders</a>
                </div>
            </div>
        </div>
    </li>

<div class="profile_info" >
<img src="{!! asset('admin/assets/img/client_img.png') !!}" alt="#">
<div class="profile_info_iner" style="text-align:center; background-color: #000201;" >

<div class="profile_author_name" style="    background-color: #000201;">

<p>{{Auth::user()->email}}</p>
<h5>{{Auth::user()->name}}</h5>
</div>
<div class="divider">
</div>


<div class="profile_info_details" >


<a  href="# " style="    
      " >
 Settings
</a>
<div class="divider">
</div>
<a  href="{{ route('logout') }} " style="  "
       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
  {{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

   
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script>





</script>