<?php

namespace App\Http\Controllers;

use App\Mail\SendingMail;
use App\Models\Group;
use App\Models\Location;
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

    public function message(Request $request)
    {
        if ($request->has('check')){
            $emailList = $request->get('check');
            return view('wpsms', ['student'=> Student::whereIn('id', $emailList)->get(),
                'location' => Location::all(),
                'group' => Group::all(),
            ]);
        }
        else{
            return redirect(route('students.index'))->with('send', 'wybierz uczniów ');

        }





    }
    public function index(Request $request)
    {
    if ($request->has('emails'))
    {
        $users = Student::whereIn('parent_email', $request->get('emails'))->get();

        $mailData = [
                    'title' => 'Siema siema',
                    'body' => $request->get('message'),
                    'footer' => 'Tak',
                ];

        foreach ($users as $user) {
            Mail::to($user->parent_email)->send(new SendingMail($mailData));
        }

        return redirect(route('students.index'))->with('send', 'pomyślne wysłano wiadomść');
    }else{
        return redirect(route('students.index'))->with('send', 'wystąpił jakiś bląd');

    }



    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


//    public function create()
//    {
//    }
//    public function store(Request $request)
//    {
//    }
//    public function show(string $id)
//    {
//    }
//    public function edit(string $id)
//    {
//    }
//    public function update(Request $request, string $id)
//    {
//    }
//    public function destroy(string $id)
//    {
//    }
}
