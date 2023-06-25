<?php
require_once "User.php";
require_once "Status.php";
require_once "Item_Order.php";

class Order
{
    public $id;
    public $user;
    public $status;
    public $items;
    public $memo;

    public function __construct($id, User $user, Status $status, array $items, $memo)
    {
        $this->id = $id;
        $this->user = $user;
        $this->status = $status;
        $this->items = $items;
        $this->memo = $memo;
    }
}

?>