@extends('admin.layouts.app')

@section('title', 'Budgets')

@section('content')

@php

    $budgetRanges = [
        'Under ₹10K',
        '₹10K - ₹50K',
        '₹50K - ₹1L',
        '₹1L - ₹5L',
        '₹5L - ₹10L',
        '₹10L - ₹50L',
        '₹50L - ₹1Cr',
        '₹1Cr+',
    ];

    $budgetData = collect($budgets)->keyBy('budget_range');

    $totalIdeas = collect($budgets)->sum('total');

    $activeRanges = collect($budgets)->count();

@endphp


<div class="page-header">

    <div>
        <h1>Budgets</h1>
        <p>Manage and view business ideas by investment budget</p>
    </div>

    <a
        href="{{ route('admin.businesses') }}"
        class="btn btn-primary"
    >
        View All Ideas
    </a>

</div>


{{-- Statistics --}}

<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon budget-icon">
            💰
        </div>

        <div>
            <h2>{{ $activeRanges }}</h2>
            <p>Budget Ranges Used</p>
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon ideas-icon">
            📊
        </div>

        <div>
            <h2>{{ $totalIdeas }}</h2>
            <p>Business Ideas</p>
        </div>

    </div>

</div>


{{-- Budget Cards --}}

<div class="budget-grid">

    @foreach($budgetRanges as $index => $range)

        @php
            $count = $budgetData->get($range)->total ?? 0;
        @endphp

        <div class="budget-card">

            <div class="budget-card-top">

                <div class="budget-number">
                    {{ $index + 1 }}
                </div>

                <div class="budget-icon-box">
                    💰
                </div>

            </div>


            <div class="budget-content">

                <h3>
                    {{ $range }}
                </h3>

                <div class="idea-count">
                    {{ $count }}
                </div>

                <span>
                    Business Ideas
                </span>

            </div>


            <div class="budget-footer">

                @if($count > 0)

                    <span class="status active">
                        ● Available
                    </span>

                @else

                    <span class="status empty">
                        ● No Ideas
                    </span>

                @endif

            </div>

        </div>

    @endforeach

</div>


{{-- Detailed Table --}}

<div class="table-card">

    <div class="table-header">

        <div>
            <h2>Budget Overview</h2>
            <p>
                Business ideas grouped by maximum investment
            </p>
        </div>

        <span class="total-badge">
            {{ $totalIdeas }} Ideas
        </span>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>#</th>
                    <th>Budget Range</th>
                    <th>Business Ideas</th>
                    <th>Status</th>
                </tr>

            </thead>


            <tbody>

                @foreach($budgetRanges as $index => $range)

                    @php
                        $count = $budgetData->get($range)->total ?? 0;
                    @endphp

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>

                            <div class="range-name">

                                <div class="folder-icon">
                                    💰
                                </div>

                                <strong>
                                    {{ $range }}
                                </strong>

                            </div>

                        </td>

                        <td>

                            <span class="count-badge">
                                {{ $count }}
                            </span>

                        </td>

                        <td>

                            @if($count > 0)

                                <span class="status active">
                                    Active
                                </span>

                            @else

                                <span class="status empty">
                                    Empty
                                </span>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>


<style>

/* =========================================
   PAGE HEADER
========================================= */

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
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
   BUTTON
========================================= */

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border: none;
}

.btn-primary {
    background: #2563eb;
    color: #fff;
}

.btn-primary:hover {
    background: #1d4ed8;
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
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
}

.stat-icon {
    width: 54px;
    height: 54px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    background: #eff6ff;
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
   BUDGET GRID
========================================= */

.budget-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 25px;
}

.budget-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    transition: 0.2s ease;
}

.budget-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.08);
}

.budget-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.budget-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 700;
}

.budget-icon-box {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: #fff7ed;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.budget-content {
    margin-top: 20px;
}

.budget-content h3 {
    margin: 0;
    font-size: 17px;
    color: #111827;
}

.idea-count {
    margin-top: 15px;
    font-size: 28px;
    font-weight: 700;
    color: #2563eb;
}

.budget-content span {
    color: #6b7280;
    font-size: 13px;
}

.budget-footer {
    border-top: 1px solid #e5e7eb;
    margin-top: 18px;
    padding-top: 13px;
}


/* =========================================
   STATUS
========================================= */

.status {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status.active {
    color: #15803d;
    background: #dcfce7;
}

.status.empty {
    color: #6b7280;
    background: #f3f4f6;
}


/* =========================================
   TABLE
========================================= */

.table-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
}

.table-header {
    padding: 22px 24px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: space-between;
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
    letter-spacing: 0.3px;
}

td {
    padding: 15px 18px;
    border-top: 1px solid #edf0f3;
    font-size: 14px;
    color: #374151;
}

tr:hover {
    background: #fafafa;
}

.range-name {
    display: flex;
    align-items: center;
    gap: 12px;
}

.folder-icon {
    width: 38px;
    height: 38px;
    background: #eff6ff;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.count-badge {
    display: inline-flex;
    min-width: 32px;
    height: 28px;
    padding: 0 9px;
    align-items: center;
    justify-content: center;
    background: #eff6ff;
    color: #2563eb;
    border-radius: 20px;
    font-weight: 700;
    font-size: 13px;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 1100px) {

    .budget-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


@media (max-width: 700px) {

    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .budget-grid {
        grid-template-columns: 1fr;
    }

    .table-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

}

</style>

@endsection