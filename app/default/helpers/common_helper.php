<?php if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

function showLOG($var = "ok")
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}


function get_tracking_code($userid){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, 'https://analytics.admicro.vn/api/cpa/get-tracking-code/'.$userid);
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //set header token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key=qpzls5bD47bf5T2kHJHZXlEb1EWrchcX'));

    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

    //execute post
    $result = curl_exec($ch);
    curl_close($ch);

    $data = array();
    $arrAPI = json_decode($result,TRUE);
    if(isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
        $data = isset($arrAPI['data']) ? $arrAPI['data'] : array();
    }
    return $data;
}

function get_domain($url)
{
      $urlobj = parse_url($url);
      $domain = isset($urlobj['host']) ? $urlobj['host'] : '';
      $domain = mb_strtolower($domain, 'UTF-8');
      if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
      }
      return false;
}

function validHtmlTags($str)
{
    $valid = true;
    $arr = array();
    if(preg_match_all("/([\<])([^\>]{1,})*([\>])/i", $str, $arr, PREG_PATTERN_ORDER))
    {
        $strXml = '';
        if(isset($arr[0]))
        {
            foreach($arr[0] as $item)
            {
                $item = trim($item);
                $strXml .= ($item != '') ? $item : '';
            }
            $strXml = '<xroot>' . $strXml . '</xroot>';
            libxml_use_internal_errors(true);
            libxml_clear_errors();
            $xml = simplexml_load_string($strXml);
            if(count(libxml_get_errors()) > 0)
            {
                $valid = false;
            }
        }
    }
    return $valid;
}

// define common function
function getDomainFromUrl($strUrl)
{
    $parse = parse_url($strUrl);
    $domain = isset($parse['host']) ? $parse['host'] : '';
    $domain = mb_strtolower($domain, 'UTF-8');
    if (preg_match('/^www\./i', $domain))
    {
        $domain = substr($domain, 4);
    }
    return $domain;
}

function trimTitle($title, $limit = 20)
{
    $newTitle = '';
    if (mb_strlen($title) > $limit)
    {
        $newTitle = mb_substr($title, 0, $limit) . '...';
    }
    else
    {
        $newTitle = $title;
    }
    return $newTitle;
}


function isIdNumber($str)
{
    $len = strlen($str);
    if ($len >= 1)
    {
        if (preg_match('/^[1-9][0-9]*$/', $str))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    else
    {
        if (preg_match('/^[0-9]+$/', $str))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

function getCtr($click, $view)
{
    $click = str_replace(',', '', $click);
    $view = str_replace(',', '', $view);
    $rel = '';
    if (!is_numeric($click) OR !is_numeric($view) OR $view == 0)
    {
        $rel = 'N/A';
    }
    else
    {
        $rel = round(($click * 100) / $view, 3);
    }
    return $rel;
}

function isWideView($width, $height)
{
    return ($width / $height) > 4 ? TRUE : FALSE;
}

function getViewWidthHeight($maxW, $maxH, $width, $height, $minW = 0, $minH = 0)
{
    $newW = 0;
    $newH = 0;
    if ($maxW == 0 OR $maxH == 0)
    {
        // resize theo height
        if ($maxW == 0)
        {
            if ($height > $maxH)
            {
                $newH = $maxH;
                $newW = (int)(($newH * $width) / $height);
            }
            else
            {
                $newH = $height;
                $newW = $width;
            }
        }
        // maxH = 0 => resize theo width
        else
        {
            if ($width > $maxW)
            {
                $newW = $maxW;
                $newH = (int)(($maxW * $height) / $width);
            }
            else
            {
                $newH = $height;
                $newW = $width;
            }
        }
    }
    else
    {
        // check file view max width and max height
        if ($height > $maxH OR $width > $maxW)
        {
            if ($height > $maxH && $width > $maxW)
            {
                if (($height / $maxH) > ($width / $maxW))
                {
                    $newH = $maxH;
                    $newW = (int)(($maxH * $width) / $height);
                }
                else
                {
                    $newW = $maxW;
                    $newH = (int)(($maxW * $height) / $width);
                }
            }
            else
            {
                if ($height > $maxH)
                {
                    $newH = $maxH;
                    $newW = (int)(($maxH * $width) / $height);
                }
                else
                {
                    $newW = $maxW;
                    $newH = (int)(($maxW * $height) / $width);
                }
            }
        }
        else
        {
            $newW = $width;
            $newH = $height;
        }
    }

    if ($minW > 0)
    {
        $newW = $newW < $minW ? $minW : $newW;
    }

    if ($minH > 0)
    {
        $newH = $newH < $minH ? $minH : $newH;
    }

    return array('w' => $newW, 'h' => $newH);
}

function show_custom_error($mess = '')
{
    $CI =& get_instance();
    $langcode = get_langcode();
    if (class_exists('CI_DB') AND isset($CI->db))
    {
        $CI->db->close();
    }

    if (class_exists('CI_DB') AND isset($CI->db_slave))
    {
        $CI->db_slave->close();
    }

    if (class_exists('CI_DB') AND isset($CI->db_other))
    {
        $CI->db_other->close();
    }

    //$showCustomError = $CI->config->item('show_custom_error');

    $mess = '<div style="display:none">' . $mess . '</div>';
    $mess .= 'Error';
    show_error($mess);
}

function getListPaging($cPage, $pCount)
{
    $listPaging = array(0, 0, 0, 0, 0);
    $startShowPage = 0;
    $startShowPage = ($pCount > 5) ? (($cPage > 3) ? $cPage - 2 : 1) : 1;
    if (($cPage + 2) > $pCount && $pCount > 5)
    {
        $startShowPage -= ($cPage + 2) - $pCount;
    }
    $index = 0;
    $i = 0;
    for ($i = 0; $i < 5; $i++)
    {
        if (($startShowPage + $i) <= $pCount)
        {
            $listPaging[$index] = $startShowPage + $i;
            $index++;
        }
        else
        {
            break;
        }
    }
    return $listPaging;
}

function getCurrentUrl()
{
    /*
    $pageURL = 'http';
    if ( isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
    $pageURL .= $_SERVER['SERVER_NAME'] .$_SERVER["REQUEST_URI"];
    return $pageURL;
    */
    return HTTP_PROTOCOL . '://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
}

function isUrl($url)
{
    return (preg_match('/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',
                       $url)) ? TRUE : FALSE;
}

function removeAllTags($text)
{
    $text = rawurldecode($text);
    $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
                                    ENT_QUOTES | ENT_IGNORE);
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
        ),
        array(
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
        ),
        $text);
	$text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    // Remove all remaining tags and comments and return.
    return strip_tags($text);
}

function getSaveSqlStr($str)
{
	return $str;
}

function myEscapeStr($str)
{
    $str = trim(removeAllTags($str));
    return $str;
}

function str_valid_phone($strNumber)
{
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
			($len == 10 && substr($strNumber, 0, 3) == '087') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '056') || 
			($len == 10 && substr($strNumber, 0, 3) == '058') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '059')) 
        && !preg_match("/[^0-9]/", $strNumber)
    )
    {
        $chk = TRUE;
    }

    return $chk;
}

function is_date($date)
{
    $date = str_replace(array('\'', '-', '.', ','), '/', $date);
    $date = explode('/', $date);
    if (count($date) == 1 // No tokens
        && is_numeric($date[0])
        && $date[0] < 20991231
        && (checkdate(substr($date[0], 4, 2), substr($date[0], 6, 2), substr($date[0], 0, 4)))
    )
    {
        return TRUE;
    }
    if (count($date) == 3
        && is_numeric($date[0])
        && is_numeric($date[1])
        && is_numeric($date[2])
        && (checkdate($date[0], $date[1], $date[2]) //mmddyyyy
            OR checkdate($date[1], $date[0], $date[2]) //ddmmyyyy
            OR checkdate($date[1], $date[2], $date[0])) //yyyymmdd
    )
    {
        return TRUE;
    }
    return FALSE;
}

function check_permit_id($userid, $permitid, $groupid, $id, $typeid, $isaction = 0)
{
    // $typeid
    // 0: check campaign
    // 1: check banner
    $ok = TRUE;
    $str = explode(",", $id);
    foreach ($str as $s)
    {
        if ((!is_numeric($s)) OR ($s < 0))
        {
            $ok = FALSE;
        }
    }
    if ($ok == FALSE)
    {
        return FALSE;
    }
    else
    {
        $CI =& get_instance();
        $CI->load->model('account/account_model');

        $von_uid = trim($CI->session->userdata('vonid'));
        $von_uid = isIdNumber($von_uid) ? $von_uid : 0;
        $chkPermit = $CI->account_model->check_permit_by_user($userid, $permitid, $groupid, $id, $typeid, $isaction,$von_uid);

        if ($chkPermit)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

function getRealIpAddr()
{
    $rel = '';
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (isset($_SERVER['HTTP_X_CLIENT_RIP']))
    {
        $ipaddress = $_SERVER['HTTP_X_CLIENT_RIP'];
    }
    else
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            if (isset($_SERVER['HTTP_X_FORWARDED']))
            {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            }
            else
            {
                if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                {
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                }
                else
                {
                    if (isset($_SERVER['HTTP_FORWARDED']))
                    {
                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    }
                    else
                    {
                        if (isset($_SERVER['REMOTE_ADDR']))
                        {
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                        }
                        else
                        {
                            $ipaddress = '';
                        }
                    }
                }
            }
        }
    }
    
    // validate is ip v4 or ip v6
    if($ipaddress != '' && (filter_var($ipaddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) || filter_var($ipaddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)))
    {
    	$rel = $ipaddress;
    }
    
    return $rel;
}

function generateSeoTitle($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|y|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Y|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(&)/", 'va', $str);
    $str = str_replace(" ", "-", $str);
    $str = str_replace("---", "-", $str);
    $str = str_replace("--", "-", $str);
    return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($str));
}

function generateSeoLink($str, $id)
{
    return generateSeoTitle($str) . '-' . $id;
}

function parseSeoLink($str)
{
    $data = $arr = array();
    $arrStr = explode("-", $str);
    for ($i = 0; $i < count($arrStr) - 1; $i++)
    {
        $arr[] = $arrStr[$i];
    }
    $data['title'] = implode('-', $arr);
    $data['id'] = end($arrStr);
    return $data;
}

function cutWord($str, $limit = 20, $comm = '...')
{
    if ($str == '')
    {
        return $str;
    }
    $str2arr = explode(' ', $str);
    if ($limit >= count($str2arr))
    {
        return $str;
    }
    $return = array();
    for ($i = 0; $i < $limit; $i++)
    {
        $return[] = $str2arr[$i];
    }
    return implode(' ', $return) . $comm;
}

// create link payment add money
function payment_money_link()
{
    return ROOT_DOMAIN . 'payment/pay';
}

function getFromAndToDate(&$fromdate, &$todate, $sysdate = '', $returnCheck = FALSE)
{
    if ($sysdate == '')
    {
        $sysdate = getSysDate();
        $systime = strtotime($sysdate);
    }
    else
    {
        $systime = strtotime($sysdate);
        if ($systime === FALSE OR $systime == -1)
        {
            $sysdate = getSysDate();
            $systime = strtotime($sysdate);
        }
    }
    $fromTime = strtotime($fromdate);
    $totime = strtotime($todate);
    if ($fromTime === FALSE OR $fromTime === -1 OR $totime === FALSE OR $totime === -1 OR $fromTime > $totime)
    {
        $checkValid = FALSE;
        $todate = $sysdate;
        $fromdate = date('Y-m-d', strtotime('-7 day', strtotime($todate)));
    }
    else
    {
        $checkValid = TRUE;
    }
    if ($returnCheck)
    {
        return $checkValid;
    }
}

function getSysDate()
{
    $CI = &get_instance();
    $sysdate = trim($CI->session->userdata('sysdate'));
    if ($sysdate != '')
    {
        $currTime = time();
        $tmpDate = getdate($currTime);
        if ($tmpDate['hours'] >= 7)
        {
            if (strtotime($sysdate) < $currTime)
            {
                $sysdate = date('Y-m-d', $currTime);
            }
        }
    }
    else
    {
        $tmpDate = getdate(time());
        if ($tmpDate['hours'] < 7)
        {
            $tmpSysTime = strtotime('-1 day', strtotime(date('Y-m-d')));
            $sysdate = date('Y-m-d', $tmpSysTime);
        }
        else
        {
            $sysdate = date('Y-m-d');
        }
    }
    return $sysdate;
}

// get banner properby permission
function get_banproperty_permiss($user_id, $group_id)
{
    $typead = 1;// fix typead = 1 for cpc
    $CI = &get_instance();
    $iconn = $CI->db->conn_id;
    $cfBanProperty = $CI->config->item('ban_property');

    $data = array();
    $data2 = array();
    foreach ($cfBanProperty as $item)
    {
        $data[$item] = FALSE;
        $data2[$item] = array();
    }

    if ($user_id == 0 || !($group_id >= 0))
    {
        return $data;
    }

    $lstProperty = array();
    $lstPermiss = array();
    $sql = "CALL adn_get_banner_property_permission(:typead, :user_id, :group_id);";
    $stmt = $iconn->prepare($sql);

    if ($stmt)
    {
        $stmt->bindParam(':typead', $typead, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':group_id', $group_id, PDO::PARAM_INT);
        if ($stmt->execute())
        {
            if ($stmt->rowCount() > 0)
            {
                $lstProperty = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            $stmt->nextRowset();
            if ($stmt->rowCount() > 0)
            {
                $lstPermiss = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }


            $stmt->closeCursor();
        }
    }

    foreach ($lstProperty as $item)
    {
        if ($item['ispublic'])
        {
            $data[$item['pro_key']] = TRUE;
        }
    }

    foreach ($lstPermiss as $item)
    {
        $data2[$item['pro_key']][] = $item;
    }

    foreach ($data as $key => $item)
    {
        if (!$item)
        {
            $arrPermiss = $data2[$key];
            $chkByUser = -1;
            $chkByGroup = -1;
            foreach ($arrPermiss as $item2)
            {
                if ($item2['user_id'] > 0) // tuc duoc gan quyen theo user
                {
                    $chkByUser = $item2['actions'];
                }
                else
                {
                    if ($item2['group_id'] > -1)
                    {
                        $chkByGroup = $item2['actions'];
                    }
                }
            }
            if ($chkByUser != -1)
            {
                $data[$key] = $chkByUser ? TRUE : FALSE;
            }
            else
            {
                if ($chkByGroup != -1)
                {
                    $data[$key] = $chkByGroup ? TRUE : FALSE;
                }
            }
        }
    }
    return $data;
}

function getBannerImagePath($year, $month, $filename, $timeStemp = 0)
{
    if ($filename == '')
    {
        return '';
    }
    // luu file local
    // danh cho viec dev luu file o local. khi len ban san pham thi bo phan nay
    $CI = &get_instance();
    if ($CI->config->item('cf_upload_local') != '')
    {
        if ($timeStemp == 0)
        {
            return $CI->config->item('base_url') . $CI->config->item('cf_upload_local') . "$year/$month/$filename";
        }
        else
        {
            $createdTimeInfo = getdate($timeStemp);
            $yearFolder = $createdTimeInfo['year'];
            $monthFolder = $createdTimeInfo['mon'];
            $monthFolder = ($monthFolder < 10) ? "0" . $monthFolder : $monthFolder;

            return $CI->config->item('base_url') . $CI->config->item('cf_upload_local') . "$yearFolder/$monthFolder/$filename";
        }
    }// end luu file local
    else
    {
        if ($timeStemp == 0)
        {
            return CLOUD_IMG_DOMAIN . "$year/$month/$filename";
        }
        else
        {
            $createdTimeInfo = getdate($timeStemp);
            $yearFolder = $createdTimeInfo['year'];
            $monthFolder = $createdTimeInfo['mon'];
            $monthFolder = ($monthFolder < 10) ? "0" . $monthFolder : $monthFolder;

            return CLOUD_IMG_DOMAIN . "$yearFolder/$monthFolder/$filename";
        }
    }
}

// show banner Flash on chrome
function show_flash_banner($isChrome, $viewW, $viewH, $banW, $banH, $filepath, $banUrl, $admLoadPath)
{
    if ($isChrome)
    {
        $str = '<embed src="' . $admLoadPath . '" height="' . $viewH . '" width="' . $viewW . '" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" flashvars="fl=' . urlencode($filepath) . '&w=' . $viewW . '&h=' . $viewH . '&w1=' . $banW . '&h1=' . $banH . '&alink1=' . $banUrl . '&atar1=_blank" allowscriptaccess="always" wmode="opaque" quality="high">';
    }
    else
    {
        $str = '<embed width="' . $viewW . '" height="' . $viewH . '" align="middle" quality="high" wmode="opaque" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="' . $filepath . '" flashvars="alink1=' . $banUrl . '&atar1=_blank"/>';
    }
    return $str;
}

function show_flash_createad($idFlash, $isChrome, $viewW, $viewH, $banW, $banH, $filepath, $banUrl, $admLoadPath)
{
    $str = '';
    if($isChrome)
    {
        $str = '<embed id="' . $idFlash .'" src="' . $admLoadPath . '" height="' . $viewH . '" width="' . $viewW . '" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" flashvars="fl=' . urlencode($filepath) . '&w=' . $viewW . '&h=' . $viewH . '&w1=' . $banW . '&h1=' . $banH . '&alink1=' . $banUrl . '&atar1=_blank" allowscriptaccess="always" wmode="opaque" quality="high">';
    }
    else
    {
        $str = '<embed id="' . $idFlash .'" width="' . $viewW . '" height="' . $viewH . '" align="middle" quality="high" wmode="opaque" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="' . $filepath . '" flashvars="alink1=' . $banUrl . '&atar1=_blank"/>';
    }
    return $str;
}

// show banner script
function show_script_banner($bannerId, $campaignId, $width, $height, $desc_url, $script, $type = 3, $cpa = 1)
{
	$bannerId = mt_rand(1,500);
	$campaignId = mt_rand(1,500);
    $script = trim($script);
    if ($script == '')
    {
        return '';
    }
    
    $typeScript = $type == '5' ? 'html' : 'iframe';
	
	$desc_url = str_replace("/", "\\/", $desc_url);
	$desc_url = str_replace("'", "\\'", $desc_url);
	$desc_url = str_replace('"', '\\"', $desc_url);
    
    $script = str_replace("\r", "", $script);
    $script = str_replace("\n", "", $script);
    $script = trim(preg_replace('/\s\s+/', ' ', $script));
    $script = str_replace("/", "\\/", $script);
    $script = str_replace("'", "\\'", $script);
	$script = str_replace('"', '\\"', $script);

    $str2 = '<div id="adnzone_' . $bannerId . '"></div>';
    $str2 .= '<script type="text/javascript">';
    $str2 .= 'var __adnZone' . $bannerId . 'chk = false;';
    $str2 .= 'var adnZone_' . $bannerId . 'Data = {
    			"type": "7k",
    			"size": "' . $width . 'x' . $height . '",
    			"adn": true,
    			"is_db": 0,
    			"ext": {
        			"logo": 0
    			},
    			"df": [{
        			"src_bk": "",
        			"width": ' . $width . ',
					"link": "' . html_entity_decode( $desc_url ) . '",
        			"is_default": 1,
        			"l": "",
        			"type": "'.$typeScript.'",
        			"cid": ' . $campaignId . ',
        			"title": "",
        			"link3rd": "",
        			"tablet": 0,
        			"height": ' . $height . ',
        			"link_views": "",
        			"r": 1,
        			"isview": "1",
        			"src_exp": "",
        			"cpa": ' . $cpa . ',
        			"src": \'' . $script . '\',
        			"bid": ' . $bannerId . '
    			}],
    			"lst": []
			};';
    $str2 .= 'window.adnzone' . $bannerId . ' = new cpmzone(' . $bannerId . ');';
    $str2 .= 'adnzone' . $bannerId . '.show(adnZone_' . $bannerId . 'Data);';
    $str2 .= '</script>';

    return $str2;
}

// end show banner script

//build url dich + cpa auto
//ap dung cho banner anh va anh thay the
function url_dich_bo_sung_param_autoCpa($url) {

    $cpa_auto = 'cpa_tid=64e8f4ab-208e-59cb-5488-26f873604bc1&_tp=11&tpn=4&dmn=dantri.com.vn';

    $parse_url = explode("?", $url);
    
    if(count($parse_url) == 1) {
        $bUrl_autoCpa = $parse_url[0] . '?' . $cpa_auto;
    } else {
        $bUrl_autoCpa = $parse_url[0] . '?' . $cpa_auto . '&' . $parse_url[1];
    }

    return $bUrl_autoCpa;
}
// end build url dich + cpa auto

function get_suggest_hop_dong($username)
{
    $arr  = array();
    /*
    $ch = curl_init(API_CONTRACT_URL_ASD . "?op=GetAllContractByUserAdmarketAndDmSanPhamRef");
    curl_setopt($ch, CURLOPT_NOBODY, true);
    if(curl_exec($ch))
    {
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($statusCode != 404)
        {
            $client = new SoapClient(API_CONTRACT_URL_ASD . '?wsdl',
                array(
                    'location'     => API_CONTRACT_URL_ASD,
                    'uri'          => API_CONTRACT_URL_ASD,
                    'soap_version' => SOAP_1_2,
                    'exceptions'   => TRUE,
                    'trace'        => 1,
                    'encoding'     => 'UTF-8',
                    'cache_wsdl'   => WSDL_CACHE_NONE
                )
            );

            $result = $client->GetAllContractByUserAdmarketAndDmSanPhamRef(
                array(
                    "username" => $username, 
                    "danhMucSanPhamRef" => 585, 
                    "authenkey" => md5(API_CONTRACT_KEY.$username)
                )
            );
            $data = json_decode($result->GetAllContractByUserAdmarketAndDmSanPhamRefResult, true);
            $arr = isset($data['Data']) ? $data['Data'] : array();
        }
    }
    */

    $ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, API_CONTRACT_URL_ASD . "/GetAllContractByUserAdmarketAndDmSanPhamRef?danhMucSanPhamRef=585&username=" . $username . "&authenkey=" . md5(API_CONTRACT_KEY.$username));
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
	curl_setopt($ch,CURLOPT_POST, 0);
	$result = curl_exec($ch);
    curl_close($ch);
    $reader = simplexml_load_string($result);
    if($reader)
    {
        if(isset($reader[0]))
        {
            $data = json_decode($reader[0], true);
            if(is_array($data))
            {
                if(isset($data['Data']) && is_array($data['Data']))
                {
                    $arr = $data['Data'];
                }
            }
        }
    }

    return $arr;
}

// API get data oder URL by keyword.
function suggest_url_by_keyword($keywords, $timeout = 30)
{
    $data = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://10.3.24.17:2307/search?words=" . $keywords);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $result = curl_exec($ch);
    curl_close($ch);
    if (trim($result) != '')
    {
        $data = json_decode($result, TRUE);
    }
    return $data;
}

// End  API get data oder URL by keyword

// API get data relevant keyword
function relevant_keyword($keyword = '', $timeout = 30)
{
    $data = array();
    $fields_string = "input=$keyword";
    $url = 'http://10.3.24.83:8080/relevantword/api/relevantword';
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);

    if (trim($result) != '')
    {
        $data = json_decode($result, TRUE);
    }

    $strKeyword = '';
    if(!empty($data)){
        foreach ($data as $key => $item)
        {
            $item = str_replace('_', ' ', $item);
            $strKeyword .= trim($item);
        }
    }
    $arrKey = '';
    if ($strKeyword != '')
    {
        $arrKey = explode(',', $strKeyword);
    }
    return $arrKey;

}

//End  API get data relevant keyword


function validUsername($str)
{
    return preg_match('/^[a-z][a-z0-9_\-\.]+$/i', $str);
}

function validEmail($email)
{
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email);
//		return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}
function sendmail($data)
{
	/* data array
	$data = array(
		'to' => '',
		'cc' => '',
		'subject' => '',
		'body' => ''
	);
	*/
	
	$res = array();
    $res['success'] = false;
    $res['message'] = '';
    
    $configs = array(
        'protocol'  =>  'smtp',
        'smtp_host' =>  EMAIL_SMTP_HOST,
        'smtp_user' =>  EMAIL_SMTP_USER,
        'smtp_pass' =>  EMAIL_SMTP_PASS,
        'smtp_port' =>  EMAIL_SMTP_PORT,
        'mailtype'  => 'html'
    );
    
    $realEmailSend = '';
    if (strpos($data['to'], ','))
    {
        $emailList = explode(',', $data['to']);
        foreach ($emailList as $eL)
        {
            if(realEmail($eL))
            {
                $realEmailSend .= $eL . ',';
            }
        }
        $realEmailSend = rtrim($realEmailSend, ',');
    }
    else
    {
        $realEmailSend = realEmail($data['to']) ? $data['to'] : '';
    }

    if ($realEmailSend != '')
    {
        $ci = &get_instance();
        $mail_from = EMAIL_SENDER;
        $from_name = EMAIL_SENDER_NAME;

        $ci->load->library('email', $configs);
        $ci->email->set_newline("\r\n");
        $ci->email->from($mail_from, $from_name);
        $ci->email->to($realEmailSend);
        if (array_key_exists('cc', $data))
        {
            $ci->email->cc($data['cc']);
        }
        $ci->email->subject($data['subject']);
        $ci->email->message($data['body']);

        if($ci->email->send())
        {
            $ci->email->clear();
            $res['success'] = TRUE;
        }
        else
        {
            $res['success'] = false;
            $res['message'] = $ci->email->print_debugger();
        }
    }
    
    return $res;
}

function realEmail($email)
{
    $chk = false;
    $email = trim($email);
    if($email == '')
    {
        return $chk;
    }
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        return $chk;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return $chk;
    }

    list($userName, $mailDomain) = explode("@", $email);
    $mailDomain = trim($mailDomain);
    if(!checkdnsrr($mailDomain, "MX"))
    {
        return $chk;
    }
	/*
    $arr = dns_get_record($mailDomain);
    if(empty($arr))
    {
        return $chk;
    }
    else
    {
        if(isset($arr[1]) && isset($arr[1]['target']) && strtolower(trim($arr[1]['target'])) == 'thongbao.vnnic.vn')
        {
            return $chk;
        }
    }
    */
    return true;
}

function validMd5($md5)
{
    return !empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}

function sendsms($data)
{
    if (SENDSMS)
    {
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
        return TRUE;
    }
    return FALSE;
}

function curl_get_file_size( $url )
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);
    return $size;
}

function bytesToSize($bytes, $precision = 2)
{
    $kilobyte = 1024;
    $megabyte = $kilobyte * 1024;
    $gigabyte = $megabyte * 1024;
    $terabyte = $gigabyte * 1024;
    if (($bytes >= 0) && ($bytes < $kilobyte))
    {
        return $bytes . ' B';
    }
    elseif(($bytes >= $kilobyte) && ($bytes < $megabyte))
    {
        return round($bytes / $kilobyte, $precision) . ' KB';
    }
    elseif(($bytes >= $megabyte) && ($bytes < $gigabyte))
    {
        return round($bytes / $megabyte, $precision) . ' MB';

    }
    elseif(($bytes >= $gigabyte) && ($bytes < $terabyte))
    {
        return round($bytes / $gigabyte, $precision) . ' GB';

    }
    elseif($bytes >= $terabyte)
    {
        return round($bytes / $terabyte, $precision) . ' TB';
    }
    else
    {
        return $bytes . ' B';
    }
}

function get_module_permission($module, $function, $user_id, $group_id, $returnParam = FALSE)
{
    $typead = 1;// fix typead = 0 for adx
    $isadmin = 0; // fix = 0 vi la phan front end

    $returnCheck = array();
    $returnCheck['action'] = FALSE;
    $returnCheck['param'] = '';

    if (!is_numeric($user_id) || !is_numeric($group_id))
    {
        if ($returnParam)
        {
            return $returnCheck;
        }
        else
        {
            return $returnCheck['action'];
        }
    }

    $CI = &get_instance();
    $iconn = $CI->db->conn_id;

    $module = trim($module);
    $function = trim($function);

    $lstPermiss = array();
    $param = '';

	$funcInfo = array();
	$modInfo = array();

    $sql = "CALL adn_get_permission(:typead, :user_id, :group_id, :module, :function, :isadmin);";
    $stmt = $iconn->prepare($sql);
    if ($stmt)
    {
        $stmt->bindParam(':typead', $typead, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':group_id', $group_id, PDO::PARAM_INT);
        $stmt->bindParam(':module', $module, PDO::PARAM_STR);
        $stmt->bindParam(':function', $function, PDO::PARAM_STR);
        $stmt->bindParam(':isadmin', $isadmin, PDO::PARAM_INT);
        if ($stmt->execute())
        {
            if ($stmt->rowCount() > 0)
            {
                $modInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            if ($stmt->nextRowSet())
            {
                if ($stmt->rowCount() > 0)
                {
                    $funcInfo = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
            if ($stmt->nextRowSet())
            {
                if ($stmt->rowCount() > 0)
                {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $lstPermiss[] = $row;
                    }
                }
            }
        }
        $stmt->closeCursor();
    }

    $lstPermissByMod = array();
    $lstPermissByFnc = array();

    $num = count($lstPermiss);
    for ($i = 0; $i < $num; $i++)
    {
        // permiss by fnc
        if ($lstPermiss[$i]['mod_id'] > 0 && $lstPermiss[$i]['fnc_id'] > 0)
        {
            $lstPermissByFnc[] = $lstPermiss[$i];
        }
        else
        {
            if ($lstPermiss[$i]['mod_id'] > 0)
            {
                $lstPermissByMod[] = $lstPermiss[$i];
            }
        }
    }

    // get permission of module
    $chkMod = true;
    $isByFunc = false;
    if (!empty($funcInfo))
    {
        $chkMod = $funcInfo['ispublic'] ? TRUE : FALSE;
        $isByFunc = true;
    }
    else
    {
        if (!empty($modInfo))
        {
            $chkMod = $modInfo['ispublic'] ? TRUE : FALSE;
        }
        else
        {
            $chkMod = FALSE;
        }
    }

    // get permission by user
    if (!empty($lstPermissByFnc))
    {
        $chkByUser = -1;
        $chkByGroup = -1;
        foreach ($lstPermissByFnc as $item2)
        {
            if (trim($item2['controller']) == $module && trim($item2['fnc_key']) == $function)
            {
                if ($item2['user_id'] > 0) // tuc duoc gan quyen theo user
                {
                    $chkByUser = $item2['actions'];
                    $param = $item2['params'];
                }
                else
                {
                    if ($item2['group_id'] > -1)
                    {
                        $chkByGroup = $item2['actions'];
                        $param = $item2['params'];
                    }
                }
            }
        }
        if ($chkByUser != -1)
        {
            $chkPermiss = $chkByUser ? TRUE : FALSE;
        }
        else
        {
            if ($chkByGroup != -1)
            {
                $chkPermiss = $chkByGroup ? TRUE : FALSE;
            }
            else
            {
                $chkPermiss = FALSE;
            }
        }
    }
    else
    {
        if (!empty($lstPermissByMod))
        {
            $chkByUser = -1;
            $chkByGroup = -1;
            foreach ($lstPermissByMod as $item2)
            {
                if ($item2['controller'] == $module)
                {
                    if ($item2['user_id'] > 0) // tuc duoc gan quyen theo user
                    {
                        $chkByUser = $item2['actions'];
                        $param = $item2['params'];
                    }
                    else
                    {
                        if ($item2['group_id'] > -1)
                        {
                            $chkByGroup = $item2['actions'];
                            $param = $item2['params'];
                        }
                    }
                }
            }
            if ($chkByUser != -1)
            {
                $chkPermiss = $chkByUser ? TRUE : FALSE;
            }
            else
            {
                if ($chkByGroup != -1)
                {
                    $chkPermiss = $chkByGroup ? TRUE : FALSE;
                }
                else
                {
                    $chkPermiss = FALSE;
                }
            }
        }
        else
        {
            $chkPermiss = $chkMod;
        }
    }

    $returnCheck['param'] = $param;
    if ($chkPermiss && $chkMod)
    {
        $returnCheck['action'] = TRUE;
    }
    else
    {
    	/*
    	if($isByFunc)
    	{
    		$returnCheck['action'] = $chkMod;
    	}
    	else
    	{
    		$returnCheck['action'] = $chkPermiss ? $chkPermiss : $chkMod;
    	}
    	*/
        $returnCheck['action'] = $chkPermiss ? $chkPermiss : $chkMod;
    }

    if ($returnParam)
    {
        return $returnCheck;
    }
    else
    {

        return $returnCheck['action'];
    }
}

function alphaID($in, $to_num = false, $pad_up = false, $pass_key = null)
{
	$index = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$base  = strlen($index);

	if ($pass_key !== null) {
		// Although this function's purpose is to just make the
		// ID short - and not so much secure,
		// with this patch by Simon Franz (http://blog.snaky.org/)
		// you can optionally supply a password to make it harder
		// to calculate the corresponding numeric ID

		for ($n = 0; $n < strlen($index); $n++) {
			$i[] = substr($index, $n, 1);
		}

		$pass_hash = hash('sha256',$pass_key);
		$pass_hash = (strlen($pass_hash) < strlen($index) ? hash('sha512', $pass_key) : $pass_hash);

		for ($n = 0; $n < strlen($index); $n++) {
			$p[] =  substr($pass_hash, $n, 1);
		}

		array_multisort($p, SORT_DESC, $i);
		$index = implode($i);
	}

	if ($to_num) {
		$out   = 0;
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
		$out   = '';
		// Digital number  -->>  alphabet letter code
		if (is_numeric($pad_up)) {
			$pad_up--;

			if ($pad_up > 0) {
				$in += pow($base, $pad_up);
			}
		}

		for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) {
			$bcp = pow($base, $t);
			$a   = floor($in / $bcp) % $base;
			$out = $out . substr($index, $a, 1);
			$in  = $in - ($a * $bcp);
		}
	}

	return $out;
}

function saveImageFromUrl($url, $saveto)
{
	$reval = false;
	$ch = curl_init ($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if($raw !== FALSE)
    {
	    if(!file_exists($saveto)){
	        $fp = fopen($saveto,'x');
	    	fwrite($fp, $raw);
	    	fclose($fp);
	    	$reval = true;
	    }
    }
    else
    {
    	$reval = false;
    }

    return $reval;
}

function banner_status($status, $banner_lang)
{
    if ($status == -1) {
        $status = $banner_lang['completed'];
    } elseif ($status == 1) {
        $status = $banner_lang['running'];
    } elseif ($status == 2) {
        $status =  $banner_lang['paused'];
    } elseif ($status == 3) {
        $status = $banner_lang['waiting'];
    } elseif ($status == 4) {
        $status = $banner_lang['problem'];
    } elseif ($status == 5) {
        $status = $banner_lang['outofmoney'];
    } elseif ($status == 6) {
        $status = $banner_lang['het_ngan_sach'];
    } elseif ($status == 8) {
        $status = $banner_lang['waittorun'];
    } elseif ($status == 0) {
        $status = "Lưu trữ";
    } else {
        $status = $status;
    }
    return $status;
}

function campaign_status($status)
{
    switch ($status)
    {
        case -1:
            $result = [
                'img' => 'imgok.gif',
                'name' => 'Hoàn thành'
            ];
            break;
        case 1:
            $result = [
                'img' => 'imgrun.gif',
                'name' => 'Đang chạy'
            ];
            break;
        case 3:
            $result = [
                'img' => 'het_ngan_sach.gif',
                'name' => 'Hết ngân sách'
            ];
            break;
        case 4:
            $result = [
                'img' => 'imgout-of-money.png',
                'name' => 'Hết ngân sách ngày'
            ];
            break;
        case 5:
            $result = [
                'img' => 'imgpause.gif',
                'name' => 'Tạm dừng'
            ];
            break;
        default:
            $result = [];
            break;
    }

    return $result;
}


// Hoàn thành > lưu trữ > xóa 
// Lưu trữ >  Khôi phục 
// Đang chạy > Tạm dừng > lưu trữ 
//

function get_banner_status_from_numb($numb_status) {
    $_status = [
        'name_status_en' => '',
        'name_status_vn' => '',
        'name_image' => ''
    ];

    switch ($numb_status) 
    {
        case -1:
            $_status['name_status_vn'] = 'Hoàn thành';
            $_status['name_status_en'] = 'completed';
            $_status['name_image'] = 'icon-status-completed.png';
            break;

        case 0:
            $_status['name_status_vn'] = 'Lưu trữ';
            $_status['name_status_en']  = 'storage';
            $_status['name_image']  = '';
            break;

        case 1:
            $_status['name_status_vn']  = 'Đang chạy';
            $_status['name_status_en']  = 'running';
            $_status['name_image'] = 'icon-status-run.png';
            break;

        case 2:
            $_status['name_status_vn']  = 'Tạm dừng';
            $_status['name_status_en']  = 'paused';
            $_status['name_image']   = 'icon-status-pause.png';
            break;

        case 3:
            $_status['name_status_vn']  = 'Chờ duyệt';
            $_status['name_status_en'] = 'wait to review';
            $_status['name_image'] = 'icon-status-wait-review.png';
            break;

        case 4:
            $_status['name_status_vn']  = 'Có lỗi';
            $_status['name_status_en']  = 'problem';
            $_status['name_image']  = 'icon-status-error.png';
            break;

        case 5:
            $_status['name_status_vn']  = 'Hết ngân sách ngày';
            $_status['name_status_en']  = 'out of budget for day';
            $_status['name_image']  = 'icon-status-out-of-money-day.png';
            break;

        case 6:
            $_status['name_status_vn']  = 'Hết ngân sách';
            $_status['name_status_en'] = 'out of budget';
            $_status['name_image']  = 'icon-status-out-of-money.png';
            break;

        case 7:
            $_status['name_status_vn']  = 'Đã hạ deal';
            $_status['name_status_en'] = 'broke the deal';
            $_status['name_image']   = '';
            break;

        case 8:
            $_status['name_status_vn']  = 'Chờ chạy';
            $_status['name_status_en']  = 'wait to run';
            $_status['name_image']  = 'icon-status-wait-to-run.png';
            break;
    }

    return  $_status;
}

/**
 * Dung de lay image tuong ung voi status2 (status2 la trang thai phu cua banner)
 * 
 */
function get_banner_status2_from_numb($numb_status) {
    $_status = [
        'name_status_en' => '',
        'name_status_vn' => '',
        'name_image' => ''
    ];

    switch ($numb_status) 
    {
        case 1:
            $_status['name_status_vn'] = 'CTR thấp';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-low-ctr.png';
            break;

        case 2:
            $_status['name_status_vn'] = 'Không đủ tiền';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'ison-status-khongdutien.png';
            break;
        case 3:
            $_status['name_status_vn'] = 'Tạo mới quảng cáo từ Api muachung copy ads';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 4:
            $_status['name_status_vn'] = 'Api muachung update status';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 5:
            $_status['name_status_vn'] = 'Api muachung copy ads pause banner';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 6:
            $_status['name_status_vn'] = 'Api update deal box mua chung';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 7:
            $_status['name_status_vn'] = 'Dừng quảng cáo do CTR thấp từ weekly cronjob';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 8:
            $_status['name_status_vn'] = 'Api update deal qua service';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 9:
            $_status['name_status_vn'] = 'CTR thấp';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
        case 10:
            $_status['name_status_vn'] = 'Api update deal qua service';
            $_status['name_status_en']  = '';
            $_status['name_image']  = 'icon-status-api.png';
            break;
    }

    return  $_status;
}

function get_banner_status($status, $type = 0)
{
    if($type == 4){
        if($status == 0){
            $status = "Restore";
        }elseif($status == 1){
            $status = "Lưu trữ";
        }
    }else{
        if ($status == 1) {
            $status = "Đang chạy";
        }elseif ($status == 2) {
            $status =  "Tạm dừng";
        }elseif ($status == -1) {
            $status =  "Lưu trữ";
        }elseif ($status == 0) {
            $status =  "Restore";
        }
    }
    
    return $status;
}


function localKey2localText($local){
    if (strpos($local, 0) == false) {
        $local = str_replace('0', 'Toàn quốc', $local);
    }
    if (strpos($local, 1) == false) {
        $local = str_replace('1', 'Miền bắc', $local);
    }
    if (strpos($local, 2) == false) {
        $local = str_replace('2', 'Miền trung', $local);
    }
    if (strpos($local, 3) == false) {
        $local = str_replace('3', 'Miền nam', $local);
    }
    return $local;
}

function checkUv($uv, $v)
{
    $result = 'N/A';
    if($v != "" && $uv != '' && $v != 'N/A' && $uv != 'N/A')
    {
        $uv = str_replace(',', '', $uv);
        $v = str_replace(',', '', $v);
        $result = $uv > $v ? $v : $uv;
        $result = number_format($result);
    }
    return $result;
}

function get_data_api_brandsafe_by_brand($strBrand_ids = ''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //set the url - method GET
    curl_setopt($ch,CURLOPT_URL, 'https://services.admicro.vn/brandsafety/api/audience/get-by-brand?brand_ids='.$strBrand_ids);
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //set header token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key=XOujnIhZGgGN9bx8q1GYrNraA64TKzWc&username=adx&password=KSHVCtz5yeVmkN2B'));
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    //execute
    $result = curl_exec($ch);
    curl_close($ch);

    $data = array();
    $data['data'] = [];
    $data['total']= 0;
    $arrAPI = json_decode($result,TRUE);

    if(isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
        $data['data']  = isset($arrAPI['data']) ? $arrAPI['data'] : array();
        $data['total'] = isset($arrAPI['total']) ? $arrAPI['total'] : 0;
    }
    return $data;
}

function get_data_api_brandsafe_by_users($strIdUsers = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //set the url - me thod GET
    curl_setopt($ch,CURLOPT_URL, 'https://services.admicro.vn/brandsafety/api/audience/get-by-user?user_ids='.$strIdUsers);
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //set header token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key=XOujnIhZGgGN9bx8q1GYrNraA64TKzWc&username=adx&password=KSHVCtz5yeVmkN2B'));
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    //execute
    $result = curl_exec($ch);
    curl_close($ch);

    $data = array();
    $arrAPI = json_decode($result,TRUE);

    if(is_array($arrAPI) &&  isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
        $data = isset($arrAPI['data']) ? $arrAPI['data'] : array();
    }
    return $data;
}

/* Content insight */

function get_data_api_content_insight_for_banner($lstbannerid, $content_insight_id, $timeout = 30)
{
	$data = array();
	$fields_string = array(
			'banner_id'=>$lstbannerid,
			'content_insight_id' =>$content_insight_id,
			'product'=> 'adx_pc'
	);
	$url = 'https://dmp.admicro.vn/api/insight/assign-banner';
	//open connection
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);
	//set header token
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key='.CONTENT_INSIGHT_KEY.'&username='.CONTENT_INSIGHT_USER.'&password='.CONTENT_INSIGHT_PASS));
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

	curl_setopt($ch,CURLOPT_POST,3);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

	//execute post
	$result = curl_exec($ch);
	//close connection
	curl_close($ch);
	$action = false;
	$arrAPI = json_decode($result,TRUE);

	if(!empty($arrAPI) && isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
		$action = true;
	}
	return $action;
}

function get_data_api_content_insight_by_users($user_id) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//set the url - me thod GET
	curl_setopt($ch,CURLOPT_URL, 'https://dmp.admicro.vn/api/insight/get-by-user/'.$user_id);
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);
	//set header token
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key='.CONTENT_INSIGHT_KEY.'&username='.CONTENT_INSIGHT_USER.'&password='.CONTENT_INSIGHT_PASS));
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	//execute
	$result = curl_exec($ch);

	curl_close($ch);

	$data = array();
	$arrAPI = json_decode($result,TRUE);
	if(is_array($arrAPI) && isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
		$data = isset($arrAPI['data']) ? $arrAPI['data'] : array();
	}
	return $data;
}

function get_data_api_content_insight_by_strbannerid($bannerid) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //set the url - me thod GET
    curl_setopt($ch,CURLOPT_URL, 'https://dmp.admicro.vn/api/insight/get-by-banner/'.$bannerid.'?product=adx_pc');
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //set header token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key='.CONTENT_INSIGHT_KEY.'&username='.CONTENT_INSIGHT_USER.'&password='.CONTENT_INSIGHT_PASS));
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    //execute
    $result = curl_exec($ch);

    curl_close($ch);

    $data = array();
    $arrAPI = json_decode($result,TRUE);
    if(is_array($arrAPI) && isset($arrAPI['status']) && $arrAPI['status'] === 'RESULT_OK'){
        $data = isset($arrAPI['data']) ? $arrAPI['data'] : array();
    }
    return $data;
}

function list_brand_safe($user_id)
{
	$data = array();
	$brand_safe = get_data_api_brandsafe_by_users($user_id);
	foreach ($brand_safe as $item)
	{
		$data[] = array(
				'id' => $item['audience_id'],
				'name' => $item['audience_name']
		);
	}
	return $data;
}

function list_brand_safe_token()
{
    $CI =& get_instance();
    $CI->load->model('account/account_model');
    $userid = trim($CI->session->userdata('uid'));
    $u_info = $CI->account_model->get_user_info($userid);
    $keyAccess = (!empty($u_info) && isset($u_info['brandsafe_token'])) ? $u_info['brandsafe_token'] : "";
	$data = array();
    
    $data = [];
    $fields_string = "accessKey=$keyAccess";
    $url = 'https://bs-api.admicro.vn/public/dsp/get-list-token?';
    
    $response = @file_get_contents($url.$fields_string);
    // json decode
    if($response == TRUE)
    {
        if(trim($response)!='')
        {
            $res = json_decode($response, true);
            if(!empty($res))
            {
                if(isset($res['status']) && isset($res['code']) && isset($res['data']) && $res['status'] == 1 && $res['code'] == 200)
                {
                    $data = $res['data'];
                }
            }
        }
    }
    return $data;
}

function formatFloat($floatNum, $decimal = 3)
{
    $rel = number_format($floatNum, $decimal, '.', ',');
    
    if(strripos($rel, '.') !== FALSE)
    {
        $rel = rtrim($rel, '0');
        $rel = rtrim($rel, '.');
    }
    return $rel;
}

function list_content_insight($user_id)
{
	$data = array();
	$content_insight = get_data_api_content_insight_by_users($user_id);
	foreach ($content_insight as $item)
	{
		$data[] = array(
			'id' => $item['content_insight_id'],
			'name' => $item['title']
		);
	}
	return $data;
}

function validate_raw_url($rawUrl)
{
	$chk = false;
	$urlCheck = removeAllTags($rawUrl);
	$urlCompare =	rawurldecode($rawUrl);
	$urlCompare = htmlspecialchars_decode(html_entity_decode($urlCompare, ENT_QUOTES | ENT_IGNORE, "UTF-8"), ENT_QUOTES | ENT_IGNORE);
	$urlCompare = trim($urlCompare);
	
	$chk = $urlCheck == $urlCompare ? true : false;
	
	return $chk;
}

function preprint($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function getJsonInfoScript($script, $fm_width = "", $fm_height = "")
{
    $jsonInfo = array(
        'platform' => 'pc',
        'width' => '',
        'height' => '',
        'src' => ''
    );
    
    preg_match("/(?<=var url=').*?(?=\b.html\b)/", $script, $url_result);
    preg_match("/var videourl=\'((http|https):)?[\/]{2}[a-z0-9\.\/_\s\\()]*[\.html\']/i", $script, $video_url_result);
    if(!empty($url_result) && isset($url_result[0]))
    {
        $jsonInfo['src'] = $url_result[0].'.html';
    }
    // for videourl script
    if(!empty($video_url_result) && isset($video_url_result[0]))
    {
    	$video_url_result[0] = rtrim($video_url_result[0], '\'');
    	$jsonInfo['src'] = preg_replace('/var videourl=\'/i', '', $video_url_result[0]);
    }
    else 
    {
        preg_match("/^(https:|http:).*?(?=.(html|js)$)/", $script, $url_result);
        if(!empty($url_result) && isset($url_result[0]))
        {
            $jsonInfo['src']  = $script;
        }
    }
    
    if($jsonInfo['src'] != "")
    {
        $jsonInfo['width'] = $fm_width;
        preg_match("/(?<=var wd=).*?(?=;)/", $script, $wd_result);
        if(!empty($wd_result) && isset($wd_result[0]))
        {
            $jsonInfo['width'] = $wd_result[0];
        }
        
        $jsonInfo['height'] = $fm_height;
        preg_match("/(?<=var hg=).*?(?=;)/", $script, $hg_result);
        if(!empty($hg_result) && isset($hg_result[0]))
        {
            $jsonInfo['height'] = $hg_result[0];
        }
    }
    
    return json_encode($jsonInfo);
}

function checkBetweenTime()
{
    $starttime = '00:00:00';
    $endtime = '05:59:59';
    
    $timenow = new DateTime(date("h:i:sa"));  
    $begin = new DateTime($starttime);
    $end = new DateTime($endtime);
    
    return $timenow > $begin && $timenow < $end;
}

// function list country


function target_country_list()
{
    $url = 'http://172.18.5.44:8000/platform/ip2location/get-foreign-country';
	//open connection
	$ch = curl_init();
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	
	//execute post
	$result = curl_exec($ch);
	$data = [];
	//close connection
	curl_close($ch);
	if(trim($result)!='')
	{
		$arr = json_decode($result, true);
        if(isset($arr['location']))
        {
            foreach ($arr['location'] as $area)
            {
                $data = array_merge($data, $area);
            }
        }
    }   
    return $data;  
    
}

    
function verify_captcha($response)
{
    // validate google recaptcha
    $checkcaptcha = false;

    $ip = $_SERVER['REMOTE_ADDR'];
    $secret_key = GOOGLE_RECAPTCHA_SECRET_KEY;
    $lstCaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$response."&remoteip=".$ip);
    $json = json_decode($lstCaptcha,true);
    if($json["success"] == 1)
    {
        $checkcaptcha = true;
    }

    return $checkcaptcha;
}

//export excell
function typeFileStringPHPExcel($type){
    $typeString = '';
    if ($type == 'image/png') {
        $typeString = '-m image/png';
        $ext = 'png';
        
    } elseif ($type == 'image/jpeg') {
        $typeString = '-m image/jpeg';
        $ext = 'jpg';
    
    } elseif ($type == 'application/pdf') {
        $typeString = '-m application/pdf';
        $ext = 'pdf';
    
    } elseif ($type == 'image/svg+xml') {
        $ext = 'svg';   
    }
    return $typeString;
}

function saveImageFromUrl2($url, $filePathSave){
    //Get the file
    $rel = false;
    $content = @file_get_contents($url);
    if($content !== FALSE)
    {
        //Store in the filesystem.
        $fp = @fopen($filePathSave, "w+");
        if($fp !== FALSE)
        {
            @fwrite($fp, $content);
            $rel = true;
        }
        fclose($fp);
    }
    return $rel;
}

function convertSvgToImage($tmpFolder, $filename, $svg, $width, $fileType, $outfile){
    define ('BATIK_PATH', BATIK_LIB_PATH.'batik-rasterizer.jar');
    // size
    $width = (int)$width;
    if ($width) $width = "-w $width";
    // generate the temporary file
    if (!file_put_contents($tmpFolder."$filename.svg", $svg)) {
        die("Couldn't create temporary file. Check that the directory permissions for
            the /temp directory are set to 777.");
    }
    // do the conversion
    $output = shell_exec("java -jar ". BATIK_PATH ." -m $fileType -d $outfile $width ".$tmpFolder."$filename.svg");

    return $output;
}

//A=>1, B=>2, Z=>26, AA=>27 ...
function Alphabet2Numeric($colName) {
    $colNameArr = str_split($colName);
    $sum = 0;
    for ($i = 0; $i < count($colNameArr); $i++) {
        $sum = $sum * 26 + ord($colNameArr[$i]) - 64;
    }
    return $sum;
}

//1=>A, 2=>B, 26=>Z, 27=>AA ...
function Numeric2Alphabet($columnNumber)
{
    $columnString = "";
    while ($columnNumber > 0)
    {
        $currentLetterNumber = ($columnNumber - 1) % 26;
        $currentLetter = $currentLetterNumber + 65;
        $columnString = chr($currentLetter) . $columnString;
        $columnNumber = ($columnNumber - ($currentLetterNumber + 1)) / 26;
    }
    return $columnString;
}

function getPropertiesPHPExcel($objPHPExcel, $name){
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                ->setLastModifiedBy("Maarten Balliauw")
                ->setTitle($name)
                ->setSubject($name)
                ->setDescription($name)
                ->setKeywords($name)
                ->setCategory($name);
    return $objPHPExcel;
}

function getTypeContentCell($cell){
    
    if(isset($cell['name']))
        return 'text';
    else if (isset($cell['image']))
        return 'image';
    else
        return 'text';
}

function BuildRowPHPExcel()
{
    $list_args = func_get_args();
    $objPHPExcel = @$list_args[0];
    $list_cell = @$list_args[1];
    $colStart = @$list_args[2];
    $rowStart = @$list_args[3];
    $style = @$list_args[4];
    $HORIZONTAL_ALL = @$list_args[5];

    //column start
    $colStart = Alphabet2Numeric($colStart);
    $indexCol = 0;
    foreach ($list_cell as $item) {
        $typeContentCell = getTypeContentCell($item);
        $width = isset($item['width']) ? $item['width']: 15;
        $horizontal_cell = isset($item['horizontal']) ? $item['horizontal'] : '';
        $merge = isset($item['merge']) ? $item['merge'] : 0; // số cột merge

        $nameCol = Numeric2Alphabet($colStart + $indexCol);
        $cell = $nameCol . $rowStart;

        //merge
        if($merge > 0){
            $indexCol = $indexCol + $merge;
            $cellEndMerge = Numeric2Alphabet($colStart + $indexCol).$rowStart;
            $objPHPExcel->getActiveSheet()->mergeCells($cell.':'.$cellEndMerge);
            $objPHPExcel->getActiveSheet()->getStyle($cell.':'.$cellEndMerge)->applyFromArray($style);
        }

        //cell width
        $objPHPExcel->getActiveSheet()->getColumnDimension($nameCol)->setWidth($width);

        //cell content
        if($typeContentCell == 'image'){
            $image = $item['image'];
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Preview');
            $objDrawing->setDescription('Preview');
            $objDrawing->setPath($image);
            $objDrawing->setCoordinates($cell);
            $objDrawing->getShadow()->setVisible(true);
            $objDrawing->setOffsetX(10);
            $objDrawing->setOffsetY(10);
            $objDrawing->setWidthAndHeight(70, 70);
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
            $objPHPExcel->getActiveSheet()->getRowDimension($rowStart)->setRowHeight(70);
        }else if($typeContentCell == 'text'){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell, $item['name']);
        }else{
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell, $item['name']);
        }

        //cell style
        $objPHPExcel->getActiveSheet()->getStyle($cell)->applyFromArray($style);

        //cell horizontal
        if($HORIZONTAL_ALL){
            $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal($HORIZONTAL_ALL)->setVertical('center');
        }else{
            if($horizontal_cell == ''){
                if(isset($item['name']) && (is_numeric(str_replace(',', '', $item['name'])) || $item['name'] == 'N/A'))
                    $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal('right')->setVertical('center');
                else
                    $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal('left')->setVertical('center');
            }else
                $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal($horizontal_cell)->setVertical('center');
        }
        $indexCol ++;
    }

    return $objPHPExcel;
}

function default_border(){
    return array(
        'style' => PHPExcel_Style_Border::BORDER_THIN,
        'font' => array('bold' => true, 'size' => 14),
        'color' => array('rgb'=>'000000'));
}

function style_header(){
    $default_border = default_border();
    return array(
        'borders' => array('bottom' => $default_border, 'left' => $default_border, 'top' => $default_border, 'right' => $default_border),
        'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb'=>'459a00')),
        'font' => array('bold' => true, 'size' => 14,'color' => array('rgb' => 'FFFFFF')));
}

function style_normal(){
    $default_border = default_border();
    return array(
        'font' => array('size' => 14),
        'borders' => array('bottom' => $default_border,'left' => $default_border,'top' => $default_border,'right' => $default_border)
    );
}

//end export excell

// danh cho target browser
function browser_list()
{
    $CI =&get_instance();
    $CI->load->model('banner/banner_model');
    $rel = $CI->banner_model->adn_browser_list();
	return $rel;
}

//@hnd code
function get_array_year_from_two_date($startDate, $endDate, $format = "Y-m-d")
{
    $result_date = [];

    $start = new DateTime($startDate);
    $start_date = $start->format('Y-m-d');
    $start_year = $start->format('Y');

    $end = new DateTime($endDate);
    $end_date = $end->format('Y-m-d');
    $end_year = $end->format('Y');

    if(strtotime($end_date) >= strtotime($start_date))
    {
        if($start_year == $end_year)
        {
            $result_date[$start_year]['fromdate'] = $start->format('Y-m-d');
            $result_date[$start_year]['todate'] = $end->format('Y-m-d');
        }
        else
        {
            $arr_date = [];
            $interval = new DateInterval('P1D');
            $end = $end->modify( '+1 day' );
            $dateRange = new DatePeriod($start, $interval, $end);
            foreach ($dateRange as $date) {
                $arr_date[$date->format('Y')][] = $date->format($format);
            }

            if(!empty($arr_date))
            {
                foreach ($arr_date as $year => $d)
                {
                    $fromdate = reset($d);
                    $todate = end($d);
                    $result_date[$year] = [
                        'fromdate' => $fromdate,
                        'todate' => $todate,
                    ];

                }
            }
        }
    }
    return $result_date;
}


function strip_encoded_entities( $input ) {

    // Fix &entity\n;
    $input = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $input);
    $input = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $input);
    $input = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $input);
    $input = html_entity_decode($input, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $input = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+[>\b]?#iu', '$1>', $input);

    // Remove javascript: and vbscript: protocols
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $input);
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $input);
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $input);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $input);
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $input);
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $input);

    return $input;
}

function remove_tags( $input ) {
    // Remove tags
    $input = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $input);

    // Remove namespaced elements
    $input = preg_replace('#</*\w+:\w[^>]*+>#i', '', $input);

    return $input;

}


function strip_base64( $input ) {

    $decoded = base64_decode( $input );

    $decoded = remove_tags( $decoded );
    $decoded = strip_encoded_entities( $decoded );

    $output = base64_encode( $decoded );

    return $output;

}

function valid_raw_url($url)
{
    $chk = false;

    $text = $url;

    //$text = rawurldecode($text);
    $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
                                    ENT_QUOTES | ENT_IGNORE);
    $text = trim($text);
    $url = $text;
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
        ),
        array(
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
        ),
        $text);
	
	$text = remove_tags( $text );
    $text = strip_encoded_entities( $text );

    // Remove all remaining tags and comments and return.
    $text = strip_tags($text);
    $chk = $text == $url ? true : false; 
    return $chk;
}

//GET DOMAIN FINAL FROM REDIRECT URL
function get_redirect_url($url){
    $redirect_url = null;
    
    $url_parts = @parse_url($url);
    if (!$url_parts) return false;
    if (!isset($url_parts['host'])) return false; //can't process relative URLs
    if (!isset($url_parts['path'])) $url_parts['path'] = '/';
    
    $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
    if (!$sock) return false;
    
    $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
    $request .= 'Host: ' . $url_parts['host'] . "\r\n";
    $request .= "Connection: Close\r\n\r\n";
    fwrite($sock, $request);
    $response = '';
    while(!feof($sock)) $response .= fread($sock, 8192);
    fclose($sock);
    
    if (preg_match('/^Location: (.+?)$/m', $response, $matches)){
        if ( substr($matches[1], 0, 1) == "/" )
            return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
            else
                return trim($matches[1]);
                
    } else {
        return false;
    }
    
}

function get_all_redirects($url){
    $newurl = get_redirect_url($url);
    $redirects = array();
    while ($newurl = get_redirect_url($url)){
        if (in_array($newurl, $redirects)){
            break;
        }
        $redirects[] = $newurl;
        $url = $newurl;
    }

    return $redirects;
}

function get_final_url($url){
    $redirects = get_all_redirects($url);
    if (is_array($redirects) && !empty($redirects))
    {
        $final_url =  array_pop($redirects);
    }
    else 
    {
        $final_url = $url;
    }
    
    $headers = get_headers($final_url);
    $headers = array_reverse($headers);
    foreach($headers as $header) {
        if (substr($header, 0, 10) == 'Location: ') {
            $final_url = substr($header, 10);
            break;
        }
    }
    
    $parse_url = parse_url($final_url);
    $domain = str_replace('www.','',$parse_url['host']);
    
    return $domain;
}


function url_get_target_redirect($url)
{
    $redirect_url = '';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $out = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if($httpcode >= 300 && $httpcode < 400 )
    {
        // line endings is the wonkiest piece of this whole thing
        $out = str_replace("\r", "", $out);
        // only look at the headers
        $headers_end = strpos($out, "\n\n");
        if( $headers_end !== false ) { 
            $out = substr($out, 0, $headers_end);
        }   
        $headers = explode("\n", $out);
        foreach($headers as $header) 
        {
            if(strtolower(trim(substr($header, 0, 10))) == "location:" )
            { 
                $redirect_url = substr($header, 10);
                break;
            }
        } 
    }
    return $redirect_url;
}

function get_final_domain_from_url($url)
{
    $newUrl = '';
    $count = 0;
    do{
        $newUrl = url_get_target_redirect($url);
        $url = $newUrl == '' ? $url : $newUrl;
        $count++;
    }while($newUrl != '' & $count < 5);
    
    if($newUrl == '')
    {
        $newUrl = $url;
    }

    $domain = getDomainFromUrl($newUrl);
    return $domain;
}

//END GET DOMAIN FINAL FROM REDIRECT URL

function get_locationads($location, $city, $country, $db_city)
{

    $str_locationasd = "";
    
    if($location != "")
    {
        $str_locationasd .= $location == '1,2,3' ? '0' : $location;
    }

    if($city != "")
    {
        $arr_city = explode(",", $city);
        foreach ($arr_city as $cityid)
        {
            if(isset($db_city[$cityid]))
            {
                $str_locationasd .= $str_locationasd == "" ? $db_city[$cityid] : ','. $db_city[$cityid];
            }
            
        }
    }
    $CI =& get_instance();
    if($country != "")
    {  
        if($CI->router->class == 'dashboard' || $CI->router->class == 'campaign')
        {
            $str_locationasd .=  $str_locationasd == "" ? '<a class="local" >Nước ngoài</a>' : ',<a class="local" >Nước ngoài</a>';
        }
        else
        {
            $str_locationasd .=  $str_locationasd == "" ? '<span class="show-country">Nước ngoài</span>' : ',<span class="show-country">Nước ngoài</span>';
        }
    }
    
    return $str_locationasd;
}

function getImageSizeFromUrl($url)
{
	$rel = [];
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);
	//set header token
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	curl_setopt($ch,CURLOPT_POST, 0);

	//execute post
	$data = curl_exec($ch);
	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE );
	//$curl_errno = curl_errno($ch);	
	//close connection
	curl_close($ch);
	
	if($http_status == 200)
	{
		$rel = getimagesizefromstring($data);
	}
	
	return $rel;
}

function valid_script_ads($url_script)
{
    $check = false;
    $CI =&get_instance();
    $CI->load->model('createad/Createad_model');
    $domain_valid = $CI->Createad_model->adn_script_html_valid_domain_list();

    if(isUrl($url_script))
    {
        $domain_url_script =  getDomainFromUrl($url_script);
        if(in_array($domain_url_script, $domain_valid))
        {
            preg_match("/^(https:|http:).*?(?=.(html|js)$)/", $url_script, $url_result);
            if(!empty($url_result) && isset($url_result[0]))
            {
                $check = true;
            }
        }
    }

    return $check;

}

function notification_telegram($message, $web_hook = TELE_API_WEBHOOK['gdn'], $group_chat = TELE_GROUP_CHATID['gdn']){
	
	$rel = false;
    $data = [
        'chat_id' => $group_chat, 
        'text' => $message,
        'parse_mode' => 'html'
    ];
    
    
    $response = file_get_contents($web_hook . "sendMessage?". http_build_query($data) );
    $result = json_decode($response, true);

    if(isset($result['ok']) && $result['ok'] && isset($result['result']) && isset($result['result']['chat'])){
        //echo "DONE SEND! to group " . $result['result']['chat']['title'];
        $rel = true;
    }else{
    	$rel = false;
        //echo "FAIL SEND!";
    }
    return $rel;
}

function getCanonicalUrl()
{
    $url = HTTP_PROTOCOL . '://' . $_SERVER['SERVER_NAME'];
    if(isset($_SERVER['PATH_INFO']))
    {
        $url .= $_SERVER['PATH_INFO'];
    }
    else
    {
        $uri = $_SERVER["REQUEST_URI"];
        $tmp = explode('?', $uri);
        $url .= isset($tmp[0]) ? trim($tmp[0]) : $uri;
    }
    return $url;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function exitsImageUrl($image_url) {
    $image_type_check = @exif_imagetype ( $image_url ) ; // Lấy loại hình ảnh + kiểm tra xem có tồn tại không
    if ( 
        strpos ( $image_type_check [ 0 ] , "403" ) || 
        strpos ( $image_type_check [ 0 ] , "404" ) || 
        strpos ( $image_type_check [ 0 ] , "302" ) || 
        strpos ( $image_type_check [ 0 ] , "301" )
    ) {        
        return false;
    } else {  
        return true;
    }
}

function imageToBase64($path){
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = @file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    return $base64;
}