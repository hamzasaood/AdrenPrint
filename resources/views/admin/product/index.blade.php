@extends('admin.layout.default')

@section('admin.content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="box_header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Products</h4>
                        <a href="{{ route('admin.products.create') }}" class="btn_1">Add New</a>
                    </div>
                </div>

                <div class="white_card_body">

                      <div class="mb-4">
    <button id="startSync" class="btn btn-primary">Initialize Sync</button>
    <button id="fetchProducts" class="btn btn-success" disabled>Fetch 1000 Products</button>

    <div class="progress mt-3" style="height: 25px; display:none; max-width:400px;">
        <div id="syncProgressBar"
             class="progress-bar progress-bar-striped progress-bar-animated bg-success"
             role="progressbar"
             style="width: 0%">0%</div>
    </div>

    <p id="syncStatus" class="mt-2 text-muted">Click "Start Sync" to initialize.</p>

    <div id="syncLogs"
         style="background:#f8f9fa; border:1px solid #dee2e6; border-radius:6px; padding:10px; height:200px; overflow-y:auto; font-size:14px;">
    </div>
</div>



                    <div class="QA_section">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="productTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $p)
                                        @if($p->stock <= 10)
                                      <tr class="table-danger">
                                        @else

                                        <tr>
                                        @endif
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->category->name ?? '-' }}</td>
                                            <td>${{ $p->price }}</td>
                                            <td>{{ $p->stock }}</td>
                                            <td>{{ ucfirst($p->design_type) }}</td>
                                            <td>
                                                @if($p->image)
                                                    <img src="{{ asset('images/' . $p->image) }}" width="50">
                                                @elseif($p->main_image)
                                                    <img src="https://www.ssactivewear.com/{{ $p->main_image }}" width="50">
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.show', $p->id) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                                                </form>
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
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#productTable').DataTable();
        $('.delete-form').on('submit', function (e) {
            if (!confirm('Are you sure you want to delete this product?')) {
                e.preventDefault();
            }
        });
    });

        

let totalStyles = 0;
let currentStyleIndex = 0;
let productsDone = 0;
let productsTotal = 0;

document.getElementById("startSync").addEventListener("click", function() {
    document.querySelector(".progress").style.display = "block"; 
    updateProgress(0);
    logMessage("Initializing sync...");

    fetch("{{ url('/admin/sync/start') }}")
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                logMessage("❌ " + data.error);
                return;
            }
            totalStyles = data.total_styles;
            currentStyleIndex = 0;
            productsDone = 0;
            productsTotal = 0;

            logMessage("✅ Sync initialized. Total Styles: " + totalStyles);
            document.getElementById("fetchProducts").disabled = false; 
        });
});

document.getElementById("fetchProducts").addEventListener("click", function() {
    fetch("{{ url('/admin/sync/batch') }}")
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                logMessage("❌ " + data.error);
                return;
            }

            if (data.done) {
                updateProgress(100);
                logMessage("🎉 All styles synced successfully!");
                document.getElementById("syncStatus").innerText = "✅ Completed!";
                document.getElementById("fetchProducts").disabled = true;
                return;
            }

            currentStyleIndex = data.style_index;
            productsDone = data.products_done; // from backend

            // Progress based on styles completed
            let percent = Math.round((currentStyleIndex / totalStyles) * 100);

            updateProgress(percent);
            logMessage("🔄 " + data.message + " | Total synced products: " + productsDone);


            updateProgress(percent);
            logMessage("🔄 " + data.message);
        });
});

function updateProgress(percent) {
    let bar = document.getElementById("syncProgressBar");
    bar.style.width = percent + "%";
    bar.innerText = percent + "%";
    document.getElementById("syncStatus").innerText =
        "Progress: " + percent + "% (Style " + (currentStyleIndex+1) + "/" + totalStyles + ")";
}

function logMessage(msg) {
    let logs = document.getElementById("syncLogs");
    logs.innerHTML += msg + "<br>";
    logs.scrollTop = logs.scrollHeight;
}
</script>


@endsection
