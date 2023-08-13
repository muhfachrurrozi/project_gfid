@extends('layouts\sidebar_admin')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}"> Scrap Fabrikasi</a></li>
                <li class="breadcrumb-item active">Detail Scrap Fabrikasi</li>
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
                                <h5 class="card-title">Details Scrap Fabrikasi</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tanggal</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->created_at }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Shift</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->shift }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kg</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->kg }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">SO</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->so }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jumlah Karung</div>
                                    <div class="col-lg-9 col-md-8">{{ $scrap->karung }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form class="row g-3" action="{{ Route('scraps.update',[$scrap->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Detail Scrap Fabrikasi</label>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $scrap->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Shift</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="shift" type="text" class="form-control" id="shift" value="{{ $scrap->shift }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Kg</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="kg" type="text" class="form-control" id="kg" value="{{ $scrap->kg }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">SO</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="so" type="text" class="form-control" id="so" value="{{ $scrap->so }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Jumlah Karung</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="karung" type="text" class="form-control" id="karung" value="{{ $scrap->karung }}">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->
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
