@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

<div class="page-header">

    <div>
        <h1>Users</h1>
        <p>Manage registered users</p>
    </div>

</div>


{{-- Statistics --}}

<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon">
            👥
        </div>

        <div>
            <h2>{{ $users->total() }}</h2>
            <p>Total Users</p>
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon">
            🛡️
        </div>

        <div>
            <h2>
                {{ \App\Models\User::where('is_admin', true)->count() }}
            </h2>
            <p>Administrators</p>
        </div>

    </div>

</div>


{{-- Users Table --}}

<div class="table-card">

    <div class="table-header">

        <div>
            <h2>All Users</h2>
            <p>Registered users on IdeaSoch</p>
        </div>

        <span class="total-badge">
            {{ $users->total() }} Users
        </span>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registered</th>
                </tr>

            </thead>


            <tbody>

                @forelse($users as $index => $user)

                    <tr>

                        <td>
                            {{ $users->firstItem() + $index }}
                        </td>


                        <td>

                            <div class="user-info">

                                <div class="avatar">
                                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                </div>

                                <div>

                                    <strong>
                                        {{ $user->name ?? 'Unknown User' }}
                                    </strong>

                                    <small>
                                        User ID: {{ $user->id }}
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            {{ $user->email }}
                        </td>


                        <td>

                            @if($user->is_admin)

                                <span class="role admin">
                                    Administrator
                                </span>

                            @else

                                <span class="role user">
                                    User
                                </span>

                            @endif

                        </td>


                        <td>

                            {{ $user->created_at
                                ? $user->created_at->format('d M Y')
                                : '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="empty-state">

                            <div class="empty-icon">
                                👥
                            </div>

                            <h3>No Users Found</h3>

                            <p>
                                No registered users are available.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    @if($users->hasPages())

        <div class="pagination">

            {{ $users->links() }}

        </div>

    @endif

</div>


<style>

/* =========================================
   PAGE HEADER
========================================= */

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.page-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 700;
    color: #111827;
}

.page-header p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 14px;
}


/* =========================================
   STATS
========================================= */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}

.stat-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 18px;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
}

.stat-icon {
    width: 54px;
    height: 54px;
    border-radius: 12px;
    background: #eff6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.stat-card h2 {
    margin: 0;
    font-size: 27px;
    color: #111827;
}

.stat-card p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 14px;
}


/* =========================================
   TABLE
========================================= */

.table-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
}

.table-header {
    padding: 22px 24px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-header h2 {
    margin: 0;
    font-size: 19px;
    color: #111827;
}

.table-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.total-badge {
    background: #eff6ff;
    color: #2563eb;
    padding: 7px 13px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #f8fafc;
}

th {
    text-align: left;
    padding: 14px 18px;
    font-size: 12px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: .3px;
}

td {
    padding: 15px 18px;
    border-top: 1px solid #edf0f3;
    font-size: 14px;
    color: #374151;
}

tbody tr:hover {
    background: #fafafa;
}


/* =========================================
   USER
========================================= */

.user-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #2563eb;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 15px;
}

.user-info strong {
    display: block;
    color: #111827;
    font-size: 14px;
}

.user-info small {
    display: block;
    margin-top: 3px;
    color: #9ca3af;
    font-size: 12px;
}


/* =========================================
   ROLE
========================================= */

.role {
    display: inline-flex;
    padding: 6px 11px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.role.admin {
    background: #ede9fe;
    color: #6d28d9;
}

.role.user {
    background: #dcfce7;
    color: #15803d;
}


/* =========================================
   EMPTY
========================================= */

.empty-state {
    text-align: center;
    padding: 60px 20px !important;
}

.empty-icon {
    font-size: 40px;
    margin-bottom: 10px;
}

.empty-state h3 {
    margin: 0;
    color: #111827;
}

.empty-state p {
    margin-top: 5px;
    color: #6b7280;
}


/* =========================================
   PAGINATION
========================================= */

.pagination {
    padding: 20px 24px;
    border-top: 1px solid #e5e7eb;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 700px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .page-header {
        align-items: flex-start;
    }

    .table-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

}

</style>

@endsection