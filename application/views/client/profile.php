<!doctype html>
<html class="no-js">
<head>
<?php $this->load->view('client/include/header'); ?>
<title>TFIT | My Profile</title>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<?php $this->load->view('client/include/javascript_disabled');
	$this->load->view('client/include/navigation');
	@$notification = $this->uri->segment(3);
	@$user_id = base64_decode($this->uri->segment(4));
?>
<div class="products main-container">
	<div class="container">
		<h1 class="title">Username</h1>
		<p class="text-center text-small">Update your profile.</p>
		<div class="row">
			<form class="form-horizontal col-sm-8 col-sm-offset-2 profile-form" method="post" action="<?=base_url()?>profile/<?php if(@$notification == "success"){ echo "updateProfile"; }else{ echo "updateProfile"; }?> ">
				
				<?php
					if(@$notification == "success"){
				?>
				<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Important!</strong> Set your passwords for next time login.
			</div>
				<?php
					}elseif(@$notification == "editsuccess"){
				?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<strong>Success!</strong> Changes made successfully.
				</div>

				<?php
			}
			?>
				<div class="alert alert-danger profile-alert" role="alert">
			<button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Warning!</strong> Password mismatch.
			</div>

			<?php
				$query = $this->db->get_where('tbl_user',array('user_id' => $user_id));
				$record = $query->row();
			?>
				<input type="hidden" value="<?=base64_encode($record->user_id)?>" name="user_id">
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?=$record->email?></p>
					</div>
				</div>
				<!--/.email-->
				<div class="form-group">
					<label for="pass" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="pass" placeholder="Password" name="password">
					</div>
				</div>
				<div class="form-group">
					<label for="confirm-pass" class="col-sm-3 control-label">Confirm Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="confirm-pass" placeholder="Password">
					</div>
				</div>
				<!--/.password-->
				<div class="form-group">
					<label for="gender" class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-9">
						<label class="radio-inline">
							<input type="radio" name="gender" id="male" value="1" checked>
							Male </label>
						<label class="radio-inline">
							<input type="radio" name="gender" id="female" value="0">
							Female </label>
					</div>
				</div>
				<!--/.gender-->
				<div class="form-group">
					<label for="locale" class="col-sm-3 control-label">Locale</label>
					<div class="col-sm-9">
						<select class="form-control" id="locale" name="timezone">
							<option value="Africa/Abidjan">Africa/Abidjan: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Accra">Africa/Accra: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Addis_Ababa">Africa/Addis Ababa: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Algiers">Africa/Algiers: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Asmara">Africa/Asmara: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Bamako">Africa/Bamako: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Bangui">Africa/Bangui: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Banjul">Africa/Banjul: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Bissau">Africa/Bissau: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Blantyre">Africa/Blantyre: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Brazzaville">Africa/Brazzaville: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Bujumbura">Africa/Bujumbura: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Cairo">Africa/Cairo: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Casablanca">Africa/Casablanca: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Ceuta">Africa/Ceuta: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Conakry">Africa/Conakry: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Dakar">Africa/Dakar: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Dar_es_Salaam">Africa/Dar es Salaam: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Djibouti">Africa/Djibouti: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Douala">Africa/Douala: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/El_Aaiun">Africa/El Aaiun: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Freetown">Africa/Freetown: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Gaborone">Africa/Gaborone: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Harare">Africa/Harare: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Johannesburg">Africa/Johannesburg: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Juba">Africa/Juba: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Kampala">Africa/Kampala: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Khartoum">Africa/Khartoum: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Kigali">Africa/Kigali: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Kinshasa">Africa/Kinshasa: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Lagos">Africa/Lagos: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Libreville">Africa/Libreville: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Lome">Africa/Lome: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Luanda">Africa/Luanda: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Lubumbashi">Africa/Lubumbashi: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Lusaka">Africa/Lusaka: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Malabo">Africa/Malabo: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Maputo">Africa/Maputo: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Maseru">Africa/Maseru: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Mbabane">Africa/Mbabane: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Mogadishu">Africa/Mogadishu: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Monrovia">Africa/Monrovia: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Nairobi">Africa/Nairobi: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Africa/Ndjamena">Africa/Ndjamena: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Niamey">Africa/Niamey: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Nouakchott">Africa/Nouakchott: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Ouagadougou">Africa/Ouagadougou: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Porto-Novo">Africa/Porto-Novo: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Sao_Tome">Africa/Sao Tome: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Africa/Tripoli">Africa/Tripoli: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Africa/Tunis">Africa/Tunis: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Africa/Windhoek">Africa/Windhoek: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="America/Adak">America/Adak: Wednesday, October 8, 2014 - 19:58 -0900</option>
							<option value="America/Anchorage">America/Anchorage: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/Anguilla">America/Anguilla: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Antigua">America/Antigua: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Araguaina">America/Araguaina: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Buenos_Aires">America/Argentina/Buenos Aires: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Catamarca">America/Argentina/Catamarca: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Cordoba">America/Argentina/Cordoba: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Jujuy">America/Argentina/Jujuy: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/La_Rioja">America/Argentina/La Rioja: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Mendoza">America/Argentina/Mendoza: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Rio_Gallegos">America/Argentina/Rio Gallegos: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Salta">America/Argentina/Salta: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/San_Juan">America/Argentina/San Juan: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/San_Luis">America/Argentina/San Luis: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Tucuman">America/Argentina/Tucuman: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Argentina/Ushuaia">America/Argentina/Ushuaia: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Aruba">America/Aruba: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Asuncion">America/Asuncion: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Atikokan">America/Atikokan: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Bahia_Banderas">America/Bahia Banderas: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Bahia">America/Bahia: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Barbados">America/Barbados: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Belem">America/Belem: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Belize">America/Belize: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Blanc-Sablon">America/Blanc-Sablon: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Boa_Vista">America/Boa Vista: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Bogota">America/Bogota: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Boise">America/Boise: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Cambridge_Bay">America/Cambridge Bay: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Campo_Grande">America/Campo Grande: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Cancun">America/Cancun: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Caracas">America/Caracas: Thursday, October 9, 2014 - 00:28 -0430</option>
							<option value="America/Cayenne">America/Cayenne: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Cayman">America/Cayman: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Chicago">America/Chicago: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Chihuahua">America/Chihuahua: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Costa_Rica">America/Costa Rica: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Creston">America/Creston: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Cuiaba">America/Cuiaba: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Curacao">America/Curacao: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Danmarkshavn">America/Danmarkshavn: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="America/Dawson_Creek">America/Dawson Creek: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Dawson">America/Dawson: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Denver">America/Denver: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Detroit">America/Detroit: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Dominica">America/Dominica: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Edmonton">America/Edmonton: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Eirunepe">America/Eirunepe: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/El_Salvador">America/El Salvador: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Fortaleza">America/Fortaleza: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Glace_Bay">America/Glace Bay: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Godthab">America/Godthab: Thursday, October 9, 2014 - 02:58 -0200</option>
							<option value="America/Goose_Bay">America/Goose Bay: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Grand_Turk">America/Grand Turk: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Grenada">America/Grenada: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Guadeloupe">America/Guadeloupe: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Guatemala">America/Guatemala: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Guayaquil">America/Guayaquil: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Guyana">America/Guyana: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Halifax">America/Halifax: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Havana">America/Havana: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Hermosillo">America/Hermosillo: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Indiana/Knox">America/Indiana/Knox: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Indiana/Marengo">America/Indiana/Marengo: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Indiana/Petersburg">America/Indiana/Petersburg: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Indiana/Tell_City">America/Indiana/Tell City: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Indiana/Vevay">America/Indiana/Vevay: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Indiana/Vincennes">America/Indiana/Vincennes: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Indiana/Winamac">America/Indiana/Winamac: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Inuvik">America/Inuvik: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Iqaluit">America/Iqaluit: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Jamaica">America/Jamaica: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Juneau">America/Juneau: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/Kentucky/Louisville">America/Kentucky/Louisville: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Kentucky/Monticello">America/Kentucky/Monticello: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Kralendijk">America/Kralendijk: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/La_Paz">America/La Paz: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Lima">America/Lima: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Los_Angeles">America/Los Angeles: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Lower_Princes">America/Lower Princes: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Maceio">America/Maceio: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Managua">America/Managua: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Manaus">America/Manaus: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Marigot">America/Marigot: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Martinique">America/Martinique: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Matamoros">America/Matamoros: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Mazatlan">America/Mazatlan: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Menominee">America/Menominee: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Merida">America/Merida: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Metlakatla">America/Metlakatla: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/Mexico_City">America/Mexico City: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Miquelon">America/Miquelon: Thursday, October 9, 2014 - 02:58 -0200</option>
							<option value="America/Moncton">America/Moncton: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Monterrey">America/Monterrey: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Montevideo">America/Montevideo: Thursday, October 9, 2014 - 02:58 -0200</option>
							<option value="America/Montserrat">America/Montserrat: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Nassau">America/Nassau: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/New_York">America/New York: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Nipigon">America/Nipigon: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Nome">America/Nome: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/Noronha">America/Noronha: Thursday, October 9, 2014 - 02:58 -0200</option>
							<option value="America/North_Dakota/Beulah">America/North Dakota/Beulah: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/North_Dakota/Center">America/North Dakota/Center: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/North_Dakota/New_Salem">America/North Dakota/New Salem: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Ojinaga">America/Ojinaga: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Panama">America/Panama: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Pangnirtung">America/Pangnirtung: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Paramaribo">America/Paramaribo: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Phoenix">America/Phoenix: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Port_of_Spain">America/Port of Spain: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Port-au-Prince">America/Port-au-Prince: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Porto_Velho">America/Porto Velho: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Puerto_Rico">America/Puerto Rico: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Rainy_River">America/Rainy River: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Rankin_Inlet">America/Rankin Inlet: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Recife">America/Recife: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Regina">America/Regina: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Resolute">America/Resolute: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Rio_Branco">America/Rio Branco: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Santa_Isabel">America/Santa Isabel: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Santarem">America/Santarem: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Santiago">America/Santiago: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Santo_Domingo">America/Santo Domingo: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Sao_Paulo">America/Sao Paulo: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Scoresbysund">America/Scoresbysund: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="America/Sitka">America/Sitka: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/St_Barthelemy">America/St Barthelemy: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/St_Johns">America/St Johns: Thursday, October 9, 2014 - 02:28 -0230</option>
							<option value="America/St_Kitts">America/St Kitts: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/St_Lucia">America/St Lucia: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/St_Thomas">America/St Thomas: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/St_Vincent">America/St Vincent: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Swift_Current">America/Swift Current: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Tegucigalpa">America/Tegucigalpa: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="America/Thule">America/Thule: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="America/Thunder_Bay">America/Thunder Bay: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Tijuana">America/Tijuana: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Toronto">America/Toronto: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Tortola">America/Tortola: Thursday, October 9, 2014 - 00:58 -0400</option>
							<option value="America/Vancouver">America/Vancouver: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Whitehorse">America/Whitehorse: Wednesday, October 8, 2014 - 21:58 -0700</option>
							<option value="America/Winnipeg">America/Winnipeg: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="America/Yakutat">America/Yakutat: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="America/Yellowknife">America/Yellowknife: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="Antarctica/Casey">Antarctica/Casey: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Antarctica/Davis">Antarctica/Davis: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Antarctica/DumontDUrville">Antarctica/DumontDUrville: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Antarctica/Macquarie">Antarctica/Macquarie: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Antarctica/Mawson">Antarctica/Mawson: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Antarctica/McMurdo">Antarctica/McMurdo: Thursday, October 9, 2014 - 17:58 +1300</option>
							<option value="Antarctica/Palmer">Antarctica/Palmer: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="Antarctica/Rothera">Antarctica/Rothera: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="Antarctica/Syowa">Antarctica/Syowa: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Antarctica/Troll">Antarctica/Troll: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Antarctica/Vostok">Antarctica/Vostok: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Arctic/Longyearbyen">Arctic/Longyearbyen: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Asia/Aden">Asia/Aden: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Almaty">Asia/Almaty: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Amman">Asia/Amman: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Anadyr">Asia/Anadyr: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Asia/Aqtau">Asia/Aqtau: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Aqtobe">Asia/Aqtobe: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Ashgabat">Asia/Ashgabat: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Baghdad">Asia/Baghdad: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Bahrain">Asia/Bahrain: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Baku">Asia/Baku: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Bangkok">Asia/Bangkok: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Beirut">Asia/Beirut: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Bishkek">Asia/Bishkek: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Brunei">Asia/Brunei: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Choibalsan">Asia/Choibalsan: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Chongqing">Asia/Chongqing: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Colombo">Asia/Colombo: Thursday, October 9, 2014 - 10:28 +0530</option>
							<option value="Asia/Damascus">Asia/Damascus: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Dhaka">Asia/Dhaka: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Dili">Asia/Dili: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Dubai">Asia/Dubai: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Asia/Dushanbe">Asia/Dushanbe: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Gaza">Asia/Gaza: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Asia/Harbin">Asia/Harbin: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Hebron">Asia/Hebron: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Asia/Ho_Chi_Minh">Asia/Ho Chi Minh: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Hong_Kong">Asia/Hong Kong: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Hovd">Asia/Hovd: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Irkutsk">Asia/Irkutsk: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Jakarta">Asia/Jakarta: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Jayapura">Asia/Jayapura: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Jerusalem">Asia/Jerusalem: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Kabul">Asia/Kabul: Thursday, October 9, 2014 - 09:28 +0430</option>
							<option value="Asia/Kamchatka">Asia/Kamchatka: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Asia/Karachi">Asia/Karachi: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Kashgar">Asia/Kashgar: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Kathmandu" selected="selected">Asia/Kathmandu: Thursday, October 9, 2014 - 10:43 +0545</option>
							<option value="Asia/Khandyga">Asia/Khandyga: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Asia/Kolkata">Asia/Kolkata: Thursday, October 9, 2014 - 10:28 +0530</option>
							<option value="Asia/Krasnoyarsk">Asia/Krasnoyarsk: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Kuala_Lumpur">Asia/Kuala Lumpur: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Kuching">Asia/Kuching: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Kuwait">Asia/Kuwait: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Macau">Asia/Macau: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Magadan">Asia/Magadan: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Asia/Makassar">Asia/Makassar: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Manila">Asia/Manila: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Muscat">Asia/Muscat: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Asia/Nicosia">Asia/Nicosia: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Novokuznetsk">Asia/Novokuznetsk: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Novosibirsk">Asia/Novosibirsk: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Omsk">Asia/Omsk: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Oral">Asia/Oral: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Phnom_Penh">Asia/Phnom Penh: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Pontianak">Asia/Pontianak: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Pyongyang">Asia/Pyongyang: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Qatar">Asia/Qatar: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Qyzylorda">Asia/Qyzylorda: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Rangoon">Asia/Rangoon: Thursday, October 9, 2014 - 11:28 +0630</option>
							<option value="Asia/Riyadh">Asia/Riyadh: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Asia/Sakhalin">Asia/Sakhalin: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Asia/Samarkand">Asia/Samarkand: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Seoul">Asia/Seoul: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Shanghai">Asia/Shanghai: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Singapore">Asia/Singapore: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Taipei">Asia/Taipei: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Tashkent">Asia/Tashkent: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Asia/Tbilisi">Asia/Tbilisi: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Asia/Tehran">Asia/Tehran: Thursday, October 9, 2014 - 08:28 +0330</option>
							<option value="Asia/Thimphu">Asia/Thimphu: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Tokyo">Asia/Tokyo: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Asia/Ulaanbaatar">Asia/Ulaanbaatar: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Urumqi">Asia/Urumqi: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Asia/Ust-Nera">Asia/Ust-Nera: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Asia/Vientiane">Asia/Vientiane: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Asia/Vladivostok">Asia/Vladivostok: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Asia/Yakutsk">Asia/Yakutsk: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Asia/Yekaterinburg">Asia/Yekaterinburg: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Asia/Yerevan">Asia/Yerevan: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Atlantic/Azores">Atlantic/Azores: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Atlantic/Bermuda">Atlantic/Bermuda: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="Atlantic/Canary">Atlantic/Canary: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Atlantic/Cape_Verde">Atlantic/Cape Verde: Thursday, October 9, 2014 - 03:58 -0100</option>
							<option value="Atlantic/Faroe">Atlantic/Faroe: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Atlantic/Madeira">Atlantic/Madeira: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Atlantic/Reykjavik">Atlantic/Reykjavik: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Atlantic/South_Georgia">Atlantic/South Georgia: Thursday, October 9, 2014 - 02:58 -0200</option>
							<option value="Atlantic/St_Helena">Atlantic/St Helena: Thursday, October 9, 2014 - 04:58 +0000</option>
							<option value="Atlantic/Stanley">Atlantic/Stanley: Thursday, October 9, 2014 - 01:58 -0300</option>
							<option value="Australia/Adelaide">Australia/Adelaide: Thursday, October 9, 2014 - 15:28 +1030</option>
							<option value="Australia/Brisbane">Australia/Brisbane: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Australia/Broken_Hill">Australia/Broken Hill: Thursday, October 9, 2014 - 15:28 +1030</option>
							<option value="Australia/Currie">Australia/Currie: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Australia/Darwin">Australia/Darwin: Thursday, October 9, 2014 - 14:28 +0930</option>
							<option value="Australia/Eucla">Australia/Eucla: Thursday, October 9, 2014 - 13:43 +0845</option>
							<option value="Australia/Hobart">Australia/Hobart: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Australia/Lindeman">Australia/Lindeman: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Australia/Lord_Howe">Australia/Lord Howe: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Australia/Melbourne">Australia/Melbourne: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Australia/Perth">Australia/Perth: Thursday, October 9, 2014 - 12:58 +0800</option>
							<option value="Australia/Sydney">Australia/Sydney: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Europe/Amsterdam">Europe/Amsterdam: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Andorra">Europe/Andorra: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Athens">Europe/Athens: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Belgrade">Europe/Belgrade: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Berlin">Europe/Berlin: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Bratislava">Europe/Bratislava: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Brussels">Europe/Brussels: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Bucharest">Europe/Bucharest: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Budapest">Europe/Budapest: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Busingen">Europe/Busingen: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Chisinau">Europe/Chisinau: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Copenhagen">Europe/Copenhagen: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Dublin">Europe/Dublin: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Gibraltar">Europe/Gibraltar: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Guernsey">Europe/Guernsey: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Helsinki">Europe/Helsinki: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Isle_of_Man">Europe/Isle of Man: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Istanbul">Europe/Istanbul: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Jersey">Europe/Jersey: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Kaliningrad">Europe/Kaliningrad: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Kiev">Europe/Kiev: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Lisbon">Europe/Lisbon: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Ljubljana">Europe/Ljubljana: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/London">Europe/London: Thursday, October 9, 2014 - 05:58 +0100</option>
							<option value="Europe/Luxembourg">Europe/Luxembourg: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Madrid">Europe/Madrid: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Malta">Europe/Malta: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Mariehamn">Europe/Mariehamn: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Minsk">Europe/Minsk: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Monaco">Europe/Monaco: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Moscow">Europe/Moscow: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Europe/Oslo">Europe/Oslo: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Paris">Europe/Paris: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Podgorica">Europe/Podgorica: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Prague">Europe/Prague: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Riga">Europe/Riga: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Rome">Europe/Rome: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Samara">Europe/Samara: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Europe/San_Marino">Europe/San Marino: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Sarajevo">Europe/Sarajevo: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Simferopol">Europe/Simferopol: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Europe/Skopje">Europe/Skopje: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Sofia">Europe/Sofia: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Stockholm">Europe/Stockholm: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Tallinn">Europe/Tallinn: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Tirane">Europe/Tirane: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Uzhgorod">Europe/Uzhgorod: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Vaduz">Europe/Vaduz: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Vatican">Europe/Vatican: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Vienna">Europe/Vienna: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Vilnius">Europe/Vilnius: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Volgograd">Europe/Volgograd: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Europe/Warsaw">Europe/Warsaw: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Zagreb">Europe/Zagreb: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Europe/Zaporozhye">Europe/Zaporozhye: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Europe/Zurich">Europe/Zurich: Thursday, October 9, 2014 - 06:58 +0200</option>
							<option value="Indian/Antananarivo">Indian/Antananarivo: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Indian/Chagos">Indian/Chagos: Thursday, October 9, 2014 - 10:58 +0600</option>
							<option value="Indian/Christmas">Indian/Christmas: Thursday, October 9, 2014 - 11:58 +0700</option>
							<option value="Indian/Cocos">Indian/Cocos: Thursday, October 9, 2014 - 11:28 +0630</option>
							<option value="Indian/Comoro">Indian/Comoro: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Indian/Kerguelen">Indian/Kerguelen: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Indian/Mahe">Indian/Mahe: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Indian/Maldives">Indian/Maldives: Thursday, October 9, 2014 - 09:58 +0500</option>
							<option value="Indian/Mauritius">Indian/Mauritius: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Indian/Mayotte">Indian/Mayotte: Thursday, October 9, 2014 - 07:58 +0300</option>
							<option value="Indian/Reunion">Indian/Reunion: Thursday, October 9, 2014 - 08:58 +0400</option>
							<option value="Pacific/Apia">Pacific/Apia: Thursday, October 9, 2014 - 18:58 +1400</option>
							<option value="Pacific/Auckland">Pacific/Auckland: Thursday, October 9, 2014 - 17:58 +1300</option>
							<option value="Pacific/Chatham">Pacific/Chatham: Thursday, October 9, 2014 - 18:43 +1345</option>
							<option value="Pacific/Chuuk">Pacific/Chuuk: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Pacific/Easter">Pacific/Easter: Wednesday, October 8, 2014 - 23:58 -0500</option>
							<option value="Pacific/Efate">Pacific/Efate: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Pacific/Enderbury">Pacific/Enderbury: Thursday, October 9, 2014 - 17:58 +1300</option>
							<option value="Pacific/Fakaofo">Pacific/Fakaofo: Thursday, October 9, 2014 - 17:58 +1300</option>
							<option value="Pacific/Fiji">Pacific/Fiji: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Funafuti">Pacific/Funafuti: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Galapagos">Pacific/Galapagos: Wednesday, October 8, 2014 - 22:58 -0600</option>
							<option value="Pacific/Gambier">Pacific/Gambier: Wednesday, October 8, 2014 - 19:58 -0900</option>
							<option value="Pacific/Guadalcanal">Pacific/Guadalcanal: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Pacific/Guam">Pacific/Guam: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Pacific/Honolulu">Pacific/Honolulu: Wednesday, October 8, 2014 - 18:58 -1000</option>
							<option value="Pacific/Johnston">Pacific/Johnston: Wednesday, October 8, 2014 - 18:58 -1000</option>
							<option value="Pacific/Kiritimati">Pacific/Kiritimati: Thursday, October 9, 2014 - 18:58 +1400</option>
							<option value="Pacific/Kosrae">Pacific/Kosrae: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Pacific/Kwajalein">Pacific/Kwajalein: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Majuro">Pacific/Majuro: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Marquesas">Pacific/Marquesas: Wednesday, October 8, 2014 - 19:28 -0930</option>
							<option value="Pacific/Midway">Pacific/Midway: Wednesday, October 8, 2014 - 17:58 -1100</option>
							<option value="Pacific/Nauru">Pacific/Nauru: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Niue">Pacific/Niue: Wednesday, October 8, 2014 - 17:58 -1100</option>
							<option value="Pacific/Norfolk">Pacific/Norfolk: Thursday, October 9, 2014 - 16:28 +1130</option>
							<option value="Pacific/Noumea">Pacific/Noumea: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Pacific/Pago_Pago">Pacific/Pago Pago: Wednesday, October 8, 2014 - 17:58 -1100</option>
							<option value="Pacific/Palau">Pacific/Palau: Thursday, October 9, 2014 - 13:58 +0900</option>
							<option value="Pacific/Pitcairn">Pacific/Pitcairn: Wednesday, October 8, 2014 - 20:58 -0800</option>
							<option value="Pacific/Pohnpei">Pacific/Pohnpei: Thursday, October 9, 2014 - 15:58 +1100</option>
							<option value="Pacific/Port_Moresby">Pacific/Port Moresby: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Pacific/Rarotonga">Pacific/Rarotonga: Wednesday, October 8, 2014 - 18:58 -1000</option>
							<option value="Pacific/Saipan">Pacific/Saipan: Thursday, October 9, 2014 - 14:58 +1000</option>
							<option value="Pacific/Tahiti">Pacific/Tahiti: Wednesday, October 8, 2014 - 18:58 -1000</option>
							<option value="Pacific/Tarawa">Pacific/Tarawa: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Tongatapu">Pacific/Tongatapu: Thursday, October 9, 2014 - 17:58 +1300</option>
							<option value="Pacific/Wake">Pacific/Wake: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="Pacific/Wallis">Pacific/Wallis: Thursday, October 9, 2014 - 16:58 +1200</option>
							<option value="UTC">UTC: Thursday, October 9, 2014 - 04:58 +0000</option>
						</select>
					</div>
				</div>
				<!--/.locale-->
				<div class="form-group">
					<div class="col-sm-2 col-xs-6 col-sm-offset-3">
						<button type="submit" class="btn btn-danger btn-block btn-save" id="profile-save">Save</button>
					</div>
				</div>
			</form>
		</div>
		<!--/.row-->
	</div>
</div>
<!--/.programs-->
<?php $this->load->view('client/include/footer'); ?>
</body>
</html>
