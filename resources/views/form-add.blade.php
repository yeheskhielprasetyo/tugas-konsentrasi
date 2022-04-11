<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <title>Form add</title>
</head>

<body>
    <div class="container">

        <h4>FORM INPUT DATA BARANG</h4>
        <form method="POST" action="{{ route('penjualan.store') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="exampleFormControlInput1">Barcode Barang </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="barcode_barang" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Barang </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga Barang </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="harga_barang" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan Barang</label>
                <select class="form-control" id="exampleFormControlSelect1" name="satuan_barang" required>
                    <option value="pcs">pcs</option>
                    <option value="lbr">lbr</option>
                    <option value="dos">dos</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    </script>
    @include('sweetalert::alert')
</body>

</html>
