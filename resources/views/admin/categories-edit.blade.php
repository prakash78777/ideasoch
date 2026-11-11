@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="page-header">

    <div>
        <h1>Edit Category</h1>
        <p>Update category information</p>
    </div>

    <a
        href="{{ route('admin.categories') }}"
        class="btn btn-secondary"
    >
        ← Back to Categories
    </a>

</div>


<div class="form-card">

    <form
        action="{{ route('admin.categories.update', $category) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>
                Category Name <span>*</span>
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name) }}"
                required
                autofocus
            >

            @error('name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-actions">

            <a
                href="{{ route('admin.categories') }}"
                class="btn btn-cancel"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Category
            </button>

        </div>

    </form>

</div>


<style>

.page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-header h1 {
    margin:0;
    font-size:28px;
}

.page-header p {
    margin:5px 0 0;
    color:#6b7280;
}

.form-card {
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:14px;
    padding:30px;
    max-width:700px;
    box-shadow:0 4px 15px rgba(0,0,0,.05);
}

.form-group {
    display:flex;
    flex-direction:column;
}

.form-group label {
    font-weight:600;
    margin-bottom:8px;
}

.form-group label span {
    color:#ef4444;
}

.form-group input {
    width:100%;
    box-sizing:border-box;
    padding:13px 14px;
    border:1px solid #d1d5db;
    border-radius:8px;
    font-size:14px;
}

.form-group input:focus {
    outline:none;
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.1);
}

.error {
    color:#dc2626;
    font-size:13px;
    margin-top:7px;
}

.form-actions {
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:25px;
    padding-top:20px;
    border-top:1px solid #e5e7eb;
}

.btn {
    padding:11px 18px;
    border:none;
    border-radius:8px;
    font-weight:600;
    text-decoration:none;
    cursor:pointer;
}

.btn-primary {
    background:#2563eb;
    color:#fff;
}

.btn-secondary,
.btn-cancel {
    background:#f3f4f6;
    color:#374151;
}

</style>

@endsection