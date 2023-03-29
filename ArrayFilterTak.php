<?php

class ArrayFilterTak implements ArrayFilterInterface
{
    public function filterPrice($printRange, $array)
    {
        return array_filter($array, function($item) use($printRange){
            
            return $item['price'] > $printRange ;
        });
    }
    public function totalSum($array, $princeRance)
    {
        $princeRanceData =  $this->filterPrice($princeRance, $array);   
        array_sum(array_column($princeRanceData, 'price'));
    }
}

interface ArrayFilterInterface
{
    public function  filterPrice($printRange, $array);
    public function  totalSum($array, $princeRance)  ;
}

$data = [
    'id' => 100,
    'price' => 1000
];

$arrayClass  = new ArrayFilterTak();
$arrayClass->filterPrice(50,$data);
$arrayClass->filterPrice(10,$data);



