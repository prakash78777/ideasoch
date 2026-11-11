@extends('admin.layouts.app')

@section('title', 'Edit Business Idea')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Business Idea</h1>
        <p>Update business idea details</p>
    </div>

    <a href="{{ route('admin.businesses') }}" class="btn btn-secondary">
        ← Back to All Ideas
    </a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-card">

    <form
        action="{{ route('admin.businesses.update', $business) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- Business Name --}}
            <div class="form-group full">
                <label>Business Name <span>*</span></label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $business->name) }}"
                    placeholder="Enter business name"
                    required
                >
            </div>

            {{-- Category --}}
            <div class="form-group">
                <label>Category <span>*</span></label>

                <select name="category" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category }}"
                            {{ old('category', $business->category) == $category ? 'selected' : '' }}
                        >
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Business Type --}}
            <div class="form-group">
                <label>Business Type</label>

                <input
                    type="text"
                    name="business_type"
                    value="{{ old('business_type', $business->business_type) }}"
                    placeholder="e.g. Retail, Service, Online"
                >
            </div>

            {{-- Location --}}
            <div class="form-group">
                <label>Location</label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location', $business->location) }}"
                    placeholder="e.g. India"
                >
            </div>

            {{-- Time --}}
            <div class="form-group">
                <label>Time Required</label>

                <input
                    type="text"
                    name="time"
                    value="{{ old('time', $business->time) }}"
                    placeholder="e.g. 1-2 Months"
                >
            </div>

            {{-- Profit --}}
            <div class="form-group full">
                <label>Expected Profit</label>

                <input
                    type="text"
                    name="profit"
                    value="{{ old('profit', $business->profit) }}"
                    placeholder="e.g. ₹20,000 - ₹40,000 / month"
                >
            </div>

            {{-- Minimum Investment --}}
            <div class="form-group">
                <label>Minimum Investment <span>*</span></label>

                <input
                    type="number"
                    name="investment_min"
                    value="{{ old('investment_min', $business->investment_min) }}"
                    min="0"
                    required
                >
            </div>

            {{-- Maximum Investment --}}
            <div class="form-group">
                <label>Maximum Investment <span>*</span></label>

                <input
                    type="number"
                    name="investment_max"
                    value="{{ old('investment_max', $business->investment_max) }}"
                    min="0"
                    required
                >
            </div>

            {{-- Description --}}
            <div class="form-group full">
                <label>Description <span>*</span></label>

                <textarea
                    name="description"
                    rows="7"
                    placeholder="Enter complete business description"
                    required
                >{{ old('description', $business->description) }}</textarea>
            </div>

            {{-- Current Image --}}
            <div class="form-group full">
                <label>Current Image</label>

                @if($business->image)

                    @php
                        $imagePath = $business->image;

                        if (!str_starts_with($imagePath, 'businesses/')) {
                            $imagePath = 'businesses/' . $imagePath;
                        }
                    @endphp

                    <div class="current-image-box">
                        <img
                            src="{{ asset('storage/' . $imagePath) }}"
                            alt="{{ $business->name }}"
                            class="current-image"
                            onerror="this.style.display='none';"
                        >
                    </div>

                @else

                    <div class="no-image">
                        No image uploaded
                    </div>

                @endif
            </div>

            {{-- New Image --}}
            <div class="form-group full">
                <label>Change Image</label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small>
                    JPG, JPEG, PNG or WEBP — Maximum 4MB
                </small>

                <div id="imagePreview" class="preview-box"></div>
            </div>

            {{-- Status --}}
            <div class="form-group full">
                <label class="checkbox-label">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        {{ old('status', $business->status) ? 'checked' : '' }}
                    >

                    <span>Active Business Idea</span>

                </label>
            </div>

        </div>

        <div class="form-actions">

            <a
                href="{{ route('admin.businesses') }}"
                class="btn btn-cancel"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Business Idea
            </button>

        </div>

    </form>

</div>


<style>

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    gap: 20px;
}

.page-header h1 {
    margin: 0;
    font-size: 28px;
    color: #111827;
}

.page-header p {
    margin: 6px 0 0;
    color: #6b7280;
}

.form-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 30px;
    box-shadow: 0 4px 18px rgba(0,0,0,.06);
    border: 1px solid #e5e7eb;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-group label span {
    color: #ef4444;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    background: #fff;
    box-sizing: border-box;
    transition: .2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

.form-group textarea {
    resize: vertical;
    min-height: 150px;
}

.form-group small {
    margin-top: 7px;
    color: #6b7280;
    font-size: 12px;
}

.current-image-box {
    margin-top: 5px;
    width: 180px;
    height: 120px;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
}

.current-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    padding: 20px;
    background: #f9fafb;
    border: 1px dashed #d1d5db;
    border-radius: 8px;
    color: #6b7280;
}

.preview-box {
    margin-top: 15px;
}

.preview-box img {
    width: 180px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}

.checkbox-label {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.checkbox-label input {
    width: 18px;
    height: 18px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 30px;
    padding-top: 22px;
    border-top: 1px solid #e5e7eb;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 18px;
    border-radius: 8px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-primary:hover {
    background: #1d4ed8;
}

.btn-secondary {
    background: #f3f4f6;
    color: #374151;
}

.btn-secondary:hover {
    background: #e5e7eb;
}

.btn-cancel {
    background: #f3f4f6;
    color: #374151;
}

.btn-cancel:hover {
    background: #e5e7eb;
}

.alert {
    padding: 14px 18px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
}

.alert-danger ul {
    margin: 8px 0 0 20px;
}

@media (max-width: 768px) {

    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full {
        grid-column: auto;
    }

    .form-card {
        padding: 20px;
    }

    .form-actions {
        flex-direction: column;
    }

    .form-actions .btn {
        width: 100%;
    }
}

</style>


<script>

document.getElementById('image').addEventListener('change', function(event) {

    const preview = document.getElementById('imagePreview');

    preview.innerHTML = '';

    const file = event.target.files[0];

    if (!file) {
        return;
    }

    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    if (!allowedTypes.includes(file.type)) {
        alert('Please select JPG, JPEG, PNG or WEBP image.');
        event.target.value = '';
        return;
    }

    if (file.size > 4 * 1024 * 1024) {
        alert('Image size must be less than 4MB.');
        event.target.value = '';
        return;
    }

    const img = document.createElement('img');

    img.src = URL.createObjectURL(file);

    preview.appendChild(img);

});

</script>

@endsection