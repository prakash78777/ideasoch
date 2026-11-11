
@extends('admin.layouts.app')

@section('title', 'All Business Ideas')
@section('page-title', 'Business Ideas')

@section('content')

<div class="business-admin-page">

    {{-- Notifications --}}
    @if(session('success'))
        <div class="ba-alert ba-alert-success">
            <span>✓</span> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="ba-alert ba-alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Page heading --}}
    <div class="ba-page-heading">
        <div>
            <span class="ba-eyebrow">BUSINESS MANAGEMENT</span>
            <h1>All Business Ideas</h1>
            <p>Manage, update and organize your business ideas.</p>
        </div>

        <a href="{{ route('admin.businesses.create') }}" class="ba-btn ba-btn-primary">
            <span class="ba-btn-icon">＋</span>
            Add Business Idea
        </a>
    </div>

    {{-- Summary cards --}}
    <div class="ba-summary-grid">
        <div class="ba-summary-card">
            <div class="ba-summary-icon ba-icon-blue">💡</div>
            <div>
                <span>Total Business Ideas</span>
                <strong>{{ $businesses->total() }}</strong>
                <small>Matching current filters</small>
            </div>
        </div>

        <div class="ba-summary-card">
            <div class="ba-summary-icon ba-icon-green">✓</div>
            <div>
                <span>Current Page</span>
                <strong>{{ $businesses->currentPage() }}</strong>
                <small>Page {{ $businesses->currentPage() }} of {{ max(1, $businesses->lastPage()) }}</small>
            </div>
        </div>

        <div class="ba-summary-card">
            <div class="ba-summary-icon ba-icon-purple">▤</div>
            <div>
                <span>Ideas Per Page</span>
                <strong>{{ $businesses->count() }}</strong>
                <small>Records displayed below</small>
            </div>
        </div>
    </div>

    {{-- Search and filters --}}
    <section class="ba-card ba-filter-card">
        <div class="ba-card-heading">
            <div>
                <h2>⌕ Search &amp; Filter</h2>
                <p>Find a business idea by name, category or status.</p>
            </div>
        </div>

        <form action="{{ route('admin.businesses') }}" method="GET" class="ba-filter-form">
            <div class="ba-field ba-search-field">
                <label for="ba-search">Search business ideas</label>
                <div class="ba-input-wrap">
                    <span>⌕</span>
                    <input
                        id="ba-search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search business name or category..."
                    >
                </div>
            </div>

            <div class="ba-field">
                <label for="ba-category">Category</label>
                <select id="ba-category" name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ba-field">
                <label for="ba-status">Status</label>
                <select id="ba-status" name="status">
                    <option value="">All Statuses</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="ba-filter-actions">
                <button type="submit" class="ba-btn ba-btn-primary">Search</button>
                <a href="{{ route('admin.businesses') }}" class="ba-btn ba-btn-light">Reset</a>
            </div>
        </form>
    </section>

    {{-- Business list --}}
    <section class="ba-card ba-list-card">
        <div class="ba-card-heading ba-list-heading">
            <div>
                <h2>▤ Business Ideas</h2>
                <p>
                    Showing
                    <strong>{{ $businesses->firstItem() ?? 0 }}–{{ $businesses->lastItem() ?? 0 }}</strong>
                    of <strong>{{ $businesses->total() }}</strong> business ideas
                </p>
            </div>

            <span class="ba-total-pill">{{ $businesses->total() }} Ideas</span>
        </div>

        <div class="ba-table-scroll">
            <table class="ba-table">
                <thead>
                    <tr>
                        <th class="ba-col-id">#</th>
                        <th>Business</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Investment Range</th>
                        <th>Status</th>
                        <th class="ba-actions-heading">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($businesses as $business)
                        <tr>
                            <td class="ba-id-cell">{{ $business->id }}</td>

                            <td>
                                <div class="ba-business-cell">
                                    @if($business->image)
                                        @php
                                            $imagePath = $business->image;
                                            if (!str_starts_with($imagePath, 'businesses/')) {
                                                $imagePath = 'businesses/' . $imagePath;
                                            }
                                        @endphp

                                        <img
                                            class="ba-business-image"
                                            src="{{ asset('storage/' . $imagePath) }}"
                                            alt="{{ $business->name }}"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.style.display='none';this.nextElementSibling.style.display='flex';"
                                        >
                                        <div class="ba-image-placeholder" style="display:none">💡</div>
                                    @else
                                        <div class="ba-image-placeholder">💡</div>
                                    @endif

                                    <div class="ba-business-info">
                                        <strong>{{ $business->name }}</strong>
                                        @if($business->business_type)
                                            <small>{{ $business->business_type }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="ba-category-pill">
                                    {{ $business->category }}
                                </span>
                            </td>

                            <td class="ba-location-cell">
                                <span class="ba-location-dot"></span>
                                {{ $business->location ?: 'India' }}
                            </td>

                            <td class="ba-investment">
                                <strong>₹{{ number_format($business->investment_min) }}</strong>
                                <span>– ₹{{ number_format($business->investment_max) }}</span>
                            </td>

                            <td>
                                @if($business->status)
                                    <span class="ba-status ba-status-active">
                                        <span></span> Active
                                    </span>
                                @else
                                    <span class="ba-status ba-status-inactive">
                                        <span></span> Inactive
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="ba-row-actions">
                                    <a
                                        href="{{ route('admin.businesses.edit', $business) }}"
                                        class="ba-action-btn ba-edit-btn"
                                        title="Edit business"
                                    >✎ <span>Edit</span></a>

                                    <form
                                        action="{{ route('admin.businesses.toggle', $business) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="ba-action-btn {{ $business->status ? 'ba-disable-btn' : 'ba-activate-btn' }}"
                                            title="{{ $business->status ? 'Disable business' : 'Activate business' }}"
                                        >
                                            {{ $business->status ? '⊘' : '✓' }}
                                            <span>{{ $business->status ? 'Disable' : 'Activate' }}</span>
                                        </button>
                                    </form>

                                    <form
                                        action="{{ route('admin.businesses.delete', $business) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to permanently delete this business idea?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="ba-action-btn ba-delete-btn" title="Delete business">
                                            ♲ <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="ba-empty-state">
                                    <div>⌕</div>
                                    <h3>No Business Ideas Found</h3>
                                    <p>Try changing your search or filters.</p>
                                    <a href="{{ route('admin.businesses.create') }}" class="ba-btn ba-btn-primary">
                                        ＋ Add Business Idea
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Compact pagination --}}
        @if($businesses->hasPages())
            <div class="ba-pagination">
                <div class="ba-pagination-info">
                    Page {{ $businesses->currentPage() }} of {{ $businesses->lastPage() }}
                </div>

                <div class="ba-pagination-links">
                    @if($businesses->onFirstPage())
                        <span class="ba-page-link ba-page-disabled">← Previous</span>
                    @else
                        <a class="ba-page-link" href="{{ $businesses->previousPageUrl() }}">← Previous</a>
                    @endif

                    @foreach($businesses->getUrlRange(
                        max(1, $businesses->currentPage() - 2),
                        min($businesses->lastPage(), $businesses->currentPage() + 2)
                    ) as $page => $url)
                        @if($page == $businesses->currentPage())
                            <span class="ba-page-link ba-page-active">{{ $page }}</span>
                        @else
                            <a class="ba-page-link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($businesses->hasMorePages())
                        <a class="ba-page-link" href="{{ $businesses->nextPageUrl() }}">Next →</a>
                    @else
                        <span class="ba-page-link ba-page-disabled">Next →</span>
                    @endif
                </div>
            </div>
        @endif
    </section>

</div>

<style>
/* All styles are scoped to this page to protect the other admin screens. */
.business-admin-page {
    --ba-ink: #14233d;
    --ba-muted: #718096;
    --ba-border: #e5ebf4;
    --ba-blue: #2864f0;
    color: var(--ba-ink);
    width: 100%;
    min-width: 0;
    font-size: 14px;
}

.business-admin-page,
.business-admin-page * {
    box-sizing: border-box;
}

.business-admin-page .ba-page-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 24px;
}

.business-admin-page .ba-eyebrow {
    color: #3973ee;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.business-admin-page .ba-page-heading h1 {
    margin: 7px 0 5px;
    font-size: clamp(23px, 2vw, 30px);
    font-weight: 800;
    letter-spacing: -0.7px;
    color: #14233d;
}

.business-admin-page .ba-page-heading p,
.business-admin-page .ba-card-heading p {
    color: var(--ba-muted);
    margin: 0;
    line-height: 1.6;
}

.business-admin-page .ba-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    min-height: 40px;
    padding: 10px 16px;
    border: 1px solid transparent;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    white-space: nowrap;
    transition: background .2s, transform .2s, box-shadow .2s;
}

.business-admin-page .ba-btn:hover {
    transform: translateY(-1px);
}

.business-admin-page .ba-btn-primary {
    background: linear-gradient(135deg, #2873f8, #1855df);
    color: #fff;
    box-shadow: 0 5px 12px rgba(40, 100, 240, .16);
}

.business-admin-page .ba-btn-primary:hover {
    background: #174cc8;
    color: #fff;
}

.business-admin-page .ba-btn-light {
    background: #f5f7fb;
    border-color: var(--ba-border);
    color: #465671;
}

.business-admin-page .ba-btn-light:hover {
    background: #eaf0fb;
}

.business-admin-page .ba-btn-icon {
    font-size: 20px;
    line-height: 12px;
}

.business-admin-page .ba-alert {
    padding: 13px 16px;
    border-radius: 11px;
    margin-bottom: 18px;
    line-height: 1.6;
}

.business-admin-page .ba-alert-success {
    background: #eafaf1;
    color: #137847;
    border: 1px solid #b9efd0;
}

.business-admin-page .ba-alert-danger {
    background: #fff1f1;
    color: #b42318;
    border: 1px solid #ffd0d0;
}

.business-admin-page .ba-alert ul {
    margin: 7px 0 0 20px;
}

.business-admin-page .ba-summary-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 22px;
}

.business-admin-page .ba-summary-card {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 0;
    padding: 20px;
    border: 1px solid var(--ba-border);
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 5px 18px rgba(24, 49, 86, .035);
}

.business-admin-page .ba-summary-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 48px;
    width: 48px;
    height: 48px;
    border-radius: 13px;
    font-size: 23px;
    font-weight: 800;
}

.business-admin-page .ba-icon-blue {
    background: #e7efff;
    color: #2864f0;
}

.business-admin-page .ba-icon-green {
    background: #dcf9e9;
    color: #07874b;
}

.business-admin-page .ba-icon-purple {
    background: #eee8ff;
    color: #7445dc;
}

.business-admin-page .ba-summary-card span,
.business-admin-page .ba-summary-card strong,
.business-admin-page .ba-summary-card small {
    display: block;
}

.business-admin-page .ba-summary-card span {
    color: #63728b;
    font-size: 12px;
    margin-bottom: 4px;
}

.business-admin-page .ba-summary-card strong {
    font-size: 25px;
    font-weight: 800;
    line-height: 1.2;
    color: #172945;
}

.business-admin-page .ba-summary-card small {
    margin-top: 5px;
    color: #8a97aa;
    font-size: 11px;
}

.business-admin-page .ba-card {
    background: #fff;
    border: 1px solid var(--ba-border);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 6px 24px rgba(24, 49, 86, .04);
    margin-bottom: 22px;
    min-width: 0;
}

.business-admin-page .ba-card-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
    padding: 20px 22px;
    border-bottom: 1px solid var(--ba-border);
}

.business-admin-page .ba-card-heading h2 {
    margin: 0 0 5px;
    font-size: 17px;
    font-weight: 800;
    color: #192b47;
}

.business-admin-page .ba-card-heading p {
    font-size: 12px;
}

.business-admin-page .ba-filter-form {
    display: grid;
    grid-template-columns: minmax(220px, 2fr) minmax(155px, 1fr) minmax(145px, 1fr) auto;
    gap: 14px;
    align-items: end;
    padding: 21px 22px;
}

.business-admin-page .ba-field {
    min-width: 0;
}

.business-admin-page .ba-field label {
    display: block;
    margin-bottom: 8px;
    color: #40516c;
    font-size: 12px;
    font-weight: 700;
}

.business-admin-page .ba-field input,
.business-admin-page .ba-field select {
    display: block;
    width: 100%;
    height: 43px;
    min-width: 0;
    padding: 0 12px;
    border: 1px solid #dce4ef;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: #243650;
    font: inherit;
    font-size: 12px;
    transition: border-color .2s, box-shadow .2s;
}

.business-admin-page .ba-field input:focus,
.business-admin-page .ba-field select:focus {
    border-color: #76a0ff;
    box-shadow: 0 0 0 3px rgba(40, 100, 240, .1);
}

.business-admin-page .ba-input-wrap {
    position: relative;
}

.business-admin-page .ba-input-wrap > span {
    position: absolute;
    left: 12px;
    top: 8px;
    color: #8290a6;
    font-size: 20px;
    line-height: 24px;
    pointer-events: none;
}

.business-admin-page .ba-input-wrap input {
    padding-left: 37px;
}

.business-admin-page .ba-filter-actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.business-admin-page .ba-list-heading {
    padding: 20px 22px;
}

.business-admin-page .ba-total-pill {
    padding: 7px 12px;
    border-radius: 20px;
    background: #edf3ff;
    color: #2864f0;
    font-size: 12px;
    font-weight: 800;
    white-space: nowrap;
}

.business-admin-page .ba-table-scroll {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.business-admin-page .ba-table {
    width: 100%;
    min-width: 980px;
    border-collapse: separate;
    border-spacing: 0;
    text-align: left;
}

.business-admin-page .ba-table thead th {
    padding: 14px 13px;
    background: #f7f9fd;
    border-bottom: 1px solid var(--ba-border);
    color: #64738c;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .55px;
    text-transform: uppercase;
    white-space: nowrap;
}

.business-admin-page .ba-table thead th:first-child,
.business-admin-page .ba-table tbody td:first-child {
    padding-left: 22px;
}

.business-admin-page .ba-table tbody td {
    padding: 14px 13px;
    border-bottom: 1px solid #edf1f7;
    color: #42516a;
    font-size: 12px;
    vertical-align: middle;
}

.business-admin-page .ba-table tbody tr:last-child td {
    border-bottom: 0;
}

.business-admin-page .ba-table tbody tr {
    transition: background .15s;
}

.business-admin-page .ba-table tbody tr:hover {
    background: #fafcff;
}

.business-admin-page .ba-id-cell {
    color: #8a96a9 !important;
    font-weight: 700;
}

.business-admin-page .ba-business-cell {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 225px;
}

.business-admin-page .ba-business-image,
.business-admin-page .ba-image-placeholder {
    flex: 0 0 49px;
    width: 49px;
    height: 49px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e8edf5;
    background: #f0f4fb;
}

.business-admin-page .ba-image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.business-admin-page .ba-business-info {
    min-width: 0;
}

.business-admin-page .ba-business-info strong {
    display: block;
    max-width: 225px;
    color: #1b2c47;
    font-size: 12px;
    font-weight: 800;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.business-admin-page .ba-business-info small {
    display: block;
    margin-top: 4px;
    color: #8a96a9;
    font-size: 10px;
}

.business-admin-page .ba-category-pill {
    display: inline-block;
    max-width: 180px;
    padding: 6px 10px;
    border-radius: 20px;
    background: #eaf1ff;
    color: #2864d9;
    font-size: 10px;
    font-weight: 700;
    line-height: 1.4;
}

.business-admin-page .ba-location-cell {
    white-space: nowrap;
}

.business-admin-page .ba-location-dot {
    display: inline-block;
    width: 6px;
    height: 6px;
    margin-right: 5px;
    border-radius: 50%;
    background: #28ad78;
    vertical-align: middle;
}

.business-admin-page .ba-investment {
    white-space: nowrap;
}

.business-admin-page .ba-investment strong {
    color: #263953;
    font-size: 11px;
    font-weight: 800;
}

.business-admin-page .ba-investment span {
    color: #6d7c92;
    font-size: 11px;
}

.business-admin-page .ba-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.business-admin-page .ba-status > span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: currentColor;
}

.business-admin-page .ba-status-active {
    background: #e1f9eb;
    color: #07854b;
}

.business-admin-page .ba-status-inactive {
    background: #fff0ee;
    color: #ce4438;
}

.business-admin-page .ba-actions-heading {
    text-align: center;
}

.business-admin-page .ba-row-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    min-width: 230px;
}

.business-admin-page .ba-row-actions form {
    display: inline-flex;
    margin: 0;
}

.business-admin-page .ba-action-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 4px;
    min-height: 32px;
    padding: 6px 8px;
    border: 1px solid transparent;
    border-radius: 7px;
    font-family: inherit;
    font-size: 10px;
    font-weight: 800;
    line-height: 1.2;
    text-decoration: none;
    white-space: nowrap;
    cursor: pointer;
    transition: background .15s, transform .15s;
}

.business-admin-page .ba-action-btn:hover {
    transform: translateY(-1px);
}

.business-admin-page .ba-edit-btn {
    background: #edf3ff;
    border-color: #dbe7ff;
    color: #2864e8;
}

.business-admin-page .ba-edit-btn:hover {
    background: #dce8ff;
}

.business-admin-page .ba-disable-btn {
    background: #fff6e6;
    border-color: #ffe6b6;
    color: #a96308;
}

.business-admin-page .ba-activate-btn {
    background: #e5faee;
    border-color: #c5f0d6;
    color: #087b43;
}

.business-admin-page .ba-delete-btn {
    background: #fff0f0;
    border-color: #ffd8d8;
    color: #d63030;
}

.business-admin-page .ba-delete-btn:hover {
    background: #ffe0e0;
}

.business-admin-page .ba-empty-state {
    padding: 55px 20px;
    text-align: center;
}

.business-admin-page .ba-empty-state > div {
    margin-bottom: 12px;
    color: #98a8bf;
    font-size: 42px;
}

.business-admin-page .ba-empty-state h3 {
    margin: 0 0 7px;
    color: #243651;
    font-size: 18px;
}

.business-admin-page .ba-empty-state p {
    margin: 0 0 20px;
    color: #7b899e;
}

.business-admin-page .ba-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    padding: 17px 22px;
    border-top: 1px solid var(--ba-border);
    background: #fff;
}

.business-admin-page .ba-pagination-info {
    color: #75839a;
    font-size: 11px;
}

.business-admin-page .ba-pagination-links {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
}

.business-admin-page .ba-page-link {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    min-width: 32px;
    height: 32px;
    padding: 0 9px;
    border: 1px solid #e2e8f2;
    border-radius: 7px;
    background: #fff;
    color: #4c5d77;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
}

.business-admin-page .ba-page-link:hover {
    background: #edf3ff;
    border-color: #c9d9ff;
    color: #245ee0;
}

.business-admin-page .ba-page-active {
    background: #2864f0;
    border-color: #2864f0;
    color: #fff;
}

.business-admin-page .ba-page-active:hover {
    background: #2864f0;
    color: #fff;
}

.business-admin-page .ba-page-disabled {
    background: #f7f9fc;
    color: #a2adbd;
    cursor: not-allowed;
}

/* Prevent global SVG rules from creating oversized pagination arrows. */
.business-admin-page .ba-pagination svg {
    width: 15px !important;
    height: 15px !important;
}

/* Responsive layout */
@media (max-width: 1100px) {
    .business-admin-page .ba-filter-form {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .business-admin-page .ba-filter-actions {
        align-self: end;
    }

    .business-admin-page .ba-summary-grid {
        gap: 11px;
    }

    .business-admin-page .ba-summary-card {
        padding: 15px;
        gap: 10px;
    }
}

@media (max-width: 650px) {
    .business-admin-page .ba-page-heading {
        align-items: flex-start;
    }

    .business-admin-page .ba-page-heading > a {
        width: 100%;
    }

    .business-admin-page .ba-summary-grid {
        grid-template-columns: 1fr;
    }

    .business-admin-page .ba-summary-card {
        padding: 15px;
    }

    .business-admin-page .ba-filter-form {
        grid-template-columns: 1fr;
        padding: 16px;
    }

    .business-admin-page .ba-filter-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .business-admin-page .ba-card-heading {
        padding: 16px;
    }

    .business-admin-page .ba-pagination {
        align-items: flex-start;
        padding: 15px;
    }

    .business-admin-page .ba-pagination-links {
        justify-content: flex-start;
    }
}
</style>

@endsection
