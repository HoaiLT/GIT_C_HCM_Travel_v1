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
      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh, public.ST_AsGeoJSON(geom) AS geojson FROM diem_dulich_hcm");
     // $diadiems['diadiems'] = $query->row_array();
      //Build GeoJSON feature collection array
            $geojson = array(
             'type'      => 'FeatureCollection',
             'features'  => array()
          );
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
                    'icon'=>'../C_HCM_Travel_v1/public/map_libs/img/icon/travel.png',
                    'properties' => $properties
                    );
                  # Add feature arrays to feature collection array
                      array_push($geojson['features'], $feature);
              }    
       $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./diadiem.json', 'w');
                         fwrite($fp, $response);}

//                         function get_hotel(){  
//      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh, public.ST_AsGeoJSON(geom) AS geojson FROM diem_khachsan_hcm");
//     // $diadiems['diadiems'] = $query->row_array();
//      //Build GeoJSON feature collection array
//            $geojson = array(
//             'type'      => 'FeatureCollection',
//             'features'  => array()
//          );
//                //Loop through rows to build feature arrays
//            foreach ($query->result_array() as $row)
//              {
//                $properties = $row;
//                # Remove geojson and geometry fields from properties
//               unset($properties['geojson']);
//              $feature = array(
//                    'type' => 'Feature',
//                    'geometry' => json_decode($row['geojson'], true),
//                    'id' => $row['gid'],
//                    
//                    'properties' => $properties
//                    );
//                  # Add feature arrays to feature collection array
//                      array_push($geojson['features'], $feature);
//              }    
//       $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
//                         $fp = fopen('./diem_khachsan.json', 'w');
//                         fwrite($fp, $response);}
//                       
                         
                         
                       
                         
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
                         fwrite($fp, $response);
                  }
                  
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
                         fwrite($fp, $response);
                  }
                  
                   function tour_lienquan(){
                      $query = $this->db->query("SELECT d.ten, tc.gid,t.ten_tour, t.mota, t.thoigian, t.so_binhchon, t.phantram_khuyenmai, t.mota_gia, t.ma_tour, t.hinh_anh, t.gia, t.ghi_chu, t.lo_trinh_di_chuyen from tour as t, tour_chitiet as tc, diem_dulich_hcm as d where t.ma_tour=tc.ma_tour and tc.gid=d.gid");
                      $geojson = array(
                        'type'    => 'FeatureCollection',
                        'features'  => array());
                //Loop through rows to build feature arrays
              foreach ($query->result_array() as $row)
              {
                $properties = $row;
                $feature = array(
                    'type' => 'Feature',
                    
                    'ten' => $row['ten'],
                    'properties' => $properties);
                # Add feature arrays to feature collection array
                array_push($geojson['features'], $feature);
             }    
                 $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./tour_lienquan.json', 'w');
                         fwrite($fp, $response);
                  }
                  
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
                         fwrite($fp, $response);
                  }
                  
               function kehoach_thamkhao_chitiet(){
                      $query = $this->db->query("SELECT ct.ma_kh,ct.gid,ct.mota,ct.stt,d.ten,d.ten_duong,d.phuong_xa,d.quan_huyen,d.gioi_thieu,d.so_dt,d.website,d.hinh_anh, public.ST_AsGeoJSON(geom) AS geojson from kehoach_chitiet as ct, diem_dulich_hcm as d where ct.gid=d.gid");
                      $geojson = array(
                        'type'    => 'FeatureCollection',
                        
                        'features'  => array());
                //Loop through rows to build feature arrays
                    foreach($query->result_array() as $row)
                    {
                      $properties = $row;
                      $feature = array(
                          'type' => 'Feature',
                          'geometry' => json_decode($row['geojson'], true),
                          'id' => $row['gid'],
                          'properties' => $properties);
                      # Add feature arrays to feature collection array
                      array_push($geojson['features'], $feature);
                   }    
                 $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./kehoach_thamkhao_chitiet.json', 'w');
                         fwrite($fp, $response);
                  }
        }
?>

