<div class="kalkulator">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">KALKULATOR</a></li>
			</ol>
			<h2 class="ftimes">Kalkulator Wallpaper</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>
	<section id="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<p style="font-weight:normal">Ukuran Dinding/Bidang yang AKAN dipasang wallpaper:</p>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							<p>Ukuran Wallpaper</p>
						</div>
						<div class="col-md-9">
							<select id="uk" class="selectU" name="">
								<option value="5">0.53m x 10.05m (5m2)</option>
								<option value="10">0.53m x 20.05m (10m2)</option>
								<option value="15">0.53m x 30.05m (15m2)</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<p>Area Dinding 1</p>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="bungkus">
										<input id="ld1" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bungkus">
										<input id="td1" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<p>Area Dinding 2</p>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="bungkus">
										<input id="ld2" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bungkus">
										<input id="td2" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<p>Area Dinding 3</p>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="bungkus">
										<input id="ld3" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="bungkus">
										<input id="td3" type="text">
										<div class="satuan">
											<p class="text-center">Meter</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p class="text-right">Total Area Dinding</p>
								</div>
								<div class="col-md-6">
									<div class="bungkus">
										<input readonly id="resultsWall" type="text">
										<div class="satuan">
											<p class="text-center">Meter2</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p class="text-right">Wallpaper Yang Dibutuhkan</p>
								</div>
								<div class="col-md-6">
									<div class="bungkus">
										<input readonly id="need" type="text">
										<div class="satuan">
											<p class="text-center">Roll</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<button id="hitungWall" class="hitung" type="button" name="button">HITUNG WALLPAPER</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<p>Wallpaper Calculator merupakan <strong>perkiraan kebutuhan wallpaper.</strong><br>
						Wallpaper dengan motif besar akan menggunakan ukuran lebih sebesar +-10% dari materi untuk menyesuaikan motif / pattern.</p>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
$("#hitungWall").click(function(){
	var hasil1;
	var hasil2;
	var hasil3;
	var results;
	var need;
	var uk = $("#uk").val()

	hasil1 = $("#ld1").val() * $("#td1").val()
	hasil2 = $("#ld2").val() * $("#td2").val()
	hasil3 = $("#ld3").val() * $("#td3").val()

	results = hasil1 + hasil2 + hasil3
	need = results / uk
	need = Math.ceil(need);

	$("#resultsWall").val(results)
	$("#need").val(need)
})
</script>
