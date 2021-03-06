			<!-- Left side column. contains the sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">NAVIGASI UTAMA</li>
						<li class="treeview <?php echo active_menu($uri_2, 'dashboard') ?>">
							<a href="<?php echo site_url('admin/dashboard');?>">
								<i class="fa fa-dashboard"></i> <span>Dasbor</span>
							</a>
						</li>
						<li class="treeview <?php echo active_menu($uri_2, 'user') ?>">
							<a href="<?php echo site_url('admin/user');?>">
								<i class="fa fa-user-secret"></i> <span>Administrator</span>
							</a>
						</li>
						<li class="treeview <?php echo active_menu($uri_2, 'voucher') ?>">
							<a href="<?php echo site_url('admin/voucher');?>">
								<i class="fa fa-credit-card"></i> <span>Voucher</span>
							</a>
						</li>
						<li class="treeview <?php echo active_menu($uri_2, 'email') ?>">
							<a href="<?php echo site_url('admin/email');?>">
								<i class="fa fa-envelope"></i> <span>Email Berlangganan</span>
							</a>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['content']) ?>">
							<a href="#">
								<i class="fa fa-table"></i> <span>Konten</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_perent($uri_2, $menu['profile']) ?>">
									<a href="#">
										<i class="fa fa-circle-o"></i> Profil Perusahaan <i class="fa fa-angle-left pull-right"></i>
									</a>
									<ul class="treeview-menu">
										<li class="<?php echo active_menu($uri_2, 'about') ?>">
											<a href="<?php echo site_url('admin/about');?>"><i class="fa fa-circle-o"></i> Tentang Kami </a>
										</li>
										<li class="<?php echo active_menu($uri_2, 'contact') ?>">
											<a href="<?php echo site_url('admin/contact');?>"><i class="fa fa-circle-o"></i> Kontak </a>
										</li>
									</ul>
								</li>
								<li class="<?php echo active_menu($uri_2, 'how-to-buy') ?>">
									<a href="<?php echo site_url('admin/how-to-buy');?>"><i class="fa fa-circle-o"></i> Cara Pembelian </a>
								</li>
								<!-- <li class="<?php echo active_menu($uri_2, 'term-and-condition') ?>">
									<a href="<?php echo site_url('admin/term-and-condition');?>"><i class="fa fa-circle-o"></i> Terms and Conditions </a>
								</li> -->
								<!-- <li class="<?php echo active_menu($uri_2, 'faq') ?>">
									<a href="<?php echo site_url('admin/faq');?>"><i class="fa fa-circle-o"></i> F A Q </a>
								</li> -->
								<li class="<?php echo active_menu($uri_2, 'bank') ?>">
									<a href="<?php echo site_url('admin/bank');?>"><i class="fa fa-circle-o"></i> Bank </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'testi') ?>">
									<a href="<?php echo site_url('admin/testi');?>"><i class="fa fa-circle-o"></i> Testimonial</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['article']) ?>">
							<a href="#">
								<i class="fa fa-newspaper-o"></i> <span>Artikel</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_2, 'tag') ?>">
									<a href="<?php echo site_url('admin/tag');?>"><i class="fa fa-circle-o"></i> Tag </a>
								</li>
								<!-- <li class="<?php echo active_menu($uri_2, 'article-category') ?>">
									<a href="<?php echo site_url('admin/article-category');?>"><i class="fa fa-circle-o"></i> Article Category </a>
								</li> -->
								<li class="<?php echo active_menu($uri_2, 'article') ?>">
									<a href="<?php echo site_url('admin/article');?>"><i class="fa fa-circle-o"></i> Artikel </a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['product']) ?>">
							<a href="#"><i class="fa fa-cube"></i> <span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_2, 'category') ?>">
									<a href="<?php echo site_url();?>admin/category">
										<i class="fa fa-circle-o"></i> Kategori
									</a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'motif') ?>">
									<a href="<?php echo site_url();?>admin/motif"><i class="fa fa-circle-o"></i> Motif </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'brand') ?>">
									<a href="<?php echo site_url();?>admin/brand"><i class="fa fa-circle-o"></i> Brand </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'color') ?>">
									<a href="<?php echo site_url();?>admin/color"><i class="fa fa-circle-o"></i> Warna </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'product') ?>">
									<a href="<?php echo site_url();?>admin/product"><i class="fa fa-circle-o"></i> Produk </a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_3, $menu['transaction']) ?>">
							<a href="#">
								<i class="fa fa-flag-o"></i> <span> Transaksi</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_3, 'order') ?>">
									<a href="<?php echo site_url();?>admin/transaction/order">
										<i class="fa fa-circle-o"></i> Pesanan Baru  <span class="label pull-right bg-red"><?php echo $count_new_trans; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'confirm') ?>">
									<a href="<?php echo site_url();?>admin/transaction/confirm">
										<i class="fa fa-circle-o"></i> Konfirmasi Pesanan  <span class="label pull-right bg-red"><?php echo $count_confirm_trans; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'delivery') ?>">
									<a href="<?php echo site_url();?>admin/transaction/delivery">
										<i class="fa fa-circle-o"></i> Proses Pengiriman  <span class="label pull-right bg-red"><?php echo $count_delivery_trans; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'close') ?>">
									<a href="<?php echo site_url();?>admin/transaction/close">
										<i class="fa fa-circle-o"></i> Transaksi Selesai  <span class="label pull-right bg-red"><?php echo $count_close_trans; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'canceled') ?>">
									<a href="<?php echo site_url();?>admin/transaction/canceled">
										<i class="fa fa-circle-o"></i> Transaksi Dibatalkan  <span class="label pull-right bg-red"><?php echo $count_cancel_trans; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'report') ?>">
									<a href="<?php echo site_url();?>admin/transaction/report">
										<i class="fa fa-circle-o"></i> Laporan Transaksi  <span class="label pull-right bg-red"><?php echo $count_report; ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['member']) ?>">
							<a href="#">
								<i class="fa fa-users"></i> <span> Member</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_3, 'all') ?>">
									<a href="<?php echo site_url('admin/member/all'); ?>">
										<i class="fa fa-circle-o"></i> Member <span class="label pull-right bg-red"><?php echo $count_all_member; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'recent') ?>">
									<a href="<?php echo site_url('admin/member/recent'); ?>">
										<i class="fa fa-circle-o"></i> Member Baru <span class="label pull-right bg-red"><?php echo $count_new_member; ?></span>
									</a>
								</li>
								<li class="<?php echo active_menu($uri_3, 'blacklist') ?>">
									<a href="<?php echo site_url('admin/member/blacklist'); ?>">
										<i class="fa fa-circle-o"></i> Blokir Member <span class="label pull-right bg-red"><?php echo $count_bl_member; ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['misscellaneous']) ?>">
							<a href="#">
								<i class="fa fa-image"></i> <span> Lain-lain</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_2, 'slide') ?>">
									<a href="<?php echo site_url('admin/slide');?>"><i class="fa fa-circle-o"></i> Slide </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'banner') ?>">
									<a href="<?php echo site_url('admin/banner');?>"><i class="fa fa-circle-o"></i> Banner </a>
								</li>
								<!-- <li class="<?php echo active_menu($uri_2, 'video') ?>">
									<a href="<?php echo '#'; //site_url('admin/video');?>"><i class="fa fa-circle-o"></i> Video </a>
								</li> -->
							</ul>
						</li>
						<li class="treeview <?php echo active_perent($uri_2, $menu['seo']) ?>">
							<a href="#">
								<i class="fa fa-search"></i> <span>S E O</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li class="<?php echo active_menu($uri_2, 'site') ?>">
									<a href="<?php echo site_url('admin/site');?>"><i class="fa fa-circle-o"></i> Situs Umum </a>
								</li>
								<li class="<?php echo active_menu($uri_2, 'seo') ?>">
									<a href="<?php echo site_url('admin/seo');?>"><i class="fa fa-circle-o"></i> S E O </a>
								</li>
							</ul>
						</li>
						<li class="header">ALAT</li>
						<!-- <li><a href="#"><i class="fa fa fa-book text-red"></i> <span>Buku Panduan</span></a></li> -->
						<li><a href="#"><i class="fa fa-area-chart text-green"></i> <span>Statistik Website</span></a></li>
						<li><a href="#"><i class="fa fa-envelope text-aqua"></i> <span>Web Mail</span></a></li>
						<li>
							<a href="<?php echo site_url('logout');?>" >
								<i class="fa fa-sign-out text-yellow"></i> <span>Keluar</span>
							</a>
						</li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<!-- =============================================== -->
