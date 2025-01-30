<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang Baru - PT. ALASKA GLOBAL INTI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
            <div>
                    <h3 class="text-center my-4">Tambah Data Barang</h3>
                    <h5 class="text-center"><a >PT. ALASKA GLOBAL INTI</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <!-- <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                             -->
                                <!-- error message untuk image -->
                                <!-- @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kode Barang</label>
                                <input type="text" class="form-control @error('kode_produk') is-invalid @enderror" name="kode_produk" value="{{ old('kode_produk') }}" placeholder="Masukkan Kode Barang">
                            
                                <!-- error message untuk Kode Barang -->
                                @error('kode_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan Nama Barang">
                            
                                <!-- error message untuk Kode Barang -->
                                @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Penyedia</label>
                                <input type="text" class="form-control @error('penyedia') is-invalid @enderror" name="penyedia" value="{{ old('penyedia') }}" placeholder="Masukkan Nama Penyedia">
                            
                                <!-- error message untuk Penyedia -->
                                @error('penyedia')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Description Product">{{ old('description') }}</textarea>
                             -->
                                <!-- error message untuk description -->
                                <!-- @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Satuan</label>
                                        <!-- <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ old('satuan') }}" placeholder="Masukkan Satuan Barang"> -->
                                        <select class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" >
                                            <option value="">Silahkan Pilih ...</option>
                                            <option value="Pcs" @if(old('satuan') == 'Pcs') selected @endif>Pcs</option>
                                            <option value="Box" @if(old('satuan') == 'Box') selected @endif>Box</option>
                                            <option value="Liter" @if(old('satuan') == 'Liter') selected @endif>Liter</option>
                                            <option value="Kit" @if(old('satuan') == 'Kit') selected @endif>Kit</option>
                                            <option value="Zak" @if(old('satuan') == 'Zak') selected @endif>Zak</option>
                                            <option value="Unit" @if(old('satuan') == 'Unit') selected @endif>Unit</option>
                                            <option value="Botol" @if(old('satuan') == 'Botol') selected @endif>Botol</option>
                                            <option value="Karton" @if(old('satuan') == 'Karton') selected @endif>Karton</option>
                                            <option value="Roll" @if(old('satuan') == 'Roll') selected @endif>Roll</option>
                                            <option value="Pack" @if(old('satuan') == 'Pack') selected @endif>Pack</option>
                                            <option value="Galon" @if(old('satuan') == 'Galon') selected @endif>Galon</option>
                                            <option value="Vial" @if(old('satuan') == 'Vial') selected @endif>Vial</option>
                                            <option value="Set" @if(old('satuan') == 'Set') selected @endif>Set</option>
                                            <option value="Pkg" @if(old('satuan') == 'Pkg') selected @endif>Pkg</option>
                                            <option value="M" @if(old('satuan') == 'M') selected @endif>M</option>
                                            <option value="M2" @if(old('satuan') == 'M2') selected @endif>M2</option>
                                            <option value="2ea/pkg" @if(old('satuan') == '2ea/pkg') selected @endif>2ea/pkg</option>
                                            <option value="Bag" @if(old('satuan') == 'Bag') selected @endif>Bag</option>
                                            <option value="25pcs/Strip" @if(old('satuan') == '25pcs/Strip') selected @endif>25pcs/Strip</option>
                                            <option value="Lembar" @if(old('satuan') == 'Lembar') selected @endif>Lembar</option>
                                            <option value="Kotak" @if(old('satuan') == 'Kotak') selected @endif>Kotak</option>
                                            <option value="Strip" @if(old('satuan') == 'Strip') selected @endif>Strip</option>
                                            <option value="Box/250 PCs" @if(old('satuan') == 'Box/250 Pcs') selected @endif>Box/250 PCs</option>
                                            <option value="Tube" @if(old('satuan') == 'Tube') selected @endif>Tube</option>
                                            <option value="10 Plates" @if(old('satuan') == '10 Plates') selected @endif>10 Plates</option>
                                        </select>
                                        <!-- error message untuk Satuan -->
                                        @error('satuan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Diskon</label>
                                        <input type="number" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon') }}" placeholder="Masukkan Diskon Barang">
                                    
                                        <!-- error message untuk stock -->
                                        @error('diskon')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Barang">
                                    
                                        <!-- error message untuk price -->
                                        @error('harga')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" placeholder="Masukkan Stock Product">
                                    
                                        <!-- error message untuk stock -->
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'description' );

        //untuk fitur search di dropdown tabel
        $(document).ready(function () {
    $('select').selectize({
        sortField: 'text'
    });
});
    </script>
</body>
</html>