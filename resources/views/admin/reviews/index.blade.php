@extends('admin.layouts.app')

@section('title', 'Manage Reviews')
@section('page-title', 'Manage Reviews')

@section('content')

<style>
    .reviews-page {
        color: #102b4e;
    }

    .reviews-header {
        margin-bottom: 24px;
    }

    .reviews-header h2 {
        margin: 0 0 8px;
        font-size: 28px;
        font-weight: 750;
    }

    .reviews-header p {
        color: #64748b;
        margin: 0;
    }

    .reviews-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(15, 35, 60, .06);
    }

    .reviews-card-header {
        padding: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .reviews-card-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .reviews-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .reviews-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
        margin: 0;
        background: #fff;
    }

    .reviews-table th {
        background: #f1f5f9;
        color: #475569;
        padding: 15px;
        text-align: left;
        white-space: nowrap;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .reviews-table td {
        padding: 16px 15px;
        border-top: 1px solid #e2e8f0;
        vertical-align: middle;
        color: #334155;
        font-size: 13px;
    }

    .reviews-table tbody tr:hover {
        background: #f8fbff;
    }

    .review-name {
        font-weight: 700;
        color: #102b4e;
    }

    .review-text {
        min-width: 180px;
        max-width: 300px;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
        line-height: 1.6;
    }

    .review-photo {
        display: block;
        width: 58px;
        height: 58px;
        object-fit: cover;
        border-radius: 9px;
        border: 1px solid #e2e8f0;
    }

    .review-no-photo {
        color: #94a3b8;
    }

    .review-rating {
        color: #f59e0b;
        font-weight: 700;
        white-space: nowrap;
        font-size: 15px;
    }

    .review-status {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .review-status.pending {
        background: #fef3c7;
        color: #92400e;
    }

    .review-status.approved {
        background: #dcfce7;
        color: #166534;
    }

    /* Action buttons */
    .review-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 7px;
        min-width: 190px;
    }

    .review-actions form {
        margin: 0;
    }

    .review-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        min-width: 82px;
        padding: 9px 12px;
        border: none;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: transform .2s ease, box-shadow .2s ease,
                    filter .2s ease;
    }

    .review-btn:hover {
        transform: translateY(-2px);
        filter: brightness(.93);
        box-shadow: 0 4px 10px rgba(15, 35, 60, .15);
    }

    .review-btn:active {
        transform: scale(.97);
    }

    .review-btn:focus-visible {
        outline: 3px solid #93c5fd;
        outline-offset: 3px;
    }

    .review-btn-approve {
        background: #16a34a;
        color: #fff;
    }

    .review-btn-reject {
        background: #f59e0b;
        color: #422006;
    }

    .review-btn-delete {
        background: #dc2626;
        color: #fff;
    }

    .reviews-empty {
        padding: 50px 20px;
        text-align: center;
        color: #64748b;
    }

    .reviews-empty .empty-icon {
        font-size: 42px;
        margin-bottom: 10px;
    }

    .reviews-empty h4 {
        color: #102b4e;
        margin-bottom: 8px;
    }

    @media (max-width: 768px) {
        .reviews-header h2 {
            font-size: 23px;
        }

        .reviews-card-header {
            padding: 16px;
        }

        .reviews-table td,
        .reviews-table th {
            padding: 12px;
        }
    }
</style>

<div class="container-fluid py-4 reviews-page">

    <div class="reviews-header">
        <h2>⭐ Manage Reviews</h2>
        <p>Review customer feedback and approve reviews to publish them on the website.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="reviews-card">

        <div class="reviews-card-header">
            <h3>All Customer Reviews</h3>
        </div>

        @if($reviews->isEmpty())

            <div class="reviews-empty">
                <div class="empty-icon">⭐</div>
                <h4>No Reviews Yet</h4>
                <p>Customer reviews submitted through the website will appear here.</p>
            </div>

        @else

            <div class="reviews-table-wrap">
                <table class="reviews-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>City</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <div class="review-name">
                                        {{ $review->name }}
                                    </div>
                                </td>

                                <td>{{ $review->city }}</td>

                                <td>
                                    <span class="review-rating">
                                        {{ str_repeat('★', max(0, min(5, (int) $review->rating))) }}{{ str_repeat('☆', 5 - max(0, min(5, (int) $review->rating))) }}
                                    </span>
                                    <div>{{ $review->rating }}/5</div>
                                </td>

                                <td>
                                    <div class="review-text">
                                        {{ $review->review }}
                                    </div>
                                </td>

                                <td>
                                    @if($review->photo)
                                        <a href="{{ asset('storage/' . $review->photo) }}"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            <img
                                                class="review-photo"
                                                src="{{ asset('storage/' . $review->photo) }}"
                                                alt="Photo uploaded by {{ $review->name }}"
                                                loading="lazy">
                                        </a>
                                    @else
                                        <span class="review-no-photo">No photo</span>
                                    @endif
                                </td>

                                <td>
                                    @if($review->is_approved)
                                        <span class="review-status approved">
                                            Approved
                                        </span>
                                    @else
                                        <span class="review-status pending">
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="review-actions">

                                        @if(!$review->is_approved)
                                            <form method="POST"
                                                  action="{{ route('admin.reviews.approve', $review->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit"
                                                        class="review-btn review-btn-approve">
                                                    ✓ Approve
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST"
                                                  action="{{ route('admin.reviews.reject', $review->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit"
                                                        class="review-btn review-btn-reject">
                                                    ↩ Reject
                                                </button>
                                            </form>
                                        @endif

                                        <form method="POST"
                                              action="{{ route('admin.reviews.destroy', $review->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this review?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="review-btn review-btn-delete">
                                                🗑 Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>
</div>

@endsection
