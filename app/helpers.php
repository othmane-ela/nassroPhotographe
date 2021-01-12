<?php

function getPrice($price)
{
    $convertedPrice = (int)$price / 100;
    return number_format($convertedPrice,2, '. ',' '). ' DHS';
}


function productImage($path){
    return $path  &&  file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('internalimg/not-found.jpg');
}

function getClientPath()
{
    return public_path().'/storage/clts_images/';
}

function getStock($stock)
    {
        if($stock > setting('site.stock_thershold'))
        {
           
            $stockLebvel =  ' <span class="badge small badge-pill badge-success">En Stock</span>';
        }
        else if($stock <= setting('site.stock_thershold') && $stock > 0 ){

                $stockLebvel =  ' <span class="badge small badge-pill badge-warning">Stock Faible</span>';
        }
        else{
                $stockLebvel =  '<span class="badge small badge-pill badge-danger">indisponible</span>';
        }
        return $stockLebvel;
    }


?>


