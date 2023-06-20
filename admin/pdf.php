<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');
require('../fpdf/fpdf.php');

$date = $_GET['date'];
$filter = $_GET['filterBy'];



// echo $date.$filter;


                        // $dateFrom = "";
                        // $new_date = "";
                        // $filterBy = "";
                        // $totalSales = 0;
                        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //  $new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
                        // //  $filterBy = $_POST['filterBy'];
                        // }

                        ?>
                        <!-- // <form name="Filter" method="POST">
                        // <select class="p-1 w-20 rounded" name="filterBy" id="">
                        //     <option name="filterDay" class="" value="<?php echo $filter ?>"><?php echo $filter ?></option>
                            
                        // </select>
                       
                        // <br>
                        // Date From:
                        // <input class="p-1 w-20 rounded" type="date" name="dateFrom" value="<?php echo $date  ?>"/>
                        // <input type="text" name="" id="" value="<?php echo $filter ?>">
// </form> -->
                        <?php 


$date = $_GET['date'];
$filter = $_GET['filterBy'];

// if($filter == "day"){
//     $order = getAllSalesDay("order_items", $new_date);
//     } elseif($filter == "week"){
//     $order = getAllSalesWeek("order_items", $new_date);
//     } elseif($filter == "month"){
//     $order = getAllSalesMonth("order_items", $new_date);
//     } elseif($filter == "year"){
//     $order = getAllSalesYear("order_items", $new_date);
//     } else {
//     $order = getAllSalesDay("order_items", $new_date);
//     }
// Get filtered data from database
// $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code FROM order_items INNER JOIN products ON order_items.prod_id=products.id 
// WHERE YEAR(order_items.created_at) = YEAR('$date') 
// AND MONTH(order_items.created_at) = MONTH('$date') 
// OR DATE(order_items.created_at) = '$date' 
// OR YEARWEEK(order_items.created_at, 0) = YEARWEEK('$date', 0)
// ";
switch ($filter) {
  case 'day':
      $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code 
              FROM order_items 
              INNER JOIN products ON order_items.prod_id=products.id 
              WHERE DATE(order_items.created_at) = '$date' 
              ORDER BY order_items.prod_id";
      break;
  case 'week':
      $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code 
              FROM order_items 
              INNER JOIN products ON order_items.prod_id=products.id 
              WHERE YEARWEEK(order_items.created_at, 0) = YEARWEEK('$date', 0)
              ORDER BY order_items.prod_id";
      break;
  case 'month':
      $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code 
              FROM order_items 
              INNER JOIN products ON order_items.prod_id=products.id 
              WHERE MONTH(order_items.created_at) = MONTH('$date') 
              AND YEAR(order_items.created_at) = YEAR('$date')
              ORDER BY order_items.prod_id";
      break;
  case 'year':
      $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code 
              FROM order_items 
              INNER JOIN products ON order_items.prod_id=products.id 
              WHERE YEAR(order_items.created_at) = YEAR('$date')
              ORDER BY order_items.created_at";
      break;
  default:
      $sql = "SELECT order_items.prod_id, order_items.created_at, order_items.qty, order_items.price, products.prod_code 
              FROM order_items 
              INNER JOIN products ON order_items.prod_id=products.id 
              ORDER BY order_items.prod_id";
      break;
}
$result = mysqli_query($con, $sql);

$pdf = new FPDF('P','mm','A4');
$pdf->SetTitle('KAPE CATALINA');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
// $pdf->SetFillColor(255,255,101);


class PDF extends Fpdf
{
    // Page header
    function Header()
    {
        $from = "Filter From: ";
        $getdate = $_GET['date'];
        
        $this->Image('../img/kape-catalina-logo.png',10,6,30);
        // Arial bold 15
        $this -> SetFont('Arial','',12);
        
        $this->SetTitle('KAPE CATALINA');
        
          // Move to the right (for Center Position)
          $this->SetFillColor(163,187,182);
          $this->SetDrawColor(206,206,206);
          
          // Title
          $this->SetTitle('KAPE CATALINA');
            $this->Cell(180,15,'KAPE CATALINA\'S COFFEE HOUSE', 0, 0, 'C');
            
            $this->Ln();

          $this->Cell(20,10,'#',1,0,'C',true);
      $this->Cell(50,10,'Product Code',1,0,'C',true);
      $this->Cell(40,10,'Quantity',1,0,'C',true);
      $this->Cell(30,10,'Price',1,0,'C',true);
      $this->Cell(40,10,'Total Price',1,0,'C',true);
      $this->Cell(40,10,'Date',1,0,'C',true);

      
      // Line break
     $this -> Ln(10);
  }

  function Footer()
  {
    $from = " Filter From: ";
    $getdate = $_GET['date'];

      // Go to 1.5 cm from bottom
      $this->SetY(-15);
      // Select Arial italic 8
      $this->SetFont('Arial', 'I', 8);
      // Print centered page number
      $this->Cell(0, 10, 'Page '.$this->PageNo() , 0, 0, 'C');
      $this->Cell(0, 10, $from .$getdate , 0, 0, 'R');
  }

}

  $pdf = new PDF('P','mm','A4');
  $pdf->SetTitle('KAPE CATALINA');
  $pdf -> AliasNbPages(); // Must for print total no of page
  $pdf -> AddPage();
  $pdf -> SetDrawColor(206,206,206);
  // $pdf -> SetFillColor(255,255,102);
  // $pdf -> SetTextColor(0);

  // $i=0;
  while($row = $result->fetch_object()){
  
  $prodCode = $row->prod_code;
  $qty = $row->qty;
  $price = $row->price;
  $date = $row->created_at;
  $total = $price * $qty;
  $sign = "P ";


      $pdf -> SetFillColor(206,206,206);
      $pdf->Cell(20,10,++$i, 1,0, 'C');
      $pdf->Cell(50,10,$prodCode, 1,0, 'C');
      $pdf->Cell(30,10,$qty, 1,0, 'C');
      $pdf->Cell(40,10,$sign.$price, 1,0, 'C');
    //   $pdf->Cell(30,10,iconv('UTF-8', 'windows-1252', chr(0xE2).chr(0x82).chr(0xB1). $price), 1, 0, 'C');
      $pdf->Cell(40,10,$sign.$total, 1,0, 'C');
      $pdf->Cell(40,10,$date, 1,0, 'C');
      $pdf->Ln();

  
}
ob_clean();
$pdf->Output();


?>