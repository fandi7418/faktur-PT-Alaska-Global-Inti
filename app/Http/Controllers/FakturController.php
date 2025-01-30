<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\view\view;
use App\Models\Faktur;

//import model product
use App\Models\Product;

//import model Rekanan
use App\Models\Rekanan;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

class FakturController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index():View
    {
        //get all products
        $fakturs = Faktur::latest()->paginate(10);

        //render view with products
        return view('faktur.index', compact('fakturs'));
    }

    public function create():View
    {
        $rekanans = Rekanan::orderBy('created_at', 'DESC')->get();
        return view('faktur.create', compact('rekanans'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'rekanan_id'         => 'required',
        ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/products', $image->hashName());

        //create product
        Faktur::create([
            'rekanan_id'         => $request->rekanan_id,
            'total'              => 0
        ]);

        //redirect to index
        return redirect()->route('fakturs.edit')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //belum selesai
    public function edit($id)
    {
        $faktur = Faktur::with(['customer', 'detail', 'detail.product'])->find($id);
        $products = Product::orderBy('nama_barang', 'ASC')->get();
        return view('faktur.edit', compact('faktur', 'products'));
    }

}
