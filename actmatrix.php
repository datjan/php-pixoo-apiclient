<?php


// Get json from body
$body = file_get_contents('php://input');

// Decode Json
$json = json_decode($body);
$url = $json->url;

// Set Pixoo Channel
sendSetIndex($url);

// Reset Pixoo Animation
sendResetHttpGifId($url);

// Send new Pixoo Animation
for ($i = 0; $i <= $json->matrixcount - 1; $i++) {
    sendSendHttpGif($url,$json,$i);
}




function sendSetIndex($url) {
    $httpRequestData = "{ \"Command\": \"Channel/SetIndex\", \"SelectIndex\": 4 }";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $httpRequestData);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($ch);
    echo "Send Channel 4 to Pixoo: ".$result."<br>";
}

function sendResetHttpGifId($url) {
    $httpRequestData = "{ \"Command\": \"Draw/ResetHttpGifId\" }";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $httpRequestData);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($ch);
    echo "Send Reset Animation to Pixoo: ".$result."<br>";
}

function sendSendHttpGif($url,$json,$matrixid) {
    // REQUEST
    // PicNum = the include single pictures of the animation and smaller than 60
    // PicWidth = the pixels of the animation, and only support the 16,32,64
    // PicOffset = the picture offset start from 0. eg:0,1,2,3,4,PicNum-1
    // PicID = the animation ID, every animation must have unique ID and auto increase,It’s getting bigger and start with 1, example: the current gif id is 100, and then next gif’s id should be greater than or equal to 101
    // PicSpeed = the animation speed, it bases on ms
    // PicData = the picutre Base64 encoded RGB data, The RGB data is left to right and up to down
    // EXAMPLE
    // Pic 1/1 { "Command": "Draw/SendHttpGif", "PicNum": 1, "PicWidth": 16,  "PicOffset": 0, "PicID": 1, "PicSpeed": 100, "PicData": ""}
    // OR
    // Pic 1/3 { "Command": "Draw/SendHttpGif", "PicNum": 3, "PicWidth": 16,  "PicOffset": 0, "PicID": 2, "PicSpeed": 100, "PicData": ""}
    // Pic 2/3 { "Command": "Draw/SendHttpGif", "PicNum": 3, "PicWidth": 16,  "PicOffset": 1, "PicID": 2, "PicSpeed": 100, "PicData": ""}
    // Pic 3/3 { "Command": "Draw/SendHttpGif", "PicNum": 3, "PicWidth": 16,  "PicOffset": 2, "PicID": 2, "PicSpeed": 100, "PicData": ""}

    // Set Numbers
    foreach($json->matrixes[$matrixid]->numbers as $item_num) { 
        $pid = $item_num->pixelid;
        $wit = $json->width;
        $pixel_arr = [];
        if ($item_num->value == 1) $pixel_arr = [$pid + (0 * $wit) + 1,$pid + (1 * $wit) + 0,$pid + (1 * $wit) + 1,$pid + (2 * $wit) + 1,$pid + (3 * $wit) + 1,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 2) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 0,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 3) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 4) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 5) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 6) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 0,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 7) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 8) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 0,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 9) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 1,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];
        else if ($item_num->value == 0) $pixel_arr = [$pid + (0 * $wit) + 0,$pid + (0 * $wit) + 1,$pid + (0 * $wit) + 2,$pid + (1 * $wit) + 0,$pid + (1 * $wit) + 2,$pid + (2 * $wit) + 0,$pid + (2 * $wit) + 2,$pid + (3 * $wit) + 0,$pid + (3 * $wit) + 2,$pid + (4 * $wit) + 0,$pid + (4 * $wit) + 1,$pid + (4 * $wit) + 2];    
        
        foreach($pixel_arr as $pixel_num) { 
            $json->matrixes[$matrixid]->pixel[$pixel_num] = $item_num->color;
        }
    }
    
    // Generate Hex String
    $hex_string = "";
    foreach($json->matrixes[$matrixid]->pixel as $item) { 
        $hex_string = str_replace("#","",$hex_string.$item); 
    }
    
    // Convert Hex to ASCII
    $ascii_string = hex2bin($hex_string);
    
    // Convert ASCII to Base64
    $base64_string = base64_encode($ascii_string);

    $httpRequestData ="{ \"Command\": \"Draw/SendHttpGif\", \"PicNum\": ".$json->matrixcount.", \"PicWidth\": ".$json->width.",  \"PicOffset\": ".$matrixid.", \"PicID\": 1, \"PicSpeed\": ".$json->animationspeed.", \"PicData\": \"" .$base64_string . "\"}";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $httpRequestData);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($ch);
    echo "Send New Animation to Pixoo (PicID: 1 / PicNum: ".$json->matrixcount." / PicOffset: ".$matrixid."): ".$result."<br>";
}

?>