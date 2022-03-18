<?php
class company
{

    public $company_id;
    public $business_date;
    public $security_id;
    public $symbol;
    public $security_name;
    public $open_price;
    public $high_price;
    public $low_price;
    public $close_price;
    public $total_traded_quantity;
    public $totol_traded_value;
    public $previous_day_close_price;
    public $fifty_two_week_high;
    public $fifty_two_week_low;
    public $last_updated_time;
    public $last_updated_price;
    public $market_capitalization;
    public $created_at;


    public function __construct(
        $company_id = "",
        $business_date = "",
        $security_id = "",
        $symbol = "",
        $security_name = "",
        $open_price = "",
        $high_price = "",
        $low_price = "",
        $close_price = "",
        $total_traded_quantity = "",
        $total_traded_value = "",
        $previous_day_close_price = "",
        $fifty_two_week_high = "",
        $fifty_two_week_low = "",
        $last_updated_time = "",
        $last_updated_price = "",
        $market_capitalization = "",
        $created_at = ""
    ) {


        $this->company_id = mysqli_real_escape_string($GLOBALS['conn'], $company_id);
        $this->business_date = mysqli_real_escape_string($GLOBALS['conn'], $business_date);
        $this->security_id = mysqli_real_escape_string($GLOBALS['conn'], $security_id);
        $this->symbol = mysqli_real_escape_string($GLOBALS['conn'], $symbol);
        $this->security_name = mysqli_real_escape_string($GLOBALS['conn'], $security_name);
        $this->open_price = mysqli_real_escape_string($GLOBALS['conn'], $open_price);
        $this->high_price = mysqli_real_escape_string($GLOBALS['conn'], $high_price);
        $this->low_price = mysqli_real_escape_string($GLOBALS['conn'], $low_price);
        $this->close_price = mysqli_real_escape_string($GLOBALS['conn'], $close_price);
        $this->total_traded_quantity = mysqli_real_escape_string($GLOBALS['conn'], $total_traded_quantity);
        $this->total_traded_value = mysqli_real_escape_string($GLOBALS['conn'], $total_traded_value);
        $this->previous_day_close_price = mysqli_real_escape_string($GLOBALS['conn'], $previous_day_close_price);
        $this->fifty_two_week_high = mysqli_real_escape_string($GLOBALS['conn'], $fifty_two_week_high);
        $this->fifty_two_week_low = mysqli_real_escape_string($GLOBALS['conn'], $fifty_two_week_low);
        $this->last_updated_time = mysqli_real_escape_string($GLOBALS['conn'], $last_updated_time);
        $this->last_updated_price = mysqli_real_escape_string($GLOBALS['conn'], $last_updated_price);
        $this->market_capitalization = mysqli_real_escape_string($GLOBALS['conn'], $market_capitalization);
        $this->created_at = mysqli_real_escape_string($GLOBALS['conn'], $created_at);
    }
    public function toString()
    {
        return "company[company_id = " . $this->company_id . "]";
    }
}
