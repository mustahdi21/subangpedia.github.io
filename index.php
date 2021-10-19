<?php 
session_start();
require("config.php");

    if(isset($_COOKIE['cookie_token'])) {
	$data = $conn->query("SELECT * FROM users WHERE cookie_token='".$_COOKIE['cookie_token']."'");
	if(mysqli_num_rows($data) > 0) {
	    $hasil = mysqli_fetch_assoc($data);
		$_SESSION['user'] = $hasil;
	}
}

    
    if (isset($_SESSION['user'])) {
        $sess_username = $_SESSION['user']['username'];
        $check_user = $conn->query("SELECT * FROM users WHERE username = '$sess_username'");
        $data_user = $check_user->fetch_assoc();
        $check_username = $check_user->num_rows;
        if ($check_username == 0) {
	        header("Location: ".$config['web']['url']."logout.php");
        } else if ($data_user['status'] == "Tidak Aktif") {
	        header("Location: ".$config['web']['url']."logout.php");
        }

        // Data Grafik Pesanan Sosial Media

        $check_order_today = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='($date)' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_oneday_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_twodays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_threedays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_fourdays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_fivedays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_sixdays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$sixdays_ago' and user = '$sess_username'");   

        // Data Selesai

        // Data Grafik Pesanan Top Up

        $check_order_pulsa_today = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$date' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_pulsa_oneday_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_pulsa_twodays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_pulsa_threedays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_pulsa_fourdays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_pulsa_fivedays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_pulsa_sixdays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$sixdays_ago' and user = '$sess_username'");

        // Data Selesai

        // Data Grafik Pesanan Pascabayar
        $check_order_pascabayar_today = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$date' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_pascabayar_oneday_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_pascabayar_twodays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_pascabayar_threedays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_pascabayar_fourdays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_pascabayar_fivedays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_pascabayar_sixdays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$sixdays_ago' and user = '$sess_username'");

        // Data Selesai

        } else {
	        $_SESSION['user'] = $data_user;
	        header("Location: ".$config['web']['url']."Halaman");
        }

include("lib/header.php");
if (isset($_SESSION['user']) OR isset($_COOKIE['username'])) {
?>
         <!--Start Slide -->
        <div class="kt-container">
            <div class="row">
                <div class="col-lg-12">
	                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slide/promogame.png" alt="Slide Pertama">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slide/onedeposit.png" alt="Slide Kedua">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slide/terang.png" alt="Slide Ketiga">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slide/empat.png" alt="Slide Keempat">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slide/off1.png" alt="Slide Kelima">
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Sebelumnya</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Selanjutnya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <!--End Slide -->
         
         <br />
         
         
          <!-- Start Table Icon Box -->
        <div class="kt-container">
            <div class="row">
	            <div class="col-lg-12" style="margin-top: 17px;">
	                <div class="btn btn-light btn-hover-light btn-pill col-lg-12">
				        <table class="table table-bordered mb-0">
					        <tbody>
						        <tr>
							        <td>
							            <div class="kt-iconbox__desc">
                                            <h4 class="kt-iconbox__title">
                                            <a href="/topup">
								                <img src="<?php echo $config['web']['url'] ?>assets/media/icon/balance-top-up.svg" width="20px"> Rp <?php echo number_format($data_user['saldo_sosmed'],0,',','.'); ?>
							                </h4>
                                            <div class="kt-iconbox__content">
                                                Saldo Sosial Media
                                            </div>
							            </div>
							        </td>
							        <td>
							            <div class="kt-iconbox__desc">
                                            <h4 class="kt-iconbox__title">
                                            <a href="/topup">
								                <img src="<?php echo $config['web']['url'] ?>assets/media/icon/balance-top-up.svg" width="20px"> Rp <?php echo number_format($data_user['saldo_top_up'],0,',','.'); ?>
							                </h4>
                                            <div class="kt-iconbox__content">
                                                Saldo Pulsa
                                            </div>
							            </div>
							        </td>
						        </tr>
					        </tbody>
				        </table>
	                </div>
	            </div>
			</div>
        </div>
		<!-- End Table Icon Box -->

		<br />

		<!-- Start Card Poin -->
		<div class="kt-container">
		    <div class="row">
		        <div class="col-lg-12">
		            <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__body">
	                        <div class="row">
		                        <div class="col-6">
			                        <h4 class="mb-0 text-primary" style="margin-top: -5px !important; margin-bottom: -10px !important;"><img src="<?php echo $config['web']['url'] ?>assets/media/icon/coins.svg" width="20px"><font color="black"> <?php echo number_format($data_user['koin'],0,',','.'); ?></font></h4>
		                        </div>
		                        <div class="col-6 text-right" style="margin-top: -10px !important; margin-bottom: -10px !important;">
			                        <a href="<?php echo $config['web']['url'] ?>page/withdraw-coin-to-balance" class="btn btn-primary btn-sm"> <i class="fas fa-plus-circle"></i> Tarik Koin</a>
		                        </div>
	                        </div>
                        </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- End Card Poin -->
		
<marquee align ="center" direction ="left" scrollamount="6">Transaksi Lancar, Silahkan gazz Transaksi!! | Deposit Indomaret dan Alfamart Open Hubungi Wa CS Kami 0851-5757-8443 selain itu penipuan dan Kami tidak pernah menanyakan Password Anda!</marquee>

		<!-- Start Order -->
<div class="kt-container">
      <div class="kt-portlet">
        <div class="kt-portlet"></div>
          <div class="kt-portlet__head">
             <div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					 <i class="flaticon2-shopping-cart text-primary"></i>
					  <font color="black" size="2">Kategori Pemesanan</font>
					 </h3>
				</div>
			 </div>
          <div class="kt-widget27__container kt-portlet__space-x mb-4">
            <div class="row">
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/pulsa">
                    <img src="/assets/menu/logo_pulsa.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Pulsa
			        </h3>
                  </a>
                </center>
                 </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/pulsa-transfer">
                    <img src="/assets/menu/logo_tf.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Pulsa Transfer
			        </h3>
                  </a>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/paket-internet">
                    <img src="/assets/menu/logo_data.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Internet
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/tlp-sms">
                    <img src="/assets/menu/logo_smstlp.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Tlp/Sms
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/token-pln">
                    <img src="/assets/menu/logo_pln.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Token PLN
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/voucher">
                    <img src="/assets/menu/logo_voucher.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Voucher Lainnya
			        </h3>
                  </a>
                  </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/voucher-internet">
                    <img src="/assets/menu/logo_vinter.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Voucher Internet
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/voucher-game">
                    <img src="/assets/menu/logo_game.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Top up Game
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/emoney">
                    <img src="/assets/menu/logo_emoney.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        E-Money
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/pln-pascabayar">
                    <img src="/assets/menu/logo_tagihan.jpeg" style="height: 3.5rem;width: 3.5rem;;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Bayar Tagihan
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/pulsa-internasional">
                    <img src="/assets/menu/logo_inter.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Pulsa Internasional
			         </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/voucher-blank">
                    <img src="/assets/menu/logo_voucherblank.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Aktivasi Voucher
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/social-media">
                    <img src="/assets/menu/logo_sosmed.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Sosmed
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/wifi-id">
                    <img src="/assets/menu/logo_wifi.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Voucher Wifi ID
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/tumbas/playstore">
                    <img src="/assets/menu/logo_google.jpeg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Voucher Google Play
			        </h3>
                  </a>
                </center>
              </div>
            </div>
          </div>			 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Order -->

<!-- Start Order -->
   <div class="kt-container">
      <div class="kt-portlet">
        <div class="kt-portlet"></div>
          <div class="kt-portlet__head">
             <div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					 <i class="flaticon2-shopping-cart text-primary"></i>
					  <font color="black" size="2">Kategori Lainnya</font>
					 </h3>
				</div>
			 </div>
          <div class="kt-widget27__container kt-portlet__space-x mb-3">
            <div class="row">
              <div class="col-4 mt-3">
                <center>
                  <a href="/page/help">
                    <img src="/assets/vcr1.png" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Kirim Tiket Bantuan
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="https://api.whatsapp.com/send?phone=6285157578443(CS SUBANG PEDIA)&text=Hallo%20admin%20%20!!!">
                    <img src="/assets/media/layanan.svg" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			       Chat dengan Kami
			        </h3>
                  </a>
                </center>
              </div>
              <div class="col-4 mt-3">
                <center>
                  <a href="/page/service-promo">
                    <img src="/assets/h2h.png" style="height: 3.5rem;width: 3.5rem;">
                    <h3 class="text-dark mt-3" style="color: black; font-family: verdana; font-size: 12px; margin-top: 3px;">
			        Promo
			        </h3>
                  </a>
                </center>
              </div>
            </div>
          </div>			 
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Start Grup Chat Icon Box -->
    <div class="container">
      <div class="col-lg-15">
		<div class="kt-portlet text-black" style="background: #ffffff;">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="fas fa-wallet text-primary"></i>
					</span>
					<h3 style="color: black; font-family: verdana; font-size: 10px; margin-top: 3px;">
						Cara Isi Saldo
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-actions">
						<a href="/page/how-to-top-up-balance" class="btn btn-primary">
							<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;Klik
						</a>
					</div>
				</div>
			</div>
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="fas fa-exchange-alt text-primary"></i>
					</span>
					<h3 style="color: black; font-family: verdana; font-size: 10px; margin-top: 3px;">
						Cara Transaksi
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-actions">
						<a href="/page/how-to-transaction" class="btn btn-primary">
							<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;Klik
						</a>
					</div>
				</div>
			</div>
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="fas fa-bell text-primary"></i>
					</span>
					<h3 style="color: black; font-family: verdana; font-size: 10px; margin-top: 3px;">
						Berita dan Informasi
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-actions">
						<a href="/page/news" class="btn btn-primary">
							<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;Klik
						</a>
					</div>
				</div>
			</div>
		</div>	
      </div>
    </div>
  <!-- End Grup Chat Icon Box -->

        <!-- Start Modal Content -->
        <?php 
        if ($data_user['read_news'] == 1) {
        ?>
        <div style="background: #212121;" class="modal fade show" id="news" tabindex="-1" role="dialog" aria-labelledby="NewsInfo" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: #212121;">
                    <h4 style="color:white;" class="modal-title mt-0" id="NewsInfo"><b><i class="flaticon2-bell text-primary"></i>  Berita & Informasi</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style="background: #000000;" class="modal-body" style="max-height: 400px; overflow: auto;">
                    <?php
                    $cek_berita = $conn->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5");
                    while ($data_berita = $cek_berita->fetch_assoc()) {
                    if ($data_berita['tipe'] == "INFO") {
                        $label = "info";
                    } else if ($data_berita['tipe'] == "PERINGATAN") {
                        $label = "warning";
                    } else if ($data_berita['tipe'] == "PENTING") {
                        $label = "danger";    
                    }
                    ?>  
                    <div class="alert alert-dark">
                        <div class="alert-text">
                            <p><span class="float-right text-white"><?php echo tanggal_indo($data_berita['date']); ?>, <?php echo $data_berita['time']; ?></span></p>
                            <h5 class="inbox-item-author mt-0 mb-1"><?php echo $data_berita['title']; ?></h5>
                            <h5><span class="badge badge-<?php echo $label; ?>"><?php echo $data_berita['tipe']; ?></span></h5>
                            <?php echo nl2br($data_berita['konten']); ?>
                        </div>
                    </div>
                    <?php } ?>   
                    </div>
                    <div class="modal-footer" style="background: #212121;">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="read_news()"><i class="flaticon2-check-mark"></i> Saya Sudah Membaca</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End Modal Content-->
		
		<br />
		<br />

<?php 
}
require 'lib/footer.php';
?>