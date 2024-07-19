<aside>
    <div class="brand">
        <img src="../Img/user2-160x160.jpg" alt="" />
        <p>Admin</p>
    </div>
    <div class="sidebar">
        <div class="form-inline">
            <div class="input-group">
                <input class="form-control form-control-sidebar" placeholder="Search" />
            </div>
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
        <nav>
            <div class="nav-parent">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Trang chủ Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listdm" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listsp" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listtk" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Khách hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listspbt" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm biến thể</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listsize" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kích thước</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listcolor" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Màu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=thongke" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thống kê</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=listdh1" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="function">
                        <form action="" method="post">
                            <input type="submit" name="dangxuat" value="Đăng xuất" />
                        </form>
                    </div>
                </li>
            </div>
        </nav>
    </div>
</aside>
<div class="sidebar-overlay"></div>
<header class="header">
    <div class="menu">
        <div class="menu-bar">
            <i class="fa-solid fa-bars"></i>
        </div>
        <li><a href="../client/index.php">Trang chủ chính</a></li>
    </div>
    <form class="user-search" action="index.php?act=sanpham" method="POST">
        <input type="text" class="input" name="kyw" placeholder="Tìm sản phẩm" />
        <!-- <input
            type="submit"
            class="searchs"
            name="timkiem"
            value="Tìm kiếm"
          /> -->

        <button type="submit" name="timkiem">
            <i class="fas fa-search fa-fw"></i>
        </button>
    </form>
</header>