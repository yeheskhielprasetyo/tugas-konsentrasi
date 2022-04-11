<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <title>Detail</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table border="1" align="center" width="1000px">
                            <tr>
                                <td align="right"><a href=""> Login</a></td>
                            </tr>
                            <tr>
                                <td align="center">Toko ABC</td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="1" align="center" width="100%">
                                        <tr>
                                            <td align="center"><br>
                                                <img src="{{ asset('assets/icon/Makeup.me.png') }}" alt=""
                                                    width="100px" height="50px">
                                                <br>
                                                <p class="card-text">{{ $data->nama_barang }}</p>
                                                <p class="card-text">@currency($data->harga_barang)</p>
                                            </td>
                                        </tr>
                        </table>
                        </td>
                        </tr>
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
