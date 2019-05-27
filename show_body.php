<?php 
        // PHẦN XỬ LÝ PHP
        // PhanLoai

        
        if(isset($_GET["search"])){
            $result = mysqli_query($con,"Select * from products where 
                product_price like '%".$_GET['search']."%' or
                product_title like '%".$_GET['search']."%'
                ");
            }
            else if (isset($_GET["Gia"])) {
                switch ($_GET["Gia"]) {
                    case 1:
                        $result = mysqli_query($con,"Select * from products where 
                product_price < '1000' ORDER BY product_price DESC");
                        break;
                    case 3:
                        $result = mysqli_query($con,"Select * from products where 
                product_price > '10000'
                ORDER BY product_price DESC");
                        break;                  
                    default:
                        $result = mysqli_query($con,"Select * from products where 
                product_price > '1000'  and     
                product_price < '10000' ORDER BY product_price DESC");
                        break;
                }
                
            }
            else if(isset($_GET["brands"])){ 
            $result = mysqli_query($con,"Select * from products where 
                product_brand like '".$_GET['brands']."'
                "); 
            }
            else if(isset($_GET["product"])){
            $result = mysqli_query($con,"Select * from products where 
                product_id like '".$_GET['product']."'
                "); 
            }     
            else if(isset($_GET["cat_title"])){
            $result = mysqli_query($con,"Select * from products where 
                product_cat like '".$_GET['cat_title']."'
                "); 
            }
            else {
            	// BTÌM TỔNG SỐ RECORDS
		        $result = mysqli_query($con, 'select count(*) as total from products');
		        $row = mysqli_fetch_assoc($result);
		        $total_records = $row['total'];
		 
		        // TÌM LIMIT VÀ CURRENT_PAGE
		        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		        $limit = 10;
		 
		        // TÍNH TOÁN TOTAL_PAGE VÀ START
		        // tổng số trang
		        $total_page = ceil($total_records / $limit);
		 
		        // Giới hạn current_page trong khoảng 1 đến total_page
		        if ($current_page > $total_page){
		            $current_page = $total_page;
		        }
		        else if ($current_page < 1){
		            $current_page = 1;
		        }
		 
		        // Tìm Start
		        $start = ($current_page - 1) * $limit;
		 
		        // TRUY VẤN LẤY DANH SÁCH
		        // Có limit và start rồi thì truy vấn CSDL lấy danh sách
		        $result = mysqli_query($con, "SELECT * FROM products LIMIT $start, $limit");
		           
		            // PHẦN HIỂN THỊ PHÂN TRANG
		            // HIỂN THỊ PHÂN TRANG
		 
		            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
		            if ($current_page > 1 && $total_page > 1){
		                echo '<div> <a href="index.php?page='.($current_page-1).'">Prev</a> | </div>';
		            }
		 
		            // Lặp khoảng giữa
		            for ($i = 1; $i <= $total_page; $i++){
		                // Nếu là trang hiện tại thì hiển thị thẻ span
		                // ngược lại hiển thị thẻ a
		                if ($i == $current_page){
		                    echo '<div><span>'.$i.'</span> |</div> ';
		                }
		                else{
		                    echo '<div><a href="index.php?page='.$i.'">'.$i.'</a> | </div>';
		                }
		            }
		 
		            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
		            if ($current_page < $total_page && $total_page > 1){
		                echo '<div><a href="index.php?page='.($current_page+1).'">Next</a> | </div>';
		            }
		    }
		     // PHẦN HIỂN THỊ
		            // HIỂN THỊ DANH SÁCH
					    if(mysqli_num_rows($result)==1)
					{	

						$row = mysqli_fetch_array($result);
						echo '
							<div class="col-md-4">
								<div class="panel panel-info">
			                	<div class="panel-heading"><a href="product.php?product='.$row["product_id"].'">'.$row["product_title"].'</a></div>
	                            <div class="panel-body">
	                            	<img src="assets/prod_images/'.$row["product_image"].'"
	                            	style="width: 214px;height: 214px;">
	                            </div>
	                            <div class="panel-heading">'.$row["product_price"].'
	                            <a href="add_product.php?id='.$row["product_id"].'" class="btn btn-danger btn-xs" style="float:right;">Add to Cart</a></div>
	                            </div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-info">
			                	<div class="panel-body">'.$row["product_keywords"].'</div>
	                            <div class="panel-body">'.$row["product_desc"].'</div>
							</div>
							';
					}
					else
					{
			            while ($row = mysqli_fetch_array($result)){
			                echo '<div class="col-md-4">
								<div class="panel panel-info">
			                	<div class="panel-heading"><a href="product.php?product='.$row["product_id"].'">'.$row["product_title"].'</a></div>
	                            <div class="panel-body">
		                            <img src="assets/prod_images/'.$row["product_image"].'" 
		                            style="width: 214px;height: 214px;">
	                            </div>
	                            <div class="panel-heading">'.$row["product_price"].'
	                            <a href="add_product.php?id='.$row["product_id"].'" class="btn btn-danger btn-xs" style="float:right;">Add to Cart</a></div>
	                            </div>
						</div>';
			            }
			        }
           ?>