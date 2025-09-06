@extends('layout.default')

@section('content')
<div class="container py-4">
  <h3>Gang Sheet Builder — {{ $product->name }}</h3>
  <p>Order #: {{ $order->id }}</p>

  <div class="mb-2">
    <button id="add-image-btn" class="btn btn-outline-primary btn-sm">Upload Image(s)</button>
    <input type="file" id="image-input" accept="image/*" multiple style="display:none">
    <button id="export-btn" class="btn btn-success btn-sm">Export & Save</button>
    <span id="status" class="ms-2"></span>
  </div>

  <div class="border" style="overflow:auto;">
    <canvas id="gang-canvas" width="2000" height="1400" style="border:1px solid #ddd; display:block; width:100%;"></canvas>
  </div>

  <p class="text-muted small mt-2">Tip: drag to move, corners to scale, rotate with handle, press Delete to remove selected object.</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.2.4/fabric.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const canvasEl = document.getElementById('gang-canvas');
  // set canvas size in device pixels for crispness
  const DPR = window.devicePixelRatio || 1;
  canvasEl.width = 2000 * DPR;
  canvasEl.height = 1400 * DPR;
  canvasEl.style.width = '100%';
  canvasEl.style.height = (1400 * (canvasEl.clientWidth / 2000)) + 'px';

  const canvas = new fabric.Canvas('gang-canvas', {
    selection: true,
    preserveObjectStacking: true
  });

  canvas.setZoom(1);
  canvas.renderAll();

  document.getElementById('add-image-btn').addEventListener('click', () => document.getElementById('image-input').click());
  document.getElementById('image-input').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    files.forEach(file => {
      const reader = new FileReader();
      reader.onload = function(f) {
        fabric.Image.fromURL(f.target.result, function(img) {
          const maxDim = 600 * DPR;
          const scale = Math.min(1, maxDim / Math.max(img.width, img.height));
          img.set({ left: 50, top: 50, scaleX: scale, scaleY: scale, cornerStyle: 'circle' });
          img.setControlsVisibility({ mt: true, mb: true, ml: true, mr: true, bl: true, br: true, tl: true, tr: true, mtr: true });
          canvas.add(img);
          canvas.setActiveObject(img);
          canvas.requestRenderAll();
        }, { crossOrigin: 'anonymous' });
      };
      reader.readAsDataURL(file);
    });
    e.target.value = '';
  });

  document.getElementById('export-btn').addEventListener('click', function() {
    const status = document.getElementById('status');
    status.innerText = 'Exporting...';

    // temporarily set white bg to ensure transparent areas are white
    const origBg = canvas.backgroundColor;
    canvas.backgroundColor = '#ffffff';
    canvas.renderAll();

    // use higher multiplier for better resolution if needed
    const dataURL = canvas.toDataURL({ format: 'png', multiplier: 1 });

    canvas.backgroundColor = origBg;
    canvas.renderAll();

    fetch("{{ route('gangsheet.save') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        order_id: {{ $order->id }},
        sheet_data: dataURL
      })
    })
    .then(r => r.json())
    .then(res => {
      if (res.success) {
        status.innerHTML = '<span class="text-success">Saved — <a href="'+res.path+'" target="_blank">Download</a></span>';
      } else {
        status.innerHTML = '<span class="text-danger">Error: ' + (res.message || 'unknown') + '</span>';
      }
    })
    .catch(err => {
      console.error(err);
      status.innerHTML = '<span class="text-danger">Upload failed</span>';
    });
  });

  document.addEventListener('keydown', function(e) {
    if ((e.key === 'Delete' || e.key === 'Backspace') && canvas.getActiveObject()) {
      canvas.remove(canvas.getActiveObject());
    }
  });
});
</script>
@endsection
