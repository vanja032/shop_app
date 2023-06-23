<nav class="col-md-2 d-none d-lg-block sidebar py-4">
    <div class="sidebar-sticky d-flex flex-column">
        <ul class="nav flex-column">
            <li class="nav-item py-2">
                <a class="nav-link <?php if ($category_name == "all")
                    echo "active"; ?>" href="shop.php?category=all">
                    All categories
                </a>
            </li>
            <?php
            foreach ($categories as $category) {
                ?>
                <li class="nav-item py-2">
                    <a class="nav-link <?php if ($category_name == $category->id)
                        echo "active"; ?>" href="shop.php?category=<?= $category->id ?>">
                        <?= $category->name ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="flex-grow-1"></div>
    </div>
</nav>