<?php
if ( ! function_exists('element')) {
	
	function convertDate($date,$format)
	{
		$date = explode("-",$date);
		$tahun = $date[0];
		$bulan = $date[1];
		$tanggal = substr($date[2],0,2);	
		$jam = substr($date[2],3,11);	

		switch($bulan){
			case 1:
			$bulan_ind = "Januari";
			$bulan_ind_short = "Januari";
			break;
			case 2:
			$bulan_ind = "Februari";
			$bulan_ind_short = "Februari";
			break;
			case 3:
			$bulan_ind = "Maret";
			$bulan_ind_short = "Maret";
			break;
			case 4:
			$bulan_ind = "April";
			$bulan_ind_short = "April";
			break;
			case 5:
			$bulan_ind = "Mei";
			$bulan_ind_short = "Mei";
			break;
			case 6:
			$bulan_ind = "Juni";
			$bulan_ind_short = "Juni";
			break;
			case 7:
			$bulan_ind = "Juli";
			$bulan_ind_short = "Juli";
			break;
			case 8:
			$bulan_ind = "Agustus";
			$bulan_ind_short = "Agustus";
			break;
			case 9:
			$bulan_ind = "September";
			$bulan_ind_short = "September";
			break;
			case 10:
			$bulan_ind = "Oktober";
			$bulan_ind_short = "Oktober";
			break;
			case 11:
			$bulan_ind = "November";
			$bulan_ind_short = "November";
			break;
			case 12:
			$bulan_ind = "Desember";
			$bulan_ind_short = "Desember";
			break;
			default :
			$bulan_ind = "";
			$bulan_ind_short = "";
			break;
		}

		switch($format){
			case "dd/mm/yyyy":
			$output = $tanggal.'/'.$bulan.'/'.$tahun;
			break;
			case "dd-mm-yyyy":
			$output = $tanggal.'-'.$bulan.'-'.$tahun;
			break;
			case "dd mmm yyyy":
			$output = $tanggal.' '.$bulan_ind.' '.$tahun;
			break;
			case "dd mmm yyyy : hh:mm:ss":
			$output = $tanggal.' '.$bulan_ind_short.' '.$tahun.' '.$jam;
			break;
			case "mmm yyyy":
			$output = $bulan_ind.' '.$tahun;
			break;
			case "mmmm":
			$output = $bulan_ind_short;
			break;
			case "dd":
			$output = $tanggal;
			break;
			case "dd mmmm yyyy":
			$output = $tanggal.' '.$bulan_ind_short.' '.$tahun;
			break;
		}	 
		
		if($tanggal=='00')
		{
			$output = 'NULL';
		}
		
		return $output;	   
	}
	
	function convertDateJS2SQL($date)
	{
		$date = explode("/",$date);
		$tanggal = $date[0];
		$bulan = $date[1];
		$tahun = $date[2];	
		
		$output = $tahun."-".$bulan."-".$tanggal;
		return $output;
	}
	
	function convertDateJS2SQLmonth($date)
	{
		$date = explode("/",$date);
		$bulan = $date[0];
		$tahun = $date[1];	
		
		$output = $tahun."-".$bulan;
		return $output;
	}

	function getdatefile()
	{
		return date("YmdHis");
	}

	function mergeDate($date)
	{
		$date = explode("-",$date);
		$tahun = $date[0];
		$bulan = $date[1];
		$tanggal = $date[2];	
		
		$output = $tanggal.$bulan.$tahun;
		return $output;
	}

	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
			);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}	
}
?>