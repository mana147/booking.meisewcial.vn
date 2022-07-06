<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// define common function
function getDomainFromUrl($strUrl) {
    $parse = parse_url($strUrl);
    $domain = isset($parse['host']) ? $parse['host'] : '';
    $domain = mb_strtolower($domain, 'UTF-8');
    if (preg_match('/^www\./i', $domain)) {
        $domain = substr($domain, 4);
    }
    return $domain;
}

function getpecent($pricesale, $price) {
    $pricesale = str_replace(',', '', $pricesale);
    $price = str_replace(',', '', $price);
    $rel = '';
    if (!is_numeric($pricesale) OR ! is_numeric($pricesale) OR $price == 0) {
        $rel = 'N/A';
    } else {
        $rel = 100 - round(($pricesale * 100) / $price);
    }
    return $rel;
}

function isIdNumber($str) {
    $len = strlen($str);
    if ($len >= 1) {
        if (preg_match('/^[1-9][0-9]*$/', $str)) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        if (preg_match('/^[0-9]+$/', $str)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

function show_custom_error($mess = '') {
    $CI = & get_instance();
    $langcode = get_langcode();
    if (class_exists('CI_DB') AND isset($CI->db)) {
        $CI->db->close();
    }

    if (class_exists('CI_DB') AND isset($CI->db_slave)) {
        $CI->db_slave->close();
    }

    if (class_exists('CI_DB') AND isset($CI->db_other)) {
        $CI->db_other->close();
    }

    $showCustomError = $CI->config->item('show_custom_error');
    if ($showCustomError) {
        die($mess);
    } else {
        ?>
        <script type="text/javascript">window.location = '/upgrade';</script>
        <?php

        die();
    }
}

function getListPaging($cPage, $pCount) {
    $listPaging = array(0, 0, 0, 0, 0);
    $startShowPage = 0;
    $startShowPage = ($pCount > 5) ? (($cPage > 3) ? $cPage - 2 : 1) : 1;
    if (($cPage + 2) > $pCount && $pCount > 5) {
        $startShowPage -= ($cPage + 2) - $pCount;
    }
    $index = 0;
    $i = 0;
    for ($i = 0; $i < 5; $i++) {
        if (($startShowPage + $i) <= $pCount) {
            $listPaging[$index] = $startShowPage + $i;
            $index++;
        } else {
            break;
        }
    }
    return $listPaging;
}

function getCurrentUrl() {
    return HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
}

function isUrl($url) {
    return (preg_match('/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) ? TRUE : FALSE;
}

function checkpass($pass) {
    $check = true;
    if (!preg_match('/[a-z]/', $pass)) {
        $check = false;
    }
    if (!preg_match('/[A-Z]/', $pass)) {
        $check = false;
    }

    if (!preg_match('/[0-9]/', $pass)) {
        $check = false;
    }

    if (strlen($pass) < 8) {
        $check = false;
    }

    return $check;
}

function removeAllTags($text) {
    $text = rawurldecode($text);
    $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"), ENT_QUOTES | ENT_IGNORE);
    $text = trim($text);
    // PHP's strip_tags() function will remove tags, but it
    // doesn't remove scripts, styles, and other unwanted
    // invisible text between tags.  Also, as a prelude to
    // tokenizing the text, we need to insure that when
    // block-level tags (such as <p> or <div>) are removed,
    // neighboring words aren't joined.
    $text = preg_replace(
            array(
        // Remove invisible content
        '@<head[^>]*?>.*?</head>@siu',
        '@<style[^>]*?>.*?</style>@siu',
        '@<script[^>]*?.*?</script>@siu',
        '@<object[^>]*?.*?</object>@siu',
        '@<embed[^>]*?.*?</embed>@siu',
        '@<applet[^>]*?.*?</applet>@siu',
        '@<noframes[^>]*?.*?</noframes>@siu',
        '@<noscript[^>]*?.*?</noscript>@siu',
        '@<noembed[^>]*?.*?</noembed>@siu',
        // Add line breaks before & after blocks
        '@<((br)|(hr))@iu',
        '@</?((address)|(blockquote)|(center)|(del))@iu',
        '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
        '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
        '@</?((table)|(th)|(td)|(caption))@iu',
        '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
        '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
        '@</?((frameset)|(frame)|(iframe))@iu',
            ), array(
        ' ',
        ' ',
        ' ',
        ' ',
        ' ',
        ' ',
        ' ',
        ' ',
        ' ',
        "\n\$0",
        "\n\$0",
        "\n\$0",
        "\n\$0",
        "\n\$0",
        "\n\$0",
        "\n\$0",
        "\n\$0",
            ), $text);
    $text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    // Remove all remaining tags and comments and return.
    return strip_tags($text);
}

function myEscapeStr($str) {
    $str = trim(removeAllTags($str));
    return $str;
}

function str_valid_phone($strNumber) {
    $strNumber = trim($strNumber);
    $chk = FALSE;
    $len = strlen($strNumber);
    if ((
            ($len == 10 && substr($strNumber, 0, 2) == '09') ||
            ($len == 10 && substr($strNumber, 0, 3) == '088') ||
            ($len == 10 && substr($strNumber, 0, 3) == '086') ||
            ($len == 10 && substr($strNumber, 0, 3) == '089') ||
            //($len == 10 && substr($strNumber, 0, 3) == '061') ||
            //($len == 11 && substr($strNumber, 0, 2) == '01') ||
            ($len == 10 && substr($strNumber, 0, 3) == '032') ||
            ($len == 10 && substr($strNumber, 0, 3) == '033') ||
            ($len == 10 && substr($strNumber, 0, 3) == '034') ||
            ($len == 10 && substr($strNumber, 0, 3) == '035') ||
            ($len == 10 && substr($strNumber, 0, 3) == '036') ||
            ($len == 10 && substr($strNumber, 0, 3) == '037') ||
            ($len == 10 && substr($strNumber, 0, 3) == '038') ||
            ($len == 10 && substr($strNumber, 0, 3) == '039') ||
            ($len == 10 && substr($strNumber, 0, 3) == '070') ||
            ($len == 10 && substr($strNumber, 0, 3) == '076') ||
            ($len == 10 && substr($strNumber, 0, 3) == '077') ||
            ($len == 10 && substr($strNumber, 0, 3) == '078') ||
            ($len == 10 && substr($strNumber, 0, 3) == '079') ||
            ($len == 10 && substr($strNumber, 0, 3) == '081') ||
            ($len == 10 && substr($strNumber, 0, 3) == '082') ||
            ($len == 10 && substr($strNumber, 0, 3) == '083') ||
            ($len == 10 && substr($strNumber, 0, 3) == '084') ||
            ($len == 10 && substr($strNumber, 0, 3) == '085') ||
            ($len == 10 && substr($strNumber, 0, 3) == '056') ||
            ($len == 10 && substr($strNumber, 0, 3) == '058') ||
            ($len == 10 && substr($strNumber, 0, 3) == '059')) && !preg_match("/[^0-9]/", $strNumber)
    ) {
        $chk = TRUE;
    }

    return $chk;
}

function getRealIpAddr() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_CLIENT_RIP'])) {
        $ipaddress = $_SERVER['HTTP_X_CLIENT_RIP'];
    } else {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            if (isset($_SERVER['HTTP_X_FORWARDED'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            } else {
                if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                } else {
                    if (isset($_SERVER['HTTP_FORWARDED'])) {
                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    } else {
                        if (isset($_SERVER['REMOTE_ADDR'])) {
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                        } else {
                            $ipaddress = '';
                        }
                    }
                }
            }
        }
    }
    return $ipaddress;
}

function validUsername($str) {
    return preg_match('/^[a-z][a-z0-9_\-\.]+$/', $str);
}

function validEmail($email) {
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email);
//		return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function sendmail($data) {
    
    $configs = array(
        'protocol' => 'smtp',
        'smtp_host' => EMAIL_SMTP_HOST,
        'smtp_user' => EMAIL_SMTP_USER,
        'smtp_pass' => EMAIL_SMTP_PASS,
        'smtp_port' => EMAIL_SMTP_PORT,
        'mailtype' => 'html'
    );

    $ci = &get_instance();
    $mail_from = EMAIL_SMTP_USER;
    $from_name = "HOA LAN HÀ NỘI";

    $ci->load->library('email', $configs);
    $ci->email->set_newline("\r\n");
    $ci->email->from($mail_from, $from_name);
    $ci->email->to($data['to']);
    if (array_key_exists('cc', $data)) {
        $ci->email->cc($data['cc']);
    }
    $ci->email->subject($data['subject']);
    $ci->email->message($data['body']);

    if ($ci->email->send()) {
        $ci->email->clear();
        $res['success'] = TRUE;
        return $res;
    } else {
        $res['success'] = false;
        $res['message'] = $ci->email->print_debugger();
        return $res;
    }
}

function realEmail($email) {
    $chk = false;
    $email = trim($email);
    if ($email == '') {
        return $chk;
    }
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        return $chk;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $chk;
    }

    list($userName, $mailDomain) = explode("@", $email);
    $mailDomain = trim($mailDomain);
    if (!checkdnsrr($mailDomain, "MX")) {
        return $chk;
    }

    $arr = dns_get_record($mailDomain);
    if (empty($arr)) {
        return $chk;
    } else {
        if (isset($arr[1]) && isset($arr[1]['target']) && strtolower(trim($arr[1]['target'])) == 'thongbao.vnnic.vn') {
            return $chk;
        }
    }
    return true;
}

function validMd5($md5) {
    return !empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}

function sendsms($data) {
    $rel = FALSE;
    if (SENDSMS) {
        $url = SMS_URL;
        $number = $data['number'];
        $content = $data['content'];
        $myvars = '{"username":"' . SMS_ACCOUNT . '","password":"' . SMS_PASS . '","message":"' . $content . '","brandname":"' . SMS_BRAND_NAME . '","recipients":[{"message_id":"a0","number":"' . $number . '"}]}';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        if (!empty($response)) {
            if (isset($response['status']) && $response['status'] == 'SENT') {
                $rel = TRUE;
            }
        }
    }
    return $rel;
}

function is_date($date) {
    $date = str_replace(array('\'', '-', '.', ','), '/', $date);
    $date = explode('/', $date);
    if (count($date) == 1 // No tokens
            && is_numeric($date[0]) && $date[0] < 20991231 && (checkdate(substr($date[0], 4, 2), substr($date[0], 6, 2), substr($date[0], 0, 4)))
    ) {
        return TRUE;
    }
    if (count($date) == 3 && is_numeric($date[0]) && is_numeric($date[1]) && is_numeric($date[2]) && (checkdate($date[0], $date[1], $date[2]) //mmddyyyy
            OR checkdate($date[1], $date[0], $date[2]) //ddmmyyyy
            OR checkdate($date[1], $date[2], $date[0])) //yyyymmdd
    ) {
        return TRUE;
    }
    return FALSE;
}

function alphaID($in, $to_num = false, $pass_key = null, $pad_up = false) {
    $index = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = strlen($index);

    if ($pass_key !== null) {
        // Although this function's purpose is to just make the
        // ID short - and not so much secure,
        // with this patch by Simon Franz (http://blog.snaky.org/)
        // you can optionally supply a password to make it harder
        // to calculate the corresponding numeric ID

        for ($n = 0; $n < strlen($index); $n++) {
            $i[] = substr($index, $n, 1);
        }

        $pass_hash = hash('sha256', $pass_key);
        $pass_hash = (strlen($pass_hash) < strlen($index) ? hash('sha512', $pass_key) : $pass_hash);

        for ($n = 0; $n < strlen($index); $n++) {
            $p[] = substr($pass_hash, $n, 1);
        }

        array_multisort($p, SORT_DESC, $i);
        $index = implode($i);
    }

    if ($to_num) {
        $out = 0;
        // Digital number  <<--  alphabet letter code
        $len = strlen($in) - 1;

        for ($t = $len; $t >= 0; $t--) {
            $bcp = pow($base, $len - $t);
            $out = $out + strpos($index, substr($in, $t, 1)) * $bcp;
        }

        if (is_numeric($pad_up)) {
            $pad_up--;

            if ($pad_up > 0) {
                $out -= pow($base, $pad_up);
            }
        }
    } else {
        $out = '';
        // Digital number  -->>  alphabet letter code
        if (is_numeric($pad_up)) {
            $pad_up--;

            if ($pad_up > 0) {
                $in += pow($base, $pad_up);
            }
        }

        for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) {
            $bcp = pow($base, $t);
            $a = floor($in / $bcp) % $base;
            $out = $out . substr($index, $a, 1);
            $in = $in - ($a * $bcp);
        }
    }

    return $out;
}

function coupon_format($strCode) {
    $strCode = trim($strCode);
    if ($strCode == '') {
        return $strCode;
    } else {
        return substr($strCode, 0, 4) . '-' . substr($strCode, 4, 4) . '-' . substr($strCode, 8, 4) . '-' . substr($strCode, 12, 4);
    }
}

function create_slug($string) {
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function cleanstr($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '', $string); // Replaces multiple hyphens with single one.
}

function checkChart($string) {
    $check = true;
    if (preg_match("/['^$%&*()}{@#<>,|=_+¬-]/", $string)) {
        $check = false;
    }
    return $check;
}

function curPageURL() {

    $pageURL = "http";

    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')|| $_SERVER['SERVER_PORT'] == 443) {

        $pageURL .= "s";
    }

    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {

        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {

        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }

    return $pageURL;
}
