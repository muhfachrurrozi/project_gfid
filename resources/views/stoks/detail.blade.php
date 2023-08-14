@extends('layouts\sidebar_admin')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Stock Equitment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('stoks.index') }}"> Equitment</a></li>
                <li class="breadcrumb-item active">Detail Stock Equitment</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if ($stok->poto)
                            <img src="{{asset('estok/'.$stok->poto) }}" alt="Profile" class="rounded-circle">
                        @else
                            No Avatar
                        @endif
                        <h2>{{ $stok->pic }}</h2>
                        <h3>{{ $stok->dept }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Stock</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Stock Equitment</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Deskripsi</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->deskripsi }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Size</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->size }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">QTY</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->qty }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Lokasi</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->lokasi }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Mesin</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->mesin }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Keterangan</div>
                                    <div class="col-lg-9 col-md-8">{{ $stok->remak }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form class="row g-3" action="{{ Route('stoks.update',[$stok->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Photo</label>
                                        <div class="col-md-8 col-lg-9">
                                            {{-- <input name="wi_name" type="text" class="form-control" id="wi_name" value="{{ $mesin->wi }}" readonly> --}}
                                            @if ($stok->poto)
                                                <p>
                                                    <a href="{{ asset('estok/' . $stok->poto) }}" name="poto" target="_blank">Lihat Gambar Saat Ini</a>
                                                </p>
                                                <p>
                                                    <input type="file" class="form-control-file" id="poto" name="poto">
                                                </p>
                                            @else
                                                <p>Tidak ada file PDF WI.</p>
                                                <input type="file" class="form-control-file" id="poto" name="poto" required>
                                            @endif
                                        </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">PIC</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pic" type="text" class="form-control" id="pic" value="{{ $stok->pic }}" >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{ $stok->deskripsi }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Size</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="size" type="text" class="form-control" id="size" value="{{ $stok->size }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">QTY</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="qty" type="text" class="form-control" id="qty" value="{{ $stok->qty }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Lokasi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lokasi" type="text" class="form-control" id="lokasi" value="{{ $stok->lokasi }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Mesin</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="mesin" type="text" class="form-control" id="mesin" value="{{ $stok->mesin }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Keterangan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="remak" type="text" class="form-control" id="remak" value="{{ $stok->remak }}">
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
