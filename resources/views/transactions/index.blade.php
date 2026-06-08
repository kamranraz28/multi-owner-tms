@extends('layouts.master')

@section('title', 'Transactions')

@section('content')
<div class="common-container">
    <h2 class="mb-4 fw-bold">Transaction Management</h2>

    <ul class="nav nav-tabs mb-4" id="transactionTabs">
        <li class="nav-item">
            <a class="nav-link active" href="#" data-status="all">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-status="pending">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-status="approved">Approved</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-status="rejected">Rejected</a>
        </li>
    </ul>

    <div class="table-responsive">
        <table id="transactionsTable" class="table table-striped table-hover" style="width:100%">
            <thead class="table-primary" style="background-color: {{ $buttonColor ?? '#1a56db' }}; color: white;">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Organization</th>
                    <th>Plan</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>TrxID</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->user->name ?? 'N/A' }}</td>
                    <td>{{ $t->organization->name ?? 'N/A' }}</td>
                    <td>{{ $t->plan->name ?? 'N/A' }}</td>
                    <td>৳{{ number_format($t->amount) }}</td>
                    <td style="text-transform:capitalize;">{{ $t->payment_method }}</td>
                    <td><code>{{ $t->transaction_id ?? '—' }}</code></td>
                    <td>
                        @if($t->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($t->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $t->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        @if($t->status === 'pending')
                            <button class="btn btn-sm btn-success" onclick="approveTransaction({{ $t->id }})">
                                <i class="feather icon-check"></i> Approve
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="showRejectModal({{ $t->id }})">
                                <i class="feather icon-x"></i> Reject
                            </button>
                        @else
                            <button class="btn btn-sm btn-outline-secondary" onclick="showDetailModal({{ $t->id }})">
                                <i class="feather icon-eye"></i> View
                            </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-muted py-4">No transactions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Approve Confirmation Modal -->
<div class="modal fade" id="approveModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to approve this transaction? This will activate the subscription.</p>
            </div>
            <div class="modal-footer">
                <form id="approveForm" method="POST">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approve & Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="admin_note" class="form-label">Reason for rejection (optional)</label>
                        <textarea name="admin_note" id="admin_note" class="form-control" rows="3" placeholder="Enter reason..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailModalBody">
            </div>
        </div>
    </div>
</div>

<script>
function approveTransaction(id) {
    document.getElementById('approveForm').action = '{{ url('transactions') }}/' + id + '/approve';
    new bootstrap.Modal(document.getElementById('approveModal')).show();
}

function showRejectModal(id) {
    document.getElementById('rejectForm').action = '{{ url('transactions') }}/' + id + '/reject';
    new bootstrap.Modal(document.getElementById('rejectModal')).show();
}

function showDetailModal(id) {
    fetch('{{ url('transactions') }}/' + id)
        .then(r => r.json())
        .catch(() => {
            document.getElementById('detailModalBody').innerHTML = `
                <div class="text-center text-muted py-4">Detail view coming soon.</div>
            `;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        });
}

// Tab filtering
document.querySelectorAll('#transactionTabs .nav-link').forEach(tab => {
    tab.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('#transactionTabs .nav-link').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const status = this.dataset.status;
        document.querySelectorAll('#transactionsTable tbody tr').forEach(row => {
            if (status === 'all') { row.style.display = ''; return; }
            const badge = row.querySelector('.badge');
            if (!badge) { row.style.display = 'none'; return; }
            const rowStatus = badge.textContent.trim().toLowerCase();
            row.style.display = rowStatus === status ? '' : 'none';
        });
    });
});
</script>

@endsection
