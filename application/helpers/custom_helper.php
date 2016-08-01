<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function echo_list($data){
  echo "<pre>";
  print_r($data);
  echo "<pre>";die();
}

function echo_for($data){
  echo "<pre>";
  print_r($data);
}

function language_for_code($langcode){
  if (!empty($langcode)) {
    $data = array(
      "es" => "spanish",
      "en" => "english"
    );
    if (isset($data[$langcode])) {
      return $data[$langcode];
    }else{
      return $data['es'];
    }
  }
}
function coderandom() {
    $chars = "023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = 'VH' ;

    while ($i < 3) {
        $num = rand() % 6;
        $tmp = substr($chars, $num, 1);
        $code = $code . $tmp;
        $i++;
    }
    return $code;
}
function merge_array($a, $b){
  if(!empty($a) AND !empty($b)){
    return array_merge($a, $b);
  }elseif(!empty($a)){
    return $a;
  }elseif(!empty($b)){
    return $b;
  }
}
function currency_format_by_val($currency){
  if(!empty($currency)){
    $data = new stdClass();

    if($currency == "CLP"){
      $data->decimales = 0;
      $data->separador_1 = ".";
      $data->separador_2 = ",";
      $data->money_label = "CLP$ ";
    }elseif($currency == "USD"){
      $data->decimales = 2;
      $data->separador_1 = ",";
      $data->separador_2 = ".";
      $data->money_label = "US$ ";
    }elseif($currency == "BRL"){
      $data->decimales = 2;
      $data->separador_1 = ".";
      $data->separador_2 = ",";
      $data->money_label = "R$ ";
    }elseif($currency == "EUR"){
      $data->decimales = 2;
      $data->separador_1 = ",";
      $data->separador_2 = ".";
      $data->money_label = "€ ";
    }elseif($currency == "ARS"){
      $data->decimales = 0;
      $data->separador_1 = ".";
      $data->separador_2 = ",";
      $data->money_label = "ARS$ ";
    }
    return $data;
  }
}
function currency_str($price, $currency, $flag_money_label){
  # Obtengo formato de la moneda desde HELPER
  $currency_format = currency_format_by_val($currency);
  # Validacion para agregar o no el label de la moneda
  if($flag_money_label):
    $money_label = $currency_format->money_label." ";
  else:
    $money_label = "";
  endif;
  # Retorno en formato
  if($price == 0){
    return $money_label.$price;
  }else{
    return $money_label.number_format($price, $currency_format->decimales, $currency_format->separador_2, $currency_format->separador_1);
  }
}
function format_date($date){
  if (!empty($date)) {
    $date = explode('-', $date);
    $date = $date[2].'-'.$date[1].'-'.$date[0];
    return $date;
  }
}

function date_text_str($date){
  if(!empty($date)){
    $date = explode("-", $date);
    $month = array(
        "01" => "Enero",
        "02" => "Febrero",
        "03" => "Marzo",
        "04" => "Abril",
        "05" => "Mayo",
        "06" => "Junio",
        "07" => "Julio",
        "08" => "Agosto",
        "09" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
        "12" => "Diciembre"
    );
    return $date[0]. " de ". $month[$date[1]]. " del ". $date[2];
  }
}

function format_date_hours($time_star){
  if (!empty($time_star)) {
    $time = date('Y-m-d'.' '.$time_star.':00');
    $time = strtotime($time);
    // echo_list(date('H:i:s', $time));
    return date('H:i:s', $time);
  }
}


function get_hour_from_decimal($decimal){
  //if(!empty($decimal) && $decimal != 0){
    #$this->lang->load('others/time');
    $label = "";
    $label_night = FALSE;
    // Parto verificando si la cantidad de horas forman dias
    $hours = explode(".", $decimal);
    $hours = $hours[0];
    $minutes = ($decimal - $hours) * 60;

    return date('H:i:s',strtotime($hours.':'.$minutes));
  //}
}

function sum_the_time($total_time, $start_time) {
  // echo_for($total_time);
  // echo_for($start_time);
 # Corto el tiempo total para obtener las horas y minutos a sumar
 $total_time = explode(":", $total_time);
 //$start_time = strtotime($start_time);

 //$final_time = strtotime($start_time.' +'.$total_time[0].' hour +'.$total_time[1].' minutes');
 $final_time = date('Y-m-d H:i:s', strtotime('+'.$total_time[0].' hour +'.$total_time[1].' minutes',strtotime($start_time)));
 # Entrego el tiempo en el formato que lo necesito
 if(!empty($final_time)){
  // echo_list($final_time);
  return $final_time;
 }
 // return "{$hours}:{$minutes}:{$seconds}";
 //return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

function order_items_by_date($a, $b){
  if ($a["order_value"] == $b["order_value"]) {
      return 0;
  }

  return $a["order_value"] > $b["order_value"];
}
