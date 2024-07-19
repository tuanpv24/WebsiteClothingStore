<body>
    <div class="wrapper">
        <div class="admin">
            <h1>Trang quản lý Admin</h1>
        </div>
        <div class="row-box">
            <div class="small-box">
                <div class="inner">
                    <h3><?php foreach ($tongsp as $sp) {
                            extract($sp);
                            echo $total;
                        } ?></h3>
                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
            <div class="small-box">
                <div class="inner">
                    <h3> <?php foreach ($tongdm as $dm) {
                                extract($dm);
                                echo $total;
                            } ?></h3>
                    <p>Danh mục</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-signal"></i>
                </div>

            </div>
            <div class="small-box">
                <div class="inner">
                    <h3><?php foreach ($tongkhachhang as $khachhang) {
                            extract($khachhang);
                            echo $total;
                        } ?></h3>
                    <p>Người dùng đã đăng ký</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>

            </div>
            <div class="small-box">
                <div class="inner">
                    <h3><?php foreach ($tongbl as $bl) {
                            extract($bl);
                            echo $total;
                        } ?></h3>
                    <p>Lượt bình luận</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="view-all">
            <h1>Thống kê sản phẩm</h1>
        </div>
        <table border="1">
            <tr>
                <td style="width: 100px">Id danh mục</td>
                <td style="width: 300px">Tên danh mục</td>
                <td style="width: 200px">Số lượng</td>
                <td style="width: 200px">Giá cao nhất</td>
                <td style="width: 200px">Giá thấp nhất</td>
                <td style="width: 200px">Giá trung bình</td>
            </tr>
            <?php foreach ($listthongke as $thongke) {
                extract($thongke);
                echo '<tr>
                <td>' . $madm . '</td>
                <td>' . $tendm . '</td>
                <td>' . $countsp . '</td>
                <td>' . $minprice . 'đ</td>
                <td>' . $maxprice . 'đ</td>
                <td>' . $avgprice . 'đ</td>
                </tr>';
            } ?>
        </table>
        <div class="chart">

            <div class="inner-chart">

                <div class="chart-view">
                    <h1>Biểu đồ</h1>
                    <div id="donutchart"></div>
                </div>

                <!-- <div class="chart-view">
                        <h1>Biểu đồ</h1>
                        <div id="piechart"></div>
                    </div> -->
            </div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"],
                });

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng sản phẩm'],
                        <?php
                        $tongdm = count($listthongke);
                        $i = 1;
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tongdm) {
                                $dauphay = "";
                            } else {
                                $dauphay = ",";
                            }
                            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                            $i += 1;
                        } ?>
                    ]);

                    var options = {
                        title: "Quản lý danh mục",
                        pieHole: 0.4,
                        'width': 1000,
                        'height': 500
                    };

                    var chart = new google.visualization.PieChart(
                        document.getElementById("donutchart")
                    );
                    chart.draw(data, options);
                }
                google.charts.setOnLoadCallback(drawChart);
            </script>
        </div>
        
    </div>
</body>