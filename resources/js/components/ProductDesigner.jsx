import React, { useEffect } from "react";
import { createStore } from "polotno/model/store";
import { Workspace } from "polotno/canvas/workspace";
import { SidePanel, SidePanelWrap } from "polotno/side-panel";
import { Toolbar } from "polotno/toolbar/toolbar";
import { ZoomButtons } from "polotno/toolbar/zoom-buttons";

function ProductDesigner({ productName, productImage, productId, saveUrl, csrf }) {

  // Create Polotno store
  const store = createStore();

  // Load background image as product base
  useEffect(() => {
    store.addPage();
    store.activePage.addElement({
      type: "image",
      src: productImage,
      x: 0,
      y: 0,
      width: 900,
      height: 1000,
      lock: true // make base image non-draggable
    });
  }, [productImage]);

  const handleSave = async () => {
    const json = store.toJSON();
    const dataUrl = await store.toDataURL({ pixelRatio: 2 }); // high res export
    const preview = await store.toDataURL({ pixelRatio: 0.25 }); // preview

    // Send to Laravel backend
    await fetch(saveUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf
      },
      body: JSON.stringify({
        product_id: productId,
        design_json: JSON.stringify(json),
        preview: preview,
        full_image: dataUrl,
        quantity: 1
      })
    }).then(r => r.json())
      .then(res => {
        if (res.success) {
          window.location.href = "/cart";
        } else {
          alert("Failed to save design: " + (res.message || "Unknown error"));
        }
      })
      .catch(err => {
        console.error(err);
        alert("Network error while saving design.");
      });
  };

  return (
    <div style={{ display: "flex", height: "100vh" }}>
      {/* Left side panel */}
      <SidePanelWrap>
        <SidePanel store={store} />
      </SidePanelWrap>

      {/* Main canvas */}
      <div style={{ flex: 1, display: "flex", flexDirection: "column" }}>
        <Toolbar store={store} />
        <Workspace store={store} />
        <ZoomButtons store={store} />
      </div>

      {/* Save button */}
      <div style={{ position: "fixed", bottom: "10px", right: "10px" }}>
        <button
          onClick={handleSave}
          style={{
            padding: "10px 20px",
            background: "#28a745",
            color: "#fff",
            border: "none",
            borderRadius: "8px"
          }}
        >
          Add to Cart
        </button>
      </div>
    </div>
  );
}

//export default ProductDesigner;

//export default ProductDesigner;

window.ProductDesigner = ProductDesigner;

