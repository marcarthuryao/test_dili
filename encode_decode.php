<?

function encode_user($user_id){
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $random_string_length = 10;
    $string = "";
    for($i=0; $i<$random_string_length; $i++){
        $string .= $characters[rand(0, strlen($characters)-1)];
    }
    $encode = rtrim(strtr(base64_encode($user_id),'+/','-_'),"=");
    return $encode .'&c='. $string;
}

function decode_user($user_id){
    $decoded = urldecode($user_id);
    $user_id = base64_decode(strtr($decoded,'-_', '+/'));
    return $user_id;
}

?>