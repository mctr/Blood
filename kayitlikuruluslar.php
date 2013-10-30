<?php
include("layout/_head.php");
include("layout/_header.php");
?>

<legend>Kayıtlı Kurum Ve Kuruluşlar
<div class="pull-right"><a href="kurumekle.php" class="btn btn-primary">Yeni Kurum Kaydı</a></div>
</legend>
<br>
<table class="table table-condensed">
	<thead>
		<tr>
		<th>Adı</th>
		<th>İl</th>
		<th>İlçe</th>
		<th>Kurum Tipi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td>Ondokuz Mayıs Üniversitesi</td>
		<td>Samsun</td>
		<td>Atakum</td>
		<td>Hastane</td>
		</tr>
		<tr>
		<td>Sabuncuoglu Şerefettin</td>
		<td>Amasya</td>
		<td>Merkez</td>
		<td>Araştırma Hastanesi</td>
		</tr>
	</tbody>
</table>






<?php
include('layout/_footer.php');
?>

