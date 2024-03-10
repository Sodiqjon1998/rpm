@extends('frontend.layouts.main')


@section('content')
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('f/assets/images/banner/banner1.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white mt-5">Shaxsiy kabinet</h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Bosh sahifa</a></li>
                <li>Shaxsiy kabinet</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="profile-bx text-center">
                            <div class="user-profile-thumb">
                                <img src="{{ asset('f/assets/images/profile/pic1.jpg') }}" alt="" />
                            </div>
                            <div class="profile-info">
                                <h4>{{ auth()->user()->name }}</h4>
                                <span>{{ auth()->user()->email }}</span>
                            </div>
                            <div class="profile-social">
                                <ul class="list-inline m-a0">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-tabnav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link active" data-toggle="tab" href="#edit-profile"><i
                                                class="ti-pencil-alt"></i>Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#change-password"><i
                                                class="ti-lock"></i>Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="edit-profile">
                                    <div class="profile-head">
                                        <h3>Tahrirlash</h3>
                                    </div>
                                    <form class="edit-profile">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                    <h3>1. Personal Details</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">To'liq
                                                    ism</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="Mark Andre"
                                                        name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Occupation</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="CTO">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Company
                                                    Name</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="EduChamp">
                                                    <span class="help">If you want your invoices addressed to a company.
                                                        Leave blank to use your full name.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Phone
                                                    No.</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="+120 012345 6789">
                                                </div>
                                            </div>

                                            <div class="seperator"></div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                    <h3>2. Address</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Address</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text"
                                                        value="5-S2-20 Dummy City, UK">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">City</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="US">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">State</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="California">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Postcode</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="000702">
                                                </div>
                                            </div>

                                            <div
                                                class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x">
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                    <h3 class="m-form__section">3. Social Links</h3>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Linkedin</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.linkedin.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Facebook</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.facebook.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Twitter</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.twitter.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Instagram</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.instagram.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                                    </div>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <button type="reset" class="btn">Save changes</button>
                                                        <button type="reset" class="btn-secondry">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="change-password">
                                    <div class="profile-head">
                                        <h3>Change Password</h3>
                                    </div>
                                    <form class="edit-profile">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                                                    <h3>Password</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Current
                                                    Password</label>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <input class="form-control" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New
                                                    Password</label>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <input class="form-control" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type New
                                                    Password</label>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <input class="form-control" type="password" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                <button type="reset" class="btn">Save changes</button>
                                                <button type="reset" class="btn-secondry">Cancel</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
@endsection
