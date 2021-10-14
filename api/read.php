<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database/database.php';
include_once '../models/employees.php';
$database = new Database();

$db = $database->getConnection();
$items = new Employee($db);
$records = $items->getEmployees();
$itemCount = $records->num_rows;
if($itemCount > 0){
$employeeArr = array();
// $employeeArr["body"] = array();
// $employeeArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($employeeArr, $row);
}
$omak = json_encode($employeeArr);
// echo $omak;
$array = json_decode($omak);
foreach ($array as $value)
{
   $itemName = $value ->item_name;
   echo "Item Name: " .$itemName ."\n";

   $itemPrice = $value->item_price;
   echo "Item Price: " .$itemPrice ."\n";

   $itemWeight = $value->item_weight;
   echo "Item Weight: " .$itemWeight ."\n";

   $shippingCountry = $value->shipping_country_name;
   echo "Shipping Country: " .$shippingCountry ."\n";

   $shippingRate = $value->shipping_rate;
   echo "Shipping Rate: " .$shippingRate ."\n";

   echo "\n";

   $total = 0;
   $total+= $itemPrice;

 
}
echo "Total: " .$total;

}

else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>