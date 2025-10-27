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
                
                { id: 1, width: 22, height: 24, title: '22 × 24 in' },
                { id: 2, width: 22, height: 36, title: '22 × 36 in' },
                { id: 3, width: 22, height: 48, title: '22 × 48 in' },
                { id: 4, width: 22, height: 60, title: '22 × 60 in' },
                { id: 5, width: 22, height: 72, title: '22 × 72 in' },
                { id: 6, width: 22, height: 84, title: '22 × 84 in' },
                { id: 7, width: 22, height: 96, title: '22 × 96 in' },


                { id: 8, width: 22, height: 108, title: '22 × 108 in' },


                { id: 9, width: 22, height: 120, title: '22 × 120 in' },
                { id: 10, width: 22, height: 132, title: '22 × 132 in' },
                { id: 11, width: 22, height: 144, title: '22 × 144 in' },
                { id: 12, width: 22, height: 156, title: '22 × 156 in' },
                { id: 13, width: 22, height: 168, title: '22 × 168 in' },
                { id: 14, width: 22, height: 180, title: '22 × 180 in' },
                { id: 15, width: 22, height: 192, title: '22 × 192 in' },
                { id: 16, width: 22, height: 204, title: '22 × 204 in' },
                { id: 17, width: 22, height: 216, title: '22 × 216 in' },
                { id: 18, width: 22, height: 228, title: '22 × 228 in' },
                { id: 19, width: 22, height: 240, title: '22 × 240 in' },
                // Add more standard sizes if needed:
               


            ],
            customer: {
                id: {{ auth()->id() ?? '2' }},
                name: {!! json_encode(auth()->user()->name ?? 'default') !!},
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
