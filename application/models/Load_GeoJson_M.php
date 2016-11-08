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
                $options=$row;
                # Remove geojson and geometry fields from properties
               unset($properties['geojson']);
                $feature = array(
                    'type' => 'Feature',
                    'geometry' => json_decode($row['geojson'], true),
                    'id' => $row['gid'],
                    
                    'properties' => $properties
                    );
                  # Add feature arrays to feature collection array
                      array_push($geojson['features'], $feature);
              }    
       $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./diadiem.json', 'w');
                         fwrite($fp, $response);}

                         function get_hotel(){  
      $query = $this->db->query("SELECT gid,ten,ten_duong,phuong_xa,quan_huyen,gioi_thieu,so_dt,website,hinh_anh, public.ST_AsGeoJSON(geom) AS geojson FROM diem_khachsan_hcm");
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
                    'properties' => $properties
                    );
                  # Add feature arrays to feature collection array
                      array_push($geojson['features'], $feature);
              }    
       $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./diem_khachsan.json', 'w');
                         fwrite($fp, $response);}
                       
                         
                         
                       
                         
                function get_khachsan($id){
                      $query = $this->db->query("select * from khach_san('$id')");
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
                    'id' => $row['gid'],
                    'properties' => $properties
                    );
                # Add feature arrays to feature collection array
                array_push($geojson['features'], $feature);
             }    
                        $response =   json_encode($geojson, JSON_NUMERIC_CHECK);
                         $fp = fopen('./khachsan_local.json', 'w');
                         fwrite($fp, $response);
                  }         
        }
?>

