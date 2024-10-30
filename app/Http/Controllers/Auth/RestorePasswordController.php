<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailRestorePasswordRequest;
use App\Http\Requests\Auth\ResetEmailPasswordRequest;
use App\Mail\Auth\EmailRestorePasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RestorePasswordController extends Controller
{
    public function sendRestoreEmail() {
        return view('pages.auth.send-restore-email');
    }

    public function sendEmailRestorePassword(EmailRestorePasswordRequest $request) {

        Mail::to($request->email)->queue(
            new EmailRestorePasswordMail($request->email),
        );

        return back()->with(['email_sent' => 'Se envío la solicitud de cambio de contraseña']);
    }

    public function resetEmailPasswordView(Request $request) {
        if (!$request->hasValidSignature()) {
            abort(404);
        }

        $id = $request->id;

        if (Auth::user() && $id != Auth::user()->id) {
            abort(404);
        }

        return view('pages.auth.restore-email-password', compact('id'));
    }

    public function resetEmailPassword(ResetEmailPasswordRequest $request)
    {
        $user = User::where('identifier', $request->id)->first();

        if ( $user == null ) {
            abort(404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        if ($user->type == 'EMAIL_USER') {
            return redirect(route('login.email'));
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect(route('login.username'));
    }

}
