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
        echo $itemName ."\n";

        $itemPrice = $value->item_price;
        echo "Item Price: "."$" .$itemPrice ."\n";
        

        // echo "Item Weight: " .$itemWeight ."\n";

        // $shippingCountry = $value->shipping_country_name;
        // echo "Shipping Country: " .$shippingCountry ."\n";

        $itemWeight = $value->item_weight;
        $shippingRate = $value->shipping_rate;
        $totalShipping = ($shippingRate*10)*($itemWeight);
        echo "Shipping Cost ($ per 100g): "."$" .$totalShipping ."\n";


        echo "\n";

        // $sum = 0;
        // $sum += $itemPrice;

        // $shippingTotal = 0;
        // $shippingTotal += $shippingCost;
        $subTotal = 0;
        $shipping=0;
        $vat=0;
        foreach ($array as $key => $value) {
            $subTotal+= $value->item_price;
            
            
            $itemWeight = $value->item_weight;
            $shippingRate = $value->shipping_rate;
            $totalShipping = ($shippingRate*10)*($itemWeight);
            $itemPrice = $value->item_price;
            $itemVat = ($itemPrice)*(14/100);

            $shipping+=$totalShipping;  
            $vat+=$itemVat;          
        }
        
        

        
        }

        echo "\n"."Subtotal: " ."$".$subTotal;
        echo "\n"."Shipping: " ."$".$shipping;
        echo "\n"."VAT: " ."$".$vat;
        


            // echo "\n";
            // echo "Sub-Total: " .$sum+=$itemPrice;
            // echo "\n";
            // echo "Shipping: " .$shippingTotal;
        }

else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>