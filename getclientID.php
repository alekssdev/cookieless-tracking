<?php
//Expires to a custom date (based on client/user id retention rules, like RGPD)
header("Expires: ".gmdate("D, d M Y H:i:s", strtotime('+13 month'))." GMT");
//Last modified : set to the past
header("Last-modified: ".gmdate("D, d M Y H:i:s", 0)." GMT");
//Cache control
header("Cache-Control: private");
header("Pragma: private");
//File Type
header("Content-type:text/javascript");
// Get an RFC-4122 v4 compliant globaly unique identifier (used by Google Analytics)
function get_guid() {
    $data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // Set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // Set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>
//ID cannot be generated on client side (despite cache, it will be obviously calculated again locally)
var clientID = '<?php echo get_guid(); ?>';
