@extends('AdminTemplate')
@section('isiAdmin')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mitra - Universitas Pertamina</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mitra</h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama Mitra</th>
                                        <th>Jenis Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1. </td>
                                        <td>DIKTI</td> {{-- --}}
                                        <td>MOU</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#modal-xxl{{ $item->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 2. </td>
                                        <td>DIKTI</td> {{-- --}}
                                        <td>MOA</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#modal-xxl{{ $item->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 3. </td>
                                        <td>DIKTI</td> {{-- --}}
                                        <td>MOA</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#modal-xxl{{ $item->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- modal untuk tambah lingkup -->
        <div class="modal fade" id="#modal-xxl{{ $item->id }}">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Profile Mitra</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('edit_mitra', $item->id)}}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="input" class="col-sm-2 col-form-label">Nama Mitra</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="namamitra"
                                            placeholder="Masukan Nama Mitra" disabled>
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="select" class="col-sm-2 col-form-label">Jenis Mitra</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" name="jenismitra" disabled>
                                                @foreach ($jm as $item)
                                                <option>{{ $item->juduljenismitra }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="select" class="col-sm-2 col-form-label">Lingkup Kerja Sama</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" name="jenismitra" disabled>
                                                @foreach ($lk as $item)
                                                <option>{{ $item->judullingkupkerja }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">Alamat</label>
                                    <div class="col-sm-10 ">
                                        <input type="text" class="form-control " name="alamat"
                                            placeholder="Masukan Alamat" disabled>
                                    </div>
                                    <br><br><br>
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">Website</label>
                                    <div class="col-sm-10 ">
                                        <input type="url" class="form-control " name="website"
                                            placeholder="Masukan Website" disabled>
                                    </div><br><br><br>
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">Narahubung</label>
                                    <div class="col-sm-10 ">
                                        <input type="number" class="form-control " name="notelpmitra"
                                            placeholder="nama narahubung" disabled>
                                    </div><br><br><br>
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">Nomor Telephone
                                        Narahubung</label>
                                    <div class="col-sm-10 ">
                                        <input type="number" class="form-control " name="notelpmitra"
                                            placeholder="Masukan Nomor Telephone" disabled>
                                    </div><br><br><br>
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">PIC</label>
                                    <div class="col-sm-10 ">
                                        <input type="number" class="form-control " name="notelpmitra"
                                            placeholder="nama pic" disabled>
                                    </div><br><br><br>
                                    <label for="inputPassword3 " class="col-sm-2 col-form-label ">Nomor Telephone
                                        PIC</label>
                                    <div class="col-sm-10 ">
                                        <input type="number" class="form-control " name="notelpmitra"
                                            placeholder="Masukan Nomor Telephone" disabled>
                                    </div><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="/AdminViewMitraEdit"><button type="submit" class="btn btn-primary"
                                    value="Save">Edit Data Mitra</button></a>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
</section>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js "></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js "></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js "></script>


@endsection