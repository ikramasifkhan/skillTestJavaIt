<?php

namespace App\Repository\Interfaces;

interface PaymentInterface
{
    /**
     * getLatestPayment
     *
     * @return void
     */
    public function getLatestPayment();

    /**
     * getAllPaymentList
     *
     * @return void
     */
    public function getAllPaymentList();

    /**
     * createPayment
     *
     * @param  mixed $data
     * @return void
     */
    public function createPayment(array $data);

    /**
     * getAnIntence
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function getAnIntence($paymentId);

    /**
     * updatePayment
     *
     * @param  mixed $data
     * @param  mixed $paymentId
     * @return void
     */
    public function updatePayment(array $data, $paymentId);

    /**
     * deletePayment
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function deletePayment($paymentId);

    /**
     * changeStatusPayment
     *
     * @param  mixed $paymentId
     * @return void
     */
    public function changeStatusPayment($paymentId);
}
