<?php

// app/Http/Controllers/PaymentController.php

use Illuminate\Support\Facades\Mail;
use App\Mail\DelayedPaymentNotification;

class PaymentController extends Controller
{
    public function payAmortizationsBeforeDate($givenDate)
    {
        $amortizations = Amortization::where('schedule_date', '<=', $givenDate)->get();

        foreach ($amortizations as $amortization) {
            $project = Project::find($amortization->project_id);

            // Check if the amortization is delayed
            if (now() > $amortization->schedule_date) {
                $this->sendDelayedPaymentEmails($project->promoter, $amortization);
            }

            // Pay the amortization using the project's wallet balance
            $this->payAmortization($project, $amortization);
        }

        return response()->json(['message' => 'Payments processed successfully']);
    }

    private function payAmortization($project, $amortization)
    {
        // Your logic to deduct the payment amount from the project's wallet balance
        $project->wallet_balance -= $amortization->amount;
        $project->save();

        // Create a payment record
        Payment::create([
            'amortization_id' => $amortization->id,
            'amount' => $amortization->amount,
            // Add other payment fields
        ]);
    }

    private function sendDelayedPaymentEmails($promoter, $amortization)
    {
        // Your logic to send emails to the promoter and profiles associated with the delayed payment
        $promoterEmail = $promoter->email;

        Mail::to($promoterEmail)->send(new DelayedPaymentNotification($amortization));

        foreach ($amortization->payments as $payment) {
            $profile = Profile::find($payment->profile_id);
            $profileEmail = $profile->email;

            Mail::to($profileEmail)->send(new DelayedPaymentNotification($amortization));
        }
    }
}