<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gang Sheet Builder</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden; /* prevent scrollbars */
        }
        #gs-builder {
            height: 100vh;
            width: 100vw;
        }
    </style>
</head>
<body style="margin:0;">

<div id="gs-builder"></div>

<script src="https://app.buildagangsheet.com/assets/v1/scripts/gs-builder.min.js"></script>





<script>
    window.onload = function () {
        gs_builder.open({
            container: 'gs-builder',
            shop_id: {!! json_encode(config('services.dripapps.shop_id')) !!},
            mode: 'production',
            sizes: [
                {id: 1, width: 22, height: 22, title: '22 x 22 in'},
                {id: 2, width: 22, height: 60, title: '22 x 60 in'},
                {id: 3, width: 22, height: 120, title: '22 x 120 in'},
            ],
            customer: {
                id: {{ auth()->id() ?? 'null' }},
                name: {!! json_encode(auth()->user()->name ?? '') !!},
                email: {!! json_encode(auth()->user()->email ?? '') !!}
            },
            settings: { showStartModal: false }
        })
        .on('design:created', function(e) {
            console.log("Design Created:", e);

            let designs = e.data?.designs || [];
            let size = e.data?.details?.size || null;

            if (designs.length === 0) {
                alert("No designs received.");
                return;
            }

            // Prepare payload (multiple designs + size)
            let payload = {
                designs: designs.map(d => ({
                    design_id: d.id,
                    design_name: d.name,
                    quantity: d.quantity,
                    preview_url: d.thumbnail_url,
                })),
                size: size
            };

            fetch("{{ route('custom.gangsheet.cart.save') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                window.location.href = "{{ url('/cart') }}";
            });

            gs_builder.close();
        })
        .on('closed', function() {
            console.log("Builder closed by customer");
            window.location.href = "/"; // redirect back to homepage
        });
    }
</script>

</body>
</html>
