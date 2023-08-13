@extends('layouts\sidebar_admin')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}"> Produk</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Details Produk</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Item Code</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->item }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Deskripsi</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->deskripsi }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fitting</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->bahan }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Size Fitting</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->lbahan }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Routing SAP</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->routing }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kg</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->kg }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Drawing</div>
                                    <div class="col-lg-9 col-md-8">{{ $produk->drawing }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form class="row g-3" action="{{ Route('produks.update',[$produk->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Detail Produk</label>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Produk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="item" type="text" class="form-control" id="item" value="{{ $produk->item }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{ $produk->deskripsi }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Fitting</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="bahan" type="text" class="form-control" id="bahan" value="{{ $produk->bahan }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Size Fitting</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lbahan" type="text" class="form-control" id="lbahan" value="{{ $produk->lbahan }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Routing SAP</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="routing" type="text" class="form-control" id="routing" value="{{ $produk->routing }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Kg</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="kg" type="text" class="form-control" id="kg" value="{{ $produk->kg }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Drawing</label>
                                        <div class="col-md-8 col-lg-9">
                                            {{-- <input name="wi_name" type="text" class="form-control" id="wi_name" value="{{ $mesin->wi }}" readonly> --}}
                                            @if ($produk->drawing)
                                                <p>
                                                    <a href="{{ asset('draw_produk/'.$produk->drawing) }}" name="drawing" target="_blank">Lihat file PDF gambar saat ini</a>
                                                </p>
                                                <p>
                                                    <input type="file" class="form-control-file" id="drawing" name="drawing" >
                                                </p>
                                            @else
                                                <p>Tidak ada file PDF gambar.</p>
                                                <input type="file" class="form-control-file" id="drawing" name="drawing" >
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
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

@endsection
