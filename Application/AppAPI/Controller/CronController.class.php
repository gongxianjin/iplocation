<?php
namespace AppAPI\Controller;
use Think\Controller; 

/**
 * 后台计划任务 业务脚本
 */
class CronController extends Controller {


    Public function index(){
        $tech=M("c_region03");
        $row = $tech->field('id,ip_address')->limit('150,10000')->select();
        $count=count($row);
        foreach($row as $value)
          { 
            $id=$value['id'];
            $ip=$value['ip_address'];
                $json = file_get_contents("http://api.map.baidu.com/location/ip?ip=".$ip."&ak=zuHbnfd8EWGZrcsjH6qsn9feHOIccbV8&coor=bd09ll");
                $json = json_decode($json, true);
                $data['latitude']=$json["content"]["point"]["y"];
                $data['longitude']=$json["content"]["point"]["x"];
                $rows=$tech->data($data)->where("id=$id")->save();
     
                $latitude=$json["content"]["point"]["y"];;
                $longitude=$json["content"]["point"]["x"];
                $jsons = file_get_contents("http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=".$latitude.",".$longitude."&output=json&pois=1&ak=zuHbnfd8EWGZrcsjH6qsn9feHOIccbV8");//申请百度api ak
                $jsons=strstr($jsons,'{');
                $jsons=substr($jsons, 0,-1);
                $jsons=json_decode($jsons, JSON_FORCE_OBJECT);
                $dat['city_name']=$jsons["result"]["addressComponent"]["district"];
                $city=$dat['city_name'];
                $rows=$tech->data($dat)->where("id=$id")->save();
                $code=M('c_region1');
                $where['city_short']=array("like","$city%");
                $ros=$code->field('region_code')->where($where)->select();
                $quhao['region_code']=$ros['0']["region_code"];
                $tech=M('c_region03');
                $sq=$tech->data($quhao)->where("id=$id")->save();
            }

    }
	
}