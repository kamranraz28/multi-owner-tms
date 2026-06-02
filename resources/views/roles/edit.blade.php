<<<<<<< HEAD
@extends('layouts.master')

@section('title', 'Edit Role')

@section('content')

<div class="common-container animate__animated animate__fadeInUp" style="max-width: 800px; margin: auto;">

    <h2 class="mb-4 text-center fw-bold" style="letter-spacing: 1px;">Edit Role</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Edit role form starts -->
    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="card p-4 shadow-sm rounded">
        @csrf
        @method('PUT')

        <!-- Role Name Field -->
        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">Role Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-control form-control-lg" required
                style="border-color: {{ $buttonColor }};">
        </div>

        <!-- Permissions Table -->
        <div class="table-responsive mb-4">
            <table id="example" class="table table-hover align-middle" style="width: 100%; min-width: 500px;">
                <thead class="table-primary" style="background-color: {{ $buttonColor }}; color: #fff;">
                    <tr>
                        <th>SL</th>
                        <th>Permission Name</th>
                        <th class="text-center">Select</th>
                    </tr>
                </thead>
                <tbody>
=======
{{-- Edit Role Blade --}}
@extends('layouts.master')
@section('title', 'Edit Role')

@section('content')
    <div class="common-container animate__animated animate__fadeInUp"
         style="max-width: 800px; margin: auto;">

        <h2 class="mb-4 text-center fw-bold">Edit Role</h2>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form id="roleForm"
              action="{{ route('roles.update', $role->id) }}"
              method="POST"
              class="card p-4 shadow-sm rounded">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">Role Name:</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $role->name) }}"
                       class="form-control form-control-lg" required>
            </div>

            {{--
                Hidden input container — এখানে selected permission IDs
                dynamically inject হবে form submit-এর আগে
            --}}
            <div id="hiddenPermissionsContainer"></div>

            <div class="table-responsive mb-4">
                <table id="permissionsTable"
                       class="table table-hover align-middle"
                       style="width: 100%;">
                    <thead class="table-primary">
                    <tr>
                        <th>SL</th>
                        <th>Permission Name</th>
                        <th class="text-center">
                            {{-- Select All checkbox --}}
                            <input type="checkbox" id="selectAll"> All
                        </th>
                    </tr>
                    </thead>
                    <tbody>
>>>>>>> c57bb21 (subscription module)
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">
<<<<<<< HEAD
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg px-4" style="background-color: {{ $buttonColor }}; font-weight: 600; transition: background-color 0.3s ease;">
                Update Role
            </button>
        </div>
    </form>
    <!-- Edit role form ends -->

</div>


=======
                                {{--
                                    name ছাড়া checkbox — form submit-এ directly যাবে না
                                    data-id দিয়ে JS track করবে
                                --}}
                                <input type="checkbox"
                                       class="permission-checkbox"
                                       data-id="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">
                    Update Role
                </button>
            </div>
        </form>
    </div>

    {{-- Pre-selected IDs PHP থেকে JS-এ pass --}}
    <script>
        // Server থেকে already assigned permissions
        const initialSelected = @json($role->permissions->pluck('id'));
        // assets/js/pages/role-edit.js
        // (অথবা blade-এর নিচে <script> tag-এ রাখুন)

        document.addEventListener('DOMContentLoaded', function () {

            // ── ১. State Management ──────────────────────────────────────
            // Set ব্যবহার করলে duplicate হবে না, O(1) lookup পাবেন
            const selectedIds = new Set(initialSelected.map(id => Number(id)));


            // ── ২. DataTable Initialize ──────────────────────────────────
            const table = new DataTable('#permissionsTable', {
                layout: {
                    topStart: {
                        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                    }
                },
                pageLength: 10,

                // Page render হওয়ার পর checkbox state restore করো
                drawCallback: function () {
                    restoreCheckboxState();
                    updateSelectAllState();
                }
            });


            // ── ৩. Checkbox Click Handler ────────────────────────────────
            // "on" ব্যবহার করতে হবে কারণ DataTables DOM re-render করে
            // তাই direct addEventListener কাজ করবে না
            $('#permissionsTable').on('change', '.permission-checkbox', function () {
                const id = Number(this.dataset.id);

                if (this.checked) {
                    selectedIds.add(id);      // Set-এ add
                } else {
                    selectedIds.delete(id);   // Set থেকে remove
                }

                updateSelectAllState();
            });


            // ── ৪. Select All Handler ────────────────────────────────────
            document.getElementById('selectAll').addEventListener('change', function () {
                const isChecked = this.checked;

                // শুধু current page-এর visible checkboxes
                const visibleCheckboxes = document.querySelectorAll('.permission-checkbox');

                visibleCheckboxes.forEach(cb => {
                    cb.checked = isChecked;
                    const id = Number(cb.dataset.id);
                    isChecked ? selectedIds.add(id) : selectedIds.delete(id);
                });
            });


            // ── ৫. Form Submit Handler ───────────────────────────────────
            document.getElementById('roleForm').addEventListener('submit', function () {
                const container = document.getElementById('hiddenPermissionsContainer');
                container.innerHTML = ''; // পুরনো clear করো

                // Set থেকে সব selected IDs hidden input হিসেবে inject করো
                selectedIds.forEach(id => {
                    const input = document.createElement('input');
                    input.type   = 'hidden';
                    input.name   = 'permissions[]';
                    input.value  = id;
                    container.appendChild(input);
                });

                // Form normally submit হবে এখন সব permissions সহ
            });


            // ── Helper: Page change হলে checkbox restore ─────────────────
            function restoreCheckboxState() {
                document.querySelectorAll('.permission-checkbox').forEach(cb => {
                    cb.checked = selectedIds.has(Number(cb.dataset.id));
                });
            }

            // ── Helper: Select All checkbox এর state update ──────────────
            function updateSelectAllState() {
                const all      = document.querySelectorAll('.permission-checkbox');
                const checked  = document.querySelectorAll('.permission-checkbox:checked');
                const selectAllCb = document.getElementById('selectAll');

                if (checked.length === 0) {
                    selectAllCb.indeterminate = false;
                    selectAllCb.checked = false;
                } else if (checked.length === all.length) {
                    selectAllCb.indeterminate = false;
                    selectAllCb.checked = true;
                } else {
                    // কিছু checked, কিছু না — indeterminate state
                    selectAllCb.indeterminate = true;
                }
            }
        });
    </script>
>>>>>>> c57bb21 (subscription module)
@endsection
