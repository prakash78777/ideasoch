
@extends('admin.layouts.app')

@section('title', 'AI Questions')

@section('content')
<style>
.aq-page { color:#142238; }
.aq-header {
    display:flex; justify-content:space-between; align-items:center;
    flex-wrap:wrap; gap:16px; margin-bottom:24px;
}
.aq-header h1 { margin:0 0 5px; font-size:30px; }
.aq-muted { color:#64748b; margin:0; line-height:1.5; }
.aq-btn {
    display:inline-flex; align-items:center; justify-content:center;
    padding:9px 13px; border:0; border-radius:7px;
    text-decoration:none; font-size:13px; font-weight:600;
    cursor:pointer; white-space:nowrap;
}
.aq-primary { background:#3867f5; color:#fff; }
.aq-edit { background:#eff6ff; color:#1d4ed8; }
.aq-toggle { background:#fff7ed; color:#9a3412; }
.aq-delete { background:#fee2e2; color:#b91c1c; }
.aq-stats {
    display:grid; grid-template-columns:repeat(3,minmax(0,1fr));
    gap:20px; margin-bottom:25px;
}
.aq-stat {
    display:flex; align-items:center; gap:17px; padding:23px;
    background:#fff; border:1px solid #dce5f0;
    border-radius:14px; box-shadow:0 5px 15px #182b4408;
}
.aq-icon {
    width:54px; height:54px; display:grid; place-items:center;
    border-radius:12px; background:#eef5ff; font-size:24px;
}
.aq-number { font-size:28px; font-weight:700; }
.aq-card {
    background:#fff; border:1px solid #dce5f0;
    border-radius:14px; overflow:hidden;
}
.aq-card-head {
    display:flex; justify-content:space-between; align-items:center;
    gap:15px; flex-wrap:wrap; padding:22px 25px;
    border-bottom:1px solid #e2e8f0;
}
.aq-card-head h2 { margin:0 0 5px; font-size:20px; }
.aq-filters {
    display:flex; gap:10px; flex-wrap:wrap; padding:18px 22px;
    border-bottom:1px solid #e2e8f0;
}
.aq-filters input, .aq-filters select {
    min-width:170px; padding:10px 12px;
    border:1px solid #cbd5e1; border-radius:7px;
    background:#fff; font:inherit;
}
.aq-table-wrap { overflow-x:auto; }
.aq-table { width:100%; border-collapse:collapse; }
.aq-table th, .aq-table td {
    padding:15px; text-align:left; vertical-align:middle;
    border-bottom:1px solid #edf0f5; font-size:14px;
}
.aq-table th {
    background:#f8fafc; color:#64748b;
    font-size:12px; text-transform:uppercase; white-space:nowrap;
}
.aq-question { min-width:170px; max-width:240px; font-weight:600; }
.aq-prompt { min-width:200px; max-width:300px; }
.aq-status {
    display:inline-block; padding:5px 10px; border-radius:20px;
    font-size:12px; font-weight:600; white-space:nowrap;
}
.aq-active { background:#d1fae5; color:#047857; }
.aq-inactive { background:#fee2e2; color:#b91c1c; }
.aq-actions { display:flex; gap:6px; flex-wrap:wrap; min-width:190px; }
.aq-actions form { margin:0; }
.aq-empty { text-align:center; padding:45px 20px; color:#64748b; }
.aq-pagination { padding:20px; overflow-x:auto; }
.aq-alert {
    padding:13px 16px; border-radius:8px; margin-bottom:18px;
}
.aq-error { background:#fee2e2; color:#b91c1c; }
@media(max-width:800px) {
    .aq-stats { grid-template-columns:1fr; }
    .aq-header h1 { font-size:25px; }
}
</style>

<div class="aq-page">
    <div class="aq-header">
        <div>
            <h1>AI Questions</h1>
            <p class="aq-muted">Manage questions used by the IdeaSoch AI assistant.</p>
        </div>

        <a href="{{ route('admin.ai.questions.create') }}"
           class="aq-btn aq-primary">+ Add Question</a>
    </div>

    {{-- Success message is displayed by the admin layout. --}}
    @if($errors->any())
        <div class="aq-alert aq-error">
            Please check the form and try again.
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="aq-stats">
        <div class="aq-stat">
            <div class="aq-icon">🤖</div>
            <div>
                <div class="aq-number">{{ $totalQuestions }}</div>
                <div class="aq-muted">Total Questions</div>
            </div>
        </div>

        <div class="aq-stat">
            <div class="aq-icon">✓</div>
            <div>
                <div class="aq-number">{{ $activeQuestions }}</div>
                <div class="aq-muted">Active Questions</div>
            </div>
        </div>

        <div class="aq-stat">
            <div class="aq-icon">💬</div>
            <div>
                <div class="aq-number">{{ $totalConversations }}</div>
                <div class="aq-muted">AI Conversations</div>
            </div>
        </div>
    </div>

    <div class="aq-card">
        <div class="aq-card-head">
            <div>
                <h2>All AI Questions</h2>
                <p class="aq-muted">Manage questions and AI instructions.</p>
            </div>

            <a href="{{ route('admin.ai.questions.create') }}"
               class="aq-btn aq-primary">+ Add Question</a>
        </div>

        <form class="aq-filters" method="GET"
              action="{{ route('admin.ai.questions') }}">
            <input type="search" name="search"
                   value="{{ request('search') }}"
                   placeholder="Search question, category, prompt...">

            <select name="status">
                <option value="">All Status</option>
                <option value="active" @selected(request('status') === 'active')>
                    Active
                </option>
                <option value="inactive" @selected(request('status') === 'inactive')>
                    Inactive
                </option>
            </select>

            <button class="aq-btn aq-primary" type="submit">Search</button>

            <a class="aq-btn aq-edit"
               href="{{ route('admin.ai.questions') }}">Reset</a>
        </form>

        @if($questions->count())
            <div class="aq-table-wrap">
                <table class="aq-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>AI Prompt</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{ $questions->firstItem() + $loop->index }}</td>

                            <td class="aq-question">
                                {{ $question->question }}
                            </td>

                            <td>{{ $question->category ?: 'General' }}</td>

                            <td class="aq-prompt">
                                {{ \Illuminate\Support\Str::limit($question->prompt, 100) }}
                            </td>

                            <td>
                                @if($question->status)
                                    <span class="aq-status aq-active">Active</span>
                                @else
                                    <span class="aq-status aq-inactive">Inactive</span>
                                @endif
                            </td>

                            <td>
                                {{ $question->created_at?->format('d M Y') ?? '—' }}
                            </td>

                            <td>
                                <div class="aq-actions">
                                    <a class="aq-btn aq-edit"
                                       href="{{ route('admin.ai.questions.edit', $question) }}">
                                        ✏ Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.ai.questions.toggle', $question) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="aq-btn aq-toggle" type="submit">
                                            {{ $question->status ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>

                                    <form method="POST"
                                          action="{{ route('admin.ai.questions.destroy', $question) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this AI question?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="aq-btn aq-delete" type="submit">
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

            <div class="aq-pagination">
                {{ $questions->links() }}
            </div>
        @else
            <div class="aq-empty">
                <h3>No AI Questions Found</h3>
                <p>Try another search or add a new question.</p>
                <a href="{{ route('admin.ai.questions.create') }}"
                   class="aq-btn aq-primary">+ Add Question</a>
            </div>
        @endif
    </div>
</div>
@endsection
