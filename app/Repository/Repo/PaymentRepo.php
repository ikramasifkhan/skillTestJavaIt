<?php

namespace App\Repository\Repo;

use App\Models\Payment;
use App\Repository\Interfaces\PaymentInterface;

class PaymentRepo implements PaymentInterface
{
    public function getLatestPayment(){
        return Payment::latest();
    }
    public function getAllPaymentList(){
        return Payment::all();
    }
    public function createPayment($data){

    }
    public function getAnIntence($paymentId){

    }
    public function updatePayment($data, $paymentId){

    }
    public function deletePayment($paymentId){

    }
    public function changeStatusPayment($paymentId){

    }
}
