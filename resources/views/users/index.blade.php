@extends('layouts.sidebar_admin')

@section('content')
@if(session('input'))
    <div class="alert alert-success">
        {{ session('input') }}
    </div>
@endif

@if(session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ Route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Karyawan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-12 p-2 grid row-gap-2">
        <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#input-karyawan">Tambah Data</button><br>
    </div>

    <section class="section dashboard">
        <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">PT Georg Fischer Indonesia <span>| Data Karyawan</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th class="col-1" scope="col">No.</th>
                                            <th class="col-1" scope="col">Photo</th>
                                            <th class="col-1" scope="col">Nik</th>
                                            <th class="col-2" scope="col">Nama</th>
                                            <th class="col-2" scope="col">Email</th>
                                            <th class="col-2" scope="col">Telepon</th>
                                            <th class="col-1" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <th scope="row"><a href="#">{{ ++$i }}</a></th>
                                            <td>@if ($user->poto)
                                                <img src="avatar/{{ $user->poto }}" width="50">
                                                @else
                                                <img src="{{ asset('avatar/avatar.png') }}" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telepon }}</td>
                                            <td>
                                                <a class="nav-link nav-profile d-flex pe-2" href="#" data-bs-toggle="dropdown" data-bs-toggle="tooltip" data-bs-placement="right" title="Infomasi Data">
                                                    <strong>
                                                        <button type="button" class="btn btn-outline-primary"><i class="bi bi-info-lg"></i></button>
                                                    </strong>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="">
                                                        <a class="dropdown-item" href="{{ route('users.show', $user->id) }}" data-bs-toggle="tooltip" title="Default tooltip">
                                                            <span class="btn btn-outline-success"><i class="bi bi-eye"></i></span>
                                                        </a>
                                                        {{-- <a class="dropdown-item" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Data">
                                                            <span class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></span>
                                                        </a> --}}
                                                        <a class="dropdown-item" href="#">
                                                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="{{ '#hapusKaryawan', $user->id }}">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div><!-- End Left side columns -->
        </section>
    </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<!-- Modal Input Karyawan -->
<div class="modal fade" id="input-karyawan" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('assets/img/gf/logo-gf.png') }}" width="50" alt="">
                {{-- <h5 class="modal-title">Input Karyawan</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ Route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <label for="" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" >
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Departement</label>
                        <select id="dept" name="dept" class="form-select">
                            <option selected value="fab">Fabrikasi</option>
                            <option value="admin">PPIC</option>
                            <option value="pm">Produck Manager</option>
                            <option value="ext">Extrusi</option>
                            <option value="qc">QC</option>
                            <option value="wrh">Warehouse</option>
                            <option value="ts">Technical Service</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Jabatan</label>
                        <select id="jabatan" name="jabatan" class="form-select">
                            <option selected value="user">Operator</option>
                            <option value="manager">Manager</option>
                            <option va;ue="supervisor">Supervisor</option>
                            <option value="foreman">Foreman</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputName5" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <label for="inputNumber" class="form-label">File Upload</label>
                        <div class="text-center">
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="poto" name="poto">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button>
                        <button type="reset" class="btn btn-outline-secondary"><i class="bi bi-arrow-repeat"></i> Reset</button>
                        <button type="submit" class="btn btn-outline-primary" data-bs-target="modal"><i class="bi bi-sd-card"></i> Save</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Input Karyawan -->

<!-- Modal Hapus Karyawan -->
<div class="modal fade" id="{{ 'hapusKaryawan', $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-center align-center">
                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 100px; position: center"></i>
                </div>
                <p>Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Hapus Karyawan -->

@endsection