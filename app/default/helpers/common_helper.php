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