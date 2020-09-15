<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->get();

        return View('/admin/feedback', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'text' => 'required',
        ]);

        Feedback::create($request->all());

        return redirect('/admin/feedbacks');
    }
}
