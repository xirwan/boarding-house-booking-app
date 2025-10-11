<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Room;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession()
    {

        return session()->get('transaction');
    }

    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);

        foreach($data as $key => $value){
            $transaction[$key] = $value;
        }
        //foreach($data as $key => $value) dalam code tersebut $data berisi array asosiatif kemdian dilooping dengan foreach($data as $key => $ value), $key merupakan key dalam asositif array dan $value adalah isi data dari key asosiatif arraynya.

        session()->put('transaction', $transaction);
        //digunakan fungsi put() untuk mengupdate atau membuat data baru dalam transaction
    }

    public function saveTransaction($data)
    {
        $room = Room::find($data['room_id']);

        $data = $this->prepareTransactionData($data, $room);

        $transaction = Transaction::create($data);

        session()->forget('transaction');

        return $transaction;
    }

    private function prepareTransactionData($data, $room)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        $data['transaction_date'] = now();

        $total = $this->calculateTotalAmount($room->price_per_month, $data['duration']);
        $data['total_amount'] = $this->calculatePaymentAmount($total, $data['payment_method']);

        return $data;
    }

    private function generateTransactionCode()
    {
        return 'BBHR' . rand(100000, 999999);
    }

    private function calculateTotalAmount($pricePerMonth, $duration)
    {
        $subTotal = $pricePerMonth * $duration;
        $tax = $subTotal * 0.11;
        $insurance = $subTotal * 0.01;

        return $subTotal + $tax + $insurance;
    }

    private function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod === 'full_payment' ? $total : $total * 0.3;
    }

    public function getTransactionByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }

    public function getTransactionByCodeEmailPhone($code, $email, $phone)
    {
        return Transaction::where('code', $code)->where('email', $email)->where('phone_number', $phone)->first();
    }
}