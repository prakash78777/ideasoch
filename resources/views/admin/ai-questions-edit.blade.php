
@extends('admin.layouts.app')

@section('title', 'Edit AI Question')

@section('content')
<style>
    .edit-wrap { max-width:1000px; margin:0 auto; color:#142238; }
    .edit-head {
        display:flex; justify-content:space-between; align-items:center;
        gap:15px; flex-wrap:wrap; margin-bottom:24px;
    }
    .edit-head h1 { margin:0 0 6px; font-size:30px; }
    .edit-muted { color:#64748b; margin:0; }
    .edit-card {
        background:#fff; border:1px solid #dce5f0;
        border-radius:14px; padding:28px;
        box-shadow:0 5px 15px #182b4408;
    }
    .edit-field { margin-bottom:22px; }
    .edit-field label {
        display:block; font-size:13px; font-weight:600; margin-bottom:9px;
    }
    .edit-field input:not([type=checkbox]), .edit-field textarea {
        display:block; width:100%; box-sizing:border-box;
        border:1px solid #cbd5e1; border-radius:8px;
        padding:13px; font:inherit; color:#142238; background:#fff;
    }
    .edit-field textarea { min-height:170px; resize:vertical; }
    .edit-field input:focus, .edit-field textarea:focus {
        outline:2px solid #dbe6ff; border-color:#3867f5;
    }
    .edit-active {
        display:flex; align-items:center; gap:12px;
        padding:17px; border:1px solid #dce5f0; border-radius:10px;
    }
    .edit-active input { width:18px; height:18px; }
    .edit-actions {
        display:flex; justify-content:flex-end; gap:10px;
        flex-wrap:wrap; margin-top:24px;
    }
    .edit-btn {
        display:inline-flex; align-items:center; justify-content:center;
        border:0; border-radius:8px; padding:12px 18px;
        font-weight:600; text-decoration:none; cursor:pointer;
    }
    .edit-save { background:#3867f5; color:#fff; }
    .edit-cancel { background:#eef2f7; color:#233047; }
    .edit-error {
        color:#b42318; font-size:13px; margin-top:6px;
    }
    @media(max-width:600px) {
        .edit-card { padding:18px; }
        .edit-head h1 { font-size:25px; }
    }
</style>

<div class="edit-wrap">
    <div class="edit-head">
        <div>
            <h1>Edit AI Question</h1>
            <p class="edit-muted">Update the question and its AI instructions.</p>
        </div>

        <a href="{{ route('admin.ai.questions') }}" class="edit-btn edit-cancel">
            ← Back to Questions
        </a>
    </div>

    @if($errors->any())
        <div style="padding:14px;background:#fff0f0;color:#b42318;border-radius:8px;margin-bottom:18px;">
            Please correct the highlighted fields and try again.
        </div>
    @endif

    <form action="{{ route('admin.ai.questions.update', $question) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="edit-card">
            <h2 style="margin:0 0 6px;">Question Details</h2>
            <p class="edit-muted" style="margin-bottom:26px;">
                Change the question, category, prompt or active status.
            </p>

            <div class="edit-field">
                <label for="question">Question Title *</label>
                <input id="question" name="question" type="text"
                       maxlength="255" required
                       value="{{ old('question', $question->question) }}"
                       placeholder="e.g. How do I start a business?">
                @error('question')
                    <div class="edit-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="edit-field">
                <label for="category">Category</label>
                <input id="category" name="category" type="text"
                       maxlength="100"
                       value="{{ old('category', $question->category) }}"
                       placeholder="e.g. Business Planning">
                @error('category')
                    <div class="edit-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="edit-field">
                <label for="prompt">AI Prompt / Instructions *</label>
                <textarea id="prompt" name="prompt" required
                          placeholder="Explain how the AI should answer this question...">{{ old('prompt', $question->prompt) }}</textarea>
                @error('prompt')
                    <div class="edit-error">{{ $message }}</div>
                @enderror
            </div>

            <label class="edit-active">
                <input type="checkbox" name="status" value="1"
                       @checked((bool) old('status', $question->status))>
                <span>
                    <strong>Active Question</strong><br>
                    <small class="edit-muted">
                        Mark this question as active.
                    </small>
                </span>
            </label>
        </div>

        <div class="edit-actions">
            <a href="{{ route('admin.ai.questions') }}"
               class="edit-btn edit-cancel">Cancel</a>

            <button type="submit" class="edit-btn edit-save">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
