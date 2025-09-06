<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DtfImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DtfImageController extends Controller
{
    public function index()
    {
        $images = DtfImage::orderBy('sort')->paginate(20);
        return view('admin.dtf.images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.dtf.images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'path' => 'required|image|max:5120',
            'sort' => 'nullable|integer',
            'type' => 'required|string',
        ]);

        if (isset($request->path)) 
        {
        $r=$request->path;
        $image = time().'.'.$r->getClientOriginalExtension();
        $im = $r->move(public_path('/dtf-transfer'), $image);
        }
        $data['path'] = $image;

        DtfImage::create($data);
        return redirect()->route('admin.dtf-images.index')->with('success','Image added!');
    }

    public function edit(DtfImage $dtf_image)
    {
        return view('admin.dtf.images.edit', compact('dtf_image'));
    }

    public function update(Request $request, DtfImage $dtf_image)
    {
        $data = $request->validate([
            'path' => 'nullable|image|max:5120',
            'sort' => 'nullable|integer',
            'type' => 'required|string',
        ]);
        if($request->hasFile('path')){
        
        $r=$request->path;
        $image = time().'.'.$r->getClientOriginalExtension();
        $im = $r->move(public_path('/dtf-transfer'), $image);
        
        $data['path'] = $image;
            
        }
        $dtf_image->update($data);
        return redirect()->route('admin.dtf-images.index')->with('success','Image updated!');
    }

    public function destroy(DtfImage $dtf_image)
    {
        //Storage::disk('public')->delete($dtf_image->path);
        $dtf_image->delete();
        return redirect()->route('admin.dtf-images.index')->with('success','Image deleted!');
    }
}
