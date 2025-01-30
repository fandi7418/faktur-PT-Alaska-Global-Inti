<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Faktur - PT. ALASKA GLOBAL INTI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Master Data Faktur</h3>
                    <h5 class="text-center"><a >PT. ALASKA GLOBAL INTI</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('fakturs.create') }}" class="btn btn-md btn-success mb-3">TAMBAH FAKTUR</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Produk</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Penyedia</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Diskon (%)</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fakturs as $faktur)
                                    <tr>
                                        <td>{{ $faktur->kode_produk }}</td>
                                        <td>{{ $faktur->nama_produk }}</td>
                                        <td>{{ $faktur->penyedia }}</td>
                                        <td>{{ $faktur->satuan }}</td>
                                        <td>{{ $faktur->diskon }}</td>
                                        <td>{{ "Rp " . number_format($faktur->harga,2,',','.') }}</td>
                                        <td>{{ $faktur->stock }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin menghapus file?');" action="{{ route('fakturs.destroy', $faktur->id) }}" method="POST">
                                                <a href="{{ route('fakturs.show', $faktur->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('fakturs.edit', $faktur->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Faktur belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $fakturs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        // @elseif(session('error'))
        //     Swal.fire({
        //         icon: "error",
        //         title: "GAGAL!",
        //         text: "{{ session('error') }}",
        //         showConfirmButton: false,
        //         timer: 2000
        //     });
            
            </script>
            @endif

            @include('sweetalert::alert')
        </body>
</html>