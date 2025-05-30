@extends('layouts.app')

@section('content')
    <div class="py-4 container-custom">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="shadow-sm card">
                    <div class="p-4 card-body">
                        <!-- Profile Information Section -->
                        <div class="mb-5 section">
                            <div class="p-3 section-header bg-light rounded-top">
                                <h5 class="mb-0">
                                    <i class="fas fa-user me-2 text-primary"></i>PROFIL
                                </h5>
                            </div>
                            <div class="p-4 border section-body rounded-bottom">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Update Password Section -->
                        <div class="mb-5 section">
                            <div class="p-3 section-header bg-light rounded-top">
                                <h5 class="mb-0">
                                    <i class="fas fa-key me-2 text-primary"></i>PASSWORD
                                </h5>
                            </div>
                            <div class="p-4 border section-body rounded-bottom">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Delete Account Section -->
                        <div class="section">
                            <div class="p-3 section-header bg-light rounded-top">
                                <h5 class="mb-0">
                                    <i class="fas fa-trash me-2 text-danger"></i>HAPUS AKUN
                                </h5>
                            </div>
                            <div class="p-4 border section-body rounded-bottom">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .section {
            background: #fff;
        }

        .section-header {
            border: 1px solid #dee2e6;
            border-bottom: none;
        }

        .section-body {
            border: 1px solid #dee2e6;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .alert {
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .alert-success {
            background-color: #d1fae5;
            border-color: #a7f3d0;
            color: #065f46;
        }

        .alert-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .text-danger {
            color: #dc3545 !important;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            font-weight: 500;
        }

        .invalid-feedback {
            color: #dc3545 !important;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            font-weight: 500;
            display: block;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-invalid:focus {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
        }
    </style>
@endsection
