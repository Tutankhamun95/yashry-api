<?php

class Calculator{

    public function calculateShipping(){

        $itemWeight = $value->item_weight;
        $shippingRate = $value->shipping_rate;
        $totalShipping = ($shippingRate*10)*($itemWeight);        

        return x;
    }

}

?>