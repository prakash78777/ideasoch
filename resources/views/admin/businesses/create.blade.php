@extends('admin.layouts.app')

@section('title', 'Add Business Idea')

@section('page-title', 'Add Business Idea')

@section('content')

<style>
    .form-panel {
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
    }

    .form-header {
        padding: 22px 24px;
        border-bottom: 1px solid #e5eaf0;
    }

    .form-header h2 {
        margin: 0 0 5px;
        font-size: 20px;
        color: #172033;
    }

    .form-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .form-body {
        padding: 25px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #172033;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .required {
        color: #dc2626;
    }

    .form-control,
    .form-select,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d7dee8;
        border-radius: 9px;
        padding: 11px 13px;
        background: #ffffff;
        color: #172033;
        font-size: 14px;
        outline: none;
        transition: 0.2s;
    }

    .form-control:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #3b6df6;
        box-shadow: 0 0 0 3px rgba(59, 109, 246, 0.10);
    }

    .form-textarea {
        min-height: 140px;
        resize: vertical;
    }

    .form-help {
        margin-top: 6px;
        font-size: 12px;
        color: #64748b;
    }

    .error-message {
        margin-top: 6px;
        font-size: 12px;
        color: #dc2626;
    }

    .alert-error {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
        padding: 14px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
.image-upload-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 190px;
    padding: 28px 20px;
    box-sizing: border-box;
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    background: #f8fafc;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s ease;
}

.image-upload-box:hover {
    border-color: #3b6df6;
    background: #f0f5ff;
}

.image-icon {
    font-size: 38px;
    line-height: 1;
    margin-bottom: 12px;
}

.image-upload-box strong {
    color: #172033;
    font-size: 15px;
}

.image-upload-box .form-help {
    margin-top: 8px;
    color: #64748b;
}

.image-preview {
    display: none;
    width: auto;
    max-width: 220px;
    max-height: 150px;
    margin: 18px auto 0;
    object-fit: contain;
    border-radius: 10px;
    border: 1px solid #d7dee8;
    background: #fff;
}
    .status-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 15px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
    }

    .status-box input {
        width: 18px;
        height: 18px;
        accent-color: #16a34a;
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 10px;
        border-top: 1px solid #e5eaf0;
        margin-top: 5px;
    }

    .btn-large {
        padding: 11px 18px !important;
        font-size: 14px !important;
    }

    @media (max-width: 800px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-body {
            padding: 18px;
        }

        .form-footer {
            justify-content: stretch;
            flex-direction: column-reverse;
        }

        .form-footer a,
        .form-footer button {
            width: 100%;
            text-align: center;
        }
    }
</style>


{{-- Error Message --}}
@if($errors->any())

    <div class="alert-error">

        <strong>⚠️ Please fix the following errors:</strong>

        <ul style="margin:10px 0 0 20px;">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<div class="form-panel">

    {{-- Header --}}
    <div class="form-header">

        <h2>
            ➕ Add New Business Idea
        </h2>

        <p>
            Add a new business idea to your IdeaSoch platform.
        </p>

    </div>


    {{-- Form --}}
    <div class="form-body">

        <form
            action="{{ route('admin.businesses.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-grid">


                {{-- Business Name --}}
                <div class="form-group">

                    <label class="form-label">
                        Business Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Example: Home Tiffin Service"
                        required
                    >

                    @error('name')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Category --}}
                <div class="form-group">

                    <label class="form-label">
                        Category
                        <span class="required">*</span>
                    </label>

                    <select
                        name="category"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category }}"
                                {{ old('category') == $category ? 'selected' : '' }}
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                    @error('category')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Business Type --}}
                <div class="form-group">

                    <label class="form-label">
                        Business Type
                    </label>

                    <input
                        type="text"
                        name="business_type"
                        class="form-control"
                        value="{{ old('business_type') }}"
                        placeholder="Example: Home Based, Online, Retail"
                    >

                    @error('business_type')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Location --}}
                <div class="form-group">

                    <label class="form-label">
                        Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="form-control"
                        value="{{ old('location', 'India') }}"
                        placeholder="Example: India"
                    >

                    @error('location')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Time --}}
                <div class="form-group">

                    <label class="form-label">
                        Time to Start
                    </label>

                    <input
                        type="text"
                        name="time"
                        class="form-control"
                        value="{{ old('time') }}"
                        placeholder="Example: 1-2 Months"
                    >

                    @error('time')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Profit --}}
                <div class="form-group">

                    <label class="form-label">
                        Expected Profit
                    </label>

                    <input
                        type="text"
                        name="profit"
                        class="form-control"
                        value="{{ old('profit') }}"
                        placeholder="Example: ₹20,000 - ₹50,000 / month"
                    >

                    @error('profit')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Minimum Investment --}}
                <div class="form-group">

                    <label class="form-label">
                        Minimum Investment (₹)
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="investment_min"
                        class="form-control"
                        value="{{ old('investment_min') }}"
                        placeholder="Example: 5000"
                        min="0"
                        required
                    >

                    @error('investment_min')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Maximum Investment --}}
                <div class="form-group">

                    <label class="form-label">
                        Maximum Investment (₹)
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="investment_max"
                        class="form-control"
                        value="{{ old('investment_max') }}"
                        placeholder="Example: 10000"
                        min="0"
                        required
                    >

                    @error('investment_max')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Description --}}
                <div class="form-group full">

                    <label class="form-label">
                        Description
                        <span class="required">*</span>
                    </label>

                    <textarea
                        name="description"
                        class="form-textarea"
                        placeholder="Write a detailed description of this business idea..."
                        required
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Image --}}
                <div class="form-group full">

                    <label class="form-label">
                        Business Image
                    </label>

                    <label
                        for="image"
                        class="image-upload-box"
                    >

                        <div class="image-icon">
                            🖼️
                        </div>

                        <strong>
                            Click to upload image
                        </strong>

                        <div class="form-help">
                            JPG, JPEG, PNG or WEBP — Maximum 4MB
                        </div>

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            style="display:none;"
                        >

                        <img
                            id="imagePreview"
                            class="image-preview"
                            alt="Image Preview"
                        >

                    </label>

                    @error('image')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Status --}}
                <div class="form-group full">

                    <label class="form-label">
                        Status
                    </label>

                    <label class="status-box">

                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            {{ old('status', true) ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Active</strong>
                            <br>
                            <small style="color:#64748b;">
                                Show this business idea on the website.
                            </small>
                        </span>

                    </label>

                </div>


            </div>


            {{-- Footer Buttons --}}
            <div class="form-footer">

                <a
                    href="{{ route('admin.businesses') }}"
                    class="btn btn-secondary btn-large"
                >
                    ← Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-success btn-large"
                >
                    💾 Save Business Idea
                </button>

            </div>


        </form>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        if (!imageInput || !imagePreview) {
            return;
        }

        imageInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                imagePreview.style.display = 'none';
                imagePreview.removeAttribute('src');
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {

                alert('Please select a JPG, JPEG, PNG or WEBP image.');

                this.value = '';
                imagePreview.style.display = 'none';

                return;
            }

            if (file.size > 4 * 1024 * 1024) {

                alert('Image size must be less than 4MB.');

                this.value = '';
                imagePreview.style.display = 'none';

                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {

                imagePreview.src = event.target.result;
                imagePreview.style.display = 'block';

            };

            reader.readAsDataURL(file);

        });

    });

</script>

@endsection