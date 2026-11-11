@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

<div class="page-header">

    <div>
        <h1>Categories</h1>
        <p>Manage business idea categories</p>
    </div>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        + Add Category
    </a>

</div>


{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success">
        ✓ {{ session('success') }}
    </div>
@endif


{{-- Error Message --}}
@if(session('error'))
    <div class="alert alert-danger">
        ⚠ {{ session('error') }}
    </div>
@endif


{{-- Validation Errors --}}
@if($errors->any())
    <div class="alert alert-danger">

        <strong>Please fix the following:</strong>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif


<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon">📁</div>

        <div>
            <div class="stat-number">
                {{ $categories->count() }}
            </div>

            <div class="stat-label">
                Total Categories
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">✓</div>

        <div>
            <div class="stat-number">
                {{ $categories->where('status', true)->count() }}
            </div>

            <div class="stat-label">
                Active Categories
            </div>
        </div>
    </div>

</div>


<div class="table-card">

    <div class="table-header">

        <div>
            <h2>All Categories</h2>

            <p>
                Manage all business categories
            </p>
        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="btn btn-primary"
        >
            + Add Category
        </a>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Business Ideas</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $index => $category)

                    @php
                        $businessCount = \App\Models\Business::where(
                            'category',
                            $category->name
                        )->count();
                    @endphp

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    📁
                                </div>

                                <div>
                                    <strong>
                                        {{ $category->name }}
                                    </strong>

                                    <small>
                                        ID: {{ $category->id }}
                                    </small>
                                </div>

                            </div>

                        </td>


                        <td>

                            <a
                                href="{{ route('admin.businesses', ['category' => $category->name]) }}"
                                class="business-count"
                            >
                                {{ $businessCount }}
                            </a>

                        </td>


                        <td>

                            @if($category->status)

                                <span class="status active">
                                    Active
                                </span>

                            @else

                                <span class="status inactive">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn btn-edit"
                                >
                                    ✏️ Edit
                                </a>


                                <form
                                    action="{{ route('admin.categories.toggle', $category) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="btn btn-toggle"
                                    >
                                        {{ $category->status ? '🔴 Disable' : '🟢 Activate' }}
                                    </button>

                                </form>


                                <form
                                    action="{{ route('admin.categories.delete', $category) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-delete"
                                    >
                                        🗑 Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="empty">

                            No categories found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<style>

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.page-header h1 {
    margin: 0;
    color: #111827;
    font-size: 28px;
}

.page-header p {
    margin: 5px 0 0;
    color: #6b7280;
}


.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
}


.btn-primary {
    background: #2563eb;
    color: #fff;
}

.btn-primary:hover {
    background: #1d4ed8;
}


.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}


.stat-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 3px 12px rgba(0,0,0,.04);
}


.stat-icon {
    width: 48px;
    height: 48px;
    background: #eff6ff;
    color: #2563eb;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}


.stat-number {
    font-size: 25px;
    font-weight: 700;
    color: #111827;
}


.stat-label {
    color: #6b7280;
    font-size: 13px;
    margin-top: 2px;
}


.alert {
    padding: 14px 18px;
    border-radius: 8px;
    margin-bottom: 20px;
}


.alert-success {
    background: #ecfdf5;
    border: 1px solid #a7f3d0;
    color: #047857;
}


.alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #b91c1c;
}


.alert ul {
    margin: 8px 0 0 20px;
}


.table-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 3px 15px rgba(0,0,0,.05);
    overflow: hidden;
}


.table-header {
    padding: 20px 22px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.table-header h2 {
    margin: 0;
    font-size: 18px;
    color: #111827;
}


.table-header p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 13px;
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
    padding: 14px 18px;
    text-align: left;
    color: #64748b;
    font-size: 12px;
    text-transform: uppercase;
    white-space: nowrap;
}


td {
    padding: 16px 18px;
    border-top: 1px solid #edf0f3;
    color: #374151;
    font-size: 14px;
}


.category-name {
    display: flex;
    align-items: center;
    gap: 12px;
}


.category-icon {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background: #eff6ff;
    display: flex;
    align-items: center;
    justify-content: center;
}


.category-name strong {
    display: block;
    color: #111827;
}


.category-name small {
    display: block;
    color: #9ca3af;
    margin-top: 3px;
}


.business-count {
    display: inline-flex;
    min-width: 35px;
    padding: 5px 10px;
    justify-content: center;
    border-radius: 20px;
    background: #eff6ff;
    color: #2563eb;
    font-weight: 700;
    text-decoration: none;
}


.status {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}


.status.active {
    background: #dcfce7;
    color: #15803d;
}


.status.inactive {
    background: #fee2e2;
    color: #b91c1c;
}


.actions {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}


.btn-edit {
    background: #f3f4f6;
    color: #374151;
}


.btn-toggle {
    background: #fff7ed;
    color: #c2410c;
}


.btn-delete {
    background: #fee2e2;
    color: #dc2626;
}


.empty {
    text-align: center;
    padding: 50px !important;
    color: #6b7280;
}


@media (max-width: 900px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .table-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

}

</style>

@endsection