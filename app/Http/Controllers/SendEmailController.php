<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    /**
     * Return the view for email
     */
    function index()
    {
     return view('send_email');
    }

    /**
     * Control the sending of emails 
     */
    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

    /**
     * Send email for new registration
     */
     Mail::to($request->email)->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');
    }
}
?>