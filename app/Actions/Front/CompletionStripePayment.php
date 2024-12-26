<?php

namespace App\Actions\Front;

use App\Models\Booking;
use Illuminate\Database\QueryException;

class CompletionStripePayment
{
    public function __invoke(Booking $booking)
    {

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $paymentIntent = $stripe->paymentIntents->retrieve(
            request()->query('payment_intent'),
            []
        );

        if ($paymentIntent->status == 'succeeded') {
            try {
                // Update payment
                $booking->forceFill([
                    'payment_method' => 'stripe',
                    'payment_status' => 'paid',
                    'transition_id' => $paymentIntent->id,
                ])->save();

            } catch (QueryException $e) {
                echo $e->getMessage();
                return;
            }

            return to_route('user.bookings')->with([
                'success' => 'Payment Successfully'
            ]);
        }

        return to_route('user.bookings')->with([
            'booking' => $booking->id,
            'status' => $paymentIntent->status,
        ]);
    }

}
