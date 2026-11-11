<?php

namespace App\Http\Controllers;

use App\Models\AiQuestion;
use Illuminate\Http\Request;


class AdminAiQuestionController extends Controller
{
    public function index(Request $request)
    {
        $query = AiQuestion::query()->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('prompt', 'like', "%{$search}%");
            });
        }

        if (in_array($request->input('status'), ['active', 'inactive'], true)) {
            $query->where(
                'status',
                $request->input('status') === 'active'
            );
        }

        $questions = $query->paginate(15)->withQueryString();

        $totalQuestions = AiQuestion::count();

        $activeQuestions = AiQuestion::where('status', true)->count();

        // Conversation tracking is not implemented yet.
        $totalConversations = 0;

        return view('admin.ai-questions', compact(
            'questions',
            'totalQuestions',
            'activeQuestions',
            'totalConversations'
        ));
    }

    public function create()
    {
        return view('admin.ai-questions-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'prompt' => 'required|string',
            'category' => 'nullable|string|max:100',
        ]);

        $validated['status'] = $request->boolean('status');

        AiQuestion::create($validated);

        return redirect()
            ->route('admin.ai.questions')
            ->with('success', 'AI Question successfully added.');
    }

    public function edit(AiQuestion $aiQuestion)
    {
        return view('admin.ai-questions-edit', [
            'question' => $aiQuestion,
        ]);
    }

    public function update(Request $request, AiQuestion $aiQuestion)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'prompt' => 'required|string',
            'category' => 'nullable|string|max:100',
        ]);

        $validated['status'] = $request->boolean('status');

        $aiQuestion->update($validated);

        return redirect()
            ->route('admin.ai.questions')
            ->with('success', 'AI Question successfully updated.');
    }

    public function toggle(AiQuestion $aiQuestion)
    {
        $aiQuestion->status = ! $aiQuestion->status;
        $aiQuestion->save();

        return redirect()
            ->route('admin.ai.questions')
            ->with(
                'success',
                $aiQuestion->status
                    ? 'AI Question activated successfully.'
                    : 'AI Question deactivated successfully.'
            );
    }

    public function destroy(AiQuestion $aiQuestion)
    {
        $aiQuestion->delete();

        return redirect()
            ->route('admin.ai.questions')
            ->with('success', 'AI Question deleted successfully.');
    }
}
