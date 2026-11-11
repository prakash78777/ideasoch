@extends('admin.layouts.app')

@section('title', 'Contact / Leads')
@section('page-title', 'Contact / Leads')

@section('content')

<style>


    .leads-page {
        color: #102b4e;
    }

    .leads-heading {
        margin-bottom: 24px;
    }

    .leads-heading h1 {
        margin: 0 0 8px;
        font-size: 29px;
    }

    .leads-heading p {
        margin: 0;
        color: #64748b;
    }

    .leads-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 22px;
    }

    .leads-stat,
    .leads-card {
        background: #fff;
        border: 1px solid #dce5ef;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(15, 35, 60, .04);
    }

    .leads-stat {
        padding: 22px;
    }

    .leads-stat strong {
        display: block;
        font-size: 27px;
        margin-bottom: 5px;
    }

    .leads-stat span {
        color: #64748b;
        font-size: 14px;
    }

    .leads-card {
        overflow: hidden;
    }

    .leads-card-header {
        padding: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .leads-card-header h2 {
        margin: 0 0 6px;
        font-size: 19px;
    }

    .leads-card-header p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .leads-filters {
        padding: 16px 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        border-bottom: 1px solid #e2e8f0;
    }

    .leads-filters input,
    .leads-filters select {
        min-width: 160px;
        flex: 1;
        padding: 12px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font: inherit;
        background: #fff;
    }

    .leads-btn {
        display: inline-block;
        border: 0;
        border-radius: 8px;
        padding: 11px 17px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
    }

    .leads-btn-primary {
        color: #fff;
        background: #0866ed;
    }

    .leads-btn-light {
        color: #17406c;
        background: #edf4ff;
    }

    .leads-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .leads-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
    }

    .leads-table th {
        padding: 15px;
        text-align: left;
        color: #536983;
        background: #f7f9fc;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .leads-table td {
        padding: 16px 15px;
        border-top: 1px solid #e7edf4;
        font-size: 13px;
        vertical-align: top;
    }

    .lead-name {
        font-weight: 700;
        margin-bottom: 5px;
    }

    .lead-muted {
        color: #64748b;
        overflow-wrap: anywhere;
    }

    .lead-message {
        min-width: 180px;
        max-width: 300px;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
        line-height: 1.6;
    }

    .lead-status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        background: #dcfce7;
        color: #166534;
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .leads-empty {
        padding: 55px 20px;
        text-align: center;
    }

    .leads-empty .emoji {
        font-size: 38px;
        margin-bottom: 10px;
    }

    .leads-empty h3 {
        margin: 0 0 8px;
    }

    .leads-empty p {
        color: #64748b;
        margin: 0;
    }

    .leads-pagination {
        padding: 18px;
        border-top: 1px solid #e2e8f0;
    }

    .leads-pagination nav p {
        color: #64748b;
        font-size: 13px;
    }




    .delete-btn {
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 8px 12px;
    cursor: pointer;
}

.delete-btn:hover {
    background: #b91c1c;
}


.lead-message{
      height: 90px;
        overflow-y: auto;
    white-space: pre-line;
}







    @media (max-width: 650px) {
        .leads-stats {
            grid-template-columns: 1fr;
        }

        .leads-heading h1 {
            font-size: 24px;
        }

        .leads-filters {
            flex-direction: column;
        }

        .leads-filters input,
        .leads-filters select {
            width: 100%;
        }
    }
</style>

<div class="leads-page">

    <div class="leads-heading">
        <h1>Contact / Leads</h1>
        <p>Manage customer enquiries and contact requests.</p>
    </div>

    {{-- @if(session('success'))
        <div style="padding:14px 16px;margin-bottom:18px;background:#dcfce7;color:#166534;border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif --}}

    

    <div class="leads-stats">
        <div class="leads-stat">
            <strong>{{ $totalLeads }}</strong>
            <span>Total Contact Enquiries</span>
        </div>

        <div class="leads-stat">
            <strong>{{ $newLeads }}</strong>
            <span>New Enquiries</span>
        </div>
    </div>

    <div class="leads-card">

        <div class="leads-card-header">
            <h2>All Contact Leads</h2>
            <p>Website contact form submissions</p>
        </div>

        <form method="GET"
              action="{{ route('admin.leads') }}"
              class="leads-filters">

            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search name, email, phone or message"
            >

            <select name="status">
                <option value="">All Statuses</option>
                <option value="new" @selected(request('status') === 'new')>
                    New
                </option>
                <option value="read" @selected(request('status') === 'read')>
                    Read
                </option>
                <option value="replied" @selected(request('status') === 'replied')>
                    Replied
                </option>
            </select>

            <button type="submit" class="leads-btn leads-btn-primary">
                Search
            </button>

            <a href="{{ route('admin.leads') }}"
               class="leads-btn leads-btn-light">
                Reset
            </a>
        </form>

        @if($leads->count())

            <div class="leads-table-wrap">
                <table class="leads-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <td>
                                    {{ $leads->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <div class="lead-name">
                                        {{ $lead->name }}
                                    </div>

                                    <div class="lead-muted">
                                        {{ $lead->email }}
                                    </div>

                                    @if($lead->phone)
                                        <div class="lead-muted" style="margin-top:5px;">
                                            {{ $lead->phone }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    {{ $lead->subject }}
                                </td>

                                <td>
                                    <div class="lead-message">
                                        {{ $lead->message }}
                                    </div>
                                </td>

                                <td>
                                    <span class="lead-status">
                                        {{ $lead->status }}
                                    </span>
                                </td>

                                {{-- <td>
                                    {{ $lead->created_at?->format('d M Y') }}
                                    <div class="lead-muted" style="margin-top:5px;">
                                        {{ $lead->created_at?->format('h:i A') }}
                                    </div>
                                </td> --}}


                                <td>
    {{ $lead->created_at
        ? $lead->created_at->copy()->timezone('Asia/Kolkata')->format('d M Y')
        : '—' }}

    <br>

    {{ $lead->created_at
        ? $lead->created_at->copy()->timezone('Asia/Kolkata')->format('h:i A')
        : '—' }}
</td>

<td>
    <form
        action="{{ route('admin.leads.delete', $lead) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this enquiry?')"
    >
        @csrf
        @method('DELETE')

        <button type="submit" class="delete-btn">Delete</button>
    </form>
</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="leads-pagination">
                {{ $leads->links() }}
            </div>

        @else

            <div class="leads-empty">
                <div class="emoji">📩</div>

                <h3>No Contact Enquiries Found</h3>

                <p>
                    New website contact form submissions will appear here.
                </p>
            </div>

        @endif

    </div>
</div>

@endsection




