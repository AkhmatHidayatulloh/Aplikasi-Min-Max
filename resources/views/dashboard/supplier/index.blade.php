@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Supplier</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Supplier</label>
                                        <input type="text" class="form-control" id="" name="nama_supplier"
                                            placeholder="Nama Supplier" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Supplier</label>
                                        <input type="text" class="form-control" id="" name="alamat_supplier"
                                            placeholder="Alamat Supplier" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota Supplier</label>
                                        <input type="text" class="form-control" id="" name="kota_supplier"
                                            placeholder="Kota Supplier" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email Supplier</label>
                                        <input type="email" class="form-control" id="" name="email_supplier"
                                            placeholder="Email Supplier" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nohp Supplier</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp_supplier"
                                            placeholder="No Hp Supplier" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Kota Supplier</th>
                                        <th>Email Supplier</th>
                                        <th>No HP Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($supplier as $data)
                                        <tr>
                                            <td>{{ $data->nama_supplier }}</td>
                                            <td>{{ $data->alamat_supplier }}</td>
                                            <td>{{ $data->kota_supplier }}</td>
                                            <td>{{ $data->email_supplier }}</td>
                                            <td>{{ $data->nohp_supplier }}</td>
                                            <td style="width: 180px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#update" id="tombolubah" data-id="{{ $data->id }}"
                                                    data-nama="{{ $data->nama_supplier }}"
                                                    data-alamat="{{ $data->alamat_supplier }}"
                                                    data-kota="{{ $data->kota_supplier }}"
                                                    data-email="{{ $data->email_supplier }}"
                                                    data-nohp="{{ $data->nohp_supplier }}">
                                                    Update
                                                </button>
                                                <a href="{{ route('supplier.destroy', $data->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                                {{-- <button class=" btn btn-success" style="color: white;" id="tombolubah"
                                                    data-toggle="modal" data-target="#update" data-id="<?= $id ?>"
                                                    data-nama="<?= $nama ?>" data-alamat="<?= $alamat ?>"
                                                    data-kota="<?= $kota ?>" data-nohp="<?= $nohp ?>"
                                                    data-email="<?= $email ?>">Update</button> --}}
                                            </td>
                                        </tr>
                                    @endforeach




                                    <div class="modal fade" id="update">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Update Supplier</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('supplier.ubah') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Form Update Supplier</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <!-- form start -->

                                                                <div class="card-body">
                                                                    <input type="hidden" id="id" name="id">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nama
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama_supplier" placeholder="Enter email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Alamat
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamat" name="alamat_supplier" placeholder="Alamat Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Kota
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="kota" name="kota_supplier" placeholder="Kota Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Email
                                                                            Supplier</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email_supplier" placeholder="Email Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">nohp
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nohp" name="nohp_supplier" placeholder="No Hp Supplier">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Kota Supplier</th>
                                        <th>Email Supplier</th>
                                        <th>No HP Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Hanya memperbolehkan input angka dan membatasi maksimal 14 karakter pada input nomor HP
            $("#nohp").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $("#nohp").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });

        $(function() {
            $('#example2').DataTable();
        });
        $(document).on("click", "#tombolubah", function() {

            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let alamat = $(this).data('alamat');
            let kota = $(this).data('kota');
            let nohp = $(this).data('nohp');
            let email = $(this).data('email');

            $(".modal-body #id").val(id);
            $(".modal-body #nama").val(nama);
            $(".modal-body #alamat").val(alamat);
            $(".modal-body #kota").val(kota);
            $(".modal-body #nohp").val(nohp);
            $(".modal-body #email").val(email);

            $(".modal-body #nohp").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $(".modal-body #nohp").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });
        // Hanya memperbolehkan input angka pada input nomor HP
    </script>
@endsection