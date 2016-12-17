<?php
class Load_GeoJson_M extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
//      SELECT 'Feature' As type, ST_AsGeoJSON(atm.geom)::json As geometry,
//            row_to_json((select atm1 from (SELECT gid,ten,dia_chi,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh) As atm1) ) As properties
//				FROM diem_dulich_hcm as atm

function get_geojson(){
      $query = $this->db->query("SELECT gid,ten,ten_google,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh, ma_loai, public.ST_AsGeoJSON(geom) AS geojson,gio_mo_cua, gia_ve FROM diem_dulich_hcm");
     // $diadiems['diadiems'] = $query->row_array();
      //Build GeoJSON feature collection array
                                              $geojson = array(
                                               'type'      => 'FeatureCollection',
                                               'features'  => array() );
                                            //Loop through rows to build feature arrays
                                            foreach ($query->result_array() as $row)
                                            {
                                              $properties = $row;

                                            # Remove geojson and geometry fields from properties
                                           unset($properties['geojson']);
                                            $feature = array(
                                                'type' => 'Feature',
                                                'geometry' => json_decode($row['geojson'], true),
                                                'id' => $row['gid'],
                                                'icon'=>'../C_HCM_Travel_v1/public/map_libs/img/icon/suitcase.png',
                                                'properties' => $properties
                                                );
                                              # Add feature arrays to feature collection array
                                                  array_push($geojson['features'], $feature); }
                                               $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                                                           $fp = fopen('./diadiem.json', 'w');
                                                                                           fwrite($fp, $response);}

 function diadiem_kehoach(){
      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,ma_loai,public.ST_AsGeoJSON(geom) AS geojson, url_video FROM diem_dulich_hcm");
                                       // $diadiems['diadiems'] = $query->row_array();
                                        //Build GeoJSON feature collection array
                                              $geojson = array(
                                               'type'      => 'FeatureCollection',
                                               'features'  => array() );
                                                  //Loop through rows to build feature arrays
                                                foreach ($query->result_array() as $row)
                                                {
                                                  $properties = $row;

                                                  # Remove geojson and geometry fields from properties
                                                 unset($properties['geojson']);
                                                  $feature = array(
                                                      'type' => 'Feature',
                                                      'geometry' => json_decode($row['geojson'], true),
                                                      'id' => $row['gid'],
                                                      'icon'=>'../C_HCM_Travel_v1/public/map_libs/img/icon/youtube.png',
                                                      'properties' => $properties
                                                      );
                                                    # Add feature arrays to feature collection array
                                                        array_push($geojson['features'], $feature);  }
                                                      $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                           $fp = fopen('./diadiem_kehoach.json', 'w');
                                                           fwrite($fp, $response);}



function loai_place(){
      $query = $this->db->query("SELECT * FROM loai_diadiem");
                                                      $geojson = array(
                                                       'type'      => 'FeatureCollection',
                                                       'features'  => array()
                                                    );
                                                          //Loop through rows to build feature arrays
                                                        foreach ($query->result_array() as $row)
                                                        {
                                                          $properties = $row;

                                                          # Remove geojson and geometry fields from properties
                                                          $feature = array(
                                                              'type' => 'Feature',
                                                              'id' => $row['ma_loai'],
                                                              'properties' => $properties
                                                              );
                                                            # Add feature arrays to feature collection array
                                                                array_push($geojson['features'], $feature);
                                                        }
                                                 $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                                   $fp = fopen('./loai_place.json', 'w');
                                                                   fwrite($fp, $response);}


 function hinh_anh(){
      $query = $this->db->query("SELECT * FROM hinh_anh");
                                                        $geojson = array(
                                                         'type'      => 'FeatureCollection',
                                                         'features'  => array()
                                                      );
                                                            //Loop through rows to build feature arrays
                                                          foreach ($query->result_array() as $row)
                                                          {
                                                            $properties = $row;
                                                            unset($properties['id']);
                                                            # Remove geojson and geometry fields from properties
                                                            $feature = array(
                                                                'type' => 'Feature',
                                                                'id' => $row['id'],
                                                                'properties' => $properties
                                                                );
                                                              # Add feature arrays to feature collection array
                                                                  array_push($geojson['features'], $feature);  }
                                                                  $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                                     $fp = fopen('./hinh_anh.json', 'w');
                                                                     fwrite($fp, $response);}


function get_khachsan(){
                      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh,so_nha,so_phongks,fax, public.ST_AsGeoJSON(geom) AS geojson FROM diem_khachsan_hcm");
                                                                  $geojson = array(
                                                                               'type'      => 'FeatureCollection',
                                                                               'features'  => array());
                                                                                  //Loop through rows to build feature arrays
                                                                                foreach ($query->result_array() as $row)
                                                                                {
                                                                                  $properties = $row;
                                                                                  # Remove geojson and geometry fields from properties
                                                                                 unset($properties['geojson']);
                                                                                $feature = array(
                                                                                      'type' => 'Feature',
                                                                                      'geometry' => json_decode($row['geojson'], true),
                                                                                      'icon'=> '../C_HCM_Travel_v1/public/map_libs/img/icon/hotel.png',
                                                                                      'id' => $row['gid'],
                                                                                      'properties' => $properties
                                                                                      );
                                                                                  # Add feature arrays to feature collection array
                                                                                  array_push($geojson['features'], $feature);
                                                                               }
                                                                                          $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                                                           $fp = fopen('./khachsan.json', 'w');
                                                                                           fwrite($fp, $response);
                                                                                    }



 function get_tramxangdau(){
                      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh,so_nha, public.ST_AsGeoJSON(geom) AS geojson FROM diem_tramxangdau_hcm");
                      $geojson = array(
                       'type'      => 'FeatureCollection',
                       'features'  => array());
                          //Loop through rows to build feature arrays
                        foreach ($query->result_array() as $row)
                        {
                          $properties = $row;
                          # Remove geojson and geometry fields from properties
                         unset($properties['geojson']);
                        $feature = array(
                              'type' => 'Feature',
                              'geometry' => json_decode($row['geojson'], true),
                              'icon'=> '../C_HCM_Travel_v1/public/map_libs/img/icon/gas.png',
                              'id' => $row['gid'],
                              'properties' => $properties
                              );
                          # Add feature arrays to feature collection array
                          array_push($geojson['features'], $feature);
                       }
                                  $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                   $fp = fopen('./tramxangdau.json', 'w');
                                   fwrite($fp, $response); }

function get_tramyte(){
                      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh,so_nha, public.ST_AsGeoJSON(geom) AS geojson FROM diem_tramyte_hcm");
                      $geojson = array(
                        'type'      => 'FeatureCollection',
                        'features'  => array());
                          //Loop through rows to build feature arrays
                        foreach ($query->result_array() as $row)
                        {
                          $properties = $row;
                          # Remove geojson and geometry fields from properties
                         unset($properties['geojson']);
                        $feature = array(
                              'type' => 'Feature',
                              'geometry' => json_decode($row['geojson'], true),
                              'icon'=> '../C_HCM_Travel_v1/public/map_libs/img/icon/yte.png',
                              'id' => $row['gid'],
                              'properties' => $properties
                              );
                          # Add feature arrays to feature collection array
                          array_push($geojson['features'], $feature);
                       }
                                  $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                   $fp = fopen('./tramyte.json', 'w');
                                   fwrite($fp, $response); }

 function tour_lienquan(){
                      $query = $this->db->query("SELECT d.ten, tc.gid,t.ten_tour, t.mota, t.thoigian, t.so_binhchon, t.phantram_khuyenmai, t.mota_gia, t.ma_tour, t.hinh_anh, t.gia, t.ghi_chu, t.lo_trinh_di_chuyen from tour as t, tour_chitiet as tc, diem_dulich_hcm as d where t.ma_tour=tc.ma_tour and tc.gid=d.gid");
                                    $geojson = array(
                                      'type'    => 'FeatureCollection',
                                      'features'  => array());

                              //Loop through rows to build feature arrays
                                      foreach ($query->result_array() as $row)
                                      {
                                        $properties = $row;
                                        unset($properties['gid']);
                                        $feature = array(
                                            'type' => 'Feature',
                                            'id' => $row['gid'],
                                            'properties' => $properties);
                                        # Add feature arrays to feature collection array
                                        array_push($geojson['features'], $feature);
                                     }
                                         $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                 $fp = fopen('./tour_lienquan.json', 'w');
                                                 fwrite($fp, $response); }

function kehoach_thamkhao(){
      $query = $this->db->query("SELECT * from kehoach_dulich");
                                                $geojson = array(
                                                  'type'    => 'FeatureCollection',
                                                  'features'  => array());
                                                //Loop through rows to build feature arrays
                                                foreach($query->result_array() as $row)
                                                {
                                                $properties = $row;
                                                $feature = array(
                                                    'type' => 'Feature',
                                                    'id' => $row['ma_kh'],
                                                    'properties' => $properties);
                                                # Add feature arrays to feature collection array
                                                array_push($geojson['features'], $feature);
                                                }
                                                $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                   $fp = fopen('./kehoach_thamkhao.json', 'w');
                                                   fwrite($fp, $response);   }

 function kehoach_thamkhao_chitiet(){
      $query = $this->db->query("SELECT kh.ten_kh,ct.id,ct.ma_kh,ct.gid,ct.mota,ct.stt,d.ten,d.ten_duong,d.phuong_xa,d.quan_huyen,d.gioi_thieu,d.so_dt,d.website,d.hinh_anh, public.ST_AsGeoJSON(geom) AS geojson, d.x, d.y from kehoach_chitiet as ct, kehoach_dulich as kh, diem_dulich_hcm as d where ct.gid=d.gid and kh.ma_kh=ct.ma_kh order by ct.stt asc");
                                                        $geojson = array(
                                                          'type'      => 'FeatureCollection',
                                                          'features'  => array()
                                                          );
                                                  //Loop through rows to build feature arrays
                                                          foreach($query->result_array() as $row)
                                                          {
                                                            $properties = $row;
                                                            unset($properties['geojson']);
                                                            unset($properties['gid']);
                                                            unset($properties['id']);
                                                            unset($properties['x']);
                                                            unset($properties['y']);
                                                            $feature = array(
                                                                'type'      => 'Feature',
                                                                'geometry'  => json_decode($row['geojson'], true),
                                                                'id'        => $row['id'],
                                                                'icon'=>'../C_HCM_Travel_v1/public/map_libs/img/icon/tourist.png',
                                                                "latitude" => $row['y'],
                                                                "longitude" => $row['x'],
                                                                'properties'=> $properties);
                                                            # Add feature arrays to feature collection array
                                                            array_push($geojson['features'], $feature);
                                                          }
                                                       $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                       $fp = fopen('./kehoach_thamkhao_chitiet.json', 'w');
                                                       fwrite($fp, $response);
                                                  }

 function diem_dau(){
      $query = $this->db->query("SELECT ct.ma_kh,ct.gid,ct.mota,ct.stt,d.ten, d.x, d.y from kehoach_chitiet as ct, diem_dulich_hcm as d where ct.gid=d.gid and ct.diemdau_cuoi in (1)");
                                                          $geojson = array(
                                                            'type'      => 'FeatureCollection',
                                                            'features'  => array()
                                                            );
                                                    //Loop through rows to build feature arrays
                                                            foreach($query->result_array() as $row)
                                                            {
                                                              $properties = $row;
                                                              unset($properties['x']);
                                                              unset($properties['y']);
                                                              $feature = array(
                                                                  'type'      => 'Feature',
                                                                  "latitude" => $row['y'],
                                                                  "longitude" => $row['x'],
                                                                  'properties'=> $properties);
                                                              # Add feature arrays to feature collection array
                                                              array_push($geojson['features'], $feature);
                                                            }
                                                         $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                         $fp = fopen('./diem_dau.json', 'w');
                                                         fwrite($fp, $response);
                                                    }


 function diem_cuoi(){
      $query = $this->db->query("SELECT ct.ma_kh,ct.gid,ct.mota,ct.stt,d.ten, d.x, d.y from kehoach_chitiet as ct, diem_dulich_hcm as d where ct.gid=d.gid and ct.diemdau_cuoi in (0)");
                                                              $geojson = array(
                                                                'type'      => 'FeatureCollection',
                                                                'features'  => array()
                                                                );
                                                        //Loop through rows to build feature arrays
                                                                foreach($query->result_array() as $row)
                                                                {
                                                                  $properties = $row;
                                                                  unset($properties['x']);
                                                                  unset($properties['y']);
                                                                  $feature = array(
                                                                      'type'      => 'Feature',
                                                                      "latitude" => $row['y'],
                                                                      "longitude" => $row['x'],
                                                                      'properties'=> $properties);
                                                                  # Add feature arrays to feature collection array
                                                                  array_push($geojson['features'], $feature);
                                                                }
                                                             $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                             $fp = fopen('./diem_cuoi.json', 'w');
                                                             fwrite($fp, $response);
                                                        }


 function kehoach_thamkhao_chitiet_duongdi(){
      $query = $this->db->query(" SELECT c.ma_kh,c.x,c.y,c.ten_kh,c.mota,c.stt  from ((SELECT kh.ten_kh,ct.ma_kh,ct.gid,ct.mota,ct.stt,d.x, d.y from kehoach_chitiet as ct, kehoach_dulich as kh, diem_dulich_hcm as d where ct.gid=d.gid and kh.ma_kh=ct.ma_kh order by ct.stt desc) union (SELECT  kh.ten_kh,ct.ma_kh,ct.gid,ct.mota,ct.stt, d.x, d.y from kehoach_chitiet_duongdi as ct, kehoach_dulich as kh, diem_duongdi as d where ct.gid=d.gid and kh.ma_kh=ct.ma_kh order by ct.stt desc)) as c order by stt asc");
                                                                              $geojson = array(
                                                                                'type'      => 'FeatureCollection',
                                                                                'features'  => array()
                                                                                );
                                                                        //Loop through rows to build feature arrays
                                                                                foreach($query->result_array() as $row)
                                                                                {
                                                                                  $properties = $row;
                                                                                  unset($properties['gid']);
                                                                                  unset($properties['x']);
                                                                                  unset($properties['y']);
                                                                                  $feature = array(
                                                                                      'type'      => 'Feature',
                                                                                      "latitude" => $row['y'],
                                                                                      "longitude" => $row['x'],
                                                                                      'properties'=> $properties);
                                                                                  # Add feature arrays to feature collection array
                                                                                  array_push($geojson['features'], $feature);
                                                                                }
                                                                             $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                                                                             $fp = fopen('./chitiet_duongdi.json', 'w');
                                                                             fwrite($fp, $response);
                                                                        }

  // load tab tour du lich
  function full_list_tour(){
       $query = $this->db->query("select * from tour ");
                 $geojson = array(
                    'type' => 'FeatureCollection',
                    'features' => array()
                );
                foreach ($query->result_array() as $row){
                    $properties =$row;
                    $feature = array (
                        'type' => 'Feature',
                        'ma_tour' => $row['ma_tour'],
                        'properties' => $properties
                    );
                    array_push($geojson['features'], $feature);
                }
                $response = json_encode($geojson,JSON_NUMERIC_CHECK);
                $fp = fopen('./full_list_tour.json','w');
                fwrite($fp, $response);
                }


  function detail_tour($ma_tour)
  {
     $query = $this->db->query("SELECT * from tour where ma_tour='$ma_tour'");
     $result= $query->result_array();
     return $result;
  }

   function print_kehoach($makh)
  {
     $query = $this->db->query("SELECT * from kehoach_chitiet a, diem_dulich_hcm b where  a.gid=b.gid and a.ma_kh='$makh' order by a.stt asc");
     $result= $query->result_array();
     return $result;
  }

     function kehoach($makh)
  {
     $query = $this->db->query("SELECT * from  kehoach_dulich where ma_kh='$makh'");
     $result= $query->result_array();
     return $result;
  }
}
?>

