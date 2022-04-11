<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <title>Update</title>
</head>

<body>
    <div class="container">

        <h4>FORM EDIT DATA BARANG</h4>
        <form method="POST" action="{{ route('penjualan.update', [$data->id]) }}"
            onsubmit="return confirm('Yakin ingin mengubah data barcode {{ $data->barcode_barang }} ?');">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Barcode Barang </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="barcode_barang"
                    value="{{ $data->barcode_barang }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Barang </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_barang"
                    value="{{ $data->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga Barang </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_barang"
                    value="{{ $data->harga_barang }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan Barang</label>
                <select class="form-control" id="exampleFormControlSelect1" name="satuan_barang">
                    <option value="{{ $data->satuan_barang }}">{{ $data->satuan_barang }}</option>
                    <option value="pcs">pcs</option>
                    <option value="lbr">lbr</option>
                    <option value="dos">dos</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/penjualan" class="btn btn-sm btn-danger">Cancel</a>
        </form>
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
