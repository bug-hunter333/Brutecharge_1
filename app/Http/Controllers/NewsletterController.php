<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Mail\WelcomeToBeast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->email;
        
        try {
            // Check if already subscribed
            $existingSubscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if ($existingSubscriber) {
                if ($existingSubscriber->status === 'active') {
                    return response()->json([
                        'success' => false,
                        'message' => 'This beast is already part of our intel network! 💪'
                    ]);
                } else {
                    // Resubscribe if previously unsubscribed
                    $existingSubscriber->resubscribe();
                    $subscriber = $existingSubscriber;
                }
            } else {
                // Create new subscriber
                $subscriber = NewsletterSubscriber::create([
                    'email' => $email,
                    'status' => 'active',
                    'subscribed_at' => now(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }

            // Send welcome email
            Mail::to($email)->send(new WelcomeToBeast($subscriber));

            return response()->json([
                'success' => true,
                'message' => 'Welcome to Beast Mode! Check your email for exclusive content. 🚀'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    public function unsubscribe(Request $request)
    {
        $email = $request->email;
        
        $subscriber = NewsletterSubscriber::where('email', $email)->first();
        
        if ($subscriber) {
            $subscriber->unsubscribe();
            return response()->json([
                'success' => true,
                'message' => 'Successfully unsubscribed from Beast Mode Intel.'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Email not found in our system.'
        ], 404);
    }

    // Admin methods
    public function stats()
    {
        $stats = [
            'total_subscribers' => NewsletterSubscriber::count(),
            'active_subscribers' => NewsletterSubscriber::active()->count(),
            'unsubscribed' => NewsletterSubscriber::where('status', 'unsubscribed')->count(),
            'recent_subscribers' => NewsletterSubscriber::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        return response()->json($stats);
    }
}