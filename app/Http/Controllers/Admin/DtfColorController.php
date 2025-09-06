<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DtfColor;
use Illuminate\Http\Request;

class DtfColorController extends Controller
{
    public function index()
    {
        $colors = DtfColor::orderBy('id')->paginate(20);
        return view('admin.dtf.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.dtf.colors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key'   => 'required|string|unique:dtf_colors,key',
            'label' => 'required|string|max:255',
            'surcharge' => 'nullable|numeric',
            'is_active' => 'boolean',
            'type' => 'required|string',
            //'sort'  => 'nullable|integer'
        ]);
        DtfColor::create($data);
        return redirect()->route('admin.dtf-colors.index')->with('success','Color added!');
    }

    public function edit(DtfColor $dtf_color)
    {
        return view('admin.dtf.colors.edit', compact('dtf_color'));
    }

    public function update(Request $request, DtfColor $dtf_color)
    {
        $data = $request->validate([
            'key'   => 'required|string|unique:dtf_colors,key,'.$dtf_color->id,
            'label' => 'required|string|max:255',
            'surcharge' => 'nullable|numeric',
            'is_active' => 'boolean',
            'type' => 'required|string',
            //'sort'  => 'nullable|integer'
        ]);
        $dtf_color->update($data);
        return redirect()->route('admin.dtf-colors.index')->with('success','Color updated!');
    }

    public function destroy(DtfColor $dtf_color)
    {
        $dtf_color->delete();
        return redirect()->route('admin.dtf-colors.index')->with('success','Color deleted!');
    }
}
