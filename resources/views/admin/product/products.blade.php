
@extends('admin.layout.default')



@section('admin.content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>





<div class="container-fluid p-0">
<div class="row justify-content-center">

<div class="col-lg-12">


<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
@if (session()->has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{ session('error') }}</strong> .
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif

@if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
    @endif
<div class="box_header m-0">
<div class="main-title">


</div>
</div>
</div>
<div class="white_card_body">
<div class="QA_section">
<div class="white_box_tittle list_header">
<h4>Products</h4>
<div class="box_right d-flex lms_block">
<div class="serach_field_2">


</div>
</div>
<div class="add_button ms-2">
<a href="{{url('/admin/add/product')}}" data-toggle="modal" data-target="#addcategory" class="btn_1">Add New</a>
</div>
</div>
</div>
<div class="QA_table mb_30">


<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
    <div class="table-responsive">
    <table  class="table table-bordered table-striped" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="">
<thead class="table-dark">
<tr role="row">
    <th>Product Name</th>
    <th>Product Price (INCL_VAT)</th>
    <th>Discount</th>
    <th>Total After Discount</th>


    
    <th>Product Cost</th>

    <th>Product Stock</th>
    <th>Brand</th>
    <th>Category</th>
    <th>Sub-Category</th>
   
    <th >Featured Image</th>
    <th>Action</th>
   
    </tr>
</thead>
<tbody>

@foreach($products as $c)
<tr role="row" class="odd">

<td>{{$c->name}} </td>
<td>{{$c->price_incl_vat}} </td>
<td>{{$c->discount}} </td>
<td>{{$c->total_after_discount}} </td>


<td>{{$c->cost_price}} </td>
<td>{{$c->stock}} </td>
<td>
@if($c->brand)    
{{$c->brand->name}} 
@else
    NO Brand
@endif
</td>
<td>{{$c->category->name}} </td>
<td> @if($c->subcategory)
    {{$c->subcategory->name}} 
    @else
    NO Sub Category
@endif
</td>
<td><img src="{{asset($c->featured_img)}}" width="50" height="60"></td>




<td>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown_{{ $c->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="actionDropdown_{{ $c->id }}">
    
    <a href="{{ route('show', ['id' => $c->id]) }}" class="dropdown-item">View <i class="fas fa-eye"></i></a>

    <a href="{{ route('editproduct', ['id' => $c->id]) }}" class="dropdown-item">Edit <i class="fas fa-edit"></i></a>
<a href="{{ route('delproduct', ['id' => $c->id]) }}" class="dropdown-item delete-button " data-confirm="Are you sure you want to delete this record?">Delete<i class="fas fa-trash"></i></a>

        
    </div>

</td>
</tr>
@endforeach

</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<script>



    $(document).ready(function() {
        $('#DataTables_Table_0').DataTable();
        searching: true
    });






    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var confirmed = confirm(this.getAttribute('data-confirm'));

                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
    
    
    
    
     

    
    
    
    
</script>



</div>
</div>
</div>
@endsection