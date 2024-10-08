<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmailAccount;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserVerificationController extends Controller
{
    private const EMAIL_USER = 'EMAIL_USER';
    private const USERNAME = 'USERNAME';

    public function userVerify(Request $request)
    {
        $user = Auth::user();

        if ($user->type === self::EMAIL_USER && !$user->hasVerifiedEmail()) {
            Mail::to($user->identifier)->queue(
                new VerifyEmailAccount($user),
            );
            return view('pages.email-verification.verify-email');
        }

        if ($user->type === self::USERNAME && !$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect(route('login.username'));
        }

        return redirect(route('welcome'));
    }

    public function verifyEmail(EmailVerificationRequest $request) {
        if (!$request->hasValidSignature()) {
            abort(404);
        }

        $request->fulfill();
        return redirect(route('welcome'));
    }

    public function resend(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(404);
        }

        $user = User::where('id', $request->id)->first();

        if ($user == null) {
            abort(404);
        }

        return back()->with('resent_message', 'Se reenvío el correo de verificación');
    }
}
