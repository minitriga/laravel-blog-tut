<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'Alex';
		$last = 'Gittings';

		$fullname = $first . " " . $last;
		$email = 'agitting96@gmail.com';

		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, array(
            'email'         => 'required|email',
            'subject'          => 'required|min:3',
            'message'   => 'required|min:10'
        ));

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);
		Mail::send('emails.contact', $data, function($message) use ($data)
			{
				$message->from($data['email']);
				$message->to('agitting96@gmail.com');
				$message->subject($data['subject']);
			});

		Session::flash('success', 'Your Email was Sent!');

		return redirect()->route('index');

	}

}