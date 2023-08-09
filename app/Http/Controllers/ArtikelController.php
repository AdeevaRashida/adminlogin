<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    

    public function create(){
        return view('Admin.Artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $artikelimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $artikelimage);
            $input['image'] = "$artikelimage";
        }
     
        Artikel::create($input);
      
        return redirect()->route('artikel')
            ->with('success','Artikel added successfully.');
    }

    public function edit(Artikel $artikel, $id)
    {
        $artikel = Artikel::find($id);
        return view('Admin.Artikel.edit',compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = request()->except(['_method', '_token']);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $artikelimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $artikelimage);
            $input['image'] = "$artikelimage";
        }else{
            unset($input['image']);
        }

        $artikel->update($input);
     
        return redirect()->route('artikel')
            ->with('success','Artikel Details Updated successfully');
    }

    public function destroy($id) {
        $artikel = Artikel::find($id);
        $artikel->delete();
        return redirect('/admin/artikel')
            ->with('success','Artikel Deleted successfully');
    }
}
