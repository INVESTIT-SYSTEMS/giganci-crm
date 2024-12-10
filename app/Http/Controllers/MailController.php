<?php

namespace App\Http\Controllers;

use Smsapi\Client\Curl\SmsapiHttpClient;
use Smsapi\Client\SmsapiClient;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
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
        }
        else {
            return redirect(route('students.index'))->with('send', 'Wybierz uczniów');

        }
    }

    public function messagePotentialStudent(Request $request)
    {
        if ($request->has('check')) {
            $emailList = $request->get('check');
            return view('wpsmsPotentialStudent', ['student' => PotentialStudent::whereIn('id', $emailList)->get(),
                'location' => Location::all(),
                'group' => Group::all(),
            ]);
        } else {
            return redirect(route('potentialStudents.index'))->with('send', 'Wybierz uczniów');

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
            return redirect(route('groups.index'))->with('send', 'Wybierz grupę');

        }

    }

    public function sendStudent(Request $request)
    {
            if ($request->get('checkEmail')) {
                if ($request->has('emails')) {
                    $users = Student::whereIn('parent_email', $request->get('emails'))->get();

                    foreach ($users as $user) {
                        Mail::to($user->parent_email)->send(new SendingMail($mailData = [
                            'title' => $request->get('title'),
                            'body' => $request->get('message'),
                            'name' => $user->parent_name,
                        ]));
                    }
                } else {
                    return redirect(route('messageStudent.index'))->with('send', 'Wystąpił błąd z wysyłką email');
                }
            }
            if ($request->get('checkSMS')) {
                if ($request->has('parent_phone_numbers')) {
                    $users = Student::whereIn('parent_phone_number', $request->get('parent_phone_numbers'))->get();

                    $client = new SmsapiHttpClient();

                    $apiToken = 'H3uEZrg3P1pUpdu6b6EUrIrZ9K4ZdIpkMH1rb3Ag';
                    $service = $client->smsapiPlService($apiToken);

                    foreach ($users as $user) {
                        $sms = SendSmsBag::withMessage($user->parent_phone_number, $request->get('message'));
                        $service->smsFeature()->sendSms($sms);
                    }

                }else {
                    return redirect(route('main.index'))->with('send', 'Wystąpił błąd z wysyłką Sms');
                }
            }
            return redirect(route('main.index'))->with('send', 'Wiadomość została wysłana pomyślnie!');
    }
    public function sendPotentialStudent(Request $request)
    {
        if ($request->get('checkEmail')) {
            if ($request->has('emails')) {
                $users = PotentialStudent::whereIn('parent_email', $request->get('emails'))->get();

                foreach ($users as $user) {
                    Mail::to($user->parent_email)->send(new SendingMail($mailData = [
                        'title' => $request->get('title'),
                        'body' => $request->get('message'),
                        'name' => $user->parent_name,
                    ]));
                }
            } else {
                return redirect(route('main.index'))->with('send', 'Wystąpił błąd z wysyłką email');
            }
        }
        if ($request->get('checkSMS')) {
            if ($request->has('parent_phone_numbers')) {
                $users = PotentialStudent::whereIn('parent_phone_number', $request->get('parent_phone_numbers'))->get();

                $client = new SmsapiHttpClient();

                $apiToken = 'H3uEZrg3P1pUpdu6b6EUrIrZ9K4ZdIpkMH1rb3Ag';
                $service = $client->smsapiPlService($apiToken);

                foreach ($users as $user) {
                    $sms = SendSmsBag::withMessage($user->parent_phone_number, $request->get('message'));
                    $service->smsFeature()->sendSms($sms);
                }

            }else{
                return redirect(route('main.index'))->with('send', 'Wystąpił błąd z wysyłką Sms');
            }
        }
        return redirect(route('main.index'))->with('send', 'Wiadomość została wysłana pomyślnie!');
//
    }
}



