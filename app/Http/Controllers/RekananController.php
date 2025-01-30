<?php

namespace App\Http\Controllers;

//import model rekanan
use App\Models\Rekanan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class RekananController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index():View
    {
        //get all products
        $rekanans = Rekanan::latest()->paginate(10);

        //render view with products
        return view('rekanan.index', compact('rekanans'));
    }

    public function create():View
    {
        return view('rekanan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_rekanan'         => 'required',
            'alamat'               => 'required',
            'no_telp'              => 'required|numeric'
        ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/products', $image->hashName());

        //create product
        Rekanan::create([
            'nama_rekanan'        => $request->nama_rekanan,
            'alamat'              => $request->alamat,
            'no_telp'             => $request->no_telp,
        ]);

        //redirect to index
        return redirect()->route('rekanans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // public function show(string $id): View
    // {
    //     //get product by ID
    //     $rekanan = Rekanan::findOrFail($id);

    //     //render view with product
    //     return view('rekanans.show', compact('rekanan'));
    // }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $rekanan = Rekanan::findOrFail($id);

        //render view with product
        return view('rekanan.edit', compact('rekanan'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_rekanan'         => 'required',
            'alamat'               => 'required',
            'no_telp'              => 'required|numeric'
        ]);

        //get product by ID
        $rekanan = Rekanan::findOrFail($id);

            //update product without image
            $rekanan->update([
                'nama_rekanan'        => $request->nama_rekanan,
                'alamat'              => $request->alamat,
                'no_telp'             => $request->no_telp,
            ]);
        

        //redirect to index
        return redirect()->route('rekanans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $rekanan = Rekanan::findOrFail($id);

        //delete image
        // Storage::delete('public/products/'. $product->image);

        //delete product
        $rekanan->delete();

        //redirect to index
        return redirect()->route('rekanans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
