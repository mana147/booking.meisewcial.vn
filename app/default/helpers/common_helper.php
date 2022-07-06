<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function showLOG($var = "ok")
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
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
    if (preg_match_all("/([\<])([^\>]{1,})*([\>])/i", $str, $arr, PREG_PATTERN_ORDER)) {
        $strXml = '';
        if (isset($arr[0])) {
            foreach ($arr[0] as $item) {
                $item = trim($item);
                $strXml .= ($item != '') ? $item : '';
            }
            $strXml = '<xroot>' . $strXml . '</xroot>';
            libxml_use_internal_errors(true);
            libxml_clear_errors();
            $xml = simplexml_load_string($strXml);
            if (count(libxml_get_errors()) > 0) {
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
    if (preg_match('/^www\./i', $domain)) {
        $domain = substr($domain, 4);
    }
    return $domain;
}

function trimTitle($title, $limit = 20)
{
    $newTitle = '';
    if (mb_strlen($title) > $limit) {
        $newTitle = mb_substr($title, 0, $limit) . '...';
    } else {
        $newTitle = $title;
    }
    return $newTitle;
}


function isIdNumber($str)
{
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

function getCtr($click, $view)
{
    $click = str_replace(',', '', $click);
    $view = str_replace(',', '', $view);
    $rel = '';
    if (!is_numeric($click) or !is_numeric($view) or $view == 0) {
        $rel = 'N/A';
    } else {
        $rel = round(($click * 100) / $view, 3);
    }
    return $rel;
}


function isUrl($url)
{
    return (preg_match(
        '/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',
        $url
    )) ? TRUE : FALSE;
}

function removeAllTags($text)
{
    $text = rawurldecode($text);
    $text = htmlspecialchars_decode(
        html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
        ENT_QUOTES | ENT_IGNORE
    );
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
        $text
    );
    $text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    // Remove all remaining tags and comments and return.
    return strip_tags($text);
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
    ) {
        $chk = TRUE;
    }

    return $chk;
}

function is_date($date)
{
    $date = str_replace(array('\'', '-', '.', ','), '/', $date);
    $date = explode('/', $date);
    if (
        count($date) == 1 // No tokens
        && is_numeric($date[0])
        && $date[0] < 20991231
        && (checkdate(substr($date[0], 4, 2), substr($date[0], 6, 2), substr($date[0], 0, 4)))
    ) {
        return TRUE;
    }
    if (
        count($date) == 3
        && is_numeric($date[0])
        && is_numeric($date[1])
        && is_numeric($date[2])
        && (checkdate($date[0], $date[1], $date[2]) //mmddyyyy
            or checkdate($date[1], $date[0], $date[2]) //ddmmyyyy
            or checkdate($date[1], $date[2], $date[0])) //yyyymmdd
    ) {
        return TRUE;
    }
    return FALSE;
}

function validUsername($str)
{
    return preg_match('/^[a-z][a-z0-9_\-\.]+$/i', $str);
}

function validEmail($email)
{
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email);
    // return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function validMd5($md5)
{
    return !empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}

function validate_raw_url($rawUrl)
{
    $chk = false;
    $urlCheck = removeAllTags($rawUrl);
    $urlCompare =    rawurldecode($rawUrl);
    $urlCompare = htmlspecialchars_decode(html_entity_decode($urlCompare, ENT_QUOTES | ENT_IGNORE, "UTF-8"), ENT_QUOTES | ENT_IGNORE);
    $urlCompare = trim($urlCompare);

    $chk = $urlCheck == $urlCompare ? true : false;

    return $chk;
}
