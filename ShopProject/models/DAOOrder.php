<?php
require_once "../database/database.php";
require_once "structures/Item_Order.php";
require_once "../utils/validation.php";
require_once "DAOItemOrder.php";
require_once "DAOStatus.php";
require_once "structures/Cart.php";

class DAOOrder
{
    private $database;

    private $SELECT_ALL = "SELECT order_id, user_id, first_name, last_name, username, email, profile_picture, status_id, memo FROM orders o 
    INNER JOIN statuses s ON o.status_id = s.status_id
    INNER JOIN users u ON o.user_id = u.user_id";

    private $SELECT_BY_USER = "SELECT order_id, status_id, name, description, created, memo FROM orders WHERE user_id = ?";

    private $SELECT_BY_STATUS = "SELECT order_id, user_id, first_name, last_name, username, email, profile_picture, status_id, memo FROM orders o 
    INNER JOIN statuses s ON o.status_id = s.status_id
    INNER JOIN users u ON o.user_id = u.user_id
    WHERE s.name = ?";

    private $INSERT = "INSERT INTO orders(user_id, status_id, memo) VALUES(?, ?, ?)";

    private $DELETE = "DELETE FROM orders WHERE order_id = ?";

    private $UPDATE_STATUS = "UPDATE orders SET status_id = ? WHERE order_id = ?";

    public function __construct()
    {
        $this->database = Database::createInstance();
    }

    public function GetAll(): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_ALL);

            $statement->execute();
            $result = $statement->fetchAll();
            $orders = [];
            if ($result) {
                $io_dao = new DAOItemOrder();
                foreach ($result as $row) {
                    $io = $io_dao->GetByOrder($row["order_id"]);
                    $user = new User($row["user_id"], $row["first_name"], $row["last_name"], $row["email"], $row["username"], $row["profile_picture"], null, new Role(null, null, null, null));
                    $status = new Status($row["status_id"], $row["name"], $row["description"], $row["created"]);
                    $orders[] = new Order($row["order_id"], $user, $status, $io, $row["memo"]);
                }
            }
            return $orders;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function GetByUser(User $user): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_USER);
            $statement->bindValue(1, $user->id);

            $statement->execute();
            $result = $statement->fetchAll();
            $orders = [];
            if ($result) {
                $io_dao = new DAOItemOrder();
                foreach ($result as $row) {
                    $io = $io_dao->GetByOrder($row["order_id"]);
                    $status = new Status($row["status_id"], $row["name"], $row["description"], $row["created"]);
                    $orders[] = new Order($row["order_id"], $user, $status, $io, $row["memo"]);
                }
            }
            return $orders;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function GetByStatus($status_name): array
    {
        try {
            $statement = $this->database->prepare($this->SELECT_BY_STATUS);
            $statement->bindValue(1, $status_name);

            $statement->execute();
            $result = $statement->fetchAll();
            $orders = [];
            if ($result) {
                $io_dao = new DAOItemOrder();
                foreach ($result as $row) {
                    $io = $io_dao->GetByOrder($row["order_id"]);
                    $user = new User($row["user_id"], $row["first_name"], $row["last_name"], $row["email"], $row["username"], $row["profile_picture"], null, new Role(null, null, null, null));
                    $status = new Status($row["status_id"], $row["name"], $row["description"], $row["created"]);
                    $orders[] = new Order($row["order_id"], $user, $status, $io, $row["memo"]);
                }
            }
            return $orders;
        } catch (Exception $ex) {
            return [];
        }
    }

    public function Create($user_id, Cart $cart)
    {
        $result = false;
        $io_dao = new DAOItemOrder();
        $order_id = -1;
        try {
            $status_dao = new DAOStatus();
            $status_id = $status_dao->GetByName("pending");

            if (count($status_id) == 0)
                throw new Exception("Status not found");
            $statement = $this->database->prepare($this->INSERT);
            $statement->bindValue(1, $user_id);
            $statement->bindValue(2, $status_id[0]->id);
            $statement->bindValue(3, "Order by user No. $user_id");

            $result = $statement->execute();
            if ($result) {
                $order_id = $this->database->lastInsertId();
                foreach ($cart->Get() as $item_id => $quantity) {
                    $tmp_result = $io_dao->Create($order_id, $item_id, $quantity);
                    if (!$tmp_result) {
                        throw new Exception("Error while inserting items into order.");
                    }
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            if ($result && $order_id > -1) {
                $io_dao->DeleteByOrder($order_id);

                $statement = $this->database->prepare($this->DELETE);
                $statement->bindValue(1, $order_id);
                $statement->execute();
            }
            return false;
        }
    }

    public function UpdateStatus($order_id, $status_name)
    {
        try {
            $status_dao = new DAOStatus();
            $status_id = $status_dao->GetByName($status_name);

            $statement = $this->database->prepare($this->UPDATE_STATUS);
            $statement->bindValue(1, $status_id);
            $statement->bindValue(2, $order_id);

            $result = $statement->execute();
            if ($result) {
                if ($status_name == "approved") {
                    $item_dao = new DAOItem();
                    $io_dao = new DAOItemOrder();

                    $items_orders = $io_dao->GetByOrder($order_id);
                    foreach ($items_orders as $io) {
                        $tmp_result = $item_dao->UpdateQuantity($io->item->id, ($io->item->quantity - $io->quantity));
                        if (!$tmp_result) {
                            throw new Exception("Error while updating items quantity.");
                        }
                    }
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
}

?>