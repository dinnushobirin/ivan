<?php
class Paging
{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas)
{
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas)
{
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 ... Next, Prev, First, Last
function navHalaman($halaman_aktif, $jmlhalaman)
{
$link_halaman = "";

// Link First dan Previous
if ($halaman_aktif > 1)
{
	if($_GET['menu']=="produk"){
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=1&id_jenis=$_GET[id_jenis]><button type=\"button\" class=\"btn btn-default\"><< First</button></a>  ";
	}
	elseif($_GET['menu']=="berita"){
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=1&id_kategori=$_GET[id_kategori]><button type=\"button\" class=\"btn btn-default\"><< First</button></a>  ";
	}
	else{
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=1><button type=\"button\" class=\"btn btn-default\"><< First</button></a>  ";
	}
}

if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
	if($_GET['menu']=="produk"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$previous&id_jenis=$_GET[id_jenis]><button type=\"button\" class=\"btn btn-default\">< Previous</button></a>  ";
	}
	elseif($_GET['menu']=="berita"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$previous&id_kategori=$_GET[id_kategori]><button type=\"button\" class=\"btn btn-default\">< Previous</button></a>  ";
	}
	else{
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$previous><button type=\"button\" class=\"btn btn-default\">< Previous</button></a>  ";
	}
}

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++)
{
if ($i == $halaman_aktif)
{
$link_halaman .= "<b><button type=\"button\" class=\"btn btn-success\">$i</button> </b>";
}
else
{
	if($_GET['menu']=="produk"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$i&id_jenis=$_GET[id_jenis]><button type=\"button\" class=\"btn btn-default\">$i</button></a>  ";
	}
	elseif($_GET['menu']=="berita"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$i&id_kategori=$_GET[id_kategori]><button type=\"button\" class=\"btn btn-default\">$i</button></a>  ";
	}
	else{
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$i><button type=\"button\" class=\"btn btn-default\">$i</button></a>  ";
	}
}
$link_halaman .= " ";
}

// Link Next dan Last
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
	if($_GET['menu']=="produk"){
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=$next&id_jenis=$_GET[id_jenis]><button type=\"button\" class=\"btn btn-default\">Next ></button></a> ";
	}
	elseif($_GET['menu']=="berita"){
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=$next&id_kategori=$_GET[id_kategori]><button type=\"button\" class=\"btn btn-default\">Next ></button></a> ";
	}
	else{
		$link_halaman .= " <a href=?menu=$_GET[menu]&halaman=$next><button type=\"button\" class=\"btn btn-default\">Next ></button></a> ";
	}
}

if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
	if($_GET['menu']=="produk"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$jmlhalaman&id_jenis=$_GET[id_jenis]><button type=\"button\" class=\"btn btn-default\"> Last >></button></a> ";
	}
	elseif($_GET['menu']=="berita"){
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$jmlhalaman&id_kategori=$_GET[id_kategori]><button type=\"button\" class=\"btn btn-default\"> Last >></button></a> ";
	}
	else{
		$link_halaman .= "<a href=?menu=$_GET[menu]&halaman=$jmlhalaman><button type=\"button\" class=\"btn btn-default\"> Last >></button></a> ";
	}
}
return $link_halaman;
}
}
?>
