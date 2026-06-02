@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-4">
        <h2 class="text-center mb-4" style="font-weight: 700; letter-spacing: 1px; color: #333;">Organization Users</h2>

        @if(session('success'))
            <div class="alert alert-success animate__animated animate__fadeInDown">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary shadow-sm animate__animated animate__fadeInRight"
               href="{{ route('organizationUser.create') }}"
               style="background-color: {{ $buttonColor }}; border-radius: 8px; font-weight: 600;">
                <i class="fas fa-plus me-2"></i> Create organization users
            </a>
        </div>

        <div class="table-responsive shadow-lg rounded-4 animate__animated animate__fadeInUp bg-white p-2">

            <table id="example"
                   class="table table-hover align-middle mb-0"
                   style="width:100%; border-collapse: separate; border-spacing: 0 10px;">

                <thead class="table-dark">
                <tr>
                    <th class="ps-3" style="width: 5%;">SN</th>
                    <th>Organizations User Name</th>
                    <th>Role</th>
                    <th class="text-center" style="width: 20%;">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($organizationUsers as $organizationUser)
                    <tr class="bg-light rounded shadow-sm">
                        <td class="ps-3 fw-semibold"> {{ $loop->iteration }} </td>

                        <td>
                            <div class="fw-bold text-dark">
                                {{ $organizationUser->name ?? '' }}
                            </div>
                            <small class="text-muted">Organization</small>
                        </td>
                        <td>
                            {{-- Role show --}}
                            role
                        </td>
                        <td class="text-center">

                            <a href="#"
                               class="btn btn-sm btn-primary px-3 rounded-pill me-1">
                                View
                            </a>
                            <a href=""
                               class="btn btn-sm btn-warning text-white px-3 rounded-pill me-1">
                                Edit
                            </a>

                            <form action="" method="POST" style="display:inline;">


                                <button type="submit"
                                        class="btn btn-sm btn-danger px-3 rounded-pill"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Animate.css CDN for easy animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        /* Hover effects on rows */
        #example tbody tr:hover {
            background-color: #f0f4ff;
            cursor: pointer;
        }

        /* Buttons scale on hover */
        .btn-warning:hover, .btn-danger:hover, .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        /* Table header text style */
        #example thead th {
            letter-spacing: 1px;
        }
    </style>

    <script>
        // Initialize DataTables if not already initialized
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: "Search permissions...",
                    search: "",
                },
                pageLength: 10,
                lengthChange: false,
            });
        });
    </script>

@endsection
