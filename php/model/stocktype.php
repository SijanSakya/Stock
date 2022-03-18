<?php
class stocktype
{

    public $stocktype_id;
    public $name;
    public $created_at;


    public function __construct($stocktype_id = "", $name = "", $created_at = "")
    {


        $this->stocktype_id = mysqli_real_escape_string($GLOBALS['conn'], $stocktype_id);
        $this->name = mysqli_real_escape_string($GLOBALS['conn'], $name);
        $this->created_at = mysqli_real_escape_string($GLOBALS['conn'], $created_at);
    }
    public function toString()
    {
        return "stocktype[stocktype_id = " . $this->stocktype_id . "]";
    }
}
