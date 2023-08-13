@extends('layouts.sidebar_admin')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ Route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-12 p-2 grid row-gap-2">
        <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputKaryawan">Tambah Data</button><br>
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
                                <h5 class="card-title">PT Georg Fischer Indonesia <span>| Data Product</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th class="col-1" scope="col">No.</th>
                                            <th class="col-2" scope="col">Item Code</th>
                                            <th class="col-3" scope="col">Deskripsi</th>
                                            <th class="col-1" scope="col">Routing</th>
                                            <th class="col-1" scope="col">Kg</th>
                                            <th class="col-2" scope="col">Drawing</th>
                                            <th class="col-1" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <th scope="row"><a href="#">{{ ++$i }}</a></th>
                                            <td>{{ $produk->item }}</td>
                                            <td>{{ $produk->deskripsi }}</td>
                                            <td>{{ $produk->routing }}</td>
                                            <td>{{ $produk->kg }}</td>
                                            <td>
                                                <a href="{{ asset('draw_produk/'.$produk->drawing) }}" target="_blank">
                                                    {{ $produk->drawing }}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="" href="{{ route('produks.show', $produk->id) }}" data-bs-toggle="tooltip" title="Default tooltip">
                                                    <span class="btn btn-outline-primary"><i class="bi bi-info-lg"></i></span>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger delete-btn" data-id="{{ $produk->id }}"><i class="bi bi-trash"></i></button>
                                                {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-outline-danger conformDelete"><i class="bi bi-trash"></i></button>
                                                </form> --}}
                                                {{-- <a class="hapusKaryawan" href="#" id="{{ $user->id }}">
                                                    <span class="btn btn-outline-danger"><i class="bi bi-trash"></i></span>
                                                </a> --}}

                        {{-- <form method="POST" action="{{ route('users.delete', $user->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                        </form> --}}
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
                &copy; Copyright <strong><span>Muh Fachrurrozi</span></strong>. All Rights Reserved
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
<div class="modal fade" id="inputKaryawan" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('assets/img/gf/logo-gf.png') }}" width="50" alt="">
                {{-- <h5 class="modal-title">Input Karyawan</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ Route('produks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="" class="form-label">Item Code</label>
                        <input type="text" class="form-control" name="item" id="item" >
                    </div>
                    <div class="col-md-8">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" >
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Fitting</label>
                        <input type="text" class="form-control" name="bahan" id="bahan" >
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Size Fitting</label>
                        <input type="text" class="form-control" name="lbahan" id="lbahan" >
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Routing</label>
                        <input type="text" class="form-control" name="routing" id="routing" >
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Kg</label>
                        <input type="text" class="form-control" name="kg" id="kg" >
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Drawing</label>
                        <input type="file" class="form-control" name="drawing" id="drawing" accept=".pdf" >
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

<script>
    // Ketika tombol hapus di klik
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                // Tampilkan SweetAlert untuk konfirmasi hapus
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi hapus, kirimkan permintaan hapus menggunakan metode DELETE
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/produks/' + id;
                        const csrfField = document.createElement('input');
                        csrfField.type = 'hidden';
                        csrfField.name = '_token';
                        csrfField.value = '{{ csrf_token() }}';
                        const methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';

                        form.appendChild(csrfField);
                        form.appendChild(methodField);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
