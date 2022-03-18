<?php
class mystock
{

    public $mystock_id;
    public $scrip_sym;
    public $quantity;
    public $price;
    public $stocktype_id;
    public $transaction_date;
    public $user_id;
    public $broker_commision;
    public $dp_charge;
    public $nepse_fee;
    public $created_at;


    public function __construct(
        $mystock_id = "",
        $scrip_sym = "",
        $quantity = "",
        $price = "",
        $stocktype_id = "",
        $transaction_date = "",
        $user_id = "",
        $broker_commision = "",
        $dp_charge = "",
        $nepse_fee = "",
        $created_at = ""
    ) {


        $this->mystock_id = mysqli_real_escape_string($GLOBALS['conn'], $mystock_id);
        $this->scrip_sym = mysqli_real_escape_string($GLOBALS['conn'], $scrip_sym);
        $this->quantity = mysqli_real_escape_string($GLOBALS['conn'], $quantity);
        $this->price = mysqli_real_escape_string($GLOBALS['conn'], $price);
        $this->stocktype_id = mysqli_real_escape_string($GLOBALS['conn'], $stocktype_id);
        $this->transaction_date = mysqli_real_escape_string($GLOBALS['conn'], $transaction_date);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
        $this->broker_commision = mysqli_real_escape_string($GLOBALS['conn'], $broker_commision);
        $this->dp_charge = mysqli_real_escape_string($GLOBALS['conn'], $dp_charge);
        $this->nepse_fee = mysqli_real_escape_string($GLOBALS['conn'], $nepse_fee);
        $this->created_at = mysqli_real_escape_string($GLOBALS['conn'], $created_at);
    }
    public function toString()
    {
        return "mystock[mystock_id = " . $this->mystock_id . "]";
    }
}
