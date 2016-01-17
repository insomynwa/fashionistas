<h3><?php echo $attributes['distributor']->GetNama(); ?></h3>
<p><?php echo $attributes['invoice']->GetTgl(); ?></p>
<table class="table table-responsive">
	<tr>
		<th>NO</th>
		<th>MENU</th>
		<th>BANYAK</th>
		<th>HARGA @</th>
		<th>JUMLAH</th>
	</tr>
<?php for($i = 0; $i < sizeof( $attributes['pesanan']); $i++ ): ?>
	<tr>
		<td><?php echo ($i+1);  ?></td>
		<td><?php echo $attributes['menu'][$i]->GetNama(); ?></td>
		<td><?php echo $attributes['pesanan'][$i]->GetJumlahPesanan(); ?></td>
		<td>Rp.<?php echo number_format($attributes['pesanan'][$i]->GetHargaSatuan(), 0,',','.'); ?></td>
		<td>Rp.<?php echo number_format($attributes['pesanan'][$i]->GetNilaiPesanan(), 0,',','.'); ?></td>
	</tr>
<?php endfor; ?>
	<tr>
		<td></td>
		<td>Biaya Kirim</td>
		<td></td>
		<td></td>
		<td>Rp.<?php echo number_format($attributes['invoice']->GetBiayaKirim(), 0,',','.'); ?> (<?php echo $attributes['invoice']->GetJarakKirim(); ?>KM)</td>
	</tr>
	<tr>
		<td></td>
		<td>Total ( + PPn)</td>
		<td></td>
		<td></td>
		<td><strong>Rp.<?php echo number_format($attributes['total_pembayaran'], 0,',','.'); ?></strong></td>
	</tr>
</table>