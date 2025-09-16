{{-- resources/views/gangsheet/builder.blade.php --}}
@extends('layout.default')

@section('content')

<style>

.swatch {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  cursor: pointer;
  border: 2px solid #e6e9ef;
  transition: all 0.2s ease;
}

.swatch:hover {
  transform: scale(1.1);
}

.swatch.active {
  border: 3px solid #2563eb; /* highlight active */
  box-shadow: 0 0 8px rgba(37, 99, 235, 0.5);
}


</style>
<script>
  window.variantsData = {!! $product->variants->toJson() !!};
</script>

@php
    if (!empty($product->image)) {
        $productImage = asset('images/' . $product->image);
    } elseif (!empty($product->main_image)) {
        $productImage = 'https://www.ssactivewear.com/' . ltrim($product->main_image, '/');
    } else {
        $productImage = asset('images/default.png');
    }
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  /* Page-scoped designer styles (clean & professional) */
  .designer-root{height:calc(100vh - 24px);display:grid;grid-template-columns:72px 1fr 320px;gap:18px;padding:12px;font-family:Inter,system-ui,Roboto,Segoe UI,Arial;color:#0f172a}
  .panel { background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(2,6,23,0.06);padding:12px; }
  /* Left toolbar */
  .toolbar{background:linear-gradient(180deg,#0f1724,#0b1a24);border-radius:12px;padding:12px;display:flex;flex-direction:column;gap:10px;align-items:center}
  .tool-btn{width:48px;height:48px;border-radius:10px;border:none;background:transparent;color:#a8b0c1;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px}
  .tool-btn:hover,.tool-btn.active{background:rgba(255,255,255,0.04);color:#fff;transform:translateY(-2px)}
  /* Canvas */
  .canvas-wrap{display:flex;align-items:center;justify-content:center}
  .canvas-vessel{width:100%;height:calc(100vh - 120px);display:flex;align-items:center;justify-content:center}
  .canvas-card{width:500px;height:500px;border-radius:14px;overflow:hidden;position:relative;background:#fff;display:flex;align-items:center;justify-content:center}
  #design-canvas{display:block;width:100%;height:100%}
  /* Right properties */
  .right-panel{display:flex;flex-direction:column;gap:12px;overflow:auto}
  .right-panel h5{margin:0 0 6px 0}
  .control-row{display:flex;gap:8px;align-items:center;margin-top:8px}
  .control-row input[type="color"]{width:42px;height:34px;border-radius:6px;border:1px solid #e6e9ef;padding:2px}
  .btn{padding:8px 10px;border-radius:8px;border:none;cursor:pointer;font-weight:600}
  .btn-primary{background:#16a34a;color:#fff}
  .btn-ghost{background:transparent;border:1px solid #e6e9ef;color:#111827}
  .muted{color:#6b7280;font-size:0.9rem}
  .stickers-row{display:flex;gap:8px;overflow:auto;padding:8px 0}
  .sticker-thumb{width:84px;height:84px;border-radius:8px;object-fit:contain;border:1px solid #eef2f6;padding:8px;background:#fff;cursor:pointer}
  .swatch{width:36px;height:36px;border-radius:8px;border:1px solid #e6e9ef;cursor:pointer;box-shadow:0 6px 18px rgba(2,6,23,0.04)}
  /* responsive */
  @media (max-width:1100px){ .designer-root{grid-template-columns:64px 1fr;grid-template-rows:auto 360px} .right-panel{grid-column:1/3} .canvas-card{width:680px;height:680px} }
  @media (max-width:720px){ .designer-root{grid-template-columns:1fr;grid-template-rows:auto auto 1fr} .right-panel{order:3} .toolbar{flex-direction:row;width:100%;justify-content:center} .canvas-card{width:92vw;height:60vh} }
</style>

<div class="designer-root">
  <!-- LEFT: toolbar -->
  <div class="panel toolbar" role="toolbar" aria-label="Designer tools">
    <button class="tool-btn active" data-tool="text" title="Text"><i class="fa fa-font"></i></button>
    <button class="tool-btn" data-tool="images" title="Images"><i class="fa fa-image"></i></button>
    <button class="tool-btn" data-tool="stickers" title="Stickers"><i class="fa fa-star"></i></button>
    <button class="tool-btn" data-tool="shapes" title="Shapes"><i class="fa fa-square"></i></button>
    <button class="tool-btn" data-tool="colors" title="Colors"><i class="fa fa-fill-drip"></i></button>
    <button class="tool-btn" data-tool="layers" title="Layers"><i class="fa fa-layer-group"></i></button>
  </div>

  <!-- CENTER: Canvas -->
  <div class="panel canvas-wrap">
    <div class="canvas-vessel">
      <div class="canvas-card" id="canvasCard">
        <canvas id="design-canvas" width="800" height="800"></canvas>
        <!-- design bounding box will be added programmatically -->
      </div>
    </div>
  </div>

  <!-- RIGHT: Properties -->
  <div class="panel right-panel" id="rightPanel">
    <div>
      <h5>Selected</h5>
      <div id="selectedInfo" class="muted">No selection</div>
      <div id="selectedControls" style="display:none;margin-top:8px;">
        <div class="control-row">
          <label class="muted" style="width:70px">Fill</label>
          <input type="color" id="propFill" />
          <button class="btn btn-ghost" id="btnDuplicate">Dup</button>
          <button class="btn btn-ghost" id="btnDelete">Delete</button>
        </div>
        <div class="control-row">
          <label class="muted" style="width:70px">Font</label>
          <input type="number" id="propFontSize" min="6" style="width:100%;" />
        </div>
        <div class="control-row">
          <label class="muted" style="width:70px">Opacity</label>
          <input id="propOpacity" type="range" min="0" max="1" step="0.05" style="flex:1">
        </div>
        <div class="control-row">
          <button class="btn btn-ghost" id="btnBring">Bring Forward</button>
          <button class="btn btn-ghost" id="btnSend">Send Back</button>
        </div>
      </div>
    </div>

    <hr/>

    <div>
        <h5>Quick Product Colors</h5>
        <div class="control-row" style="gap:10px;flex-wrap:wrap;margin-top:8px">
            @foreach($product->variants->groupBy('color') as $color => $colorVariants)
                
                    <div class="swatch"
                        data-color="{{ $colorVariants->first()->color_code ?? '#ffffff' }}" data-color-name="{{ $colorVariants->first()->color }}"
                        style="background:{{ $colorVariants->first()->color_code ?? '#ffffff' }};
                                width:32px;height:32px;
                                border-radius:50%;
                                cursor:pointer;">
                    </div>
                
            @endforeach
        </div>


      <div style="margin-top:10px">
        <label class="muted">Tint strength</label>
        <input id="tintStrength" type="range" min="0" max="1" step="0.01" value="0" style="width:100%" />
      </div>
    </div>

    <hr/>

    <div>
      <h5>Stickers</h5>
      <div class="stickers-row" id="stickersRow">
        <!-- stickers injected -->
      </div>
    </div>

    <hr/>


    

@if(!empty($product->variants) && $product->variants->count())
  <div>
    <h5>Choose Size</h5>
    <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
      
      <!-- Size dropdown -->
      <label class="muted">Size</label>
      <select id="variantSize" class="form-control" style="padding:6px;border-radius:6px;border:1px solid #ddd">
        <option value="">Select Size</option>
        @foreach($product->variants->pluck('size')->unique() as $size)
          <option value="{{ $size }}">{{ $size }}</option>
        @endforeach
      </select>

      

      <!-- Price display -->
      <div id="variantPriceBox" style="margin-top:6px;font-weight:600;color:#16a34a">
        Select size & color to see price
      </div>
    </div>
  </div>
@endif
<hr/>

    <div>
      <h5>Export / Cart</h5>
      <div style="display:flex;gap:8px;margin-top:8px">
        <button id="btnPreview" class="btn btn-ghost">Preview</button>
        <button id="btnSave" class="btn btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>

<!-- hidden upload input -->
<input type="file" id="uploadInput" accept="image/*" style="display:none">

<!-- Preview modal (simple) -->
<div id="previewModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.6);align-items:center;justify-content:center;z-index:2000">
  <div style="background:#fff;padding:16px;border-radius:8px;max-width:92vw;max-height:92vh;overflow:auto">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
      <h4 style="margin:0">Preview</h4>
      <button id="closePreview" class="btn btn-ghost">Close</button>
    </div>
    <div style="position:relative;width:720px;height:720px;max-width:85vw;max-height:85vh;display:flex;align-items:center;justify-content:center;background:#fff;border-radius:6px;overflow:hidden">
      <img id="previewProductImg" src="{{ $productImage }}" style="position:absolute;object-fit:contain;max-width:100%;max-height:100%"/>
      <img id="previewOverlayImg" src="" style="position:absolute;pointer-events:none;transform-origin:top left"/>
    </div>
  </div>
</div>

<!-- Fabric.js (stable) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  /***** Config & state *****/
  const productId = {!! json_encode($product->id ?? null) !!};
  const processedUrl = `/bgremove/processed-${productId}.png`;
  const fallbackProductUrl = {!! json_encode($productImage) !!};
  const canvasEl = document.getElementById('design-canvas');

  const canvas = new fabric.Canvas(canvasEl, {
    preserveObjectStacking: true,
    selection: true,
    backgroundColor: '#ffffff'
  });

  let bgImageObj = null;        // fabric.Image for product (non-selectable)
  let designBox = null;         // fabric.Rect indicating allowed design area
  const designRatio = { w: 0.6, h: 0.4 };

  /***** Layout helpers *****/
  const canvasCard = document.getElementById('canvasCard');
  function setCanvasSize() {
    // size to canvasCard dimensions
    const rect = canvasCard.getBoundingClientRect();
    const w = Math.max(320, Math.floor(rect.width));
    const h = Math.max(320, Math.floor(rect.height));
    canvas.setWidth(w);
    canvas.setHeight(h);
    canvas.calcOffset();
    if (bgImageObj) positionBgImage(bgImageObj);
    computeDesignBox();
    canvas.requestRenderAll();
  }
  // run now & on resize
  setCanvasSize();
  window.addEventListener('resize', setCanvasSize);

  /***** Load processed product image (fallback to original) *****/
  async function loadProductImage(url, onFail) {
  fabric.Image.fromURL(url, (img) => {
    if (!img) {
      if (typeof onFail === "function") onFail(false);
      return;
    }
    img.set({ selectable: false, evented: false });
    bgImageObj = img;
    positionBgImage(img);
    canvas.add(img);
    canvas.sendToBack(img);
    if (typeof onFail === "function") onFail(true);
  }, { crossOrigin: "Anonymous" });
}

async function fetchAndLoadBg() {
  const pid = productId;
  const localUrl = `/bgremove/processed-${pid}.png`;

  try {
    const head = await fetch(localUrl, { method: "HEAD" });
    if (head.ok) {
      loadProductImage(localUrl, null);
      return;
    }
  } catch (e) {
    console.warn("Local processed not found, trying API");
  }

  try {
    const res = await fetch(`/product/${pid}/processed-image`);
    const data = await res.json();
    if (data.url) {
      loadProductImage(data.url, null);
      return;
    }
  } catch (e) {
    console.error("Error fetching processed image:", e);
  }

  // final fallback
  loadProductImage(fallbackProductUrl, null);
}

  // position and scale bg image to fit canvas while preserving aspect ratio
  function positionBgImage(img) {
  if (!img) return;
  const availW = canvas.getWidth();
  const availH = canvas.getHeight();
  const sx = availW / img.width;
  const sy = availH / img.height;
  const scale = Math.min(sx, sy);

  img.set({
    scaleX: scale,
    scaleY: scale,
    originX: "center",
    originY: "center",
    left: availW / 2,
    top: availH / 2,
    selectable: false,
    evented: false,
  });

  img.setCoords();
  canvas.requestRenderAll();
}


 function computeDesignBox() {
  if (!bgImageObj) return;

  const imgW = bgImageObj.getScaledWidth();
  const imgH = bgImageObj.getScaledHeight();
  const imgLeft = bgImageObj.left - imgW / 2; // since bg is centered
  const imgTop = bgImageObj.top - imgH / 2;

  // 1% margins
  const marginX = imgW * 0.05;
  const marginY = imgH * 0.05;
  // box size based on designRatio


  const boxW = imgW - marginX * 2;
  const boxH = imgH - marginY * 2;
  const left = imgLeft + marginX;
  const top = imgTop + marginY;

  if (!designBox) {
    designBox = new fabric.Rect({
      left,
      top,
      width: boxW,
      height: boxH,
      originX: "left",
      originY: "top",
      fill: "rgba(2,6,23,0.03)",
      stroke: "#2563eb",
      strokeDashArray: [6, 6],
      rx: 5,
      ry: 5,
      selectable: false,
      evented: false,
    });
    canvas.add(designBox);
    canvas.sendToBack(bgImageObj);
    canvas.bringToFront(designBox);
  } else {
    designBox.set({ left, top, width: boxW, height: boxH });
    designBox.setCoords();
    canvas.sendToBack(bgImageObj);
    canvas.bringToFront(designBox);
  }

  canvas.requestRenderAll();
}



  // load product image (attempt processed first)
  fetchAndLoadBg();

  /***** Tools: add text, image, shapes, stickers, upload ***** */
  function addText(defaultText = 'Double-click to edit') {
    const left = designBox ? designBox.left + 20 : 80;
    const top = designBox ? designBox.top + 20 : 80;
    const t = new fabric.IText(defaultText, { left, top, fontSize: 34, fill: '#111827', editable: true, cursorWidth: 2 });
    t.customType = 'text';
    canvas.add(t);
    canvas.setActiveObject(t);
    canvas.requestRenderAll();
  }

  function addImageFromUrl(url) {
    fabric.Image.fromURL(url, (img) => {
      const left = designBox ? designBox.left + 30 : 80;
      const top = designBox ? designBox.top + 30 : 80;
      img.set({ left, top });
      img.scaleToWidth(Math.min(300, designBox ? designBox.width * 0.6 : 300));
      img.customType = 'image';
      canvas.add(img);
      canvas.setActiveObject(img);
      canvas.requestRenderAll();
    }, { crossOrigin: 'Anonymous' });
  }

  function addShape(type) {
    const left = designBox ? designBox.left + 40 : 100;
    const top = designBox ? designBox.top + 40 : 100;
    let obj;
    if (type === 'rect') obj = new fabric.Rect({ left, top, width: 160, height: 100, fill: '#16a34a', rx: 8, ry: 8 });
    if (type === 'circle') obj = new fabric.Circle({ left: left + 40, top: top + 40, radius: 60, fill: '#0ea5a4' });
    if (!obj) return;
    obj.customType = 'shape';
    canvas.add(obj);
    canvas.setActiveObject(obj);
    canvas.requestRenderAll();
  }

  // upload image input
  const uploadInput = document.getElementById('uploadInput');
  function triggerUpload() { uploadInput.click(); }
  uploadInput.addEventListener('change', (e) => {
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (ev) => addImageFromUrl(ev.target.result);
    reader.readAsDataURL(file);
  });

  /***** Tool wiring (left toolbar) *****/
  document.querySelectorAll('.tool-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tool-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const t = btn.getAttribute('data-tool');
      // simple behavior: selected tool opens relevant action or builder
      if (t === 'text') addText();
      if (t === 'images') triggerUpload();
      if (t === 'shapes') {
        // open shapes quick menu: for simplicity add rect
        // (you can expand to show a flyout)
        addShape('rect');
      }
      if (t === 'stickers') {
        // add first sticker for quick test
        addImageFromUrl('https://cdn-icons-png.flaticon.com/512/616/616408.png');
      }
      // layers/colors panels are on right side controls
    });
  });

  /***** Stickers row (right panel) *****/
  const stickers = [
    'https://cdn-icons-png.flaticon.com/512/616/616408.png',
    'https://cdn-icons-png.flaticon.com/512/616/616490.png',
    'https://cdn-icons-png.flaticon.com/512/616/616392.png',
    'https://cdn-icons-png.flaticon.com/512/616/616484.png',
    'https://cdn-icons-png.flaticon.com/512/743/743131.png'
  ];
  const stickersRow = document.getElementById('stickersRow');
  stickers.forEach(s => {
    const img = document.createElement('img');
    img.src = s; img.className = 'sticker-thumb';
    img.addEventListener('click', () => addImageFromUrl(s));
    stickersRow.appendChild(img);
  });

  /***** Selection & properties panel handlers *****/
  const selectedInfo = document.getElementById('selectedInfo');
  const selectedControls = document.getElementById('selectedControls');
  const propFill = document.getElementById('propFill');
  const propFontSize = document.getElementById('propFontSize');
  const propOpacity = document.getElementById('propOpacity');
  const btnDelete = document.getElementById('btnDelete');
  const btnDuplicate = document.getElementById('btnDuplicate');
  const btnBring = document.getElementById('btnBring');
  const btnSend = document.getElementById('btnSend');

  function updateSelectionUI() {
    const obj = canvas.getActiveObject();
    if (!obj) {
      selectedInfo.textContent = 'No selection';
      selectedControls.style.display = 'none';
      return;
    }
    selectedControls.style.display = 'block';
    const type = obj.customType || obj.type;
    selectedInfo.innerHTML = `<strong>${type}</strong> · x:${Math.round(obj.left)} y:${Math.round(obj.top)}`;

    // Fill color (for shapes/text)
    if (obj.fill) {
      propFill.value = rgbToHex(obj.fill);
    } else {
      propFill.value = '#000000';
    }

    // font size if text
    if (obj.type === 'i-text' || obj.type === 'textbox' || obj.type === 'text') {
      propFontSize.value = Math.round(obj.fontSize || 24);
      propFontSize.disabled = false;
    } else {
      propFontSize.value = '';
      propFontSize.disabled = true;
    }

    propOpacity.value = (obj.opacity != null ? obj.opacity : 1);
  }

  // helpers
  function rgbToHex(v) {
    if (!v) return '#000000';
    // support hex already
    if (v.startsWith('#')) return v;
    // rgb(...) or rgba(...)
    const m = v.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/);
    if (!m) return '#000000';
    return '#' + [1,2,3].map(i => parseInt(m[i]).toString(16).padStart(2,'0')).join('');
  }

  canvas.on('selection:created', updateSelectionUI);
  canvas.on('selection:updated', updateSelectionUI);
  canvas.on('selection:cleared', updateSelectionUI);

  // apply property controls
  propFill.addEventListener('input', (e) => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    if ('fill' in obj) { obj.set('fill', e.target.value); canvas.requestRenderAll(); }
  });
  propFontSize.addEventListener('change', (e) => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    if (obj.type === 'i-text' || obj.type === 'textbox') { obj.set('fontSize', parseInt(e.target.value,10)); obj.setCoords(); canvas.requestRenderAll(); }
  });
  propOpacity.addEventListener('input', (e) => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    obj.set('opacity', parseFloat(e.target.value)); canvas.requestRenderAll();
  });

  btnDelete.addEventListener('click', () => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    canvas.remove(obj); canvas.discardActiveObject(); canvas.requestRenderAll();
  });
  btnDuplicate.addEventListener('click', () => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    obj.clone((cl) => {
      cl.set({ left: obj.left + 20, top: obj.top + 20 });
      canvas.add(cl); canvas.setActiveObject(cl); canvas.requestRenderAll();
    });
  });
  btnBring.addEventListener('click', () => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    canvas.bringForward(obj); canvas.requestRenderAll();
  });
  btnSend.addEventListener('click', () => {
    const obj = canvas.getActiveObject(); if (!obj) return;
    canvas.sendBackwards(obj); canvas.requestRenderAll();
  });

  /***** Constrain objects to design box when moving/scaling *****/
  function clampToDesignBox(obj) {
    if (!designBox || !obj) return;
    if (!obj.getScaledWidth) return;
    const minX = designBox.left;
    const minY = designBox.top;
    const maxX = designBox.left + designBox.width - obj.getScaledWidth();
    const maxY = designBox.top + designBox.height - obj.getScaledHeight();
    let nx = obj.left, ny = obj.top;
    if (nx < minX) nx = minX;
    if (ny < minY) ny = minY;
    if (nx > maxX) nx = maxX;
    if (ny > maxY) ny = maxY;
    obj.set({ left: nx, top: ny });
    obj.setCoords();
  }
  canvas.on('object:moving', (e) => { if (!e.target) return; if (e.target.selectable === false) return; if (e.target.isEditing) return; clampToDesignBox(e.target); });
  canvas.on('object:scaling', (e) => { if (!e.target) return; clampToDesignBox(e.target); });

  /***** Keyboard handling: delete object but not while editing text ***** */
  document.addEventListener('keydown', (ev) => {
    // if active object is being edited (IText), do nothing
    const active = canvas.getActiveObject();
    if (active && active.isEditing) return;
    if (ev.key === 'Delete' || ev.key === 'Backspace') {
      if (active) { canvas.remove(active); canvas.discardActiveObject(); canvas.requestRenderAll(); }
    }
    // simple undo/redo blockers can be added here if desired
  });

  /***** Product color (swatches + tint slider) *****/
 const swatches = document.querySelectorAll('.swatch');
const tintStrength = document.getElementById('tintStrength');

swatches.forEach(s => {
  s.addEventListener('click', () => {
    // remove previous active
    document.querySelectorAll('.swatch').forEach(el => el.classList.remove('active'));
    // mark this one
    s.classList.add('active');

    const color = s.getAttribute('data-color');
    setProductTint(color, parseFloat(tintStrength.value));
  });
});

tintStrength.addEventListener('input', (e) => {
  const sel = document.querySelector('.swatch.active');
  const color = sel ? sel.getAttribute('data-color') : '#ffffff';
  setProductTint(color, parseFloat(e.target.value));
});





  function updateVariantPrice() {
  const size = document.getElementById('variantSize')?.value || '';
  const color = document.querySelector('.swatch.active')?.getAttribute('data-color-name') || '';
  const priceBox = document.getElementById('variantPriceBox');



  if (!size || !color) {
    priceBox.innerHTML = "Select size & color to see price";
    priceBox.style.color = "#555";
    return;
  }

  // find matching variant
  const variant = window.variantsData.find(v => v.size === size && v.color === color);

  if (variant) {
    priceBox.innerHTML = "$" + parseFloat(variant.price).toFixed(2);
    priceBox.style.color = "#16a34a"; // green
  } else {
    priceBox.innerHTML = "This combination is not available";
    priceBox.style.color = "red";
  }
}

// attach event listeners
document.getElementById('variantSize')?.addEventListener('change', updateVariantPrice);
document.querySelector('.swatch.active')?.addEventListener('change', updateVariantPrice);




  function setProductTint(color, alpha) {
    if (!bgImageObj) return;
    // try to find BlendColor filter at index 4 as we created earlier
    const filters = bgImageObj.filters || [];
    let blend = filters.find(f => f && f.type === 'BlendColor') || filters[4];
    if (!blend) {
      // create if not present
      try {
        blend = new fabric.Image.filters.BlendColor({ color: color, mode: 'tint', alpha: alpha });
        bgImageObj.filters = filters.concat([blend]);
      } catch (e) {
        // Fabric might not have BlendColor; fallback to multiply via globalCompositeOperation later (not implemented)
        console.warn('BlendColor filter not available', e);
        return;
      }
    }
    if (blend) {
      blend.color = color;
      blend.alpha = alpha;
    }
    try { bgImageObj.applyFilters(); canvas.requestRenderAll(); } catch(e){ console.warn(e); }
    // update active swatch styling
    document.querySelectorAll('.swatch').forEach(x => x.classList.remove('active'));
    const match = Array.from(document.querySelectorAll('.swatch')).find(x => x.getAttribute('data-color') === color);
    if (match) match.classList.add('active');
  }

  /***** Preview modal (overlay snapshot on product image) *****/
  const previewModal = document.getElementById('previewModal');
  const previewOverlayImg = document.getElementById('previewOverlayImg');
  const previewProductImg = document.getElementById('previewProductImg');
  document.getElementById('btnPreview').addEventListener('click', () => {
    const snapshot = canvas.toDataURL({ format: 'png' });
    previewOverlayImg.src = snapshot;
    // place overlay correctly relative to product display: map canvas designBox relative to canvas onto preview image
    previewProductImg.onload = () => {
      // compute relative rectangle
      const canvasWidth = canvas.getWidth(), canvasHeight = canvas.getHeight();
      const relLeft = designBox ? designBox.left / canvasWidth : 0;
      const relTop = designBox ? designBox.top / canvasHeight : 0;
      const relW = designBox ? designBox.width / canvasWidth : 1;
      const relH = designBox ? designBox.height / canvasHeight : 1;

      const container = previewOverlayImg.parentElement.getBoundingClientRect();
      // compute displayed product size (object-fit:contain)
      const naturalRatio = previewProductImg.naturalWidth / previewProductImg.naturalHeight;
      let dispW = container.width, dispH = container.height;
      if (dispW / dispH > naturalRatio) { dispH = container.height; dispW = dispH * naturalRatio; }
      else { dispW = container.width; dispH = dispW / naturalRatio; }
      const offsetX = (container.width - dispW) / 2;
      const offsetY = (container.height - dispH) / 2;

      const left = offsetX + relLeft * dispW;
      const top = offsetY + relTop * dispH;
      const w = relW * dispW;
      const h = relH * dispH;

      previewOverlayImg.style.left = left + 'px';
      previewOverlayImg.style.top = top + 'px';
      previewOverlayImg.style.width = w + 'px';
      previewOverlayImg.style.height = h + 'px';
    };
    previewModal.style.display = 'flex';
  });
  document.getElementById('closePreview').addEventListener('click', () => { previewModal.style.display = 'none'; });

  /***** Add to cart (unchanged route) *****/
  document.getElementById('btnSave').addEventListener('click', async () => {
    try {
      const cs = {!! json_encode(csrf_token()) !!};
      const pid = {!! json_encode($product->id ?? null) !!};
      const designJson = JSON.stringify(canvas.toJSON(['customType']));
      const preview = canvas.toDataURL({ format: 'png', multiplier: 0.6 });
      const full = canvas.toDataURL({ format: 'png', multiplier: 1 });

  const size = document.getElementById('variantSize')?.value || '';
  const color = document.getElementById('variantColor')?.value || '';

// get the selected swatch
const selectedSwatch = document.querySelector('.swatch.active');
let selectedColor = '';
// get its value (example: color hex)
if (selectedSwatch) {
    selectedColor = selectedSwatch.getAttribute('data-color-name');
    console.log('Selected color:', selectedColor);
}


  let selectedVariant = null;
  if (window.variantsData) {
    selectedVariant = window.variantsData.find(v => v.size === size && v.color === selectedColor);
  }

  if (!selectedVariant) {
    alert("This combination is not available.");
    return;
  }


  document.getElementById('variantPriceBox').textContent = `Price: $${selectedVariant.price}`;

  const price = selectedVariant.price;

      const res = await fetch("{{ route('gangsheet.saveToCart') }}", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': cs },
        body: JSON.stringify({
          product_id: pid,
          design_json: designJson,
          preview,
          full_image: full,
          variant_id: selectedVariant.id,
          price: selectedVariant.price,
          size : size,
          color : selectedColor,
          quantity: 1
        })
      });
      const json = await res.json();
      if (res.ok && json.success) {

        alert(json.message || 'Design added to cart');
        window.location.href = "{{ url('/cart') }}";
      } else {
        console.warn('Add to cart response:', json);
        alert(json.message || 'Failed to add to cart');
      }
    } catch (err) {
      console.error(err);
      alert('Error while adding to cart');
    }
  });

  /***** initial render adjustments and housekeeping *****/
  setTimeout(setCanvasSize, 120); // ensure sizing after layout settle
  canvas.requestRenderAll();
});
</script>

@endsection
