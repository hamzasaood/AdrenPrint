<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DtfSize;
use Illuminate\Http\Request;

class DtfSizeController extends Controller
{
    public function index()
    {
        $sizes = DtfSize::orderBy('id')->paginate(20);
        return view('admin.dtf.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.dtf.sizes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'width' => 'required|numeric|min:1',
            'height'=> 'required|numeric|min:1',
            'rate'  => 'required|numeric|min:0',
            'type'  => 'required|string',
            'is_active' => 'boolean',
            'sort'  => 'nullable|integer'
        ]);
        DtfSize::create($data);
        return redirect()->route('admin.dtf-sizes.index')->with('success','Size added!');
    }

    public function edit(DtfSize $dtf_size)
    {
        return view('admin.dtf.sizes.edit', compact('dtf_size'));
    }

    public function update(Request $request, DtfSize $dtf_size)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'width' => 'required|numeric|min:1',
            'height'=> 'required|numeric|min:1',
            'rate'  => 'required|numeric|min:0',
            'type'  => 'required|string',
            'is_active' => 'boolean',
            'sort'  => 'nullable|integer'
        ]);
        $dtf_size->update($data);
        return redirect()->route('admin.dtf-sizes.index')->with('success','Size updated!');
    }

    public function destroy(DtfSize $dtf_size)
    {
        $dtf_size->delete();
        return redirect()->route('admin.dtf-sizes.index')->with('success','Size deleted!');
    }
}
