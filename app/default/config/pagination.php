<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Pagination Config Bootstrap 3 CSS Style
 */

$config['query_string_segment'] = 'start';

$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
$config['full_tag_close'] = '</ul></nav>';

$config['first_link'] = 'FIRST'; //$config['first_link'] = 'First'; //

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'LAST';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '>'; //$config['next_link'] = 'Next';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '<';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="active"><a>';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['uri_segment'] = 5;



//The pagination function automatically determines which segment of your URI contains the page number.
// If you need something different you can specify it.
//$config['num_links'] = 2;

//The number of "digit" links you would like before and after the selected page number.
// For example, the number 2 will place two digits on either side, as in the example links at the very top of this page.
//$config['use_page_numbers'] = TRUE;

//By default, the URI segment will use the starting index for the items you are paginating.
// If you prefer to show the the actual page number, set this to TRUE.
//$config['page_query_string'] = TRUE;

//By default, the pagination library assume you are using URI Segments, and constructs your links something like

//http://example.com/index.php/test/page/20

//If you have $config['enable_query_strings'] set to TRUE your links will automatically be re-written using Query Strings.
// This option can also be explictly set. Using $config['page_query_string'] set to TRUE, the pagination link will become.

//http://example.com/index.php?c=test&m=page&per_page=20

//Note that "per_page" is the default query string passed, however can be configured using $config['query_string_segment'] = 'your_string'


/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
