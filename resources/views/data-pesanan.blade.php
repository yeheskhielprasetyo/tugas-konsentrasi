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
                        <h3>Data Pesanan</h3><br>
                        {{-- <a href="{{ route('penjualan.create') }}"
                            class="btn btn-md btn-success mb-3 float-right">Tambah
                            Data Barang</a> --}}

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Banyak</th>
                                    {{-- <th scope="col">Total</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @forelse ($data as $data)
                                    <tr class="product_data">
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $data->barang->barcode_barang }} <br>
                                            {{ $data->barang->nama_barang }}
                                        </td>
                                        <td>@currency($data->barang->harga_barang)</td>
                                        <td>
                                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                                            <input type="text" class="qty-input" name="banyak" value="{{ $data->banyak }}"></input>
                                            <button class="input-group-text changeQuantity increment-btn">+</button>
                                        </td>
                                        {{-- <td align="right"> @currency($data->total)</td> --}}
                                        <td class="text-center">
                                            <form
                                                onsubmit="return confirm('Yakin untuk menghapus data barcode {{ $data->barang->barcode_barang }} ?');"
                                                action="{{ route('penjualan.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="6" class="total" align="right">Total &nbsp;
                                    @currency($totalharga)</td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right">
                                        <button>Checkout</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"> --}}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    </script>
    <script src="{{asset('custom/custom.js')}}"></script>

</body>

</html>
