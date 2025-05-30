@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="true">
                                        <i class="fas fa-user me-2"></i>Profile Information
                                    </button>
                                    <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-password" type="button" role="tab"
                                        aria-controls="v-pills-password" aria-selected="false">
                                        <i class="fas fa-key me-2"></i>Update Password
                                    </button>
                                    <button class="nav-link" id="v-pills-delete-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-delete" type="button" role="tab"
                                        aria-controls="v-pills-delete" aria-selected="false">
                                        <i class="fas fa-trash me-2"></i>Delete Account
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                        aria-labelledby="v-pills-password-tab">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-delete" role="tabpanel"
                                        aria-labelledby="v-pills-delete-tab">
                                        @include('profile.partials.delete-user-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
