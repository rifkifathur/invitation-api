<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function refactorVar($data){
        if(isset($data[0]['id'])){
            foreach ($data as $key => $value) {
                
                // $tempGallery = array();
                // foreach ($value["gallery"] as $valueG) {
                //     $tempGallery[] = $valueG->img;
                // }

                $newData[] = [
                    "id" => $value['id'],
                    "coupleImg" => $value["couple_img"],
                    "manImg" => $value["man_img"],
                    "manFullName" => $value["fullname_man"],
                    "manCallName" => $value["callname_man"],
                    "manOrder" => $value["order_man"],
                    "manFatherName" => $value["fathername_man"],
                    "manMotherName" => $value["mothername_man"],
                    "womanImg" => $value["woman_img"],
                    "womanFullName" => $value["fullname_woman"],
                    "womanCallName" => $value["callname_woman"],
                    "womanOrder" => $value["order_woman"],
                    "womanFatherName" => $value["fathername_woman"],
                    "womanMotherName" => $value["mothername_woman"],
                    "akadDate" => $value["akad_date"],
                    "akadAddress" => $value["akad_address"],
                    "akadAddressLink" => $value["link_akad_address"],
                    "resepsiDate" => $value["resepsi_date"],
                    "resepsiAddress" => $value["resepsi_address"],
                    "resepsiAddressLink" => $value["link_resepsi_address"],
                    "path" => $value["path"],
                    "theme" => $value["theme"],
                    // "gallery" => $tempGallery
                    "gallery" => $value["gallery"],
                    "stories" => $value["stories"],
                    "manBank" => $value["bank"],
                    "manRek" => $value["man_rek"],
                    "womanBank" => $value["bank2"],
                    "womanRek" => $value["woman_rek"],
                ];
            }

            return $newData;

        } else {
            // $tempGallery = array();
            //     foreach ($data["gallery"] as $value) {
            //         $tempGallery[] = $value->img;
            //     }
            $newData = [
                    "id" => $data['id'],
                    "coupleImg" => $data["couple_img"],
                    "manImg" => $data["man_img"],
                    "manFullName" => $data["fullname_man"],
                    "manCallName" => $data["callname_man"],
                    "manOrder" => $data["order_man"],
                    "manFatherName" => $data["fathername_man"],
                    "manMotherName" => $data["mothername_man"],
                    "womanImg" => $data["woman_img"],
                    "womanFullName" => $data["fullname_woman"],
                    "womanCallName" => $data["callname_woman"],
                    "womanOrder" => $data["order_woman"],
                    "womanFatherName" => $data["fathername_woman"],
                    "womanMotherName" => $data["mothername_woman"],
                    "akadDate" => $data["akad_date"],
                    "akadAddress" => $data["akad_address"],
                    "akadAddressLink" => $data["link_akad_address"],
                    "resepsiDate" => $data["resepsi_date"],
                    "resepsiAddress" => $data["resepsi_address"],
                    "resepsiAddressLink" => $data["link_resepsi_address"],
                    "path" => $data["path"],
                    "theme" => $data["theme"],
                    // "gallery" => $tempGallery
                    "gallery" => $data["gallery"],
                    "stories" => $data["stories"],
                    "manBank" => $data["bank"],
                    "manRek" => $data["man_rek"],
                    "womanBank" => $data["bank2"],
                    "womanRek" => $data["woman_rek"],
            ];

            return $newData;
        }
    }
}
