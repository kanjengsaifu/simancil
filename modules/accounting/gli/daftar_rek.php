<html>
 <head>
  <title>Daftar Buku</title>
  <style>
   body,table,input{
   	font-size:12px
   }
  </style>
  <script language="javascript">
   function selectBuku(no,nama,tipe){
	   window.parent.selectBuku(no,nama,tipe);
	   window.parent.tb_remove();
   }
  </script>
 </head>
<body>
<?php 
 include '../include/globalx.php';
 
 $SQL = "SELECT * FROM $database.rek WHERE norek <> '' ORDER by norek";
 if(isset($_POST['search'])){
	 $SQL = "SELECT * FROM $database.rek WHERE namarek LIKE '%$_POST[search_name]%' ORDER by norek";
 }
 $query = mysql_query($SQL, $dbh_jogjaide);
 //echo $SQL;
?>
<form action="" method="post">
 Cari Nama Rekening: <input type="text" name="search_name" size="15" value="<?php  echo @$_POST['search_name']; ?>" />
 <input type="submit" name="search" value="Cari" />
</form>
<table width="100%" bgcolor="#000000" cellspacing="1" cellpadding="3">	
	<tr bgcolor="#DDDDDD">
		<th>No Rekening</th>
		<th>Nama Rekening</th>
		<th>Tipe</th>
	</tr>
	<?php  while($row = mysql_fetch_object($query)): ?>
	<tr bgcolor="#FFFFFF">
		<!-- fungsi selectBuku di deklarasikan di index.html dan file ini bisa memanggilnya selama file ini
			 dipanggil oleh thickbox dari index.html, fungsi dari selectPegawai adalah untuk memasukan nilai
			 NIP dan nama pegawai dari masing-masing baris di daftar pegawai ini -->
		<td align="center"><a href="javascript:selectBuku('<?php  echo $row->norek?>','<?php  echo $row->namarek?>','<?php  echo $row->tipe?>')"><?php  echo $row->norek?></a></td>
		<td><?php  echo $row->namarek?></td>
		<td align="center"><?php  echo $row->tipe?></td>
	</tr>
	<?php  endwhile; ?>
</table>
</body>
</html>
