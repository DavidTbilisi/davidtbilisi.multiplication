<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 11/22/2018
 * Time: 12:21 PM
 */

function json( $data ){
    return json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

function dump($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function dd($data) {
    dump($data); die;
}

function clog( $data, $info="PHP: " ){
    echo '<script>';
    echo "console.log( '{$info}',". json($data) .')';
    echo '</script>';
}



function json_resp($data, $code = 200){
    $CI =& get_instance();

$CI->output
    ->set_status_header($code)
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    ->_display();
exit;
}


/*
 * abet - n, F
 * admin - n, F/ %Y%
 * Education - n, F
 * Esms - n, F/F
 * School - n, F/F
 * gbpr - n, F/F
 * grdf - n, F
 * hr - n, F/F
 * lb - n, F/F
 * ISWD - n, F/F
 * Financial - Paf_number, F/ %Y%
 * des_sup - sup_des_n/n, F/F/F
 * Geological - sup_des_n/n, F/F
 * Renovation - sup_des_n/n, F/F
 *
 * */



function search_in_dirs($start_from, $search, $callback) {
    $path = $start_from;
    $searchFor = $search;
    $searchFor = str_replace('\\', DIRECTORY_SEPARATOR, $searchFor);
    $searchFor = str_replace('/', DIRECTORY_SEPARATOR, $searchFor);
    $start_from = str_replace('/', DIRECTORY_SEPARATOR, $start_from);
    $start_from = str_replace('/', DIRECTORY_SEPARATOR, $start_from);
//     "searching for: $searchFor <br>";
    $files = array();
    clog($start_from, "searching Folder: ");
    clog($searchFor, "For: ");


    if (!file_exists($path)){
        clog("can't find folder");
//        return null;
    } else {
        clog($path. " exists");
        $directory = new \RecursiveDirectoryIterator($path);
        $iterator = new \RecursiveIteratorIterator($directory);
        $counter = 0;
        foreach ($iterator as $info) {
    //          echo $info->getPathname() . "<br>";
             $counter++;
            if (strstr($info->getPathname(), $searchFor)) :
                $files[] = $info->getPathname();
            endif;
        }
            clog($counter, "გავლილი გზები: ");
            clog($files, "FILES: ");

    }

    call_user_func($callback, $files);
    return $files;

}


function except ($arr, $keys) {
    if(gettype($arr) == "object"):
        foreach($keys as $key) {
            unset($arr->$key);
        }
    else:
//        echo json($keys);
        foreach($keys as $key) {
            unset($arr[$key]);
        }
    endif;
}

function details_li ($name, $value) {
    echo <<<STR
            <li class="list-group-item"> <span class="font-weight-bold"> $name: </span>  $value  </li>
STR;
;
}





function str_limit($in, $length = 50){
    return strlen($in) > $length ? mb_substr($in,0,$length)."..." : $in;
};


function loop($times = 2, Callable $callback){
	for ($i = 0; $i < $times; $i++) {
        call_user_func($callback, $iterator = $i);
	}
}

function now(){
	return date("Y-m-d H:i:s");
}

function my_date($str){
	$date = new DateTime($str);
	return $date->format('Y-m-d H:i:s');
}


function rand_str($length = 5, $str = null){
	$seed = 'abcdefghijklmnopqrstuvwxyz'
        .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
        .'0123456789!@#$%^&*()';
	if (isset($str) ){
		$seed = $str;
	}
    $seed = str_split($seed); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, $length) as $k) $rand .= $seed[$k];
    return $rand;
}
