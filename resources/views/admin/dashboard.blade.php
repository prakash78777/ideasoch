@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Admin Dashboard')

@php
    use App\Models\Business;
    use App\Models\User;

    $totalBusinesses = Business::count();
    $totalUsers = User::count();
    $totalCategories = Business::distinct('category')->count('category');
    $activeBusinesses = Business::where('status', true)->count();

    $recentBusinesses = Business::latest()->take(5)->get();

    $categoryStats = Business::selectRaw('category, COUNT(*) as total')
        ->groupBy('category')
        ->orderByDesc('total')
        ->take(7)
        ->get();

    $categoryColors = [
        '#0969f9', '#ff9f1c', '#18a0fb',
        '#6554c0', '#6485a6', '#e47b50', '#26b99a'
    ];

    $chartTotal = max(1, (int) $categoryStats->sum('total'));
    $chartStart = 0;
    $chartSegments = [];

    foreach ($categoryStats as $i => $category) {
        $percentage = ($category->total / $chartTotal) * 100;
        $chartEnd = $chartStart + $percentage;

        $chartSegments[] = $categoryColors[$i % count($categoryColors)]
            . ' ' . $chartStart . '% ' . $chartEnd . '%';

        $chartStart = $chartEnd;
    }

    $donutGradient = count($chartSegments)
        ? 'conic-gradient(' . implode(', ', $chartSegments) . ')'
        : 'conic-gradient(#dbeafe 0% 100%)';
@endphp

@section('content')

<style>


.businessa{
   background-color: #07834b !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}


.businessb{
       background-color: #0015ff !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}


.businessc{
       background-color: #ffd900 !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}


.businessd{
       background-color: #330e6b !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}



.businesse{
       background-color: #ff00dd !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}


.businessf{
       background-color: #00e1ff !important;
   color: #fff !important;
   font-weight: 900 !important;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 18px !important;
}



.welcome-banner h2{
    font-size:25px;
    font-weight: 800;
}



    .dashboard-page { color: #142a47; }

    .welcome-banner {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 25px 28px;
        margin-bottom: 23px;
        border-radius: 18px;
        background: linear-gradient(115deg,#e2eaff,#eff6ff 60%,#e5f8ff);
    }


    

    .welcome-banner h1 {
        margin: 0 0 9px;
        color: #10233f;
        font-size: clamp(23px,2.2vw,31px);
        font-weight: 850;
        letter-spacing: -.7px;
    }

    .welcome-banner p { margin: 0; color: #536b89; font-size: 14px; }

    .date-box {
        flex-shrink: 0;
        padding: 14px 17px;
        border: 1px solid white;
        border-radius: 14px;
        background: rgba(255,255,255,.8);
        color: #304967;
        font-size: 12px;
        line-height: 1.7;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4,minmax(0,1fr));
        gap: 18px;
        margin-bottom: 22px;
    }

    .dashboard-stat {
        min-width: 0;
        min-height: 137px;
        display: flex;
        align-items: center;
        gap: 17px;
        padding: 20px;
        border: 1px solid #e7edf6;
        border-radius: 17px;
        box-shadow: 0 6px 22px rgba(32,65,110,.06);
        transition: transform .2s;
    }

    .dashboard-stat:hover { transform: translateY(-3px); }
    .stat-blue { background: linear-gradient(130deg,#fff,#edf4ff); }
    .stat-green { background: linear-gradient(130deg,#fff,#e7fbf0); }
    .stat-orange { background: linear-gradient(130deg,#fff,#fff1e5); }
    .stat-purple { background: linear-gradient(130deg,#fff,#f0ebff); }

    .stat-icon-box {
        display: grid;
        place-items: center;
        flex: 0 0 58px;
        width: 58px;
        height: 58px;
        border-radius: 16px;
        font-size: 28px;
    }

    .stat-blue .stat-icon-box { background:#015de6; }
    .stat-green .stat-icon-box { background:#0ce67c; }
    .stat-orange .stat-icon-box { background:#ec7b02; }
    .stat-purple .stat-icon-box { background:#44396e; }

    .stat-label { display:block; color:#536781; font-size:12px; margin-bottom:6px; }
    .stat-value { color:#10233f; font-size:32px; line-height:1.1; font-weight:850; }
    .stat-footnote { display:block; color:#078b51; font-size:10px; margin-top:8px; }

    .quick-buttons {
        display:flex;
        align-items:center;
        gap:13px;
        flex-wrap:wrap;
        margin-bottom:22px;
    }

    .quick-button {
        min-height:47px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:9px;
        padding:13px 19px;
        border-radius:11px;
        color:white;
        font-size:12px;
        font-weight:800;
        transition:transform .2s,filter .2s;
    }

    .quick-button:hover { transform:translateY(-2px); filter:brightness(.97); }
    .quick-button.add { background:linear-gradient(100deg,#05a96a,#10b981); }
    .quick-button.manage { background:linear-gradient(100deg,#0969f9,#1760e9); }
    .quick-button.users { background:#e4ebf5; color:#28435f; }
    .quick-button.categories { background:linear-gradient(100deg,#7454f1,#6044d6); }

    .dashboard-columns {
        display:grid;
        grid-template-columns:minmax(0,1.6fr) minmax(300px,.95fr);
        align-items:start;
        gap:20px;
    }

    .dashboard-panel {
        min-width:0;
        margin-bottom:20px;
        overflow:hidden;
        border:1px solid #e7edf5;
        border-radius:17px;
        background:white;
        box-shadow:0 7px 24px rgba(32,65,110,.055);
    }

    .dashboard-panel-header {
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        padding:18px 20px;
        border-bottom:1px solid #edf1f6;
    }

    .dashboard-panel-header h2 {
        margin:0;
        color:#10233f;
        font-size:15px;
        font-weight:850;
    }

    .view-all {
        flex-shrink:0;
        padding:9px 12px;
        border-radius:9px;
        background:#f0f5fc;
        color:#304967;
        font-size:10px;
        font-weight:800;
    }

    .dashboard-table-wrap { width:100%; overflow-x:auto; }

    .dashboard-table {
        width:100%;
        min-width:690px;
        border-collapse:collapse;
    }

    .dashboard-table th {
        padding:13px 11px;
        background:#f7f9fc;
        color:#62758e;
        text-align:left;
        font-size:10px;
        font-weight:850;
        text-transform:uppercase;
        white-space:nowrap;
    }

    .dashboard-table td {
        padding:12px 11px;
        border-top:1px solid #edf1f6;
        color:#314967;
        font-size:11px;
        vertical-align:middle;
    }

    .dashboard-table tbody tr:hover { background:#fafcff; }

    .business-image {
        display:block;
        width:49px;
        height:49px;
        border-radius:10px;
        object-fit:cover;
        background:#edf3fa;
    }

    .business-name {
        display:block;
        max-width:155px;
        color:#172d49;
        font-size:11px;
        line-height:1.5;
        font-weight:800;
    }

    .category-pill {
        display:inline-block;
        padding:7px 9px;
        border-radius:30px;
        background:#e5efff;
        color:#1262cf;
        font-size:10px;
        font-weight:800;
        white-space:nowrap;
    }

    .status-pill {
        display:inline-block;
        padding:6px 10px;
        border-radius:30px;
        background:#d9f9e8;
        color:#07834b;
        font-size:10px;
        font-weight:850;
    }

    .status-pill.inactive { background:#ffebee; color:#bf2738; }

    .table-action {
        display:inline-grid;
        place-items:center;
        width:31px;
        height:31px;
        margin:2px;
        border-radius:8px;
        background:#edf3fc;
        color:#1769f5;
        font-size:15px;
    }

    .table-action.edit { background:#2679fa; color:#fff; }
    .table-action.delete { background:#ff3548; color:#fff; }

    .empty-state { padding:30px; text-align:center; color:#71839a; }

    .category-chart-body { padding:20px; }

    .category-chart-layout {
        display:flex;
        align-items:center;
        justify-content:center;
        gap:22px;
        flex-wrap:wrap;
    }

    .donut-chart {
        position:relative;
        display:grid;
        place-items:center;
        flex:0 0 165px;
        width:165px;
        height:165px;
        border-radius:50%;
        background: {{ $donutGradient }};
    }

    .donut-chart::before {
        content:"";
        position:absolute;
        width:94px;
        height:94px;
        border-radius:50%;
        background:#fff;
    }

    .donut-center { z-index:1; text-align:center; }
    .donut-center strong { display:block; color:#10233f; font-size:23px; }
    .donut-center span { color:#71839a; font-size:10px; }

    .category-legend { flex:1; min-width:145px; }

    .legend-item {
        display:flex;
        align-items:center;
        gap:8px;
        margin:12px 0;
        color:#506783;
        font-size:11px;
    }

    .legend-dot { flex-shrink:0; width:10px; height:10px; border-radius:50%; }
    .legend-name { flex:1; }
    .legend-item strong { color:#344c69; }

    .quick-actions-grid {
        display:grid;
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:10px;
        padding:15px;
    }

    .quick-action-card {
        min-width:0;
        display:flex;
        align-items:center;
        gap:9px;
        padding:12px 10px;
        border:1px solid #edf1f6;
        border-radius:12px;
        background: #ededed;
        color:#203a59;
        transition:transform .2s,box-shadow .2s;
    }

    .quick-action-card:hover {
        transform:translateY(-2px);
        box-shadow:0 5px 14px rgba(30,65,110,.08);
    }

    .quick-action-icon {
        display:grid;
        place-items:center;
        flex:0 0 38px;
        width:38px;
        height:38px;
        border-radius:10px;
        background:#e1edff;
        font-size:18px;
    }

    .quick-action-card strong { display:block; font-size:10px; line-height:1.5; }
    .quick-action-card small { display:block; margin-top:3px; color:#71839a; font-size:9px; line-height:1.4; }

    @media(max-width:1250px) {
        .dashboard-stats { grid-template-columns:repeat(2,minmax(0,1fr)); }
        .dashboard-columns { grid-template-columns:1fr; }
    }

    @media(max-width:650px) {
        .welcome-banner { align-items:flex-start; flex-direction:column; padding:20px; }
        .dashboard-stats { grid-template-columns:1fr; gap:12px; }
        .dashboard-stat { min-height:105px; }
        .quick-buttons { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:8px; }
        .quick-button { padding:12px 7px; font-size:10px; }
        .category-chart-layout { gap:15px; }
    }
</style>

<div class="dashboard-page">

    <section class="welcome-banner">
        <div>
            {{-- <h1>Welcome back, {{ auth()->user()->name ?? '' }}! 👋</h1> --}}
            <h2>Here's what's happening with your IdeaSoch platform today.</h2>
        </div>

        <div class="date-box">
            📅 <strong>{{ now()->format('l, d F Y') }}</strong><br>
            <span>Have a productive day!</span>
        </div>
    </section>

    <section class="dashboard-stats">
        <div class="dashboard-stat stat-blue">
            <div class="stat-icon-box">💡</div>
            <div>
                <span class="stat-label">Total Business Ideas</span>
                <div class="stat-value">{{ number_format($totalBusinesses) }}</div>
                <span class="stat-footnote">↗ Business ideas in database</span>
            </div>
        </div>

        <div class="dashboard-stat stat-green">
            <div class="stat-icon-box">👥</div>
            <div>
                <span class="stat-label">Total Users</span>
                <div class="stat-value">{{ number_format($totalUsers) }}</div>
                <span class="stat-footnote">Registered users</span>
            </div>
        </div>

        <div class="dashboard-stat stat-orange">
            <div class="stat-icon-box">📁</div>
            <div>
                <span class="stat-label">Categories</span>
                <div class="stat-value">{{ number_format($totalCategories) }}</div>
                <span class="stat-footnote">Business categories</span>
            </div>
        </div>

        <div class="dashboard-stat stat-purple">
            <div class="stat-icon-box">☑️</div>
            <div>
                <span class="stat-label">Active Ideas</span>
                <div class="stat-value">{{ number_format($activeBusinesses) }}</div>
                <span class="stat-footnote">Currently active</span>
            </div>
        </div>
    </section>

    <section class="quick-buttons">
        <a href="{{ route('admin.businesses.create') }}" class="quick-button add">＋ Add Business Idea</a>
        <a href="{{ route('admin.businesses') }}" class="quick-button manage">▤ Manage Ideas</a>
        <a href="{{ route('admin.users') }}" class="quick-button users">👥 View Users</a>
        <a href="{{ route('admin.categories') }}" class="quick-button categories">📁 Manage Categories</a>
    </section>

    <section class="dashboard-columns">

        <div class="dashboard-panel">
            <div class="dashboard-panel-header">
                <h2>▤ Recent Business Ideas</h2>
                <a href="{{ route('admin.businesses') }}" class="view-all">View All →</a>
            </div>

            <div class="dashboard-table-wrap">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Business</th>
                            <th>Category</th>
                            <th>Investment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBusinesses as $business)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($business->image)
                                        @php
                                            $imagePath = $business->image;
                                            if (!str_starts_with($imagePath, 'businesses/')) {
                                                $imagePath = 'businesses/' . $imagePath;
                                            }
                                        @endphp
                                        <img
                                            src="{{ asset('storage/' . $imagePath) }}"
                                            alt="{{ $business->name }}"
                                            class="business-image"
                                            loading="lazy"
                                            onerror="this.style.display='none';"
                                        >
                                    @else
                                        <div class="business-image"></div>
                                    @endif
                                </td>
                                <td>
                                    <span class="business-name">{{ $business->name }}</span>
                                </td>
                                <td>
                                    <span class="category-pill">{{ $business->category ?: 'Other' }}</span>
                                </td>
                                <td>
                                    ₹{{ number_format((float)$business->investment_min) }}
                                    - ₹{{ number_format((float)$business->investment_max) }}
                                </td>
                                <td>
                                    <span class="status-pill {{ $business->status ? '' : 'inactive' }}">
                                        {{ $business->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.businesses.edit', $business) }}" class="table-action edit" title="Edit">✎</a>
                                    <a href="{{ route('admin.businesses') }}" class="table-action" title="Manage ideas">↗</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-state">No business ideas found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <div class="dashboard-panel">
                <div class="dashboard-panel-header">
                    <h2>◔ Ideas by Category</h2>
                    <a href="{{ route('admin.categories') }}" class="view-all">View All →</a>
                </div>

                <div class="category-chart-body">
                    <div class="category-chart-layout">
                        <div class="donut-chart">
                            <div class="donut-center">
                                <strong>{{ number_format($totalBusinesses) }}</strong>
                                <span>Total Ideas</span>
                            </div>
                        </div>

                        <div class="category-legend">
                            @forelse($categoryStats as $i => $category)
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:{{ $categoryColors[$i % count($categoryColors)] }}"></span>
                                    <span class="legend-name">{{ \Illuminate\Support\Str::limit($category->category ?: 'Other', 24) }}</span>
                                    <strong>{{ $category->total }}</strong>
                                </div>
                            @empty
                                <p>No categories available.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-panel">
                <div class="dashboard-panel-header">
                    <h2>⚡ Quick Actions</h2>
                </div>

                <div class="quick-actions-grid">
                    <a href="{{ route('admin.businesses.create') }}" class="quick-action-card">
                        <span class="quick-action-icon businessa">＋</span>
                        <span><strong>Add New Idea</strong><small>Create a business idea</small></span>
                    </a>

                    <a href="{{ route('admin.businesses') }}" class="quick-action-card">
                        <span class="quick-action-icon businessb">▤</span>
                        <span><strong>Manage Ideas</strong><small>View and edit ideas</small></span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="quick-action-card">
                        <span class="quick-action-icon businessc">👥</span>
                        <span><strong>Manage Users</strong><small>User management</small></span>
                    </a>

                    <a href="{{ route('admin.categories') }}" class="quick-action-card">
                        <span class="quick-action-icon businessd">📁</span>
                        <span><strong>Categories</strong><small>Business categories</small></span>
                    </a>

                    <a href="{{ route('admin.locations') }}" class="quick-action-card">
                        <span class="quick-action-icon businesse">📍</span>
                        <span><strong>Locations</strong><small>Manage locations</small></span>
                    </a>

                    <a href="{{ route('admin.budgets') }}" class="quick-action-card">
                        <span class="quick-action-icon businessf">💰</span>
                        <span><strong>Budgets</strong><small>Investment ranges</small></span>
                    </a>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection