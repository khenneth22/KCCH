
<!-- view order by id in admin panel side -->
<?php
require('../fpdf/fpdf.php');

$page_title = "Kape Catalina's - Sales/Report";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php');
include('../middleware/adminMiddleware.php');
// error_reporting( E_ALL ^ ( E_NOTICE | E_WARNING | E_DEPRECATED ) );

    // $query = "SELECT prod_code, COUNT(prod_code) AS prod_count FROM products INNER JOIN order_items ON products.id=order_items.prod_id GROUP BY prod_code ";
    // $result= mysqli_query($con,$query);

    // $chartData = array();
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //       $chartData[] = ['prod_code' => $row['prod_code'], 'prod_count' => (int)$row['prod_count'] ];
    //     }
    // } else {
    //     echo "0 results";
// }

// Check if form is submitted
// if (isset($_POST['submitPrint'])) {

//     $date = $_POST['dateFrom'];

//   // Get filtered data from database
//   $sql = "SELECT * FROM order_items WHERE created_at='$date' ";
//   $result = mysqli_query($con, $sql);

//   $pdf = new FPDF('P','mm','A4');
//   $pdf->AddPage();
//   $pdf->SetFont('Arial','B',14);
//   // $pdf->SetFillColor(255,255,101);


// class PDF extends Fpdf
// {
//   // Page header
//   function Header()
//   {
//       // Arial bold 15
//      $this -> SetFont('Arial','',12);
//       // Move to the right (for Center Position)
//       $this->SetFillColor(172,173,172);
//       $this->SetDrawColor(206,206,206);

//       // Title
//       // $this->Cell(40,10,'ID',1,0,'C',true);
//       $this->Cell(30,10,'Order ID',1,0,'C',true);
//       $this->Cell(30,10,'Product ID',1,0,'C',true);
//       $this->Cell(30,10,'Product Code',1,0,'C',true);
//       $this->Cell(30,10,'Quantity',1,0,'C',true);
//       $this->Cell(30,10,'Price',1,0,'C',true);
//       // $this->Cell(50,10,'Address',1,0,'C',true);
//       // $this->Cell(40,10,'Gender',1,0,'C',true);
      
//       // Line break
//      $this -> Ln(10);
//   }

//   function Footer()
//   {
//       // Go to 1.5 cm from bottom
//       $this->SetY(-15);
//       // Select Arial italic 8
//       $this->SetFont('Arial', 'I', 8);
//       // Print centered page number
//       $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
//   }

// }

//   $pdf = new PDF('P','mm','A4');
//   $pdf -> AliasNbPages(); // Must for print total no of page
//   $pdf -> AddPage();
//   $pdf -> SetDrawColor(206,206,206);
//   // $pdf -> SetFillColor(255,255,102);
//   // $pdf -> SetTextColor(0);

//   // $i=0;
//   while($row = $result->fetch_object()){

//   // $id = $row->id;
//   $orderId = $row->order_id;
//   $prodId = $row->prod_id;
//   $prodCode = $row->prod_code;
//   $qty = $row->qty;
//   $price = $row->price;
//   // $address = $row->address;
//   // $gender = $row->gender;

//   // if($id%2 == 0 )
//   // {
//       $pdf -> SetFillColor(206,206,206);
//       $pdf->Cell(40,10,++$i, 1,0, 'C');
//       $pdf->Cell(30,10,$orderId, 1,0, 'C');
//       $pdf->Cell(30,10,$prodId, 1,0, 'C');
//       $pdf->Cell(30,10,$prodCode, 1,0, 'C');
//       $pdf->Cell(30,10,$qty, 1,0, 'C');
//       $pdf->Cell(30,10,$price, 1,0, 'C');
//       // $pdf->Cell(50,10,$address, 1,0, 'C');
//       // $pdf->Cell(40,10,$gender==0 ? "Male":"Female", 1,0, 'C');
//       $pdf->Ln();
//   // }
//   // else
//   // {
//   //     // $pdf->SetFillColor(206,206,206);
//   //     $pdf->Cell(40,10,++$i, 1,0, 'C');
//   //     $pdf->Cell(50,10,$firstName, 1,0, 'C');
//   //     $pdf->Cell(50,10,$lastName, 1,0, 'C');
//   //     $pdf->Cell(80,10,$email, 1,0, 'C');
//   //     // $pdf->Cell(50,10,$address, 1,0, 'C');
//   //     // $pdf->Cell(40,10,$gender==0 ? "Male":"Female", 1,0, 'C');
//   //     $pdf->Ln();
//   // }
  
// }
// ob_clean();
// $pdf->Output();

// }

// Check if filter button was clicked
//  if(isset($_POST['submit'])){

//     // Get filtered data from table
//     // $sql = "SELECT * FROM order_items INNER JOIN products ON order_items.prod_id = products.id WHERE order_items.created_at = '{$_POST['dateFrom']}'";
    
//     $query = "SELECT c.id as cid, c.prod_id, c.qty, c.price, p.id as pid, p.name, p.image, p.selling_price 
//     FROM order_items c, products p WHERE c.prod_id=p.id ";
//     $result = mysqli_query($con, $query);
//     // $query = "SELECT * FROM order_items INNER JOIN products ON order_items.prod_id = products.id";
//     // $res = mysqli_query($con, $query);

//     // Save filtered data to print_data table
//     while($row = mysqli_fetch_assoc($result)){
//         $prod_id = $_POST['prod_id'];
//         $prod_code = $_POST['prod_code'];
//         $prod_qty = $_POST['qty'];
//         $prod_price = $_POST['price'];
//         $order_status = $_POST['order_status'];
//         $prod_total = $prod_price * $prod_qty;
        
//         $sql_insert = "INSERT INTO tbl_print (prod_id, prod_code, prod_qty, prod_price, prod_total, order_status) VALUES ('$prod_id', '$prod_code', '$prod_qty', '$prod_price', '$prod_total', '$order_status')";
//         mysqli_query($con, $sql_insert);
//     }

// }


?>

 <div class="card-header  p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
                <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3 mb-3">
                    <h4 class="text-white ps-3"  style="letter-spacing: 2px; text-transform: uppercase;">Sales & Report</h4>
                </div>
                <!--<a href="charts.php" class="btn" style="float: right;">View all data</a>-->
                </div>
                
  <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card mt-3">
               
                    <div class="card-body" id="">
                        <?php
                        $dateFrom = "";
                        $new_date = "";
                        $filterBy = "";
                        $totalSales = 0;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
                            $filterBy = $_POST['filterBy'];
                        }
                        ?>
                    <form name="Filter" method="POST">
                        <label for="filterBy">Select filter(Day/Week/Month):</label> 
                        <select class="p-1 w-20 rounded" name="filterBy" id="">
                            <option name="filterDay" class="" value="day">Day</option>
                            <option name="filterWeek" value="week" >Week</option>
                            <option name="filterMonth" value="month" >Month</option>
                            <option name="filterYear" value="year" >Year</option>
                        </select>
                        <br>
                        Date From:
                        <input class="p-1 w-20 rounded" type="date" name="dateFrom" value="<?php if(isset($_POST['dateFrom'])){echo $_POST['dateFrom'];} ?>"/>
                        <input class="btn btn-dark m-1 w-15" type="submit" name="submit" value="Filter"/>
                    </form>
                    <a onclick="printReport();" href="pdf.php?date=<?php echo $new_date ?>&filterBy=<?php echo $filterBy ?>" id="btn_print" class="btn btn-dark btn-circle"
                                              style="color:white;cursor: pointer;margin-top: 20px;"><i
                                                  class=" fa fa-print"></i></a>
                    <form action="pdf.php" id="pdfPrint" name="Filter" method="post"></form>
                    <!-- <input type="submit" name="submitPrint" value="Print" form="pdfPrint"> -->
                    <!-- <input form="pdfPrint" class="p-1 w-20 rounded" type="date" name="dateFrom" value="<?php if(isset($_POST['dateFrom'])){echo $_POST['dateFrom'];} ?>"/> -->

                      <!-- <button onclick="printReport();">dl pdf</button> -->
                    <?php 
                   
                    ?>
                        <table id="myDataTable" name="myDataTable" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <!--<th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>-->
                                    <!--<th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Order ID</th></th>-->
                                    <!--<th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Product ID</th>-->
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Product Code</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Quantity</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Price</th>
                                    <!--<th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Delivery fee</th>-->
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Total</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <!-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">View</th> -->
                                    <!-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Delete</th> -->
   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($filterBy == "day"){
                                $order = getAllSalesDay("order_items", $new_date);
                                } elseif($filterBy == "week"){
                                $order = getAllSalesWeek("order_items", $new_date);
                                } elseif($filterBy == "month"){
                                $order = getAllSalesMonth("order_items", $new_date);
                                } elseif($filterBy == "year"){
                                $order = getAllSalesYear("order_items", $new_date);
                                } else {
                                $order = getAllSalesDay("order_items", $new_date);
                                }

                                if(mysqli_num_rows($order) > 0)
                                {
                                    $i=1;
                                    $totalSales = 0;
                                    $total = 0;
                                    $cart_count = 0;
                                    foreach($order as $item)
                                    {
                                        ?>
                                        <tr>
                                            <!--<td class="text-sm align-middle text-center"> <?php echo $i; $i++; ?> </td>-->
                                            <!--<td class="text-sm align-middle text-center"> <?= $item['order_id']; ?> </td>-->
                                            <!--<td class="text-sm align-middle text-center"> <?= $item['prod_id']; ?> </td>-->
                                            <td class="text-sm align-middle text-center"> 
                                            <?php $prod_name = getBestSellerProductName("products", $item['prod_id']); //prod_id
                                              if(mysqli_num_rows($order) > 0){
                                                foreach($prod_name as $name)
                                                {
                                                        echo $name['prod_code'];
                                                 }
                                                } ?> </td> <!--//prod_code dapat dito-->
                                            <!--<td class="text-sm align-middle text-center"> </td>-->
                                            <td class="text-sm align-middle text-center"> <?= $item['qty']; ?> </td>
                                            <td class="text-sm align-middle text-center">&#8369 <?= $item['price']; ?> </td> 
                                            <td class="text-sm align-middle text-center">&#8369 <?php echo $total = $item['qty'] * $item['price']; ?> </td>
                                            <td class="text-sm align-middle text-center"> <?= $item['created_at']; ?> </td>
                                            
                                         
                                        </tr>
                                        <?php
                                        $totalSales += $item['price'] * $item['qty'];
                                        
                                    }
                                }
                                ?>
                              
                                        
                            </tbody>
                        </table>
                                <?php 
                        echo "Total Sales:  ₱$totalSales"; 
                        echo '<br>';
                            if($filterBy == "day"){
                                
                                $order = getBestSellerDay("order_items", $new_date);
                                } elseif($filterBy == "week"){
                                $order = getBestSellerWeek("order_items", $new_date);
                                } elseif($filterBy == "month"){
                                $order = getBestSellerMonth("order_items", $new_date);
                                } else {
                                $order = getBestSellerDay("order_items", $new_date);
                                }
                                  if(mysqli_num_rows($order) > 0)
                                  echo "Bestsellers:";
                                  {
                                      foreach($order as $item)
                                      {
                                        // echo '<br>';
                                        // echo $item['prod_id'];
                                        $prod_name = getBestSellerProductName("products", $item['prod_id']);
                                        if(mysqli_num_rows($order) > 0){
                                            foreach($prod_name as $name){
                                                echo '<br>';
                                                echo $name['name'] . ' : ( Product Code: ' .$name['prod_code']. ' )';
                                        }
                                    }
                                    }
                                }
                                ?>
                    </div>
                </div>
                  <button class="btn mt-3" id="toggleBtn" onclick="toggleBtn();" style="float: right;"> Show More</button>

            </div>
            
        </div>
    </div>

<?php ?>


    <script>
        function toggleBtn()
        {
            if(chart.style.display === "none")
            {
                document.getElementById("chart").style.display = "block";
                document.getElementById("toggleBtn").innerHTML = "Show Less";
                
            }else{
                document.getElementById("chart").style.display = "none";
                document.getElementById("toggleBtn").innerHTML = "Show More";
                
            }
        }
      
</script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.1.0/js/dataTables.scroller.min.js"></script>
    
      <script>
        jQuery(document).ready(function($) {
            $('#myDataTable').DataTable({
                paging: true,

                deferRender:    true,
                scrollY:        350,
                scrollCollapse: true,
                scroller:       true,
                stateSave: false
                // buttons:['createState', 'savedStates']
            });

            {}
        } );
    </script>  



    <script>

//      function printTable() {
//     // Retrieve the table data
//     var tableData = [];
//     var table = document.getElementById('myDataTable');
//     var rows = table.rows;
//     for (var i = 0; i < rows.length; i++) {
//     var rowData = [];
//     var cells = rows[i].cells;
//     for (var j = 0; j < cells.length; j++) {
//       rowData.push(cells[j].innerHTML);
//     }
//     tableData.push(rowData);
//   }
  
//   // Generate the PDF using FPDF
//   var doc = new jsPDF();
//   doc.autoTable({ head: [['Column 1', 'Column 2', 'Column 3']], body: tableData });
  
//   // Open the PDF document in a new window
//   window.open(doc.output('bloburl'), '_blank');
//   }

  function printReport() {
    var date_from = document.getElementById('dateFrom').value;
    if (date_from == '') {
        swal({
            title: "Warning!",
            text: "Please input dates.",
            type: "error"
        });
        return;
    }
    fetchRecord();
    var other_data = 'date_from=' + date_from;
    window.open("pdf.php?" + other_data, '_blank',
        'location=yes,height=1366,width=768,scrollbars=yes,status=yes');
}
  
function fetchRecord() {

var date_from = document.getElementById('date_from').value;
var date_to = document.getElementById('date_to').value;

if (date_from == '' || date_to == '') {
    swal({
        title: "Warning!",
        text: "Please input dates.",
        type: "error"
    });
    return;
}

var stall = document.getElementById('stall_search').value;
var other_data = 'date_from=' + date_from + '&date_to=' + date_to + '&stall=' + stall;

$('#tbl_health').DataTable().destroy();

var dataTable1 = $('#tbl_health').DataTable({

    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "processing": true,
    "bStateSave": true, //stay on this page
    "responsive": true,
    "serverSide": true,
    "order": [],
    "drawCallback": function(settings) {
        //console.log(settings.json);

    },
    "ajax": {
        url: "functions/select_salary.php?" + other_data,
        type: "POST",
        cache: false,

        beforeSend: function() {


        }
    },
    "autoWidth": false
});
}
    </script>
    
  
    <?php include('includes/footer.php'); ?>