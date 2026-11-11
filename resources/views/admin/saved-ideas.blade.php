
@extends('admin.layouts.app')

@section('title', 'Saved Ideas')

@section('content')
<style>
.si-page { color:#142238; }
.si-header {
    display:flex; justify-content:space-between; align-items:center;
    flex-wrap:wrap; gap:15px; margin-bottom:24px;
}
.si-header h1 { margin:0 0 6px; font-size:30px; }
.si-muted { color:#64748b; margin:0; }
.si-card {
    background:#fff; border:1px solid #dce5f0;
    border-radius:14px; overflow:hidden;
}
.si-card-head {
    padding:22px 24px; border-bottom:1px solid #e2e8f0;
}
.si-card-head h2 { margin:0 0 5px; font-size:20px; }
.si-filters {
    display:flex; gap:10px; flex-wrap:wrap;
    padding:18px 22px; border-bottom:1px solid #e2e8f0;
}
.si-filters input {
    flex:1; min-width:220px; padding:11px 13px;
    border:1px solid #cbd5e1; border-radius:8px; font:inherit;
}
.si-btn {
    display:inline-flex; align-items:center; justify-content:center;
    padding:10px 14px; border:0; border-radius:7px;
    text-decoration:none; font-size:13px; font-weight:600; cursor:pointer;
}
.si-primary { background:#3867f5; color:white; }
.si-delete { background:#fee2e2; color:#b91c1c; }
.si-table-wrap { overflow-x:auto; }
.si-table { width:100%; border-collapse:collapse; }
.si-table th,.si-table td {
    padding:15px; text-align:left; vertical-align:middle;
    border-bottom:1px solid #edf0f5; font-size:14px;
}
.si-table th {
    background:#f8fafc; color:#64748b;
    text-transform:uppercase; font-size:12px; white-space:nowrap;
}
.si-status {
    display:inline-block; padding:5px 10px; border-radius:20px;
    background:#d1fae5; color:#047857; font-size:12px;
}
.si-empty { text-align:center; padding:45px 20px; color:#64748b; }
.si-alert { padding:13px 16px; border-radius:8px; margin-bottom:18px; }
.si-success { background:#d1fae5; color:#047857; }
.si-error { background:#fee2e2; color:#b91c1c; }
@media(max-width:700px) {
    .si-header h1 { font-size:25px; }
}
</style>

<div class="si-page">
    <div class="si-header">
        <div>
            <h1>Saved Ideas</h1>
            <p class="si-muted">Manage business ideas saved by users.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="si-alert si-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="si-alert si-error">{{ session('error') }}</div>
    @endif

    <div class="si-card">
        <div class="si-card-head">
            <h2>All Saved Ideas</h2>
            <p class="si-muted">Total records: {{ $savedIdeas->total() }}</p>
        </div>

        <form class="si-filters" method="GET"
              action="{{ route('admin.saved-ideas') }}">
            <input type="search" name="search"
                   value="{{ request('search') }}"
                   placeholder="Search user name, email or business idea">

            <button class="si-btn si-primary" type="submit">Search</button>

            <a class="si-btn" style="background:#eff6ff;color:#1d4ed8"
               href="{{ route('admin.saved-ideas') }}">Reset</a>
        </form>

        @if($savedIdeas->count())
            <div class="si-table-wrap">
                <table class="si-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Business Idea</th>
                            <th>Category</th>
                            <th>Investment</th>
                            <th>Saved Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($savedIdeas as $saved)
                            <tr>
                                <td>{{ $savedIdeas->firstItem() + $loop->index }}</td>
                                <td>
                                    <strong>{{ $saved->user->name ?? 'User deleted' }}</strong>
                                    <br>
                                    <small>{{ $saved->user->email ?? '—' }}</small>
                                </td>
                                <td>
                                    <strong>{{ $saved->business->name ?? 'Business deleted' }}</strong>
                                </td>
                                <td>{{ $saved->business->category ?? '—' }}</td>
                                <td>
                                    @if($saved->business)
                                        ₹{{ number_format($saved->business->investment_min) }}
                                        –
                                        ₹{{ number_format($saved->business->investment_max) }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>{{ $saved->created_at?->format('d M Y') ?? '—' }}</td>
                                <td>
                                    <form method="POST"
                                          action="{{ route('admin.saved-ideas.destroy', $saved->id) }}"
                                          onsubmit="return confirm('Delete this saved idea record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="si-btn si-delete" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="padding:20px">
                {{ $savedIdeas->links() }}
            </div>
        @else
            <div class="si-empty">
                <h3>No Saved Ideas Found</h3>
                <p>Saved ideas will appear here when users save business ideas.</p>
            </div>
        @endif
    </div>
</div>
@endsection
