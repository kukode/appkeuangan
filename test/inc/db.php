<?php 
$db = new mysqli('localhost', 'root', 'develop93', 'dbrealisasi') or die("error");


function topersen($dari='',$total='',$persen='%')
{

	return number_format( $dari/$total * 100, 0 ) . $persen;
}

function rp($nilai)
{
    return 'Rp'.number_format($nilai, 0, '', '.').',-';
}