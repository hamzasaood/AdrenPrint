<nav class="sidebar dark_sidebar">


<style>
.notification {
    background-color: red;
    color: white;
    padding: 3px 6px;
    border-radius: 50%;
    font-size: 0.8em;
    margin-left: 5px;
}


</style>
<style>

.sidebar #sidebar_menu>li ul li a.active {
    color: #1f993d!important;
}

</style>
<div class="logo d-flex justify-content-between" style="    background-color: azure; justify-content:center !important;     padding: 0 !important;">
<a class="large_logo" href="#"><img height="80" src="{!! asset('logo.png') !!}" alt></a>
<a class="small_logo" href="#"><img width="101" height="80" src="{!! asset('logo.png') !!}" alt></a>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">
@if(auth()->user()->role=="admin")
<li class>
<a class="" href="{{url('/admin/dashboard')}}" >
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/dashboard.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Dashboard </span>
</div>
</a>

</li>







<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/14.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Categories </span>
</div>
</a>
<ul>
<li>
            <a class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}"
               href="{{ route('admin.categories.create') }}">
                Add Category
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"
               href="{{ route('admin.categories.index') }}">
                Categories
            </a>
        </li>


</ul>
</li>










<li class="{{ request()->routeIs('admin.products.*') ? 'mm-active' : '' }}">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{!! asset('admin/assets/img/menu-icon/14.svg') !!}" alt="">
        </div>
        <div class="nav_title">
            <span>Products</span>
        </div>
    </a>
    <ul>
        <li><a class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}" href="{{ route('admin.products.create') }}">Add Product</a></li>
        <li><a class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">All Products</a></li>
    </ul>
</li>





<li class="{{ request()->routeIs('admin.dtf-colors.*') ? 'mm-active' : '' }}">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{!! asset('admin/assets/img/menu-icon/14.svg') !!}" alt="">
        </div>
        <div class="nav_title">
            <span>Dtf Transfer By Size</span>
        </div>
    </a>
    <ul>
        <li><a class="{{ request()->routeIs('admin.dtf-colors.create') ? 'active' : '' }}" href="{{ route('admin.dtf-colors.index') }}">Dtf Colors</a></li>
        <li><a class="{{ request()->routeIs('admin.dtf-sizes.index') ? 'active' : '' }}" href="{{ route('admin.dtf-sizes.index') }}">Dtf Sizes</a></li>
        <li><a class="{{ request()->routeIs('admin.dtf-images.index') ? 'active' : '' }}" href="{{ route('admin.dtf-images.index') }}">Dtf Images</a></li>
    </ul>
</li>























<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/15.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Orders  
{{--
            @if($orderCount > 0)
                    <span class="badge notification">{{ $orderCount }}</span>
                    @else
                    <span class="badge notification">0</span>
                @endif
            </span>

            --}}

</span>
</div>
</a>
<ul>

<li><a href="{{url('/admin/orders')}}">Total Orders</a></li>












</ul>
</li>







<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/11.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Reports</span>
</div>
</a>
<ul>

<li><a class="{{ request()->is('/admin/reports/sales') ? 'active' : '' }}" href="{{url('/admin/reports/sales')}}">Detailed Sales Report</a></li>

<li><a class="{{ request()->is('/admin/reports/product-reports') ? 'active' : '' }}" href="{{url('/admin/reports/product-reports')}}">Products Report</a></li>

<li><a class="{{ request()->is('/admin/reports/bestsellers') ? 'active' : '' }}" href="{{url('/admin/reports/bestsellers')}}">Best Sellers Report</a></li>

<li><a class="{{ request()->is('/admin/reports/daily') ? 'active' : '' }}" href="{{url('/admin/reports/daily')}}">Daily Report</a></li>
<li><a class="{{ request()->is('/admin/reports/monthly') ? 'active' : '' }}" href="{{url('/admin/reports/monthly')}}">Monthly Report</a></li>


</ul>
</li>



<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/4.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Customers </span>
</div>
</a>
<ul>
<li ><a class="{{ request()->is('addcustomer') ? 'active' : '' }}" href="{{ route('admin.customers.create') }}">Create Customer</a></li>
<li><a class="{{ request()->is('customers') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">View Customers</a></li>



</ul>
</li>


<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/18.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Settings</span>
</div>
</a>
<ul>
<li ><a class="{{ request()->is('/admin/settings') ? 'active' : '' }}" href="{{url('/admin/settings')}}">Settings</a></li>



</ul>
</li>






<li class>
<a class="" href="{{url('/admin/contacts')}}" >
<div class="nav_icon_small">
<img src="{!! asset('admin/assets/img/menu-icon/8.svg') !!}" alt>
</div>
<div class="nav_title">
<span>Contact US form (Entries) </span>
</div>
</a>

</li>














@endif
















</ul>

</nav>
