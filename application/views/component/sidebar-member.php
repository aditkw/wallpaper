<div class="sidebar-member">
	<ul>
		<li <?php if ($uri_1 == "member-area" && empty($uri_2)): ?> class="active" <?php endif ?>>
			<a href="<?php echo site_url('member-area') ?>">Dasbor <i class="fa fa-angle-right pull-right"></i></a>
		</li>
		<li <?php if ($uri_1 == "member-area" && $uri_2 == "profile"): ?> class="active" <?php endif ?>>
			<a href="<?php echo site_url('member-area/profile') ?>">Profil <i class="fa fa-angle-right pull-right"></i></a>
		</li>
		<li <?php if ($uri_1 == "member-area" && $uri_2 == "transaksi"): ?> class="active" <?php endif ?>>
			<a href="<?php echo site_url('member-area/transaksi') ?>">Pesanan Anda <i class="fa fa-angle-right pull-right"></i></a>
		</li>
		<li>
			<a href="<?php echo site_url('produk/'.$wallpaper->category_link) ?>">Kembali Berbelanja <i class="fa fa-angle-right pull-right"></i></a>
		</li>
		<li>
			<a href="<?php echo site_url('member-logout') ?>">Logout <i class="fa fa-angle-right pull-right"></i></a>
		</li>
	</ul>
</div><!-- /.sidebar-member -->
