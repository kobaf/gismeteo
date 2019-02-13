<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackPost;
use Illuminate\Support\Facades\Auth;
use App\Feedback;


class FeedbackController extends Controller
{
    public function list()
    {
        $feedbacks = Feedback::all()->toArray();
        return view('feedbacks.list', compact('feedbacks'));

    }

    public function writeNew()
    {

        $usr = Auth::check() ? [
            'name' => Auth::User()->name . ' ' . Auth::User()->surname,
            'email' => Auth::User()->email
        ] :
        [   // This is just to avoid checking auth status in view thus complicating HTML
            'name' => '',
            'email' => ''
        ];
        return view('feedbacks.newfb', $usr);
    }

    protected function publish(FeedbackPost $request)
    {
        $data = $request->validated();

        tap(new Feedback($data))->save();

        return redirect('/sent');

    }

    public function sent()
    {
        return view('feedbacks.sent');
    }








}
