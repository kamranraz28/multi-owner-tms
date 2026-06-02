@extends('layouts.master')

@section('title', 'Edit Organization')

@section('content')

    <style>
        .common-container {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            margin-top: 40px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        form.common-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 6px;
            border: 1.5px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.25);
        }

        label.form-label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        button.btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            padding: 0.5rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
        }

        button.btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-3px);
        }
    </style>

    <div class="common-container container">

        <h2 class="text-center mb-4">Edit Organization</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('organizations.update', $organization->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="common-form row g-4">

        @csrf
        @method('PUT')

        <!-- Name -->
            <div class="col-md-6">
                <label class="form-label">Organization Name</label>
                <input type="text"
                       name="name"
                       value="{{ $organization->name }}"
                       class="form-control"
                       required>
            </div>

            <!-- Phone -->
            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text"
                       name="phone"
                       value="{{ $organization->phone }}"
                       class="form-control"
                       required>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       value="{{ $organization->email }}"
                       class="form-control"
                       required>
            </div>

            <!-- Logo -->
            <div class="col-md-6">
                <label class="form-label">Logo</label>

                @if($organization->logo)
                    <div class="mb-2">
                        <img src="{{ asset('uploads/users/'.$organization->logo) }}"
                             width="60"
                             class="rounded">
                    </div>
                @endif

                <input type="file" name="logo" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="role" class="form-label">Assign Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="" disabled>Select a Role</option>

                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ $organization->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Submit -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">
                    Update Organization
                </button>
            </div>

        </form>

    </div>

@endsection
