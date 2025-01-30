<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Product; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index():View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('product.index', compact('products'));
    }

    public function create():View
    {
        return view('product.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'kode_produk'         => 'required',
            'nama_produk'         => 'required',
            'satuan'              => 'required',
            'diskon'              => 'required|numeric',
            'harga'               => 'required|numeric',
            'penyedia'            => 'required',
            'stock'               => 'required|numeric'
        ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/products', $image->hashName());

        //create product
        Product::create([
            'kode_produk'         => $request->kode_produk,
            'nama_produk'         => $request->nama_produk,
            'satuan'              => $request->satuan,
            'diskon'              => $request->diskon,
            'harga'               => $request->harga,
            'penyedia'            => $request->penyedia,
            'stock'               => $request->stock
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // public function show(string $id): View
    // {
    //     //get product by ID
    //     $product = Product::findOrFail($id);

    //     //render view with product
    //     return view('products.show', compact('product'));
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
        $product = Product::findOrFail($id);

        //render view with product
        return view('product.edit', compact('product'));
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
            'kode_produk'         => 'required',
            'nama_produk'         => 'required',
            'satuan'              => 'required',
            'diskon'              => 'required|numeric',
            'harga'               => 'required|numeric',
            'penyedia'            => 'required',
            'stock'               => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

            //update product without image
            $product->update([
                'kode_produk'         => $request->kode_produk,
                'nama_produk'         => $request->nama_produk,
                'satuan'              => $request->satuan,
                'diskon'              => $request->diskon,
                'harga'               => $request->harga,
                'penyedia'            => $request->penyedia,
                'stock'               => $request->stock
            ]);
        

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete image
        // Storage::delete('public/products/'. $product->image);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
    
