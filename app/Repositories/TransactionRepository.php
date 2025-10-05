<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;

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
}