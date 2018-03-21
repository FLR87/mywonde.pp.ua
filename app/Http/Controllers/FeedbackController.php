<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;


class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function store(Request $request){

        $feedbacks = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $feedbackes = Feedback::create($feedbacks);

        return back()->with('success', 'Feedback has been added');

    }

}
