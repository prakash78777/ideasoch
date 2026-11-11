@extends('admin.layouts.app')

@section('title', 'Add AI Question')

@section('content')
<style>
    .aq-create {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        color: #142238;
    }

    .aq-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
    }

    .aq-header h1 {
        margin: 0 0 6px;
        font-size: 30px;
    }

    .aq-muted {
        margin: 0;
        color: #64748b;
        line-height: 1.5;
    }

    .aq-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 18px;
        border: 0;
        border-radius: 8px;
        text-decoration: none;
        font: inherit;
        font-weight: 600;
        cursor: pointer;
    }

    .aq-primary {
        background: #3867f5;
        color: #fff;
    }

    .aq-secondary {
        background: #eef2f7;
        color: #233047;
    }

    .aq-card {
        background: #fff;
        border: 1px solid #dce5f0;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 5px 15px rgba(24, 43, 68, .03);
    }

    .aq-card h2 {
        margin: 0 0 6px;
        font-size: 21px;
    }

    .aq-field {
        margin-top: 22px;
    }

    .aq-field label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
    }

    .aq-field input:not([type="checkbox"]),
    .aq-field textarea {
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background: #fff;
        color: #142238;
        font: inherit;
    }

    .aq-field textarea {
        min-height: 190px;
        resize: vertical;
    }

    .aq-field input:focus,
    .aq-field textarea:focus {
        outline: 2px solid #dbe6ff;
        border-color: #3867f5;
    }

    .aq-hint {
        display: block;
        margin-top: 7px;
        color: #64748b;
        font-size: 12px;
    }

    .aq-status {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 24px;
        padding: 16px;
        border: 1px solid #dce5f0;
        border-radius: 10px;
    }

    .aq-status input {
        width: 18px;
        height: 18px;
        accent-color: #3867f5;
    }

    .aq-actions {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 24px;
    }

    .aq-error {
        margin-top: 6px;
        color: #b42318;
        font-size: 13px;
    }

    .aq-alert {
        padding: 14px 18px;
        margin-bottom: 18px;
        border-radius: 8px;
        background: #fff0f0;
        color: #b42318;
        border: 1px solid #fecaca;
    }

    @media (max-width: 600px) {
        .aq-header h1 {
            font-size: 25px;
        }

        .aq-card {
            padding: 18px;
        }
    }
</style>

<div class="aq-create">

    <div class="aq-header">
        <div>
            <h1>Add AI Question</h1>
            <p class="aq-muted">
                Create a question and instructions for the IdeaSoch AI assistant.
            </p>
        </div>

        <a href="{{ route('admin.ai.questions') }}"
           class="aq-btn aq-secondary">
            ← Back to Questions
        </a>
    </div>

    @if($errors->any())
        <div class="aq-alert">
            <strong>Please correct the following errors:</strong>
            <ul style="margin:8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.ai.questions.store') }}" method="POST">
        @csrf

        <div class="aq-card">
            <h2>Question Details</h2>
            <p class="aq-muted">
                Enter the question and tell the AI how to respond.
            </p>

            <div class="aq-field">
                <label for="question">Question Title *</label>
                <input
                    type="text"
                    id="question"
                    name="question"
                    maxlength="255"
                    value="{{ old('question') }}"
                    placeholder="e.g. How do I start a business in India?"
                    required
                >
                @error('question')
                    <div class="aq-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="aq-field">
                <label for="category">Category</label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    maxlength="100"
                    value="{{ old('category') }}"
                    placeholder="e.g. Business Planning"
                >
                <small class="aq-hint">
                    Optional. Example: Business Planning, Budget, Marketing.
                </small>
                @error('category')
                    <div class="aq-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="aq-field">
                <label for="prompt">AI Prompt / Instructions *</label>
                <textarea
                    id="prompt"
                    name="prompt"
                    required
                    placeholder="Example: You are an expert business advisor for India. Explain the steps, budget, required documents and practical tips."
                >{{ old('prompt') }}</textarea>
                <small class="aq-hint">
                    These instructions tell the AI how to answer this question.
                </small>
                @error('prompt')
                    <div class="aq-error">{{ $message }}</div>
                @enderror
            </div>

            <label class="aq-status">
                <input
                    type="checkbox"
                    name="status"
                    value="1"
                    @checked(old('status', '1') == '1')
                >
                <span>
                    <strong>Active Question</strong><br>
                    <small class="aq-muted">
                        Active questions can be selected for use by the assistant.
                    </small>
                </span>
            </label>
        </div>

        <div class="aq-actions">
            <a href="{{ route('admin.ai.questions') }}"
               class="aq-btn aq-secondary">
                Cancel
            </a>

            <button type="submit" class="aq-btn aq-primary">
                Save AI Question
            </button>
        </div>
    </form>
</div>
@endsection
