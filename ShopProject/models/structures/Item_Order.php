<?php
require_once "Order.php";
require_once "Item.php";

class Item_Order
{
    public $created;
    public $item;
    public $quantity;
    public $memo;

    public function __construct($created, Item $item, $quantity, $memo)
    {
        $this->created = $created;
        $this->item = $item;
        $this->quantity = $quantity;
        $this->memo = $memo;
    }
}

?>