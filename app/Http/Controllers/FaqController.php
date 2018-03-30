<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FaqQuestion;
use App\FaqComment;
use Validator;

class FaqController extends Controller
{
    public $statuses = [
        0 => 'New',
        1 => 'Approved',
        // 2 => 'Deleted',
    ];

    public function index() {
        $questions = FaqQuestion::get();
        $statuses = $this->statuses;
        return view('admin.faq.index', compact('questions','statuses'));
    }

    public function add() {
        $question = new FaqQuestion;
        $statuses = $this->statuses;
        $action = route('a.faq.create');
        $title = 'Create FAQ';
        return view('admin.faq.form', compact('question','statuses','action','title'));
    }

    public function edit($id) {
        $question = FaqQuestion::findOrFail($id);
        $statuses = $this->statuses;
        $action = route('a.faq.update', ['id' => $question->id]);
        $title = 'Edit FAQ';
        return view('admin.faq.form', compact('question', 'statuses','action','title'));
    }

    public function create(Request $request) {
        $this->validate($request, [
            'question_title' => 'required',
            // 'answer_title' => 'required',
            'answer_content' => 'required',
        ]);
        $reqData = $request->except('_token');
        $question = FaqQuestion::create($reqData);
        return redirect(route('a.faq.edit', ['id' => $question->id]));
    }

    public function update(Request $request, $id) {
        $question = FaqQuestion::findOrFail($id);

        $this->validate($request, [
            'question_title' => 'required',
            // 'answer_title' => 'required',
            'answer_content' => 'required',
        ]);

        $question->question_title = $request->question_title;
        $question->answer_title = $request->answer_title;
        $question->answer_content = $request->answer_content;
        $question->status = $request->status;
        $question->save();
        return redirect(route('a.faq.edit', ['id' => $question->id]));
    }

    public function delete(Request $request, $id) {
        $question = FaqQuestion::findOrFail($id);
        // $question->status = 2;
        $question->delete();
        return redirect()->route('a.faq');
    }

    // public function comments($id) {
    //     $question = FaqQuestion::find($id);
    //     return view('admin.faq.comments', compact('question'));
    // }

    // public function aprove($id) {
    //     $comment = FaqComment::find($id);
    //     $question = FaqQuestion::find($comment->question_id);
    //     $comment->comment_state = 1;
    //     $comment->save();
    //     return view('admin.faq.comments', compact('question'));
    // }

    // public function auth_comment(Request $request) {
    //     // $reqData = $request->except('_token');
    //     // $question = FaqComment::create($reqData);
    //     return 'true';
    // }

    // public function guest_comment(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'question_id' => 'required',
    //         'comment_text' => 'required',
    //         'user_name' => 'required',
    //         'user_email' => 'required|email',
    //         'user_role' => 'required',
    //     ]);
    //     if ($validator->fails())
    //         return 'false';
    //     $reqData = $request->except('_token');
    //     $reqData['comment_state'] = 0;
    //     $question = FaqComment::create($reqData);
    //     return 'true';
    // }
}
