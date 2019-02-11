<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'feedback' => ['required', 'text']
        ]);
    }


    protected function create(array $data)
    {
        return Feedback::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'feedback' => $data['feedback']
        ]);
    }

    protected function publish(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|max:50',
            'feedback' => 'required'
        ]);
        tap(new Feedback($data))->save();

        return redirect('/sent');

    }

    public function sent()
    {
        return view('feedbacks.sent');
    }








}
