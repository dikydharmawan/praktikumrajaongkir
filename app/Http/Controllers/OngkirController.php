<?php

namespace App\Http\Controllers;
use App\Models\ongkir;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
   public function listProvinsi(){
    $result = Ongkir::listProvinsi();
    return $result;
   }

   public function getProvinsi($id){
    $result = Ongkir::getProvinsi($id);
    return $result;
   }
   
   public function getCity($id){
    $result = Ongkir::getCity($id);
    return $result["rajaongkir"]["results"]["city_name"];
   }
   
   public function listCity($id){
    $result = Ongkir::listCity($id);
    return $result;
   }

   public function calculateShippingCost($fromCityId){
       $result = Ongkir::calculateShippingCost($fromCityId);
       return $result;
   }

}
