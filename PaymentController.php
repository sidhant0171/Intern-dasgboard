<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Import the QrCode facade

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        // Initialize Razorpay API with your key and secret
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Create an order with Razorpay
        $order = $api->order->create([
            'receipt' => 'order_rcptid_11',
            'amount' => 10000, // Amount in paise (10000 paise = 100 INR)
            'currency' => 'INR',
            'payment_capture' => 1 // Auto capture
        ]);

        // Generate the payment link with the order ID
        $paymentLink = "https://razorpay.me/" . $order['id'];

        // Generate the QR code for the payment link
        $qrCode = QrCode::size(250)->generate($paymentLink);

        // Return the view with the QR code
        return view('pay', ['qrCode' => $qrCode]);
    }
}
