@extends('dashboard.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="editProfileForm" method="post" action="{{route('dashboard.profile.update')}}" class="section general-info" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                    <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <input type="hidden" name="idProfile" value="{{$userData->id}}">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify" name="image"
                                                            data-default-file="{{asset('dashboard/ltr/assets/img/'. $userData->image)}}"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload
                                                            Picture</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">First Name</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="fullName" placeholder="First Name" name="first_name"
                                                                        value="{{$userData->first_name }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Last Name</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="fullName" placeholder="Last Name" name="last_name"
                                                                        value="{{$userData->last_name}}">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">Email</label>
                                                            <input type="email" class="form-control mb-4" id="email"
                                                                placeholder="Email" name="email" value="{{$userData->email}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="profession">Phone</label>
                                                            <input type="text" class="form-control mb-4" id="email"
                                                                placeholder="Phone" name="phone" value="{{$userData->phone}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="account-settings-footer">

                                <div class="as-footer-container">

                                    <div class="blockui-growl-message">
                                        <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                                    </div>
                                    <button id="editProfileBtn" class="btn btn-dark">Save Changes</button>

                                </div>

                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    @endsection
