@extends('admin.layout.default')

@section('admin.content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<style>
.is-invalid {
    border: 2px solid red; /* Highlight with red border */
    background-color: #ffe6e6; /* Optional: light red background */
}

.is-invalid:focus {
    outline: none;
    box-shadow: 0 0 5px red;
}





/* Hide the default checkbox */
input[type="checkbox"].d-none {
    display: none;
}

/* Custom style for the label */
.custom-checkbox {
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    font-size: 18px;
    color: #333;
    font-weight: 600;
    transition: all 0.3s ease;
}

/* Custom "+" icon */
.custom-checkbox .icon {
    width: 40px;
    height: 40px;
    margin-right: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: white;
    background-color: #000201; /* Green background for the default state */
    border: 3px solid #000201; /* Green border for the default state */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    transition: all 0.3s ease;
    transform: scale(1); /* Initial size */
}

/* Hover effect for the icon */
.custom-checkbox .icon:hover {
    background-color: red;
    border-color:red;
    transform: scale(1.1); /* Slightly enlarge the icon on hover */
}
.btn-dark:hover{
    background-color: red;
    border-color:red;

}

/* Checked state */
.custom-checkbox input[type="checkbox"]:checked + .icon {
    background-color: red; /* Red background when checked */
    color: white; /* White color for the "+" sign */
    border-color: red; /* Red border when checked */
    box-shadow: 0 4px 8px rgba(255, 0, 0, 0.3); /* Shadow in red */
    transform: scale(1.1); /* Slightly enlarge the icon when checked */
}

/* Change label text color when checked */
.custom-checkbox input[type="checkbox"]:checked + .icon + span {
    color: red;
    font-weight: bold;
}


    </style>
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">
                                        {{ isset($product) ? 'Edit Product' : 'Add Product' }}
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" 
                                          action="{{ isset($product) ? url('/admin/update/product/') : url('/admin/save/product') }}" 
                                          enctype="multipart/form-data" novalidate id="product">
                                        @csrf

                                        <!-- Product Name and Product Code -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="product-name" class="form-label">Product Name</label>
                                                <input type="text" required name="name" id="product-name" 
                                                       class="form-control" 
                                                       placeholder="Product Name" 
                                                       value="{{ isset($product) ? $product->name : '' }}">
                                                       <input type="hidden"  name="id" id="product-id" 
                                                       class="form-control" 
                                                       placeholder="Product Name" 
                                                       value="{{ isset($product) ? $product->id : '' }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="product-code" class="form-label">Product Code</label>
                                                <input type="text" required name="product_code" id="product-code" 
                                                       class="form-control" 
                                                       placeholder="Product Code" 
                                                       value="{{ isset($product) ? $product->product_code : '' }}">
                                            </div>
                                        </div>

                                        <!-- Product Price, Stock and Car Specific Fields -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="product-price" class="form-label">Price (Incl. VAT)</label>
                                                <input type="number" required step="0.01" name="price_incl_vat" id="product-price_vat" 
                                                       class="form-control" 
                                                       placeholder="Price (Incl. VAT)" 
                                                       value="{{ isset($product) ? $product->price_incl_vat : '' }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="product-price" class="form-label">Price (Excl. VAT)</label>
                                                <input type="number" required step="0.01" name="price_excl_vat" id="product-price" 
                                                       class="form-control" 
                                                       placeholder="Price (Excl. VAT)" 
                                                       value="{{ isset($product) ? $product->price_excl_vat : '' }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="product-stock" class="form-label">Stock</label>
                                                <input type="number" required name="stock" id="product-stock" 
                                                       class="form-control" 
                                                       placeholder="Stock Quantity" 
                                                       value="{{ isset($product) ? $product->stock : '' }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="cost_price" class="form-label">Cost Price</label>
                                                <input type="number" min="0.01" required name="cost_price" id="cost_price" 
                                                       class="form-control" 
                                                       placeholder="Cost Price" 
                                                       value="{{ isset($product) ? $product->cost_price : '' }}">
                                            </div>
                                            
                                        </div>

                                        <!-- Category and Subcategory -->
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                                <label for="categorySelect">Select Brand</label>
                                                <select id="brand" name="brand_id" class="form-control">
                                                    <option value="" disabled selected>Select a brand</option>
                                                    @foreach($brand as $b)
                                                        <option value="{{ $b->id }}" 
                                                            {{ isset($product) && $product->brand_id == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="categorySelect">Select Category</label>
                                                <select id="categorySelect" name="cat_id" class="form-control">
                                                    <option value="" disabled selected>Select a category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" 
                                                            {{ isset($product) && $product->cat_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="subcategorySelect">Select Subcategory</label>
                                                <select id="subcategorySelect" name="subcat_id" class="form-control">
                                                    <option value="" disabled selected>Select a subcategory</option>
                                                    @foreach($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}" 
                                                            {{ isset($product) && $product->subcat_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Car Specific Fields -->

                                     <div class="row">
    <!-- Car Make Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="car_make" class="form-label">Car Make</label>
        <select name="car_make" id="car_make" class="form-control">
            <option value="">Select Make</option>
            @foreach($makes as $make)
                <option value="{{ $make }}" {{ isset($product) && $product->car_make == $make ? 'selected' : '' }}>
                    {{ $make }}
                </option>
            @endforeach
        </select>
    </div>
    
    <!-- Car Model Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="car_model" class="form-label">Car Model</label>
        <select name="car_model" id="car_model" class="form-control">
            <option value="">Select Model</option>
            @if(isset($product))
                <option value="{{ $product->car_model }}" selected>{{ $product->car_model }}</option>
            @endif
        </select>
    </div>
</div>

<div class="row">
    <!-- Car Year Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="car_year" class="form-label">Car Year</label>
        <select name="car_year" id="car_year" class="form-control">
            <option value="">Select Year</option>
            @if(isset($product))
                <option value="{{ $product->car_year }}" selected>{{ $product->car_year }}</option>
            @endif
        </select>
    </div>

    <!-- Fuel Type Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="car_fuel" class="form-label">Fuel Type</label>
        <select name="car_fuel" id="car_fuel" class="form-control">
            <option value="">Select Fuel Type</option>
            @if(isset($product))
                <option value="{{ $product->car_fuel }}" selected>{{ $product->car_fuel }}</option>
            @endif
        </select>
    </div>
</div>

<div class="row">
    <!-- Engine Type Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="car_engine" class="form-label">Engine Type</label>
        <select name="car_engine" id="car_engine" class="form-control">
            <option value="">Select Engine Type</option>
            @if(isset($product))
                <option value="{{ $product->car_engine }}" selected>{{ $product->car_engine }}</option>
            @endif
        </select>
    </div>
</div>




                                        <div class="row">
    <div class="col-md-12 mb-3">
        <label for="add_discount" class="custom-checkbox">
            <input type="checkbox" id="add_discount" class="d-none"> <!-- Hide the original checkbox -->
            <span class="icon">+</span> Add Discount
        </label>
    </div>
</div>

<!-- Hidden Fields for Discount and Total After Discount -->
<div id="discount_fields" style="display: none;">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="discount" class="form-label">Discount (%)</label>
            <input type="number" step="0.01" min="0" value="0" name="discount" id="discount" class="form-control" placeholder="Discount %">
        </div>
        <div class="col-md-6 mb-3">
            <label for="total_after_discount" class="form-label">Total After Discount</label>
            <input type="number" step="0" name="total_after_discount" id="total_after_discount" class="form-control" placeholder="Total After Discount" readonly>
        </div>
    </div>
</div>

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                
                                                       
                                                       
                                                       
                                                       <label for="add_specifications" class="custom-checkbox">
    <input type="checkbox" id="add_specifications" class="d-none"> <!-- Hide the original checkbox -->
    <span class="icon">+</span> Add Specifications
</label>
                                                       
                                            </div>
                                            
                                        </div>







<!-- Add this inside your form, after the price fields -->










                                        <div class="row">
    <div class="col-md-12 mb-3">

        <!-- Specifications Section -->
        <div id="specifications_section" style="@if(isset($product) && $product->specifications->isNotEmpty()) display:block; @else  display:none; @endif ">
            <h3>Specifications</h3>
            <div id="specifications_container">
                <!-- Loop through existing specifications if editing -->
                @if(isset($product) && $product->specifications->isNotEmpty())
                    @foreach($product->specifications as $index => $specification)
                        <div class="specification_row row">
                            <div class="col-md-5 mb-2">
                                <select name="specifications[{{ $index }}][specification_id]" required class="form-control specification_select" onchange="updateValueDropdown(this); updateAvailableSpecifications();">
                                    <option value="">-- Select Specification --</option>
                                    @foreach($specifications as $spec)
                                        <option value="{{ $spec->id }}" {{ $spec->id == $specification->pivot->specification_id ? 'selected' : '' }} data-index="{{ $index }}">
                                            {{ $spec->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-5 mb-2">
                                <select name="specifications[{{ $index }}][value_id]" required class="form-control value_select">
                                    <option value="">-- Select Value --</option>
                                    @foreach($specification->values as $value)
                                        <option value="{{ $value->id }}" {{ $value->id == $specification->pivot->value_id ? 'selected' : '' }}>
                                            {{ $value->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 mb-2 d-flex align-items-center">
                                <button type="button" class="remove_specification_row btn btn-danger btn-sm">Remove</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- First Row for Specifications and Values (Initial) -->
                    <div class="specification_row row">
                        <div class="col-md-5 mb-2">
                            <select name="specifications[0][specification_id]"  class="form-control specification_select" onchange="updateValueDropdown(this); updateAvailableSpecifications();">
                                <option value="">-- Select Specification --</option>
                                @foreach($specifications as $specification)
                                    <option value="{{ $specification->id }}">{{ $specification->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5 mb-2">
                            <select name="specifications[0][value_id]"  class="form-control value_select">
                                <option value="">-- Select Value --</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-2 d-flex align-items-center">
                            <button type="button" class="remove_specification_row btn btn-danger btn-sm">Remove</button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Add More Button -->
            <button type="button" id="add_specification_row" class="btn btn-dark" style="display: none;" onclick="addSpecificationRow()">Add More</button>
        </div>
    </div>
</div>

                                        <!-- Featured Image (Single Image) -->
                                        <div class="form-group mb-3">
                                            <label for="featured_img">Featured Image (Upload Single Image)</label>
                                            @isset($product)
                                            <img src="{{asset($product->featured_img)}}" width="50" height="60"/>
                                            @endisset
                                            <div class="custom-file-upload">
  <label for="featured_img" class="custom-label">Choose File</label>
  <input type="file" name="featured_img" id="featured_img" class="form-control">
</div>                                        </div>


                                        <!-- Product Gallery (Multiple Images) -->
                                        <div class="form-group mb-3">
                                            <label for="productGallery">Product Gallery (Upload Multiple Images)</label>
                                            @isset($product->galleries)
                                            @foreach($product->galleries as $g)
                                            <img src="{{asset($g->img)}}" width="50" height="60"/>
                                            @endforeach
                                            @endisset
                                            <div class="custom-files-upload">
  <label for="productGallerys" class="custom-labels">Choose Files</label>
  <input type="file" name="images[]" id="productGallerys" class="form-control" multiple style="display: none;">
</div>

                                        </div>
                                        </div>

                                        <!-- Product Description (Now placed at the bottom) -->
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="product-description" class="form-label">Description</label>
                                                <textarea name="description" id="product-description" class="form-control"
                                                          placeholder="Product Description">{{ isset($product) ? $product->description : '' }}</textarea>
                                            </div>
                                        </div>










                                        <!-- Submit Button -->
                                        <button type="submit" class="btn_1 full_width text-center">
                                            {{ isset($product) ? 'Update Product' : 'Add Product' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    document.addEventListener('DOMContentLoaded', function () {
        const discountCheckbox = document.getElementById('add_discount');
        const discountFields = document.getElementById('discount_fields');
        const priceInclVatInput = document.getElementById('product-price_vat');
        const discountInput = document.getElementById('discount');
        const totalAfterDiscountInput = document.getElementById('total_after_discount');

        calculateTotalAfterDiscount();

        // Show/hide discount fields based on checkbox state
        discountCheckbox.addEventListener('change', function () {
            if (this.checked) {
                discountFields.style.display = 'block';
            } else {
                discountFields.style.display = 'none';
                discountInput.value = '';
                totalAfterDiscountInput.value = '';
            }
        });

        // Calculate total after discount when discount or price changes
        discountInput.addEventListener('input', calculateTotalAfterDiscount);
        priceInclVatInput.addEventListener('input', calculateTotalAfterDiscount);

        function calculateTotalAfterDiscount() {
            const priceInclVat = parseFloat(priceInclVatInput.value);
            const discount = parseFloat(discountInput.value) || 0;

            if (!isNaN(priceInclVat) && !isNaN(discount) && discount >= 0 && discount <= 100) {
                const totalAfterDiscount = priceInclVat - (priceInclVat * (discount / 100));
                totalAfterDiscountInput.value = totalAfterDiscount.toFixed(2);
            } else {
                totalAfterDiscountInput.value = priceInclVat;
            }
        }
    });
</script>


<script>





//specifications Code

{{--  
document.addEventListener('DOMContentLoaded', function () {
    const specifications = @json($specifications); // Assuming you're passing this from the backend

    const addSpecificationsCheckbox = document.getElementById('add_specifications');
    const specificationsSection = document.getElementById('specifications_section');
    const addSpecificationRowButton = document.getElementById('add_specification_row');
    const specificationsContainer = document.getElementById('specifications_container');

    let specificationIndex = 1; // Start with index 1 since index 0 is already present.

    // Function to update the value dropdown based on the selected specification
    window.updateValueDropdown = function(specificationSelect) {
        const selectedSpecId = specificationSelect.value;
        const valueDropdown = specificationSelect.closest('.specification_row').querySelector('.value_select');

        // Clear existing options
        valueDropdown.innerHTML = '<option value="">-- Select Value --</option>';

        // Find the selected specification and populate its values
        const selectedSpec = specifications.find(spec => spec.id == selectedSpecId);

        if (selectedSpec) {
            selectedSpec.values.forEach(value => {
                const option = document.createElement('option');
                option.value = value.id;
                option.textContent = value.value;
                valueDropdown.appendChild(option);
            });
        }
    }

    // Event listener for checkbox to toggle the display of specification section
    addSpecificationsCheckbox.addEventListener('change', function () {
        if (this.checked) {
            specificationsSection.style.display = 'block'; // Show the specifications section
            addSpecificationRowButton.style.display = 'inline-block'; // Show the "Add More" button
            // Manually trigger the event to load the value for the first row
            const firstSpecSelect = specificationsContainer.querySelector('.specification_select');
            if (firstSpecSelect) {
                updateValueDropdown(firstSpecSelect);
            }
        } else {
            specificationsSection.style.display = 'none'; // Hide the specifications section
            addSpecificationRowButton.style.display = 'none'; // Hide the "Add More" button
        }
    });

    // Add More Specification Row
    addSpecificationRowButton.addEventListener('click', function () {
        const newRow = document.createElement('div');
        newRow.classList.add('specification_row', 'row'); // Add Bootstrap row class for grid layout
        newRow.innerHTML = `
            <div class="col-md-5 mb-2">
                <select name="specifications[${specificationIndex}][specification_id]" class="form-control specification_select" required onchange="updateValueDropdown(this)">
                    <option value="">-- Select Specification --</option>
                    ${specifications.map(spec => `<option value="${spec.id}">${spec.name}</option>`).join('')}
                </select>
            </div>

            <div class="col-md-5 mb-2">
                <select name="specifications[${specificationIndex}][value_id]" class="form-control value_select" required>
                    <option value="">-- Select Value --</option>
                </select>
            </div>

            <div class="col-md-2 mb-2 d-flex align-items-center">
                <button type="button" class="remove_specification_row btn btn-danger btn-sm">Remove</button>
            </div>
        `;
        specificationsContainer.appendChild(newRow);

        // Attach event listener to the new specification select dropdown
        const newSpecSelect = newRow.querySelector('.specification_select');
        newSpecSelect.addEventListener('change', function () {
            updateValueDropdown(this);
        });

        specificationIndex++;
    });

    // Remove a Specification Row
    specificationsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove_specification_row')) {
            e.target.closest('.specification_row').remove();
        }
    });

    // Initial check for whether to display the specifications section or not
    if (addSpecificationsCheckbox.checked) {
        specificationsSection.style.display = 'block';
        addSpecificationRowButton.style.display = 'inline-block';
        // Manually trigger the event to load the value for the first row
        const firstSpecSelect = specificationsContainer.querySelector('.specification_select');
        if (firstSpecSelect) {
            updateValueDropdown(firstSpecSelect);
        }
    }
});

--}}













document.addEventListener('DOMContentLoaded', function () {
    const addSpecificationsCheckbox = document.getElementById('add_specifications');
    const specificationsSection = document.getElementById('specifications_section');
    const addSpecificationRowButton = document.getElementById('add_specification_row');
    const specificationsContainer = document.getElementById('specifications_container');

    let specificationIndex = document.querySelectorAll('.specification_row').length;  // Start with index based on existing rows

    // Function to update the value dropdown based on the selected specification
    window.updateValueDropdown = function(specificationSelect) {
        const selectedSpecId = specificationSelect.value;
        const valueDropdown = specificationSelect.closest('.specification_row').querySelector('.value_select');

        // Clear existing options
        valueDropdown.innerHTML = '<option value="">-- Select Value --</option>';

        // Find the selected specification and populate its values
        const selectedSpec = @json($specifications).find(spec => spec.id == selectedSpecId);
        
        if (selectedSpec) {
            selectedSpec.values.forEach(value => {
                const option = document.createElement('option');
                option.value = value.id;
                option.textContent = value.value;
                valueDropdown.appendChild(option);
            });
        }

        // Update available specifications after selecting a specification
        updateAvailableSpecifications();
    }

    // Event listener for checkbox to toggle the display of specification section
    addSpecificationsCheckbox.addEventListener('change', function () {
        if (this.checked) {
            specificationsSection.style.display = 'block'; // Show the specifications section
            addSpecificationRowButton.style.display = 'inline-block'; // Show the "Add More" button
        } else {
            specificationsSection.style.display = 'none'; // Hide the specifications section
            addSpecificationRowButton.style.display = 'none'; // Hide the "Add More" button
        }
    });

    // Add More Specification Row
    addSpecificationRowButton.addEventListener('click', function () {
        const newRow = document.createElement('div');
        newRow.classList.add('specification_row', 'row');
        newRow.innerHTML = `
            <div class="col-md-5 mb-2">
                <select name="specifications[${specificationIndex}][specification_id]" class="specification_select form-control" required onchange="updateValueDropdown(this)">
                    <option value="">-- Select Specification --</option>
                    @foreach($specifications as $spec)
                        <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 mb-2">
                <select name="specifications[${specificationIndex}][value_id]" class="value_select form-control" required>
                    <option value="">-- Select Value --</option>
                </select>
            </div>

            <div class="col-md-2 mb-2 d-flex align-items-center">
                <button type="button" class="remove_specification_row btn btn-danger btn-sm">Remove</button>
            </div>
        `;
        specificationsContainer.appendChild(newRow);

        specificationIndex++;

        // Update available specifications for all rows
        updateAvailableSpecifications();
    });

    // Remove a Specification Row
    specificationsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove_specification_row')) {
            e.target.closest('.specification_row').remove();

            // Update available specifications for all rows after removal
            updateAvailableSpecifications();
        }
    });

    // Function to update available specifications for each row (disable selected specifications)
    function updateAvailableSpecifications() {
        const allSpecSelects = document.querySelectorAll('.specification_select');
        
        // Collect selected specification IDs
        const selectedSpecIds = Array.from(allSpecSelects).map(select => select.value).filter(val => val);

        // Disable selected options in all rows
        allSpecSelects.forEach(select => {
            const options = select.querySelectorAll('option');
            options.forEach(option => {
                option.disabled = selectedSpecIds.includes(option.value) && select.value !== option.value;
            });
        });
    }

    // Initial check for whether to display the specifications section or not
    if (addSpecificationsCheckbox.checked) {
        specificationsSection.style.display = 'block';
        addSpecificationRowButton.style.display = 'inline-block';
    }

    // Update available specifications on page load
    updateAvailableSpecifications();
});




//form validation



document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded');

    const form = document.getElementById('product');
    if (!form) {
        console.log('Form not found!');
        return; // Stop execution if the form is missing
    }

    console.log('Form found:', form);

    form.addEventListener('submit', function (e) {
        console.log('Form submit triggered');
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        let firstInvalidField = null;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid'); // Add the 'is-invalid' class
                console.log('Invalid field:', field.name);
                if (!firstInvalidField) {
                    firstInvalidField = field; // Keep track of the first invalid field
                }
            } else {
                field.classList.remove('is-invalid'); // Remove 'is-invalid' if the field is valid
                console.log('Valid field:', field.name);
            }
         
        });

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            console.log('Form has errors');
            firstInvalidField.focus(); // Focus the first invalid field
        } else {
            console.log('Form is valid');
        }
    });
});




document.getElementById('productGallerys').addEventListener('change', function() {
  const fileList = this.files;
  const fileNames = Array.from(fileList).map(file => file.name).join(', ');
  const output = document.createElement('div'); // Create a container for file names
  output.innerText = `Selected files: ${fileNames}`;
  document.querySelector('.custom-files-upload').appendChild(output); // Add the container below the upload button
});

document.getElementById('featured_img').addEventListener('change', function() {
  const fileList = this.files;
  const fileNames = Array.from(fileList).map(file => file.name).join(', ');
  const output = document.createElement('div'); // Create a container for file names
  output.innerText = `Selected file: ${fileNames}`;
  document.querySelector('.custom-file-upload').appendChild(output); // Add the container below the upload button
});

    // Initialize CKEditor for the product description field
    ClassicEditor
        .create(document.querySelector('#product-description'))
        .catch(error => {
            console.error(error);
        });

    var J = $;

    J(document).ready(function () {
        J('#categorySelect, #subcategorySelect').select2({
            placeholder: 'Select an option',
            allowClear: true,
        });

        // When the category is changed, fetch the subcategories using AJAX
        J('#categorySelect').change(function() {
            var categoryId = J(this).val();  // Get the selected category ID

            if (categoryId) {
                // Make an AJAX request to get subcategories for the selected category
                J.ajax({
                    url: '/admin/subcategories/' + categoryId, // The route defined earlier
                    type: 'GET',
                    success: function(data) {
                        var subcategorySelect = J('#subcategorySelect');
                        subcategorySelect.empty();  // Clear previous subcategories

                        // Add the default option
                        subcategorySelect.append('<option value="" disabled selected>Select a subcategory</option>');

                        // Loop through each subcategory and append to the subcategory dropdown
                        J.each(data, function(index, subcategory) {
                            subcategorySelect.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                        });
                    }
                });
            } else {
                J('#subcategorySelect').empty().append('<option value="" disabled selected>Select a subcategory</option>'); // Reset subcategory select
            }
        });







        










    });


















    $(document).ready(function () {
    // Fetch models when make is selected
    $('#car_make').change(function () {
        let make = $(this).val();
        $('#car_model').html('<option value="">Loading...</option>');
        $('#car_year').html('<option value="">Select Year</option>');
        $('#car_fuel').html('<option value="">Select Fuel Type</option>');
        $('#car_engine').html('<option value="">Select Engine Type</option>');

        if (make) {
            $.ajax({
                url: '/get-models/' + make,
                type: 'GET',
                success: function (data) {
                    $('#car_model').html('<option value="">Select Model</option>');
                    $.each(data, function (key, model) {
                        $('#car_model').append('<option value="' + model + '">' + model + '</option>');
                    });
                }
            });
        } else {
            $('#car_model').html('<option value="">Select Model</option>');
        }
    });

    // Fetch years when model is selected
    $('#car_model').change(function () {
        let make = $('#car_make').val();
        let model = $(this).val();
        $('#car_year').html('<option value="">Loading...</option>');
        $('#car_fuel').html('<option value="">Select Fuel Type</option>');
        $('#car_engine').html('<option value="">Select Engine Type</option>');

        if (make && model) {
            $.ajax({
                url: '/get-years/' + make + '/' + model,
                type: 'GET',
                success: function (data) {
                    $('#car_year').html('<option value="">Select Year</option>');
                    $.each(data, function (key, year) {
                        $('#car_year').append('<option value="' + year + '">' + year + '</option>');
                    });
                }
            });
        } else {
            $('#car_year').html('<option value="">Select Year</option>');
        }
    });

    // Fetch fuel and engine types when year is selected
    
    $('#car_year').change(function () {
    let make = $('#car_make').val();
    let model = $('#car_model').val();
    let year = $(this).val();
    $('#car_fuel').html('<option value="">Loading...</option>');
    $('#car_engine').html('<option value="">Loading...</option>');

    if (make && model && year) {
        $.ajax({
            url: '/get-fuel-engine/' + make + '/' + model + '/' + year,
            type: 'GET',
            success: function (data) {
                $('#car_fuel').html('<option value="">Select Fuel Type</option>');
                $('#car_engine').html('<option value="">Select Engine Type</option>');

                let fuelOptions = new Set();
                let engineOptions = new Set();

                $.each(data, function (fuel, engines) {
                    // Add fuel types to the dropdown
                    fuelOptions.add(fuel);
                    
                    // Add corresponding engine types
                    engines.forEach(function (engine) {
                        engineOptions.add(engine);
                    });
                });

                // Populate the fuel dropdown
                fuelOptions.forEach(function (fuel) {
                    $('#car_fuel').append('<option value="' + fuel + '">' + fuel + '</option>');
                });

                // Populate the engine dropdown
                engineOptions.forEach(function (engine) {
                    $('#car_engine').append('<option value="' + engine + '">' + engine + '</option>');
                });
            }
        });
    } else {
        $('#car_fuel').html('<option value="">Select Fuel Type</option>');
        $('#car_engine').html('<option value="">Select Engine Type</option>');
    }
});








});























</script>

@endsection
