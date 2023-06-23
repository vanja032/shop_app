<nav class="navbar navbar-expand-lg navbar-dark bg-custom2 py-3 px-5">
    <a class="navbar-brand" href="shop.php"><img class="page-logo pr-4" src="media/logo.png" style="height: 50px;">
        Shop App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topMenu" aria-controls="topMenu"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse my-4 my-lg-1" id="topMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item px-2 <?php if ($page == "home")
                echo "active"; ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item px-2 <?php if ($page == "shop")
                echo "active"; ?>">
                <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <?php
            if ($page == "shop") {
                ?>
                <li class="nav-item dropdown d-lg-none">
                    <a class="nav-link px-2 dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item <?php if ($category_name == "all")
                            echo "active"; ?>" href="shop.php?category=all">All categories</a>

                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <a class="dropdown-item <?php if ($category_name == $category->id)
                                echo "active"; ?>" href="shop.php?category=<?= $category->id ?>">
                                <?= $category->name ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item px-2 <?php if ($page == "about")
                echo "active"; ?>">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item px-2 <?php if ($page == "contact")
                echo "active"; ?>">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <?php
            if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
                ?>
                <li class="nav-item px-2">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION["user"]->f_name ?> <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-profile">
                        <a class="dropdown-item <?php if ($page == "profile")
                            echo "active"; ?>" href="#">Profile</a>
                        <?php
                        if (strtolower($_SESSION["user"]->role->name) === "user") {
                            ?>
                            <a class="dropdown-item <?php if ($page == "my-orders")
                                echo "active"; ?>" href="#">My orders</a>
                            <?php
                        }
                        ?>
                        <?php
                        if (strtolower($_SESSION["user"]->role->name) === "admin") {
                            ?>
                            <a class="dropdown-item <?php if ($page == "accounts")
                                echo "active"; ?>" href="#">Accounts</a>
                            <?php
                        }
                        ?>
                        <?php
                        if (strtolower($_SESSION["user"]->role->name) === "manager") {
                            ?>
                            <a class="dropdown-item <?php if ($page == "orders")
                                echo "active"; ?>" href="#">Orders</a>
                            <?php
                        }
                        ?>
                        <a class="dropdown-item <?php if ($page == "dashboard")
                            echo "active"; ?>" href="#">Dashboard</a>
                        <a class="dropdown-item"
                            href="../controllers/logout_controller.php?action=logout&location=shop">Logout</a>
                    </div>
                </li>
                <?php
            }
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link px-2 dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                    <span class="color-custom1 cart-items-number">
                        <?php try {
                            if (isset($_SESSION["cart"])) {
                                $cart = unserialize($_SESSION["cart"]);
                                echo $cart->Count();
                            } else {
                                echo 0;
                            }
                        } catch (Exception $ex) {
                            echo 0;
                        } ?>
                    </span>
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-profile">
                    <h5 class="color-custom4 px-4">
                        Cart:&nbsp;
                        <span class="color-custom1 cart-items-number">
                            <?php try {
                                if (isset($_SESSION["cart"])) {
                                    $cart = unserialize($_SESSION["cart"]);
                                    echo $cart->Count();
                                } else {
                                    echo 0;
                                }
                            } catch (Exception $ex) {
                                echo 0;
                            } ?>
                        </span>
                    </h5>
                    <a class="dropdown-item"
                        href="../controllers/logout_controller.php?action=logout&location=shop">Order</a>
                    <a class="dropdown-item"
                        href="../controllers/logout_controller.php?action=logout&location=shop">Clear</a>
                </div>
            </li>
        </ul>
    </div>
</nav>