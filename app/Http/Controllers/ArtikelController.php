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
   
        if ($image = $request->file('Cover')) {
            $destinationPath = 'images/';
            $BookCover = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $BookCover);
            $input['Cover'] = "$BookCover";
        }
     
        Artikel::create($input);
      
        return redirect()->route('artikel')
            ->with('success','Book added successfully.');
    }
}
