<?php
class user
{

    public $user_id;
    public $username;
    public $email;
    public $password;
    public $is_activated;
    public $created_at;


    public function __construct($user_id = "", $username = "", $email = "", $password = "", $is_activated = "", $created_at = "")
    {


        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
        $this->username = mysqli_real_escape_string($GLOBALS['conn'], $username);
        $this->email = mysqli_real_escape_string($GLOBALS['conn'], $email);
        $this->password = mysqli_real_escape_string($GLOBALS['conn'], $password);
        $this->is_activated = mysqli_real_escape_string($GLOBALS['conn'], $is_activated);
        $this->created_at = mysqli_real_escape_string($GLOBALS['conn'], $created_at);
    }
    public function toString()
    {
        return "user[user_id = " . $this->user_id . ",username=" . $this->username . "]";
    }
    //user



    public function create_user()
    {
        $sql = "INSERT INTO `user`( `username`, `email`, `password`, `is_activated`) 
        VALUES ('$this->username','$this->email','$this->password','$this->is_activated')";

        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    //User can verify their account UPDATE Activation true
    public function update_user()
    {
        $sql = "UPDATE `user`
	SET `username` = '$this->username', `password` = '$this->password' WHERE `user_id` = '$this->user_id'";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
        }
    }
    //User can login SELECT WHERE email , password , activation
    public function read_user()
    {

        $sql = "SELECT * FROM `user` WHERE `email` = '$this->email' AND `password` = '$this->password'";
        echo $sql;
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['is_activated'] = $row['is_activated'];
                $_SESSION['created_at'] = $row['created_at'];
                return true;
            } else {
            }
        } else {
            return false;
        }
    }

    public function delete_user($id)
    {
        $sql = "DELETE FROM `user` WHERE `usere_id` ='$id' ";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }



    //mystock
    public function create_mystock($objmystock)
    {
        $transAmt = $objmystock->quantity * $objmystock->price;
        $sql = "INSERT INTO `mystock`( `scrip_sym`, `quantity`, `price`, `stocktype_id`, `transaction_date`, `user_id`, `broker_commision`, `dp_charge`, `nepse_fee`) 
        VALUES ('$objmystock->scrip_sym', '$objmystock->quantity','$objmystock->price','$objmystock->stocktype_id','$objmystock->transaction_date','$this->user_id',0.004*$transAmt,25,0.00015*$transAmt)";
        echo $sql;
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    public function read_mystock()
    {

        $sql = "SELECT `mystock_id`,`scrip_sym`, `quantity`, 
            SUM(`price`*`quantity`)DIV SUM(`quantity`) AS `price`,
            `name`, `transaction_date`, `user_id`, `broker_commision`, `dp_charge`, `nepse_fee` 
            FROM `mystock` 
            JOIN `stocktype` ON `stocktype`.`stocktype_id` = `mystock`.`stocktype_id` 
            WHERE `user_id` = '$this->user_id' 
            GROUP BY `scrip_sym`";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return $result;
    }

    public function update_mystock($objmystock)
    {
        $sql = "UPDATE `mystock`
        SET `scrip_sym` = '$objmystock->scrip_sym',`quantity` = '$objmystock->quantity',`price` = '$objmystock->price',
         `stocktype_id` = '$objmystock->stocktype_id',`transaction_date` = '$objmystock->transaction_date',`user_id` = '$this->user_id',`broker_commision` = '$objmystock->broker_commision',`dp_charge` = '$objmystock->dp_charge', `nepse_fee` = '$objmystock->nepse_fee', WHERE `mystock_id` = '$objmystock->mystock_id'";


        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    public function delete_mystock($id)
    {
        $sql = "DELETE FROM `mystock` WHERE `mystock_id` = '$id '";

        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {

            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    //stocktype
    public function create_stocktype($objstocktype)
    {
        $sql = "INSERT INTO `stocktype`(`name`, `created_at`) 
        VALUES ('$objstocktype->name','$objstocktype->created_at')";

        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }

    public function read_stocktype()
    {
        $sql = "SELECT * FROM `stocktype`";

        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {

            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return $result;
    }
    public function update_stocktype($objstocktype)
    {
        $sql = "UPDATE `stocktype` SET `stocktype_id`='$objstocktype->stocktype_id',`name`='$objstocktype->name',`created_at`='$objstocktype->created_at' WHERE 1";


        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }

    public function delete_stocktype($id)
    {
        $sql = "DELETE FROM `stocktype` WHERE 'stocktype_id'='$id'";


        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {

            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }

    //company
    public function create_company($objcompany)
    {
        $sql = "INSERT INTO `company`(
            `company_id`, `business_date`, `security_id`, `symbol`,
            `security_name`, `open_price`, `high_price`, `low_price`,
            `close_price`, `total_traded_quantity`, `total_traded_value`,
            `previous_day_close_price`, `fifty_two_week_high`, `fifty_two_week_low`,
             `last_updated_time`, `last_updated_price`, `total_trades`, `average_traded_price`,
             `market_capitalization`, `created_at`)
             VALUES ('$objcompany->business_date','$objcompany->security_id','$objcompany->symbol',
             '$objcompany->security_name','$objcompany->open_price','$objcompany->high_price',
             '$objcompany->low_price','$objcompany->close_price','$objcompany->total_traded_quantity',
             '$objcompany->total_traded_value','$objcompany->previous_day_close_price','$objcompany->fifty_two_week_high',
             '$objcompany->fifty_two_week_low','$objcompany->last_updated_time',
             '$objcompany->last_updated_price','$objcompany->total_trades','$objcompany->average_traded_price',
             '$objcompany->market_capitalization','$objcompany->created_at')";

        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    public function entryStockData($values)
    {
        $sql = "INSERT INTO `company`( `business_date`, `security_id`, `symbol`,
            `security_name`, `open_price`, `high_price`, `low_price`,
            `close_price`, `total_traded_quantity`, `total_traded_value`,
            `previous_day_close_price`, `fifty_two_week_high`, `fifty_two_week_low`,
             `last_updated_time`, `last_updated_price`, `total_trades`, `average_traded_price`,
             `market_capitalization`)
             VALUES ";
        foreach ($values as $key => $val) {
            extract($val);
            if ($key == count($values) - 1) {

                $sql .= "('$businessDate','$securityId','$symbol',
                '$securityName','$openPrice','$highPrice',
                '$lowPrice','$closePrice','$totalTradedQuantity',
                '$totalTradedValue','$totalTradedValue','$fiftyTwoWeekHigh',
                '$fiftyTwoWeekLow','$lastUpdatedTime',
                '$lastUpdatedPrice','$totalTrades','$averageTradedPrice',
                '$marketCapitalization')";
            } else {
                $sql .= "('$businessDate','$securityId','$symbol',
                 '$securityName','$openPrice','$highPrice',
                 '$lowPrice','$closePrice','$totalTradedQuantity',
                 '$totalTradedValue','$totalTradedValue','$fiftyTwoWeekHigh',
                 '$fiftyTwoWeekLow','$lastUpdatedTime',
                 '$lastUpdatedPrice','$totalTrades','$averageTradedPrice',
                 '$marketCapitalization'),";
            }
        }
        echo $sql;
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }

    public function read_company()
    {
        $sql = "SELECT DISTINCT `business_date`, `security_id`, `symbol`, `security_name`, `open_price`, `high_price`, `low_price`, `close_price`, `total_traded_quantity`, `total_traded_value`, `previous_day_close_price`, `fifty_two_week_high`, `fifty_two_week_low`, `last_updated_time`, `last_updated_price`, `total_trades`, `average_traded_price`, `market_capitalization` FROM `company`";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {

            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return $result;
    }

    public function update_company($objcompany)
    {
        $sql = "UPDATE `company` SET `company_id`='$objcompany->company_id',`business_date`='$objcompany->business_date',`security_id`='$objcompany->security_id',
        `symbol`='$objcompany->symbol',`security_name`='$objcompany->security_name',`open_price`='$objcompany->open_price',`high_price`='$objcompany->high_price',
        `low_price`='$objcompany->low_price',`close_price`='$objcompany->close_price',`total_traded_quantity`='$objcompany->total_traded_quantity',
        `total_traded_value`='$objcompany->total_traded_value',`previous_day_close_price`='$objcompany->previous_day_close_price',
        `fifty_two_week_high`='$objcompany->fifty_two_week_high',`fifty_two_week_low`='$objcompany->fifty_two_week_low',`last_updated_time`='$objcompany->last_updated_time`',
        `last_updated_price`='$objcompany->last_updated_price',`total_trades`='$objcompany->total_trades',`average_traded_price`='$objcompany->average_traded_price',
        `market_capitalization`='$objcompany->market_capitalization',`created_at`='$objcompany->created_at' WHERE  ";


        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {
            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
    public function delete_company($id)
    {
        $sql = "DELETE FROM `company` WHERE 'company_id'='$id'";

        //
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (!$result) {

            echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
            return false;
        }
        return true;
    }
}
