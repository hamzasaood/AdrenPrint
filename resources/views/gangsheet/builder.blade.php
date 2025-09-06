{{-- resources/views/gangsheet/builder.blade.php --}}
@extends('layout.default')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@php
    if (!empty($product->image)) {
        $productImage = asset('images/' . $product->image);
    } elseif (!empty($product->main_image)) {
        $productImage = 'https://www.ssactivewear.com/' . ltrim($product->main_image, '/');
    } else {
        $productImage = asset('images/default.png');
    }
@endphp
<style>
  :root {
    --primary: #16a34a;
    --primary-dark: #15803d;
    --primary-light: #dcfce7;
    --secondary: #3b82f6;
    --dark: #1f2937;
    --light: #f9fafb;
    --gray: #6b7280;
    --gray-light: #e5e7eb;
    --white: #ffffff;
    --danger: #ef4444;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --radius: 8px;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
  }

  body {
    background-color: #f3f4f6;
    color: var(--dark);
    height: 100vh;
    overflow: hidden;
  }

  .designer-app {
    display: flex;
    flex-direction: column;
    height: 100vh;
  }

  /* Header */
  .designer-header {
    background: var(--white);
    padding: 0.75rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: var(--shadow);
    z-index: 10;
    border-bottom: 1px solid var(--gray-light);
  }

  .logo {
    font-weight: 700;
    font-size: 1.25rem;
    color: var(--primary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .product-info {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .product-thumb {
    width: 40px;
    height: 40px;
    border-radius: 4px;
    object-fit: cover;
    border: 1px solid var(--gray-light);
  }

  .product-name {
    font-weight: 500;
  }

  .header-actions {
    display: flex;
    gap: 0.75rem;
  }

  .btn {
    padding: 0.5rem 1rem;
    border-radius: var(--radius);
    font-weight: 500;
    font-size: 0.875rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
  }

  .btn-primary {
    background: var(--primary);
    color: var(--white);
    border: none;
  }

  .btn-primary:hover {
    background: var(--primary-dark);
  }

  .btn-outline {
    background: transparent;
    color: var(--gray);
    border: 1px solid var(--gray-light);
  }

  .btn-outline:hover {
    background: var(--light);
    color: var(--dark);
  }

  /* Main Layout */
  .designer-container {
    display: flex;
    flex: 1;
    overflow: hidden;
  }

  /* Left Sidebar */
  .tools-sidebar {
    width: 80px;
    background: var(--white);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem 0;
    gap: 0.5rem;
    border-right: 1px solid var(--gray-light);
    box-shadow: var(--shadow);
    z-index: 5;
  }

  .tool-btn {
    width: 48px;
    height: 48px;
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: 1px solid transparent;
    color: var(--gray);
    cursor: pointer;
    transition: all 0.2s;
    position: relative;
  }

  .tool-btn:hover {
    background: var(--primary-light);
    color: var(--primary);
  }

  .tool-btn.active {
    background: var(--primary-light);
    color: var(--primary);
    border-color: var(--primary);
  }

  .tool-btn i {
    font-size: 1.25rem;
  }

  .tool-label {
    position: absolute;
    bottom: -20px;
    font-size: 0.7rem;
    background: var(--dark);
    color: var(--white);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    opacity: 0;
    transition: opacity 0.2s;
    pointer-events: none;
    white-space: nowrap;
  }

  .tool-btn:hover .tool-label {
    opacity: 1;
  }

  /* Canvas Area */
  .canvas-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    position: relative;
    overflow: auto;
    padding: 2rem;
  }

  .canvas-wrapper {
    position: relative;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    overflow: hidden;
  }

  #design-canvas {
    background: var(--white);
    border: 1px solid var(--gray-light);
  }

  .canvas-controls {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    background: var(--white);
    padding: 0.5rem;
    border-radius: 50px;
    display: flex;
    gap: 0.5rem;
    box-shadow: var(--shadow);
  }

  .zoom-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--white);
    border: 1px solid var(--gray-light);
    color: var(--gray);
    cursor: pointer;
  }

  .zoom-btn:hover {
    background: var(--light);
    color: var(--dark);
  }

  /* Right Panel */
  .properties-panel {
    width: 320px;
    background: var(--white);
    display: flex;
    flex-direction: column;
    border-left: 1px solid var(--gray-light);
    box-shadow: var(--shadow);
    z-index: 5;
  }

  .panel-header {
    padding: 1rem;
    font-weight: 600;
    border-bottom: 1px solid var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .panel-content {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
  }

  .panel-section {
    margin-bottom: 1.5rem;
  }

  .panel-section-title {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  .form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--gray);
  }

  .form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border-radius: var(--radius);
    border: 1px solid var(--gray-light);
    font-size: 0.875rem;
    transition: all 0.2s;
  }

  .form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
  }

  .color-picker {
    height: 40px;
    padding: 0.25rem;
    cursor: pointer;
  }

  .sticker-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
  }

  .sticker-item {
    padding: 0.5rem;
    border: 1px solid var(--gray-light);
    border-radius: var(--radius);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
  }

  .sticker-item:hover {
    border-color: var(--primary);
    background: var(--primary-light);
  }

  .sticker-item img {
    max-width: 100%;
    height: 30px;
    object-fit: contain;
  }

  .shape-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
  }

  .shape-btn {
    padding: 0.75rem;
    border: 1px solid var(--gray-light);
    border-radius: var(--radius);
    background: var(--white);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
  }

  .shape-btn:hover {
    border-color: var(--primary);
    background: var(--primary-light);
  }

  .shape-btn i {
    font-size: 1.5rem;
    color: var(--gray);
  }

  .layer-list {
    border: 1px solid var(--gray-light);
    border-radius: var(--radius);
    overflow: hidden;
  }

  .layer-item {
    padding: 0.75rem;
    border-bottom: 1px solid var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: all 0.2s;
  }

  .layer-item:last-child {
    border-bottom: none;
  }

  .layer-item:hover {
    background: var(--light);
  }

  .layer-item.active {
    background: var(--primary-light);
    border-left: 3px solid var(--primary);
  }

  .layer-name {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
  }

  .layer-actions {
    display: flex;
    gap: 0.5rem;
  }

  .layer-btn {
    width: 24px;
    height: 24px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    color: var(--gray);
    cursor: pointer;
  }

  .layer-btn:hover {
    background: var(--gray-light);
    color: var(--dark);
  }

  .panel-footer {
    padding: 1rem;
    border-top: 1px solid var(--gray-light);
  }

  /* Responsive */
  @media (max-width: 1024px) {
    .properties-panel {
      width: 280px;
    }
  }

  @media (max-width: 768px) {
    .designer-container {
      flex-direction: column;
    }
    
    .tools-sidebar {
      width: 100%;
      height: 60px;
      flex-direction: row;
      justify-content: center;
      padding: 0 1rem;
    }
    
    .properties-panel {
      width: 100%;
      height: 300px;
    }
  }

  /* Loading overlay */
  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
  }

  .loading-overlay.active {
    opacity: 1;
    pointer-events: all;
  }

  .spinner {
    width: 40px;
    height: 40px;
    border: 4px solid var(--primary-light);
    border-top: 4px solid var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Toast notification */
  .toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 1rem 1.5rem;
    background: var(--dark);
    color: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    z-index: 10000;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.3s;
  }

  .toast.show {
    transform: translateY(0);
    opacity: 1;
  }

  .toast-success {
    background: var(--primary);
  }

  .toast-error {
    background: var(--danger);
  }

  .toast-icon {
    font-size: 1.25rem;
  }
</style>

<div class="designer-app">
  <!-- Header -->
  <div class="designer-header">
    <div class="logo">
      <i class="fas fa-pen-ruler"></i>
      <span>Design Studio</span>
    </div>
    <div class="product-info">
      <img src="{{ $productImage }}" alt="{{ $product->name }}" class="product-thumb">
      <div class="product-name">{{ $product->name }}</div>
    </div>
    <div class="header-actions">
      <button class="btn btn-outline" id="saveDesign">
        <i class="fas fa-save"></i> Save
      </button>
      <button class="btn btn-primary" id="exportAndAddToCart">
        <i class="fas fa-cart-plus"></i> Add to Cart
      </button>
    </div>
  </div>

  <div class="designer-container">
    <!-- Tools Sidebar -->
    <div class="tools-sidebar">
      <button class="tool-btn active" data-panel="text" title="Text">
        <i class="fas fa-font"></i>
        <span class="tool-label">Text</span>
      </button>
      <button class="tool-btn" data-panel="upload" title="Upload">
        <i class="fas fa-upload"></i>
        <span class="tool-label">Upload</span>
      </button>
      <button class="tool-btn" data-panel="stickers" title="Stickers">
        <i class="fas fa-star"></i>
        <span class="tool-label">Stickers</span>
      </button>
      <button class="tool-btn" data-panel="shapes" title="Shapes">
        <i class="fas fa-shapes"></i>
        <span class="tool-label">Shapes</span>
      </button>
      <button class="tool-btn" data-panel="layers" title="Layers">
        <i class="fas fa-layer-group"></i>
        <span class="tool-label">Layers</span>
      </button>
    </div>

    <!-- Canvas Area -->
    <div class="canvas-container">
      <div class="canvas-wrapper">
        <canvas id="design-canvas" width="600" height="600"></canvas>
      </div>
      <div class="canvas-controls">
        <button class="zoom-btn" id="zoomOut">
          <i class="fas fa-minus"></i>
        </button>
        <button class="zoom-btn" id="zoomReset">
          <i class="fas fa-sync-alt"></i>
        </button>
        <button class="zoom-btn" id="zoomIn">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>

    <!-- Properties Panel -->
    <div class="properties-panel">
      <div class="panel-header">
        <span id="activePanelTitle">Text Properties</span>
        <i class="fas fa-question-circle" style="color: var(--gray); cursor: pointer;"></i>
      </div>
      
      <div class="panel-content">
        <!-- Text Panel -->
        <div class="panel-section" id="panel-text">
          <div class="form-group">
            <button class="btn btn-primary" id="addText" style="width: 100%">
              <i class="fas fa-plus"></i> Add Text Box
            </button>
          </div>
          <div class="form-group">
            <label class="form-label">Font Family</label>
            <select class="form-control" id="fontFamily">
              <option value="Arial">Arial</option>
              <option value="Helvetica">Helvetica</option>
              <option value="Times New Roman">Times New Roman</option>
              <option value="Courier New">Courier New</option>
              <option value="Verdana">Verdana</option>
              <option value="Georgia">Georgia</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Font Size</label>
            <input type="range" class="form-control" id="fontSize" min="10" max="120" value="30">
            <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--gray);">
              <span>10</span>
              <span id="fontSizeValue">30</span>
              <span>120</span>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Text Color</label>
            <input type="color" class="form-control color-picker" id="fontColor" value="#000000">
          </div>
          <div class="form-group">
            <label class="form-label">Text Alignment</label>
            <div style="display: flex; gap: 0.5rem;">
              <button class="btn btn-outline" data-align="left" style="flex: 1;">
                <i class="fas fa-align-left"></i>
              </button>
              <button class="btn btn-outline" data-align="center" style="flex: 1;">
                <i class="fas fa-align-center"></i>
              </button>
              <button class="btn btn-outline" data-align="right" style="flex: 1;">
                <i class="fas fa-align-right"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Upload Panel -->
        <div class="panel-section" id="panel-upload" style="display: none;">
          <div class="form-group">
            <label class="form-label">Upload Image</label>
            <div style="border: 2px dashed var(--gray-light); border-radius: var(--radius); padding: 2rem; text-align: center; cursor: pointer;" id="uploadArea">
              <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: var(--gray); margin-bottom: 1rem;"></i>
              <p style="font-size: 0.875rem; color: var(--gray);">Drag & drop or click to upload</p>
              <input type="file" id="uploadImage" style="display: none;">
            </div>
          </div>
        </div>

        <!-- Stickers Panel -->
        <div class="panel-section" id="panel-stickers" style="display: none;">
          <div class="sticker-grid">
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/616/616408.png">
              <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Star">
            </div>
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png">
              <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="Heart">
            </div>
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/709/709510.png">
              <img src="https://cdn-icons-png.flaticon.com/512/709/709510.png" alt="Smile">
            </div>
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/684/684809.png">
              <img src="https://cdn-icons-png.flaticon.com/512/684/684809.png" alt="Check">
            </div>
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/929/929594.png">
              <img src="https://cdn-icons-png.flaticon.com/512/929/929594.png" alt="Circle">
            </div>
            <div class="sticker-item" data-src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png">
              <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Diamond">
            </div>
          </div>
        </div>

        <!-- Shapes Panel -->
        <div class="panel-section" id="panel-shapes" style="display: none;">
          <div class="shape-grid">
            <button class="shape-btn" id="addCircle">
              <i class="fas fa-circle"></i>
            </button>
            <button class="shape-btn" id="addRect">
              <i class="fas fa-square"></i>
            </button>
            <button class="shape-btn" id="addTriangle">
              <i class="fas fa-play fa-rotate-270"></i>
            </button>
            <button class="shape-btn" id="addLine">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <div class="form-group" style="margin-top: 1rem;">
            <label class="form-label">Fill Color</label>
            <input type="color" class="form-control color-picker" id="shapeFillColor" value="#16a34a">
          </div>
          <div class="form-group">
            <label class="form-label">Stroke Color</label>
            <input type="color" class="form-control color-picker" id="shapeStrokeColor" value="#000000">
          </div>
          <div class="form-group">
            <label class="form-label">Stroke Width</label>
            <input type="range" class="form-control" id="shapeStrokeWidth" min="1" max="10" value="2">
            <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--gray);">
              <span>1</span>
              <span id="strokeWidthValue">2</span>
              <span>10</span>
            </div>
          </div>
        </div>

        <!-- Layers Panel -->
        <div class="panel-section" id="panel-layers" style="display: none;">
          <div class="layer-list" id="layersContainer">
            <!-- Layers will be populated here -->
            <div class="layer-item" style="justify-content: center; color: var(--gray);">
              No layers yet
            </div>
          </div>
          <div style="display: flex; gap: 0.5rem; margin-top: 1rem;">
            <button class="btn btn-outline" id="bringFront" style="flex: 1;">
              <i class="fas fa-arrow-up"></i> Front
            </button>
            <button class="btn btn-outline" id="sendBack" style="flex: 1;">
              <i class="fas fa-arrow-down"></i> Back
            </button>
          </div>
          <div style="margin-top: 0.5rem;">
            <button class="btn btn-outline" id="deleteObj" style="width: 100%; color: var(--danger);">
              <i class="fas fa-trash"></i> Delete Selected
            </button>
          </div>
        </div>
      </div>

      <div class="panel-footer">
        <button class="btn btn-primary" id="saveToCartBtn" style="width: 100%">
          <i class="fas fa-cart-plus"></i> Add to Cart
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
  <div class="spinner"></div>
</div>

<!-- Toast Notification -->
<div class="toast" id="toast">
  <i class="fas fa-check-circle toast-icon"></i>
  <span class="toast-message">Operation completed successfully</span>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.2.4/fabric.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  // Initialize canvas
  const canvas = new fabric.Canvas('design-canvas', {
    backgroundColor: '#fff',
    selection: true,
    preserveObjectStacking: true
  });

  // Set dimensions
  canvas.setWidth(600);
  canvas.setHeight(600);

  // Product info
  const productImage = @json($productImage);
  const productId = @json($product->id);
  const csrf = @json(csrf_token());

  // UI Elements
  const loadingOverlay = document.getElementById('loadingOverlay');
  const toast = document.getElementById('toast');
  const activePanelTitle = document.getElementById('activePanelTitle');
  const layersContainer = document.getElementById('layersContainer');
  const fontSizeValue = document.getElementById('fontSizeValue');
  const strokeWidthValue = document.getElementById('strokeWidthValue');

  // Set product as background
  fabric.Image.fromURL(productImage, function(img) {
    img.scaleToWidth(canvas.width);
    canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
      crossOrigin: 'anonymous'
    });
  });

  // Tool buttons
  document.querySelectorAll('.tool-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      // Update active button
      document.querySelectorAll('.tool-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      
      // Show corresponding panel
      const target = btn.dataset.panel;
      document.querySelectorAll('.panel-section').forEach(p => p.style.display = 'none');
      document.getElementById('panel-' + target).style.display = 'block';
      
      // Update panel title
      activePanelTitle.textContent = btn.title + ' Properties';
    });
  });

  // Add Text
  document.getElementById('addText').addEventListener('click', () => {
    const text = new fabric.IText('Double click to edit', {
      left: 100,
      top: 100,
      fill: document.getElementById('fontColor').value,
      fontSize: parseInt(document.getElementById('fontSize').value, 10),
      fontFamily: document.getElementById('fontFamily').value,
    });
    canvas.add(text).setActiveObject(text);
    updateLayersList();
    showToast('Text added successfully');
  });

  // Font size slider
  document.getElementById('fontSize').addEventListener('input', e => {
    fontSizeValue.textContent = e.target.value;
    const obj = canvas.getActiveObject();
    if (obj && obj.type === 'i-text') {
      obj.set('fontSize', parseInt(e.target.value, 10));
      canvas.renderAll();
    }
  });

  // Font family select
  document.getElementById('fontFamily').addEventListener('change', e => {
    const obj = canvas.getActiveObject();
    if (obj && obj.type === 'i-text') {
      obj.set('fontFamily', e.target.value);
      canvas.renderAll();
    }
  });

  // Font color picker
  document.getElementById('fontColor').addEventListener('input', e => {
    const obj = canvas.getActiveObject();
    if (obj && obj.type === 'i-text') {
      obj.set('fill', e.target.value);
      canvas.renderAll();
    }
  });

  // Text alignment buttons
  document.querySelectorAll('[data-align]').forEach(btn => {
    btn.addEventListener('click', () => {
      const align = btn.dataset.align;
      const obj = canvas.getActiveObject();
      if (obj && obj.type === 'i-text') {
        obj.set('textAlign', align);
        canvas.renderAll();
      }
    });
  });

  // Upload Image
  document.getElementById('uploadArea').addEventListener('click', () => {
    document.getElementById('uploadImage').click();
  });

  document.getElementById('uploadImage').addEventListener('change', e => {
    const file = e.target.files[0];
    if (!file) return;
    
    if (!file.type.match('image.*')) {
      showToast('Please select an image file', 'error');
      return;
    }

    const reader = new FileReader();
    reader.onload = f => {
      fabric.Image.fromURL(f.target.result, function(img) {
        img.scaleToWidth(200);
        canvas.add(img).setActiveObject(img);
        updateLayersList();
        showToast('Image uploaded successfully');
      });
    };
    reader.readAsDataURL(file);
  });

  // Stickers
  document.querySelectorAll('.sticker-item').forEach(item => {
    item.addEventListener('click', () => {
      fabric.Image.fromURL(item.dataset.src, function(img) {
        img.scaleToWidth(100);
        canvas.add(img).setActiveObject(img);
        updateLayersList();
        showToast('Sticker added successfully');
      });
    });
  });

  // Shapes
  document.getElementById('addCircle').addEventListener('click', () => {
    const circle = new fabric.Circle({ 
      radius: 50, 
      fill: document.getElementById('shapeFillColor').value,
      stroke: document.getElementById('shapeStrokeColor').value,
      strokeWidth: parseInt(document.getElementById('shapeStrokeWidth').value, 10),
      left: 100, 
      top: 100 
    });
    canvas.add(circle).setActiveObject(circle);
    updateLayersList();
    showToast('Circle added successfully');
  });

  document.getElementById('addRect').addEventListener('click', () => {
    const rect = new fabric.Rect({ 
      width: 100, 
      height: 100, 
      fill: document.getElementById('shapeFillColor').value,
      stroke: document.getElementById('shapeStrokeColor').value,
      strokeWidth: parseInt(document.getElementById('shapeStrokeWidth').value, 10),
      left: 150, 
      top: 150 
    });
    canvas.add(rect).setActiveObject(rect);
    updateLayersList();
    showToast('Rectangle added successfully');
  });

  document.getElementById('addTriangle').addEventListener('click', () => {
    const triangle = new fabric.Triangle({ 
      width: 100, 
      height: 100, 
      fill: document.getElementById('shapeFillColor').value,
      stroke: document.getElementById('shapeStrokeColor').value,
      strokeWidth: parseInt(document.getElementById('shapeStrokeWidth').value, 10),
      left: 200, 
      top: 200 
    });
    canvas.add(triangle).setActiveObject(triangle);
    updateLayersList();
    showToast('Triangle added successfully');
  });

  document.getElementById('addLine').addEventListener('click', () => {
    const line = new fabric.Line([50, 100, 200, 100], {
      stroke: document.getElementById('shapeStrokeColor').value,
      strokeWidth: parseInt(document.getElementById('shapeStrokeWidth').value, 10),
      fill: document.getElementById('shapeFillColor').value,
    });
    canvas.add(line).setActiveObject(line);
    updateLayersList();
    showToast('Line added successfully');
  });

  // Shape properties
  document.getElementById('shapeFillColor').addEventListener('input', e => {
    const obj = canvas.getActiveObject();
    if (obj && (obj.type === 'circle' || obj.type === 'rect' || obj.type === 'triangle' || obj.type === 'line')) {
      obj.set('fill', e.target.value);
      canvas.renderAll();
    }
  });

  document.getElementById('shapeStrokeColor').addEventListener('input', e => {
    const obj = canvas.getActiveObject();
    if (obj && (obj.type === 'circle' || obj.type === 'rect' || obj.type === 'triangle' || obj.type === 'line')) {
      obj.set('stroke', e.target.value);
      canvas.renderAll();
    }
  });

  document.getElementById('shapeStrokeWidth').addEventListener('input', e => {
    strokeWidthValue.textContent = e.target.value;
    const obj = canvas.getActiveObject();
    if (obj && (obj.type === 'circle' || obj.type === 'rect' || obj.type === 'triangle' || obj.type === 'line')) {
      obj.set('strokeWidth', parseInt(e.target.value, 10));
      canvas.renderAll();
    }
  });

  // Layer management
  function updateLayersList() {
    layersContainer.innerHTML = '';
    
    if (canvas.getObjects().length === 0) {
      layersContainer.innerHTML = '<div class="layer-item" style="justify-content: center; color: var(--gray);">No layers yet</div>';
      return;
    }
    
    canvas.getObjects().forEach((obj, index) => {
      const layerItem = document.createElement('div');
      layerItem.className = 'layer-item';
      if (obj === canvas.getActiveObject()) {
        layerItem.classList.add('active');
      }
      
      let icon = 'fa-font';
      if (obj.type === 'image') icon = 'fa-image';
      if (obj.type === 'circle' || obj.type === 'rect' || obj.type === 'triangle' || obj.type === 'line') icon = 'fa-shape';
      
      layerItem.innerHTML = `
        <div class="layer-name">
          <i class="fas ${icon}"></i>
          <span>${obj.type} ${index + 1}</span>
        </div>
        <div class="layer-actions">
          <button class="layer-btn" data-action="select">
            <i class="fas fa-hand-pointer"></i>
          </button>
        </div>
      `;
      
      layerItem.querySelector('[data-action="select"]').addEventListener('click', (e) => {
        e.stopPropagation();
        canvas.setActiveObject(obj);
        canvas.renderAll();
        updateLayersList();
      });
      
      layerItem.addEventListener('click', () => {
        canvas.setActiveObject(obj);
        canvas.renderAll();
        updateLayersList();
      });
      
      layersContainer.appendChild(layerItem);
    });
  }

  // Layer operations
  document.getElementById('bringFront').addEventListener('click', () => {
    const obj = canvas.getActiveObject();
    if (obj) {
      canvas.bringToFront(obj);
      canvas.renderAll();
      updateLayersList();
      showToast('Brought to front');
    }
  });

  document.getElementById('sendBack').addEventListener('click', () => {
    const obj = canvas.getActiveObject();
    if (obj) {
      canvas.sendToBack(obj);
      canvas.renderAll();
      updateLayersList();
      showToast('Sent to back');
    }
  });

  document.getElementById('deleteObj').addEventListener('click', () => {
    const obj = canvas.getActiveObject();
    if (obj) {
      canvas.remove(obj);
      canvas.renderAll();
      updateLayersList();
      showToast('Object deleted');
    }
  });

  // Canvas zoom controls
  let zoomLevel = 1;
  document.getElementById('zoomIn').addEventListener('click', () => {
    zoomLevel += 0.1;
    canvas.setZoom(zoomLevel);
  });

  document.getElementById('zoomOut').addEventListener('click', () => {
    if (zoomLevel > 0.2) {
      zoomLevel -= 0.1;
      canvas.setZoom(zoomLevel);
    }
  });

  document.getElementById('zoomReset').addEventListener('click', () => {
    zoomLevel = 1;
    canvas.setZoom(zoomLevel);
  });

  // Object selection event
  canvas.on('selection:created', updateLayersList);
  canvas.on('selection:updated', updateLayersList);
  canvas.on('selection:cleared', updateLayersList);

  // Save design
  document.getElementById('saveDesign').addEventListener('click', async () => {
    if (canvas.getObjects().length <= 0) {
      showToast('Please add something to your design before saving.', 'error');
      return;
    }

    const json = JSON.stringify(canvas.toJSON());
    localStorage.setItem('design_' + productId, json);
    showToast('Design saved locally');
  });

  // Load design if exists
  const savedDesign = localStorage.getItem('design_' + productId);
  if (savedDesign) {
    try {
      canvas.loadFromJSON(savedDesign, () => {
        canvas.renderAll();
        updateLayersList();
      });
    } catch (e) {
      console.error('Error loading saved design:', e);
    }
  }

  // Export & Save to Cart
  async function exportAndSaveToCart() {
    if (canvas.getObjects().length <= 0) {
      showToast('Please add something to your design before saving.', 'error');
      return;
    }

    loadingOverlay.classList.add('active');
    
    try {
      const fullDataURL = canvas.toDataURL({ format: 'png', multiplier: 2 });
      const previewDataURL = canvas.toDataURL({ format: 'png', multiplier: 0.25 });
      const json = JSON.stringify(canvas.toJSON());

      const response = await fetch("{{ route('gangsheet.saveToCart') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify({
          product_id: productId,
          design_json: json,
          preview: previewDataURL,
          full_image: fullDataURL,
          quantity: 1
        })
      });
      
      const result = await response.json();
      
      if (result.success) {
        showToast('Design added to cart successfully');
        setTimeout(() => {
          window.location.href = '/cart';
        }, 1500);
      } else {
        throw new Error(result.message || "Unknown error");
      }
    } catch (error) {
      console.error('Save error:', error);
      showToast('Failed to save design: ' + error.message, 'error');
    } finally {
      loadingOverlay.classList.remove('active');
    }
  }

  document.getElementById('exportAndAddToCart').addEventListener('click', exportAndSaveToCart);
  document.getElementById('saveToCartBtn').addEventListener('click', exportAndSaveToCart);

  // Toast notification function
  function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    toast.className = 'toast';
    
    if (type === 'success') {
      toast.classList.add('toast-success');
      toast.querySelector('.toast-icon').className = 'fas fa-check-circle toast-icon';
    } else {
      toast.classList.add('toast-error');
      toast.querySelector('.toast-icon').className = 'fas fa-exclamation-circle toast-icon';
    }
    
    toast.querySelector('.toast-message').textContent = message;
    toast.classList.add('show');
    
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3000);
  }

  // Initialize layers list
  updateLayersList();
});
</script>
@endsection