<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="google" content="notranslate">
	<title><?= $Title ?> | <?= $this->session->userdata('AppInfo') ?></title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css') ?>">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2/css/select2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-scroller/css/scroller.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-select/css/select.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.css') ?>">
	<style>
		html {
			height: 100%;
		}

		body {
			min-height: 100%;
		}

		td,
		th {
			vertical-align: middle !important;
		}

		#button {
			display: block;
			margin: 20px auto;
			padding: 10px 30px;
			background-color: #eee;
			border: solid #ccc 1px;
			cursor: pointer;
		}

		#overlay {
			position: fixed;
			top: 0;
			z-index: 100;
			width: 100%;
			height: 100%;
			display: none;
			background: rgba(0, 0, 0, 0.6);
		}

		.cv-spinner {
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		input:focus,
		textarea:focus,
		select:focus {
			background-image: none !important;
			background-color: transparent !important;
			-webkit-box-shadow: none !important;
			-moz-box-shadow: none !important;
			box-shadow: none !important;
		}

		span.select2-selection.select2-selection--single {
			background-image: none !important;
			background-color: transparent !important;
			-webkit-box-shadow: none !important;
			-moz-box-shadow: none !important;
			box-shadow: none !important;
		}

		.blink_text {

			animation: 1s blinker linear infinite;
			-webkit-animation: 1s blinker linear infinite;
			-moz-animation: 1s blinker linear infinite;

			color: red;
		}

		@-moz-keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}

		@-webkit-keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}

		@keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}
	</style>
	<!-- jQuery -->
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE -->
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/dist/js/adminlte.js') ?>"></script>
	<!-- Select2 -->
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js') ?>"></script>
	<!-- DataTables -->
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-scroller/js/dataTables.scroller.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-select/js/dataTables.select.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/sweetalert.min.js') ?>"></script>
	<script>
		function number_format(nStr){
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}
		function tandaPemisahTitik(b){
			var _minus = false;
			if (b<0) _minus = true;
			b = b.toString();
			b=b.replace(".","");
			b=b.replace("-","");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--){
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)){
					c = b.substr(i-1,1) + "." + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			if (_minus) c = "-" + c ;
			return c;
		}

		function numbersonly(ini, e){
			if (e.keyCode>=49){
				if(e.keyCode<=57){
					a = ini.value.toString().replace(".","");
					b = a.replace(/[^\d]/g,"");
					b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
					ini.value = tandaPemisahTitik(b);
					return false;
				}
				else if(e.keyCode<=105){
					if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
	return false; }
}else if (e.keyCode==48){
	a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
	b = a.replace(/[^\d]/g,"");
	if (parseFloat(b)!=0){
		ini.value = tandaPemisahTitik(b);
		return false;
	} else {
		return false;
	}
}else if (e.keyCode==95){
	a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
	b = a.replace(/[^\d]/g,"");
	if (parseFloat(b)!=0){
		ini.value = tandaPemisahTitik(b);
		return false;
	} else {
		return false;
	}
}else if (e.keyCode==8 || e.keycode==46){
	a = ini.value.replace(".","");
	b = a.replace(/[^\d]/g,"");
	b = b.substr(0,b.length -1);
	if (tandaPemisahTitik(b)!=""){
		ini.value = tandaPemisahTitik(b);
	} else {
		ini.value = "";
	}

	return false;
} else if (e.keyCode==9){
	return true;
} else if (e.keyCode==17){
	return true;
} else {
//alert (e.keyCode);
return false;
}

}

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$("#overlay").fadeOut(300);
	$('.modal').on('hidden.bs.modal', function() {
		$(this).find('form').trigger('reset');
		$(this).find('select').val('').trigger('change');
		$('input:checkbox').removeAttr('checked');
		$('input').removeAttr('disabled');
		$('select').removeAttr('disabled');
		$('#simpan').removeAttr('disabled');
		$('input').val('');
	});
			// document.addEventListener('contextmenu', function(e) {
			// 	e.preventDefault();
			// });
			// document.onkeydown = function(e) {
			// 	if (event.keyCode == 123) {
			// 		return false;
			// 	}
			// 	if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			// 		return false;
			// 	}
			// 	if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
			// 		return false;
			// 	}
			// 	if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			// 		return false;
			// 	}
			// 	if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			// 		return false;
			// 	}
			// }
		});
	</script>
</head>