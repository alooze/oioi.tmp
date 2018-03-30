<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FaqQuestion;
use App\FaqComment;
use App\User;
use Mail;
use Auth;

class FaqCommentsController extends Controller
{
    public $statuses = [
        0 => 'New',
        1 => 'Approved',
        // 2 => 'Deleted',
    ];

    public $roles = [
        'admin' => 'Admin',
        'manager' => 'Manager',
        'distributor' => 'Distributor',
        'funder' => 'Funder',
        'producer' => 'Producer',
        'other' => 'Other',
    ];

    public function index($id) {
        $question = FaqQuestion::findOrFail($id);
        $statuses = $this->statuses;
        return view('admin.faq.comments', compact('question','statuses'));
    }

    public function add($id) {
        $question = FaqQuestion::findOrFail($id);
        $comment = new FaqComment;

        $user = auth()->user();
        $comment->user_name = $user->name;
        $comment->user_email = $user->email;
        $comment->user_role = 'admin';
        $comment->status = 1;

        $statuses = $this->statuses;
        $roles = $this->roles;

        $action = route('a.faq.comments.create', ['id' => $question->id]);
        $title = 'Create comment';
        return view('admin.faq.commentform', compact('question','statuses','action','title','comment', 'user','roles'));
    }

    public function edit($id, $cid) {
        $question = FaqQuestion::findOrFail($id);
        $comment = FaqComment::findOrFail($cid);

        $statuses = $this->statuses;
        $roles = $this->roles;

        $action = route('a.faq.comments.update', ['id' => $question->id, 'cid' => $comment->id]);
        $title = 'Edit comment';

        return view('admin.faq.commentform', compact('question', 'statuses','action','title','comment','roles'));
    }

    public function create(Request $request, $id) {
        $question = FaqQuestion::findOrFail($id);

        $this->validate($request, [
            'comment_text' => 'required',
            'user_name' => 'required',
            // 'answer_content' => 'required',
        ]);

        $reqData = $request->except('_token');
        $comment = FaqComment::create($reqData);
        return redirect(route('a.faq.comments.edit', ['id' => $question->id, 'cid' => $comment->id]));
    }

    public function update(Request $request, $id, $cid) {
        $question = FaqQuestion::findOrFail($id);
        $comment = FaqComment::findOrFail($cid);

        $this->validate($request, [
            'comment_text' => 'required',
            'user_name' => 'required',
        ]);

        $reqData = $request->except('_token');
        $comment->fill($reqData);
        $comment->save();

        return redirect(route('a.faq.comments.edit', ['id' => $question->id, 'cid' => $comment->id]));
    }

    public function delete(Request $request, $id, $cid) {
        $question = FaqQuestion::findOrFail($id);
        $comment = FaqComment::findOrFail($cid);
        // $comment->status = 2;
        $comment->delete();
        return redirect()->route('a.faq.comments', ['id' => $question->id]);
    }

    public function frontComment(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            abort(401, 'Not logged in');
        }

        $this->validate($request, ['comment' => 'required']);

        $fs['user_name'] = $user->firstname ?: $user->name;
        $fs['user_role'] = $user->role;
        $fs['user_email'] = $user->email;
        $fs['comment_text'] = $request->comment;
        $fs['question_id'] = $request->qid;

        if ($user->role == 'admin' || $user->role == 'manager') {
            $fs['status'] = 1;
        } else {
            $fs['status'] = 0;
        }

        $comment = FaqComment::create($fs);
        return $comment->id;
    }

    public function frontGuestComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'who-you-are' => 'required',
        ]);

        $fs['user_name'] = $request->name;
        $fs['user_role'] = $request->input('who-you-are');
        $fs['user_email'] = $request->email;
        $fs['comment_text'] = $request->comment;
        $fs['question_id'] = $request->qid;
        $fs['status'] = 0;

        $comment = FaqComment::create($fs);
        return $comment->id;
    }


}
