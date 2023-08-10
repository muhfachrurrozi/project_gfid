@extends('layouts\sidebar_admin')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Mesin Fabrikasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mesins.index') }}"> Mesin</a></li>
                <li class="breadcrumb-item active">Detail Profile</li>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Mesin</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Mesin Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">No. Asset</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesin->aset }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesin->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Spesifikasi</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesin->spek }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Label</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesin->label }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">WI (Work Intruction)</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesin->wi }} </div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form class="row g-3" action="{{ Route('mesins.update',[$mesin->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">No. Asset</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="aset" type="text" class="form-control" id="aset" value="{{ $mesin->aset }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $mesin->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Spesifikasi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="spek" type="text" class="form-control" id="spek" value="{{ $mesin->spek }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Label</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="label" type="text" class="form-control" id="label" value="{{ $mesin->label }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">WI (Work Intruction)</label>
                                        <div class="col-md-8 col-lg-9">
                                            {{-- <input name="wi_name" type="text" class="form-control" id="wi_name" value="{{ $mesin->wi }}" readonly> --}}
                                            @if ($mesin->wi)
                                                <p>
                                                    <a href="{{ asset('pdfs_wi/' . $mesin->wi) }}" name="wi" target="_blank">Lihat File PDF WI Saat Ini</a>
                                                </p>
                                                <p>
                                                    <input type="file" class="form-control-file" id="wi" name="wi">
                                                </p>
                                            @else
                                                <p>Tidak ada file PDF WI.</p>
                                                <input type="file" class="form-control-file" id="wi" name="wi" required>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3">
                                        <div class="col-md-4 col-lg-3"></div>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="wi" type="file" class="form-control" id="wi" accept=".pdf">
                                        </div>
                                    </div> --}}
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
