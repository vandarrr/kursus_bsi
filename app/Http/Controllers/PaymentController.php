<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success()
    {
        return view('payment.success');
    }

    public function pending()
    {
    return view('payment.pending');
    }

    public function failed()
    {
    return view('payment.failed');
    }

}