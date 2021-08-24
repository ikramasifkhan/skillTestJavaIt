<?php

namespace App\Repository\Interfaces;

interface PaymentInterface
{
    public function getLatestPayment();
    public function getAllPaymentList();
    public function createPayment(array $data);
    public function getAnIntence($klassId);
    public function updatePayment(array $data, $klassId);
    public function deletePayment($klassId);
    public function changeStatusPayment($klassId);
}
