<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/23/2019
 * Time: 6:41 PM
 */
# import html dom parser
require 'simple_html_dom.php';
# define the URL to read from
$html = file_get_html('https://www.kudosprime.com/gts/carlist.php');
# get carlist from div tag id
$carlist = $html->find('div[id=carlist]');
echo $carlist;
?>