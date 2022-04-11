<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <title>Index</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('penjualan.create') }}"
                            class="btn btn-md btn-success mb-3 float-right">Tambah
                            Data Barang</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Barcode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga Barang</th>
                                    <th scope="col">Satuan Barang</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $data)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $data->barcode_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td align="right"> @currency($data->harga_barang)</td>
                                        <td>{{ $data->satuan_barang }}</td>
                                        <td class="text-center">
                                            <form
                                                onsubmit="return confirm('Yakin untuk menghapus data barcode {{ $data->barcode_barang }} ?');"
                                                action="{{ route('penjualan.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                <a href="{{ route('penjualan.edit', $data->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    </script>


</body>

</html>
