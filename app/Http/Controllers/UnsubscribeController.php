<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnsubscribeController extends Controller
{
    public function __invoke(Request $request): View
    {
        abort_unless($request->hasValidSignature(), 403);

        $subscriber = Subscriber::where('email', $request->query('email'))->first();

        if ($subscriber && $subscriber->status !== 'unsubscribed') {
            $subscriber->update(['status' => 'unsubscribed']);
        }

        return view('unsubscribe');
    }
}
