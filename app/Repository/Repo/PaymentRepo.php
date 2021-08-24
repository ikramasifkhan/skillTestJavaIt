<?php

namespace App\Repository\Repo;

use App\Models\Payment;
use App\Repository\Interfaces\PaymentInterface;

class PaymentRepo implements PaymentInterface
{
    public function getLatestPayment()
    {
        return Payment::latest();
    }
    public function getAllPaymentList()
    {
        return Payment::all();
    }

    /**
     * createPayment
     *
     * @param  mixed $data
     * @return void
     */
    public function createPayment($data)
    {
        return Payment::create($data);
    }

    /**
     * getAnIntence
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function getAnIntence($paymentId)
    {
        return Payment::findOrFail($paymentId);
    }

    /**
     * updatePayment
     *
     * @param  mixed $data
     * @param  mixed $paymentId
     * @return object
     */
    public function updatePayment($data, $paymentId)
    {
        $payment = $this->getAnIntence($paymentId);
        return $payment->update($data);
    }

    /**
     * deletePayment
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function deletePayment($paymentId)
    {
        $payment = $this->getAnIntence($paymentId);
        $payment->delete();
    }

    /**
     * changeStatusPayment
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function changeStatusPayment($paymentId)
    {
        $payment = $this->getAnIntence($paymentId);
        return activeInactiveChange($payment, 'payment.index');
    }
}
