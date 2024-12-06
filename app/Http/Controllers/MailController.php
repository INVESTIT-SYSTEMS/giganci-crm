<?php

namespace App\Http\Controllers;

use App\Mail\SendingMail;
use App\Models\Group;
use App\Models\Location;
use App\Models\PotentialStudent;
use App\Models\Student;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use function Laravel\Prompts\alert;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function messageStudent(Request $request)
    {
        if ($request->has('check')) {
            $emailList = $request->get('check');
            return view('wpsms', ['student' => Student::whereIn('id', $emailList)->get(),
                'location' => Location::all(),
                'group' => Group::all(),
            ]);
        } else {
            return redirect(route('students.index'))->with('send', 'wybierz uczniów ');

        }
    }

    public function messagePotentialStudent(Request $request)
    {
        if ($request->has('check')) {
            $emailList = $request->get('check');
            return view('wpsms', ['student' => PotentialStudent::whereIn('id', $emailList)->get(),
                'location' => Location::all(),
                'group' => Group::all(),
            ]);
        } else {
            return redirect(route('potentialStudents.index'))->with('send', 'wybierz uczniów ');

        }

    }

    public function messageGroup(Request $request)
    {
        if ($request->has('check')) {
            $emailList = $request->get('check');
            return view('wpsms', ['student' => Student::whereIn("group_id", $emailList)->get(),
                'location' => Location::all(),
                'group' => Group::all(),
            ]);
        } else {
            return redirect(route('groups.index'))->with('send', 'wybierz grupę ');

        }

    }

    public function sendStudent(Request $request)
    {
        if ($request->has('emails')) {
            $users = Student::whereIn('parent_email', $request->get('emails'))->get();

            $mailData = [
                'title' => $request->get('title'),
                'body' => $request->get('message'),
            ];

            foreach ($users as $user) {
                Mail::to($user->parent_email)->send(new SendingMail($mailData));
            }

            return redirect(route('main.index'))->with('send', 'pomyślne wysłano wiadomść');
        } else {
            return redirect(route('messageStudent.index'))->with('send', 'wystąpił jakiś bląd');

        }


    }
    public function sendPotentialStudent(Request $request)
    {
        if ($request->has('emails')) {
            $users = PotentialStudent::whereIn('parent_email', $request->get('emails'))->get();

            $mailData = [
                'title' => $request->get('title'),
                'body' => $request->get('message'),
            ];

            foreach ($users as $user) {
                Mail::to($user->parent_email)->send(new SendingMail($mailData));
            }

            return redirect(route('main.index'))->with('send', 'pomyślne wysłano wiadomść');
        } else {
            return redirect(route('messageStudent.index'))->with('send', 'wystąpił jakiś bląd');

        }


    }

}



