<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Kontak Kami</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
    <div class="contact">
		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<!-- Contact Form -->
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Hubungi Kami</div>
							<form class="comment_form" wire:submit.prevent="kirimPesan">
							@csrf
								<div>
									<div class="form_title">Saya adalah</div>
									<select class="comment_input" wire:model="data.entitas">
										<option value="Siswa">Siswa</option>
										<option value="Orang Tua">Orang Tua</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
								<div>
									<div class="form_title">Nama Lengkap</div>
									<input type="text" class="comment_input" wire:model="data.nama" required>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form_title">Email</div>
										<input type="email" class="comment_input" wire:model="data.email" required>
									</div>
									<div class="col-6">
										<div class="form_title">No. Telp./HP</div>
										<input type="text" class="comment_input" wire:model="data.no_hp" maxLength="15" required>
									</div>
								</div>
								<div>
									<div class="form_title">Asal Sekolah</div>
									<input type="text" class="comment_input" wire:model="data.asal_sekolah" required>
								</div>
								<div>
									<div class="form_title">Dari mana Anda tahu Kalla Institute?</div>
									<select class="comment_input" wire:model="data.sumber_info">
										<option value="Guru Sekolah">Guru Sekolah</option>
										<option value="Brosur">Brosur</option>
										<option value="Billboard">Billboard</option>
										<option value="Mahasiswa Kalla Institute">Mahasiswa Kalla Institute</option>
										<option value="Education Fair / Expo">Education Fair / Expo</option>
										<option value="Facebook">Facebook</option>
										<option value="Instagram">Instagram</option>
										<option value="Teman/Kerabat/Keluarga">Teman/Kerabat/Keluarga</option>
										<option value="Website">Website</option>
										<option value="Koran">Koran</option>
										<option value="Radio">Radio</option>
									</select>
								</div>
								@if($data['sumber_info'] == 'Mahasiswa Kalla Institute')
								<div>
									<div class="form_title">Jika dari Mahasiswa Kalla Institute, sebutkan nama Mahasiswa tersebut</div>
									<input type="text" class="comment_input" wire:model="data.mahasiswa_penunjuk">
								</div>
								@endif
								<div>
									<div class="form_title">Kapan Anda tertarik masuk Kalla Institute?</div>
									<select class="comment_input" wire:model="data.angkatan">
										<option value="Angkatan 2022">Angkatan 2022</option>
										<option value="Angkatan 2023">Angkatan 2023</option>
										<option value="Angkatan 2024">Angkatan 2024</option>
										<option value="Angkatan 2025">Angkatan 2025</option>
									</select>
								</div>
								<div>
									<div class="form_title">Pesan</div>
									<textarea class="comment_input comment_textarea" wire:model="data.pesan" required></textarea>
								</div>
								<div class="row justify-content-between">
									<div class="col-4">&nbsp;</div>
									<div class="col-4">
									<button type="submit" class="comment_button trans_200">Kirim Pesan</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Info Kontak</div>
							<!--div class="contact_info_text">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a distribution of letters.</p>
							</div-->
							<div class="contact_info_location">
								<div class="contact_info_location_title">Alamat</div>
								<ul class="location_list">
									<li>Nipah Mall Office Building, Lt.5 & 6</li>
									<li>+(62) 811 4390 2019</li>
									<li>info@kallainstitute.ac.id</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Contact Map -->

		<div class="contact_map" style="margin-top:30px">

			<!-- Google Map -->
			
			<div class="map">
				<div id="google_map" class="google_map">
					<div class="map_container">
						<div id="map" style="position: relative; overflow: hidden;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7947.5541558417435!2d119.450046!3d-5.139557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd322672b63b%3A0xb9c9aaa7bb2ce719!2sKalla%20Institute!5e0!3m2!1sen!2sid!4v1668422926645!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css"-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/contact.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/contact_responsive.css')}}">
	<style>
	.contact {
		width: 100%;
		padding-top: 0;
		padding-bottom: 0;
	}
	.form_title {
		font-weight: bold;
	}
	</style>
</div>
