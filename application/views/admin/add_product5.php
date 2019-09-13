<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/design/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/design/images/favicons/apple-touch-icon-60x60.png">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/design/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/design/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url();?>assets/design/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url();?>assets/design/images/favicons/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor">
    <meta name="theme-color">

    <!-- CSS Start -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/normalize.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/ng-scrollbar.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/style.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/custom.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/fonts.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/design/css/angular-material.css"> 
    <!-- CSS End -->

    <script type="text/javascript" src="<?php echo base_url();?>assets/design/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/design/js/bootstrap.min.js"></script>
   

   <style>
       .cart_sidebar .overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 9999999999999999999999999999;
    top: 0;
    right: 0;
    background-color: rgb(0,0,0);
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    opacity:1;
    left:auto;
    pointer-events: initial;
}
    .new_design{
        padding:30px;
    }
       .tabing ul#tabs li {
    float: left;
}
       a.closebtn {
    position: absolute;
    left: 9px;
    top: -4px;
}
       .tabing {
    margin: 0 -15px;
    position: relative;
    z-index: 9;
    display: initial;
}
       .tab-content{
           margin-top:30px;
       }
       .tabing .nav-tabs > li > a {
    padding: 15px 10px;
}
       .container.ng-scope{
           margin:15px !important;
           box-shadow: none;
       }

	.new_design	.design_ng h3{
		    font-size: 20px;
    font-weight: 600;
    margin-bottom: 6px;
    float:left;
		}
	.new_design	a.need_help {
			color: #959596;
			text-decoration: underline;
		}
	.new_design	.img-upload-result{
    height: 200px;
		        box-shadow: 0 0px 1px rgba(57,73,76,.35);
		        padding:15px;
		}
	.new_design	input.form-control {
			border-radius: 0px;
			height: 65px;
		}
		
	.new_design	textarea.form-control {
			border-radius: 0px;
		}
		
	.new_design	.my-cu {
			margin: 30px 0px;
		}
		.art_options{
		    width:100%;
		    overflow:hidden;
		    position:relative;
		}
		.art_options .form-check-inline{
		    width:21%;
		    float:left;
		}
		.fill_pinfo h3{
		    margin:25px 0px !important;
		}
		
	.new_design	.shop_btn {
			letter-spacing: 2px;
			font-size: 20px;
			border-color: #e7e7e7;
			padding: 15px 50px;
		}
		.new_design	.shop_btn:hover{
		    box-shadow:none;
		}
		
	.new_design	.ml-c {
			margin-left: 20px;
		}
		
	.upload_art	input[type=radio] {
			cursor: pointer;
		}
		
	.upload_art	input[type=radio]:checked:before {
			content: "\2713";
			background: #F7AD3B;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
			font-size: 14px;
			text-align: center;
			line-height: 20px;
			display: inline-block;
			width: 23px;
			height: 23px;
			color: #fff;
			border: 1px solid #cdcdcd;
			border-radius: 0px;			
		}
		
	.upload_art	input.img-roundc[type=radio]:before {
			border-radius: 20px;
			width: 22px;
			height: 22px;
			margin-top: 0px;
		}
		
	.upload_art	input[type=radio]:before {
			content: "\202A";
			background: #ffffff;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
			font-size: 20px;
			text-align: center;
			line-height: 31px;
			display: inline-block;
			width: 15px;
			height: 15px;
			color: #F9DE5A;
			border: 1px solid #cdcdcd;
			border-radius: 0px;
		}
		
	.new_design .upload_art	.new_d .form-check-inline {
			width: 200px;
		}
		
	.new_design	.new_d .form-check-inline span {
			margin-left: 10px;
		}

	.new_design	input.img-roundc {
			position: absolute;
			width: 0px;
			top: 10px;
			left: 20px;
		}
		
	.new_design	img.img-pro {
			background: #e8e8e8;
			width: 200px;
			height: 300px;
			position: relative;
		}
		
	.new_design	img.img-roundp {
			cursor: pointer;
			position: absolute;
			width: 23px;
			right: 6px;
			top: 10px;
		}
		
	.new_design	p.pro-cont {
			font-size: 14px;
    color: rgba(0,0,0,.5) !important;
    font-weight: 600;
			margin: 10px 0px 10px 0px;
			text-align: center;
		}
		
	.new_design	.col-xs-15,
		.col-sm-15,
		.col-md-15,
		.col-lg-15 {
			position: relative;
			min-height: 1px;
			padding-right: 10px;
			padding-left: 10px;
		}
	.new_d	.form-check-label span{
		    	font-size: 15px;
    color: rgba(0,0,0,.5) !important;
    font-weight: 600;
		}
		.new_d label{
		   font-size: 16px;
    color: rgba(0,0,0,.7);
    font-weight: 600; 
		}
		
	.new_design	.col-xs-15 {
			width: 20%;
			float: left;
		}
		
		@media (min-width: 768px) {
		.new_design	.col-sm-15 {
				width: 20%;
				float: left;
			}
		}
		
		@media (min-width: 992px) {
		.new_design	.col-md-15 {
				width: 20%;
				float: left;
			}
		}
		
		@media (min-width: 1200px) {
		.new_design	.col-lg-15 {
				width: 20%;
				float: left;
			}
		}
		
	.new_design	.vranger {
			    width: 300px;
    height: 200px;
    margin-top: 84px;
    margin-left:-24px;
    transform: rotate(270deg);
		}
		
	.new_design	img.img-over {
			height: 450px;
		}
	.new_design	img.img-pro-side {
    width: 100%;
}
   .icons-pro{
			background: #F9DE5A;
			width: 50px;
			height: 50px;
			text-align: center;
			border-radius: 50%;
			line-height:45px;
		}
		
   .row.py-a {
		padding: 30px 0px;
    width: 80%;
    margin: 0 auto;
		}
		
 .cancel_btn {
			width: 100%;
			padding: 10px;
			background-color: #e7e7e7;
			color: #000;
			border-radius: 0px;
			border-color: #e7e7e7;
			margin:0 auto;
			display:block;
			border-color:transparent !important;
		}
		
 .save_btn {
			width: 100%;
			padding: 10px;
			margin:0 auto;
			display:block;
			border-color:transparent !important;
		}
	.new_design	.cust-ra i.fa.fa-plus {
    margin-top: 5px;
    margin-left: 20px;
    position: absolute;
}
.new_design	.cust-ra i.fa.fa-minus {
    position: absolute;
    margin-top: 54px;
    margin-left: 2px;
}
	.new_design	button.button.range-button-increase {
    width: 28px;
    height: 28px;
    border: 1px solid #e1e1e1;
    border-radius: 32px;
}
	.new_design	button.button.range-button-decrease{
    width: 28px;
    height: 28px;
    border: 1px solid #e1e1e1;
    border-radius: 32px;
}
	.new_design	.icon-black {
    background: #333;
    border: 3px solid #F9DE5A;
}
	.new_design	.icon-white {
    background: #ffffff;
    border: 3px solid #989898b0;
}
	.new_design	.icon-grey {
    background: #989898;
			border: 3px solid #fff0;
}
	.new_design	.icon-orange {
    background: #f97255;
			border: 3px solid #fff0;
}
	.new_design	.form-control:focus {
    border-color: #F9DE5Ad1;
    box-shadow: 0 0 0 0.2rem rgba(249, 222, 90, 0.32);
}
.toggle_switch .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 30px;
}
.inputdemo:checked + .slider {
    background-color: #2196F3;
}
.inputdemo:checked + .slider:before {
    -webkit-transform: translateX(18px);
    -ms-transform: translateX(18px);
    transform: translateX(26px);
}
.toggle_switch .switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.toggle_switch .slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.toggle_switch .slider:before {
  position: absolute;
  content: "";
  height: 22px;
  width: 22px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

.toggle_switch input:checked + .slider {
  background-color: #21A605;
}

.toggle_switch input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

.toggle_switch input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.toggle_switch .slider.round {
  border-radius: 34px;
}

.toggle_switch .slider.round:before {
  border-radius: 50%;
}
.toggle_switch.custom-switch {
    padding-left: 0;
}
.toggle_switch label {
    padding-right: 15px;
}
.slide_bar .slidecontainer {
      width: 100%;
    transform: rotate(90deg);
    position: absolute;
    left: 100%;
    bottom: -113px;
    z-index: 9999999;

}

.slide_bar .slider {
  -webkit-appearance: none;
  width: 450%;
  height: 3px;
  border-radius: 0px;
  background: #969696;
  outline: none;
  opacity: 1;
  -webkit-transition: .2s;
  transition: opacity .2s;
  
}
.slider_plus{
       right: 75px;
    position: absolute;
    bottom: 0px;
    color: #969696;
    font-size: 13px !important;
}
.slider_minus{
       right: -225px;
    position: absolute;
    top: 11px;
    color: #969696;
    font-size: 13px !important;
     transform: rotate(90deg);
}
.slide_bar .slider:hover {
  opacity: 1;
}

.slide_bar .slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #F9DE5A;
  cursor: pointer;
  border:2px solid #969696;
}

.slide_bar .slider::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #F9DE5A;
  cursor: pointer;
  border:2px solid #969696;
}
.icons-pro img{
    height:20px;
    width:20px;
}
.py-a .col-md-15{
    width:20%;
    float: left;
}
.icons-pro{
    margin:0 auto;
    display:inline-block;
}
.img-over{
        width: 50%;
    margin: 0 auto;
    display: block
}
.preview_img{
    position:relative;
}
.print_size{
    position:absolute;
    border: 1px dashed #000;
    z-index: 99;
   padding: 15px 37px;
    left: 32%;
    bottom: 30px;
    background: #F9DE5Aab;
    font-weight: 600;
    text-transform: uppercase;
}
.icons-pro.tooltip {
  position: relative;
  display: inline-block;
  opacity:1;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  transition: opacity 0.3s;
  font-size:12px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
.product_row{
    margin:15px 0px;
}
.sidebar_overlay {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    opacity: 99999999;
    left:auto !important;
    z-index:99999999999999999;
}
.col-md-6{
    width:50%;
    float:left;
}
.cart_sidebar .sidebar_overlay .closebtn {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 20px;
    border: 1px solid #81818196;
    padding: 0px 10px;
}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000000b8;
}
.upload_art_img{
    position:absolute;
    z-index: 9;
    width: 50%;
    top: 37%;
    left: 24%;
}
[data-toggle=buttons]>.btn input[type=checkbox], [data-toggle=buttons]>.btn input[type=radio], [data-toggle=buttons]>.btn-group>.btn input[type=checkbox], [data-toggle=buttons]>.btn-group>.btn input[type=radio] {
position: initial !important;
    pointer-events: all !important; 
}
.new_design_onepiece .dot {
  height: 30px;
    width: 30px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
    margin: 0px 5px 0px 0px;
    position: relative;
}
.colors_div{
    margin:15px 0px;
}
.sizes_onepiece .form-check-label{
    font-size: 13px;
    color: rgba(0,0,0,.5) !important;
    font-weight: 600;
}
.create_tabs a {
    padding: 0px;
    padding-top: 3px;
    padding-right: 15px;
    color: rgba(0,0,0,.5) !important;
    font-size: 13px !important;
    font-weight: 600;
    letter-spacing: 1px;
}
.create_tabs h3 {
    margin-right: 15px;
}
.create_tabs a.focus{
        outline: none !important;
        border:none !important;
        box-shadow:none !important;
    }
    .fill_pinfo{
    overflow: hidden;
    clear: both;
    display: block;
}
.form-group{
    width: 100% !important;
    overflow: hidden !important;
    clear:both !important;
}
.new_design_onepiece .upload_art {
    margin-top: initial !important;
}
.colors_div .form-check-inline{
    width:auto !important;
}
.colors_div .form-check-input{
    margin-top: 10px !important;
}
.design_type_tabs{
    border:none;
    margin:15px 0px;
}
.design_type_tabs a{
    border:none !important; 
}
.label_container {
  display: block;
  position: relative;
  padding-left: 20px;
  margin-top: 6px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
 
}

/* Hide the browser's default radio button */
.label_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 3px;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
  border-radius: 50%;
  border:1px solid #959596;
}

/* On mouse-over, add a grey background color */
.label_container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.label_container input.checked ~ .checkmark {
  background-color: #2196F3;
  border:none;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.label_container input.checked ~ .checkmark:after {
  display: block;
}

 /*Style the indicator (dot/circle) */
.label_container .checkmark:after {
  top: 5px;
    left: 5px;
    width: 5px;
    height: 5px;
  border-radius: 50%;
  background: white;
}

.design_type_tabs h4{
   font-size: 18px;
    font-weight: 600; 
    padding-top:15px;
}
.design_ng .show{
    display:block;
}
.design_ng .hide{
    display:none;
}
.form-check-inline+.form-check-inline {
    margin-left: 0;
}
.new_design	 .form-check-inline span {
    margin-left: 10px;
    font-size: 14px;
}
.new_design	 .form-check-inline{
margin-bottom: 1rem;
}
.tabs section {
  display: none;
  padding: 20px 0 0;
  border:none
}


.tabs label {
  display: inline-block;
  margin: 0 10px 0 0;
  padding: 5px 10px;
  font-weight: 600;
  text-align: center;
  color: #000;
  background:#FFF;
  border: none;
}

.tabs label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}


.tabs label:hover {
  color: #888;
  cursor: pointer;
}



.tabs #tab1:checked ~ #content1,
.tabs #tab2:checked ~ #content2,
.tabs #tab3:checked ~ #content3,
.tabs #tab4:checked ~ #content4 {
  display: block;
}
.nav-tabs .design_type_item+.design_type_item {
    margin-left: 1.2rem;
    margin-top: 10px;
    cursor:pointer;
}

.no_error{
    position:initial !important;
}
.art_options .error {
   position: absolute;
    top: 100px;
    left: 21px;
    font-size: 14px;
}
.terms_conditions_div{
    position:relative;
}
.terms_conditions_div .error{
    position: absolute;
    top: -24px;
    left: 0px;
}
.designed_img img{
    height:300px;
}
/*-------=======new_modal=====---------*/
.modalea:before {
  content: "";
  display: none;
  background: rgba(0, 0, 0, 0.6);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
}
.opened:before {
  display: block;
}
.opened .modalea-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 20%;
}
.modalea-dialog{
  background: #fefefe;
  border: #333333 solid 0px;
  border-radius: 5px;
  margin-left: -200px;
  text-align:center;
  position: fixed;
  left: 50%;
  top: -100%;
  z-index: 11;
  width: 360px;
  box-shadow:0 5px 10px rgba(0,0,0,0.3);
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
}
.modalea .modal-body {
  padding:15px;
}
.modalea .modal-body input{
  width:200px;
  padding:8px;
  border:1px solid #ddd;
  color:#888;
  outline:0;
  font-size:14px;
  font-weight:bold
}
.modalea .modal-header,
.modalea .modal-footer {
  padding: 10px 20px;
}
.modalea .modal-header {
  border-bottom: #eeeeee solid 1px;
}
.modalea .modal-header h2 {
  font-size: 20px;
  text-align: left;
    float: left;
}
.modal-dialog {
    pointer-events: all;
}
       
.need_help.openmodalea{
    cursor:pointer;
}
/*-------=======new_modal=====---------*/
.modalet:before {
  content: "";
  display: none;
  background: rgba(0, 0, 0, 0.6);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
}
.opened:before {
  display: block;
}
.opened .modalet-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 20%;
}
.modalet-dialog{
  background: #fefefe;
  border: #333333 solid 0px;
  border-radius: 5px;
  margin-left: -200px;
  text-align:center;
  position: fixed;
  left: 50%;
  top: -100%;
  z-index: 11;
  width: 360px;
  box-shadow:0 5px 10px rgba(0,0,0,0.3);
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
}
.modalet .modal-body {
  padding:15px;
}
.modalet .modal-body input{
  width:200px;
  padding:8px;
  border:1px solid #ddd;
  color:#888;
  outline:0;
  font-size:14px;
  font-weight:bold
}
.modalet .modal-header,
.modalet .modal-footer {
  padding: 10px 20px;
}
.modalet .modal-header {
  border-bottom: #eeeeee solid 1px;
}
.modalet .modal-header h2 {
  font-size: 20px;
  text-align: left;
    float: left;
}
.modal-dialog {
    pointer-events: all;
}
.need_help.openmodalet{
    cursor:pointer;
}
.terms_link{
    cursor:pointer;
    text-decoration:underline;
}
.aproduct_options{
    position:relative;
}
.aproduct_options .error {
    position: absolute;
    top: -30px;
    left: 21px;
    font-size: 14px;
}
.new_design .design_ng h3{
    margin-bottom:30px !important;
}
.color_options{
    position:relative;
}
.color_options .error {
    position: absolute;
    top: 35px;
    width: max-content;
    left: 19px;
}
.size_options{
    position:relative;
}
.size_options .error {
    position: absolute;
    top: 18px;
    width: max-content;
    left: 19px;
}
       .col-md-15.uploadCol {
    position: relative;
}
       .uploadedDesign{
     position: absolute;
        z-index: 9999;
        top:130px;
        width:100%;
    }
    
    .uploadedDesign .uploadedImage{
        width:80px;
        margin:0 auto;
        display:block;
    }
       .col-md-15.uploadCol>a{
           position: absolute;
    top: 0;
    right: 3px;
       }
     .uploadedIcon {
    position: relative;
}
       .uploadedDesign {
    position: absolute;
    z-index: 9999;
    top: 98px;
    width: 100%;
}
       .uploadedDesign .uploadedImage {
    width: 60px;
    margin: 0 auto;
    display: block;
}
.fabric-container {
    position: relative;
    width: 379px;
    height: 550px;
    overflow: hidden;
    margin: 0 auto;
}
.canvas-container {
    width: 715px !important;
    height: 503px !important;
}
.fabric_new {
    width: 797px !important;
    left: -169px !important;
    right: 0px !important;
    height: 634px !important;
    top: -64px !important;
}
</style>
<div class="content-wrapper">
  <form class="form new_d" id="add_product" method="post" enctype="multipart/form-data">
  <div class="container">
    <section class="new_design">
		<div>
			<div class="row">
			    <div class="design_ng">
      			<div class="my-3">
      				 <div class="row">
                <div id="tab" class="btn-group btn-group-justified create_tabs" data-toggle="buttons">
                    <h3>Upload New Design</h3>
                </div>
                </div>
      				<p class="need_help openmodalea">Need Help Uploading ?</p>
            </div>
          <div class="row">
              <ul class="nav nav-tabs design_type_tabs tabs">
                   <li class="nav-item design_type_item">
                <h4>Design Type :</h4>
            </li>
            <li class="nav-item design_type_item ">
           <input  id="tab1" type="radio" name="data[product_type]" class="design-type_check1" value="2" <?php if(@$product['product_type']==2){ echo "checked";}?> <?php if(@$product['product_type']==""){ echo "checked";}?>>
              <label for="tab1" class="design-type_tab1">Custom Design</label>
            </li>
            <li class="nav-item design_type_item"> 
              <input id="tab2" type="radio" name="data[product_type]" class="design-type_check2" value="1" <?php if(@$product['product_type']==1){ echo "checked";}?>>
                <label for="tab2" class="design-type_tab2">One Piece</label>
            </li>
          </ul>      
          </div>
    			<div class="my-3" id="">
    				<table>
    					<tr>
    						<td>
    							<div class="image-upload">
    							    <input id="file-input" type="file" name="image" class="input_file" onchange="readURL(this);" />
    								<label for="file-input"> <img src="<?php echo base_url();?>assets/website/images/upload.png" width="70%"/> </label>
    								 </div>
    						</td>
    						<td>
                  <!-- <img src="<?php echo base_url();?>assets/website/images/dummy image.png" alt="Choosen file" class="img-upload-result" id="blah" style="object-fit: contain;"> -->
                  <img src="<?php echo (@$product['product_type']==1)?base_url().@$product['product_image']:base_url().'assets/website/images/dummy image.png';?>" alt="Choosen file" class="img-upload-result blah" id="blah">
                </td>
    					</tr>
    				</table>
    			</div>
			<div>
			    <div id="content1">
			<div class="upload_art <?php echo (@$product['product_type']==1)?'hide':'show';?>" id="upload_art" >
        <?php if(@$_SESSION['image_design']){?>
          <div class="designed_img">
            <img src="<?php echo ($_SESSION['image_design'])?$_SESSION['image_design']:'';?>">
          </div>
        <?php } ?>
				<h3 class="my-5">SELECT YOUR PRODUCTS</h3>
				<div class="col-md-12">
					<div class="row product_row aproduct_options">
            <?php
             if(!empty($customized_products))
            {
              foreach ($customized_products as $key => $value){
                ?>
                <?php if(@$product['customised_product_id']==$value['product_id']){?>
                  <div class="col-md-15 uploadCol"> 
                    
                    <div class="uploadedIcon">
                    <div class="uploadedDesign">
                        <img src="" class="uploadedImage blah">
                    </div>
                     <img src="<?php echo base_url().@$value['image'];?>" class="img-pro">
                     </div>
                    <p class="pro-cont"><?php echo @$value['product_name_en'];?></p>
                    <input type="radio" class="img-roundc" name="data[customised_product_id]" value="<?php echo @$value['product_id'];?>" checked>
                    <a href="javascript:void(0)" id="<?php echo @$value['product_id'];?>" onclick="openPro(this.id)"><img src="<?php echo base_url();?>assets/website/images/round-pen.png" class="img-roundp cart_items"></a>
                   </div>
                <?php }else{ ?>
                    <div class="col-md-15 uploadCol"> 
                    <div class="uploadedIcon">
                    <div class="uploadedDesign">
                        <img src="" class="uploadedImage blah">
                    </div>
                     <img src="<?php echo base_url().@$value['image'];?>" class="img-pro">
                        </div>
                    <p class="pro-cont"><?php echo @$value['product_name_en'];?></p>
                    <input type="radio" class="img-roundc" name="data[customised_product_id]" value="<?php echo @$value['product_id'];?>">
                    <a href="javascript:void(0)" id="<?php echo @$value['product_id'];?>" onclick="openPro(this.id)"><img src="<?php echo base_url();?>assets/website/images/round-pen.png" class="img-roundp cart_items"></a>
                   </div>
                  <?php
                }
              }
            }
            ?>
					</div>
				</div>
			</div>		
			<div class="fill_pinfo">
				<h3 class="">FILL THE PRODUCT INFO</h3>				
					<div class="form-group">
						<label for="design-type">Design Type *</label>
					</div>				
					<div class="form-group art_options">
            <?php
            if(!empty($designs))
            {
              foreach ($designs as $key => $value) { ?>
                <?php if(@$product['design_type']==$value['design_id']){?>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input no_error" value="<?php echo @$value['design_id'];?>" name="data[design_type]" checked> <span><?php echo @$value['design_name_en'];?></span></label>
                </div>
              <?php }else{ ?> 
              <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input no_error" value="<?php echo @$value['design_id'];?>" name="data[design_type]"> <span><?php echo @$value['design_name_en'];?></span></label>
                </div>
              <?php } 
              }
            }
            ?>
					</div>
					<div>			
			<div class="fill_pinfo <?php if(@$product['product_type']==1){ echo "show";}else{ echo "hide";}?>" id="one_piece">
					<div class="form-group art_options color_options">
                    <label for="select-type">Select Colors *</label>
                    <div class="new_design_onepiece">
                        <div class="upload_art">
                          <div class="colors_div">
                          <?php
                           if(!empty($colors)){
                            foreach ($colors as $key => $value)
                            { ?>
                              <?php if(@in_array(@$value['color_id'],@$product_colors)){?>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input no_error" name="colors[]" value="<?php echo @$value['color_id'];?>" checked><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important;"></span>
                                    </label>
                                  </div>
                              <?php }else{ ?>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input no_error" name="colors[]" value="<?php echo @$value['color_id'];?>"><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important;"></span>
                                    </label>
                                  </div>
                              <?php }                         
                            }
                          }?>
                       </div>
                    </div>
                    </div>
                    </div>
                    <div class="form-group sizes_onepiece size_options">
                    <label for="select-type">Select Sizes *</label>
                    <div class="new_design_onepiece">
                        <div class="upload_art">                          
                          <?php
                           if(!empty($sizes))
                           {
                              foreach ($sizes as $key => $value)
                              {                                  
                                  if(@in_array($value['size_id'],@$product_sizes)){?>
                                  <div class="form-check-inline">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input no_error" name="sizes[]" value="<?php echo @$value['size_id'];?>" checked>&nbsp;&nbsp;<?php echo @$value['size'];?>
                                      </label>
                                    </div>
                                  <?php }else{ ?>
                                    <div class="form-check-inline">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input no_error" name="sizes[]" value="<?php echo @$value['size_id'];?>">&nbsp;&nbsp;<?php echo @$value['size'];?>
                                      </label>
                                    </div>
                                    <?php
                                  }                                                      
                              }
                          }
                          ?>                          
                    </div>
					</div>
					</div>					
          <div class="form-group">
            <label for="name">Price *</label>
            </div>
            <div class="form-group">
            <input type="text" name="data[price]" class="form-control no_error" placeholder="Price" value="<?php echo @$product['price'];?>" onkeypress="return isNumber(event)">
          </div>
			</div>
			</div>
					<div class="form-group">
						<label for="name">Name *</label>
					</div>
					<div class="form-group">
						<input type="text" name="data[product_name]" class="form-control no_error" placeholder="3 to 4 words" required value="<?php echo @$product['product_name'];?>"> </div>
					<div class="form-group">
						<label for="Description">Description </label>
					</div>
					<div class="form-group">
						<textarea class="form-control no_error" name="data[description]" placeholder="Description" rows="8" required><?php echo @$product['description'];?></textarea>
					</div>
					<!-- <div class="form-group">
						<label for="Tags">Tags (Up to 50)</label>
					</div>
					<div class="form-group">
						<input type="text" name="data[tags]" class="form-control no_error" placeholder="Separate with comma" required value="<?php echo @$product['tags'];?>">          
					</div> -->
           <input type="hidden" name="old_image" value="<?php echo @$product['product_image'];?>">
            <input type="hidden" name="product_id" value="<?php echo @$product['pro_id'];?>">
					<div class="custom-control custom-switch my-cu toggle_switch">
						<label>Make Design Public *</label>
						<label class="switch">
              <input type="checkbox" name="data[status]" value="1" <?php if(@$product['status']==1){ echo "checked";}?> >
              <span class="slider round"></span>
            </label>
					</div>
					<div class="my-cu ml-c terms_conditions_div">
						<label class="form-check-label">
							<input type="checkbox" <?php echo (@$product['pro_id'])?"checked":"";?> name="terms_conditios" class="form-check-input no_error" value="" required>
							<span> I have read and accepted the <span class="openmodalet terms_link">terms and conditons </span> of this agreement </span>
						</label>
					</div>					
					<button type ="button" class="btn btn-success shop_btn shop_artist_btn mb-5 add_product">SUBMIT </button>
				</form>
			</div>
			</div>
			</div>
			
			</div>
		</div>
		</div>
						</div>
	</section>  
	<!-- 	<section class="cart_sidebar">
			<div id="myNavpro" class="sidebar_overlay " style="width:0%"> <a href="javascript:void(0)" class="closebtn" onclick="closePro()">&times;</a>
				<div class="overlay-content">
					<div class="row">
						<div class="col-md-1 slide_bar">
							<div class="slidecontainer"><i class="fa fa-plus slider_plus" aria-hidden="true"></i>
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange"><i class="fa fa-minus slider_minus" aria-hidden="true"></i>
              </div>							
						</div>
						<div class="col-md-11"><div class="preview_img"><div class="print_size">
						    <span>print size 34*39 cm</span>
						</div> <img src="http://volive.in/artaholics_dev/assets/website/images/pro5205.png" class="img-over"></div>
							<div >
								<div class="row py-a">
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip" > <img src="http://volive.in/artaholics_dev/assets/website/images/REUPLOAD.png" class="img-pro-side"><span class="tooltiptext">RE UPLOAD</span> </div></a> </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip" ><img src="http://volive.in/artaholics_dev/assets/website/images/HORIZONTAL.png" class="img-pro-side"><span class="tooltiptext">HORIZONTAL</span> </div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip" > <img src="http://volive.in/artaholics_dev/assets/website/images/VERTICAL.png" ><span class="tooltiptext">VERTICAL</span></div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip" ><img src="http://volive.in/artaholics_dev/assets/website/images/rotate.png" class="img-pro-side"><span class="tooltiptext">ROTATE</span></div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip" ><img src="http://volive.in/artaholics_dev/assets/website/images/display_col.png" class="img-pro-side"><span class="tooltiptext">DISPLAY COLOUR</span></div></a>  </div>
								</div>
								<div class="col-md-6">
								<button class="btn btn-success add_btn cancel_btn mx-auto"> Cancel </button>
								</div>
								<div class="col-md-6">
								<button type="submit" class="btn btn-success add_btn save_btn mx-auto"> Save </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
				<section class="cart_sidebar">
      <div id="myNavpro" class="overlay"> <a href="javascript:void(0)" class="closebtn" onclick="closePro()">×</a>
        <div class="overlay-content">
<div class="container ng-scope" ng-controller="ProductCtrl" ng-app="productApp" id="productApp">
    <!-- <div ng-show="loading" class="loading">
        <h1 class="lodingMessage">Initializing Design Tool<img src="<?php echo base_url();?>assets/design/images/ajax-loader.gif"></h1>
    </div> -->
    <div class="row clearfix" ng-cloak>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 editor_section">
            <div id="content" class="tabing">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                   <!--  <li class="active"><a ng-click="deactivateAll()" href="#Products" class="products" data-toggle="tab"><i class="glyphicon glyphicon-shopping-cart"></i>Products</a></li> -->
                    <li class="active"><a ng-click="deactivateAll()" href="#Graphics" class="graphics" data-toggle="tab"><i class="glyphicon glyphicon-camera"></i>Graphics</a></li>
                    <li><a ng-click="addTextByAction()" href="#Text" class="text" data-toggle="tab"><i class="glyphicon glyphicon-text-size"></i>Text</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content action_tabs">
                    <div class="tab-pane active clearfix" id="Products">
                        <!-- <h1>Products</h1> 
                        <div class="col-lg-12">
                            <md-input-container>
                                <label>Sort by category</label>
                                <md-select ng-model="productCategory">
                                    <md-option ng-repeat="productCategory in productCategories" value="{{productCategory}}" ng-click="prodctByCat(productCategory);">{{productCategory}}</md-option>
                                </md-select>
                            </md-input-container> 
                        </div> -->   
                        <div class="col-lg-12 thumb_listing">  
                            <ul>
                                <li class="clearall" ng-repeat="prod in products | orderBy:predicate:reverse" ng-class="(defaultProductId == prod.id) ? 'selected' : ''" ng-if="hasCategory(prod)">
                                    <a href="javascript:void(0);" ng-click="loadProduct(prod.name, prod.image, prod.id, prod.price, prod.currency);">
                                    <img data-ng-src="{{prod.image}}" alt=""  id="dynamic{{prod.id}}" ></a>
                                    <span class="product_cat">{{prod.category}}</span>
                                    <span class="product_title">{{prod.name}}</span>
                                    <span class="product_price">{{prod.price}} {{prod.currency}}</span>
                                </li>
                            </ul> 
                        </div>
                    </div>
                    <div class="tab-pane clearfix active" id="Graphics">

                        <div class="graphic_options clearfix">
                            <ul>
                                <!-- <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 active">
                                    <div>
                                        <a class="" href="#clip_arts" aria-controls="clip_arts" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                            <i class="fa fa-camera-retro"></i>
                                            <span>Art works</span>
                                        </a>
                                    </div>
                                </li> -->
                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6" active>
                                    <div>
                                        <a class="" href="#upload_own" aria-controls="upload_own" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                            <i class="fa fa-cloud-upload"></i>
                                            <span>Upload own</span>
                                        </a>
                                        <div class="uploadedDesign">
                                          <img ng-click="onFileSelectUrl()" id="srcimg" src="" class="uploadedImage blah">
                                      </div>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div>
                                        <a class="" href="#qr_code" aria-controls="qr_code" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                            <i class="fa fa-qrcode"></i>
                                            <span>Qr code</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div>
                                        <a class="" href="#hand_draw" aria-controls="hand_draw" role="tab" data-toggle="tab" ng-click="enterDrawing();">
                                            <i class="fa fa-pencil-square-o"></i>
                                            <span>Hand draw</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="clip_arts">
                                <div class="graphic_types clearfix" ng-show="!graphic_icons">
                                    <div ng-repeat="graphicsCategory in graphicsCategories" value="{{graphicsCategory}}"  ng-click="loadByGraphicsCat(graphicsCategory)" ng-model="graphicsCategory" >
                                      <div class="{{graphicsCategory.split(' ').join('') | lowercase}}" ></div>
                                       <span>    
                                          {{graphicsCategory}}
                                        </span>
                                    </div>
                                </div>   
                                <span ng-show="graphic_icons" class="back_to_graphic" ng-click="ShowGraphicIcons()">
                                    <i class="fa fa-angle-left"></i> Back
                                </span>
                                <div class="graphic_icons" ng-show="graphic_icons">
                                    <div class="cal-lg-12 filter_by_cat">
                                        <md-input-container style="">
                                            <label>Sort by category</label>
                                            <md-select ng-model="graphicsCategory" ng-change="loadByGraphicsCategory();">
                                                <md-option ng-repeat="graphicsCategory in graphicsCategories" value="{{graphicsCategory}}">{{graphicsCategory}}</md-option>
                                            </md-select>
                                        </md-input-container>
                                    </div>
                                    <div class="col-lg-12 thumb_listing scrollme" rebuild-on="rebuild:me" ng-scrollbar is-bar-shown="barShown" ng-class="fabric.selectedObject ? 'activeControls' : ''">
                                        <ul>
                                            <li ng-repeat="graphic in graphics"><a href="javascript:void(0);" ng-click='addShape(graphic)'><img data-ng-src="{{graphic}}" alt="" width="120px;"></a></li>
                                        </ul>
                                        <a ng-if="loadMore" class="loadMore" ng-click="graphics_load_more(graphicsPage)">Load More</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in active" id="upload_own">
                                <div class="col-lg-12 thumb_listing">
                                    <div class="well" >
                                        <form name="myForm">
                                            <div class="fileUpload btn btn-primary">
                                                <span>Choose File</span>
                                                <input type="file" ngf-select="onFileSelect(picFile);" ng-model="picFile" name="file" accept="image/*" ngf-max-size="2MB" class="upload">
                                            </div>
                                            <input id="uploadFile" placeholdFile NameName disabled="disabled" />
                                            <span class="has-error" ng-show="myForm.file.$error.maxSize">File too large {{picFile.size / 1000000|number:1}}MB: max 2M</span>
                                            <div class="clearfix"></div>
                                            <span class="has-error" ng-show="myForm.file.$error.maxWidth">File width too large : Max Width 300px</span>
                                            <div class="clearfix"></div>
                                            <span class="has-error" ng-show="myForm.file.$error.maxHeight">File height too large : Max Height 300px</span>
                                            <div class="clearfix"></div>
                                            <span class="has-error" ng-show="uploadErrorMsg">{{uploadErrorMsg}}</span>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="qr_code">
                                <div class="col-lg-12 thumb_listing">
                                    <div class="well" >
                                        <div class="row form-group">
                                            <md-input-container flex>
                                                <label>Enter website link or text here</label>
                                                <textarea  columns="1" id="textarea-text-qr-code" ng-model="fabric.selectedObject.textQRCode"></textarea>
                                            </md-input-container>
                                            <div class="clearfix">
                                                <md-button class="md-raised md-cornered" ng-click="addQRCode(fabric.selectedObject.textQRCode);" aria-label="Add QR Code"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add QR Code</md-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="hand_draw"> 
                                <div class="col-lg-12 thumb_listing">
                                    <div class="well" > 
                                        <div class="row form-group">
                                            <md-radio-group ng-model="drawing_mode_selector" ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                                <md-radio-button value="Pencil" class="md-primary" ng-click="changeDrawingMode('Pencil');">Pencil</md-radio-button>
                                                <md-radio-button value="Circle" class="md-primary" ng-click="changeDrawingMode('Circle');"> Circle </md-radio-button>
                                                <md-radio-button value="Spray" class="md-primary" ng-click="changeDrawingMode('Spray');">Spray</md-radio-button>
                                                <md-radio-button value="Pattern" class="md-primary" ng-click="changeDrawingMode('Pattern');">Pattern</md-radio-button>
                                                <md-radio-button value="hline" class="md-primary" ng-click="changeDrawingMode('hline');">H-line</md-radio-button>
                                                <md-radio-button value="vline" class="md-primary" ng-click="changeDrawingMode('vline');">V-line</md-radio-button>
                                                <md-radio-button value="square" class="md-primary" ng-click="changeDrawingMode('square');">Square</md-radio-button>
                                                <md-radio-button value="diamond" class="md-primary" ng-click="changeDrawingMode('diamond');">Diamond</md-radio-button>
                                            </md-radio-group>

                                        </div>
            
                                        <br /><br/>
                                        <div class="col-sm-12 input-group colorPicker2" ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                            <md-input-container flex>
                                                <label for="Line color">Line color:</label>
                                                <input type="text" value="" class="" colorpicker ng-model="drawing_color" ng-change="fillDrawing(drawing_color);"/>
                                            </md-input-container>
                                            <span class="input-group-addon" style="border: medium none #000000; background-color: {{drawing_color}}"><i></i></span>
                                        </div>

                                        <br />
                                        <div class="row form-group handtool">
                                            <md-input-container flex ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                                <label for="Line width">Line width:</label>
                                                <input class='col-sm-12' title="Line width" type='range' min="0" max="150" step=".01" ng-model="drawing_line_width" ng-change="changeDrawingWidth(drawing_line_width);"/>
                                            </md-input-container>
                                        </div>
                                        <div class="row form-group handtool">
                                            <md-input-container flex ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                                <label for="Line shadow">Line shadow:</label>
                                                <input class='col-sm-12' title="Line shadow" type='range' min="0" max="50" step=".01" ng-model="drawing_line_shadow" ng-change="changeDrawingShadow(drawing_line_shadow);"/>
                                            </md-input-container>
                                        </div>
                                        <div class="row form-group">
                                            <div class="clearfix">
                                                <center><md-button class="md-raised md-cornered" ng-click="enterDrawingMode();" aria-label="{{enter_drawing_mode}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;{{enter_drawing_mode}}</md-button></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane clearfix" id="Text">
                        <div class="graphic_options clearfix">
                            <ul>
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6 active">
                                    <div>
                                        <a href="#text_design" aria-controls="text_design" role="tab" data-toggle="tab">
                                            <i class="fa fa-font"></i>
                                            <span>Text Design</span>
                                        </a>
                                    </div>
                                </li>
                                <!-- <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div>
                                        <a href="#word_cloud" aria-controls="word_cloud" role="tab" data-toggle="tab">
                                            <i class="fa fa-cloud"></i>
                                            <span>Word Cloud</span>
                                        </a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="text_design">
                                <div class="col-lg-12 thumb_listing">
                                    <div class="well" >
                                        <div class="row form-group">
                                            <md-input-container flex>
                                                <label>Enter text below</label>
                                                <textarea  columns="1" id="textarea-text" style="text-align: {{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.text"></textarea>
                                            </md-input-container>
                                            <div class="clearfix">
                                                <md-button class="md-raised md-cornered" ng-click="addText()" aria-label="Add Text"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Text</md-button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="word_cloud">
                                <div class="col-lg-12 thumb_listing">
                                    <div class="well" >
                                        <div class="row form-group">
                                            <md-input-container flex>
                                                <label>Enter words below</label>
                                                <textarea  columns="1" id="textarea-text-word-cloud" style="text-align: {{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.textWordCloud"></textarea>
                                            </md-input-container>
                                            <div class="clearfix">
                                                <md-button class="md-raised md-cornered" ng-click="addWordCloud()" aria-label="Add Word Cloud"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Word Cloud</md-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane clearfix" id="Layers">
                        <h1>Layers</h1>
                        <div class="col-lg-12 layer_listing scrollme" rebuild-on="rebuild:layer" ng-scrollbar is-bar-shown="barShown">

                        <ul class="ul_layer_canvas row">

                                <li ng-repeat="layer in objectLayers" class="ng-scope">
                                    <span>{{layer.id}}</span>
                                    <img ng-src="{{layer.src}}" alt=""/>
                                    <div class="f-right inner">
                                        <ul class="ulInner actions">
                                            <li class="liActions"><a href="javascript:void(0)" ng-click="deleteObject(layer.object);"><i class="fa fa-trash"></i></a></li>
                                            <li class="liActions"><a href="javascript:void(0)" ng-click="objectForwardSwap(layer.object);"><i class="fa fa-chevron-up"></i></a></li>
                                            <li class="liActions"><a href="javascript:void(0)" ng-click="objectBackwordSwap(layer.object);"><i class="fa fa-chevron-down"></i></a></li>
                                            <li class="liActions"><a href="javascript:void(0)" ng-click="lockLayerObject(layer.object);"><i class="fa" ng-class="isObjectLocked(layer.object) ? 'fa-lock' : 'fa-unlock'"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-12" ng-class="fabric.selectedObject ? 'activeControlsElem' : ''" ng-if='fabric.selectedObject.type' ng-switch='fabric.selectedObject.type'>

                <div class="close-circle"><i class="fa fa-angle-left" ng-click="deactivateAll();"><span>Back</span></i></div>

                <div class="well">

                    <div class="row form-group" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                        <md-input-container flex>
                            <label>Enter text below</label>
                            <textarea  columns="1" id="textarea-text" style="text-align: {{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.text"></textarea>
                        </md-input-container>
                    </div>

                    <div class="row form-group" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'" style="position: relative;">
                        <md-button class="md-raised md-cornered dropdown-toggle" data-toggle="dropdown" aria-label="Font Family"><span class='object-font-family-preview' style='font-family: "{{ fabric.selectedObject.fontFamily }}";'> {{ fabric.selectedObject.fontFamily }} </span> <span class="caret"></span></md-button>

                        <ul class="dropdown-menu">
                            <li ng-repeat='font in FabricConstants.fonts' ng-click='toggleFont(font.name);' style='font-family: "{{ font.name }}";'> <a>{{ font.name }}</a> </li>
                        </ul>
                    </div>

                    <div class="row row-margin">
                        <div class="row col-lg-6" title="Font size" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                            
                            <md-input-container flex>
                                <label><i class="fa fa-text-height"></i> (Font size)</label>
                                <input type='number' class="" ng-model="fabric.selectedObject.fontSize" />
                            </md-input-container>

                        </div>
                        <div class="row col-lg-6" title="Line height" ng-show="fabric.selectedObject.type == 'text'">
                            <md-input-container flex>
                                <label><i class="fa fa-align-left"></i> (Line height)</label>
                                <input type='number' class="" ng-model="fabric.selectedObject.lineHeight" step=".1" />
                            </md-input-container>

                        </div>
                         <div class="row col-lg-6" title="Reverse" ng-show="fabric.selectedObject.type == 'curvedText'">
                            <md-checkbox ng-model="fabric.selectedObject.isReversed" aria-label="Reverse" ng-click="toggleReverse(fabric.selectedObject.isReversed);">Reverse </md-checkbox>
                        </div>
                    </div>
                    <div class='row form-group' ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'left' }" ng-click="fabric.selectedObject.textAlign = 'left'" aria-label="Align Left"><i class='fa fa-align-left'></i></md-button>
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'center' }" ng-click="fabric.selectedObject.textAlign = 'center'" aria-label="Align Center"><i class='fa fa-align-center'></i></md-button>
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'right' }" ng-click="fabric.selectedObject.textAlign = 'right'" aria-label="Align Right"><i class='fa fa-align-right'></i></md-button>
                         <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isBold() }" ng-click="toggleBold()" aria-label="Bold"><i class='fa fa-bold'></i></md-button>
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isItalic() }" ng-click="toggleItalic()" aria-label="Italic"><i class='fa fa-italic'></i></md-button>
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isUnderline() }" ng-click="toggleUnderline()" aria-label="Underline"><i class='fa fa-underline'></i></md-button>
                        <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isLinethrough() }" ng-click="toggleLinethrough()" aria-label="Strike through"><i class='fa fa-strikethrough'></i></md-button>
                    </div> 

                    <div class='row form-group curved_text' ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                        <md-switch ng-model="fabric.selectedObject.isCurved" aria-label="Switch 1" ng-change="curveText();">Curved text </md-switch>
                    </div>

                    <div class="row form-group transparency" title="Radius" ng-show="fabric.selectedObject.type == 'curvedText'" style="margin-bottom: 0px;">
                        <md-input-container flex>
                            <label for="Radius">Radius:</label>
                            <input class='col-sm-12' title="Radius" type='range' min="50" max="200" value="100" ng-model="fabric.selectedObject.radius" ng-change="radius(fabric.selectedObject.radius);"/>
                        </md-input-container>
                    </div>
                    <div class="row form-group transparency" title="Spacing" ng-show="fabric.selectedObject.type == 'curvedText'" style="margin-bottom: 35px;">
                        <md-input-container flex>
                            <label for="Spacing">Spacing:</label>
                            <input class='col-sm-12' title="Spacing" type='range' min="5" max="30" value="10" ng-model="fabric.selectedObject.spacing" ng-change="spacing(fabric.selectedObject.spacing);"/>
                        </md-input-container>
                    </div>
                    <div class="row form-group input-group colorPicker2" ng-show="fabric.selectedObject.type != 'image' && fabric.selectedObject.type != 'path'">
                            <md-input-container flex>
                                <label for="Color">Color:</label>
                                <input type="text" value="" class="" colorpicker ng-model="fabric.selectedObject.fill" ng-change="fillColor(fabric.selectedObject.fill);"/>
                            </md-input-container>
                            <span class="input-group-addon" style="border: medium none #000000; background-color: {{fabric.selectedObject.fill}}"><i></i></span>
                    </div>
                    <div class="row form-group transparency" ng-show="fabric.selectedObject.type != 'curvedText'">
                        <md-input-container flex>
                            <label for="Transparency">Transparency:</label>
                            <input class='col-sm-12' title="Transparency" type='range' min="0" max="1" step=".01" ng-model="fabric.selectedObject.opacity" ng-change="opacity(fabric.selectedObject.opacity);"/>
                        </md-input-container>
                    </div>
                    <div class="col-sm-12 input-group cloud-options" ng-show="fabric.selectedObject.type == 'image'">
                        <label class="custom-label">Filters:</label>
                        <br>
                        <md-checkbox ng-model="fabric.selectedObject.isGrayscale" aria-label="Grayscale" ng-click="setImageFilter(fabric.selectedObject.isGrayscale, 0);">Grayscale</md-checkbox>
                        <md-checkbox ng-model="fabric.selectedObject.isSepia" aria-label="Sepia" ng-click="setImageFilter(fabric.selectedObject.isSepia, 1);">Sepia</md-checkbox>
                        <md-checkbox ng-model="fabric.selectedObject.isInvert" aria-label="Invert" ng-click="setImageFilter(fabric.selectedObject.isInvert, 2);">Invert</md-checkbox>
                        <md-checkbox ng-model="fabric.selectedObject.isEmboss" aria-label="Emboss" ng-click="setImageFilter(fabric.selectedObject.isEmboss, 3);">Emboss</md-checkbox>
                        <md-checkbox ng-model="fabric.selectedObject.isSharpen" aria-label="Sharpen" ng-click="setImageFilter(fabric.selectedObject.isSharpen, 4);">Sharpen</md-checkbox>
                    </div>
                </div>
      </div>
            <!---->
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 canvas_section pull-right">
            <div class="row"> 
                <div class="canvas_image image-builder ng-isolate-scope">

                    <div class='fabric-container'>
                        <div class="canvas-container-outer">
                            <canvas fabric='fabric' class="fabric_new"></canvas>
                        </div>
                        <div class="btn-group-vertical btn-group-one">
                            <div class="icon-vertical m-b-sm pull-right">
                                <ul>
                                    <li class="">
                                        <a class="fa fa-search-plus ng-scope ng-isolate-scope" translate="" ng-click="zoomObject('zoomin')" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                        <md-tooltip md-visible="zoomin.showTooltip" md-direction="left">Select object and Zoom In</md-tooltip>
                                    </li>
                                    <li>
                                        <a class="fa fa-search-minus ng-scope ng-isolate-scope" translate="" ng-click="zoomObject('zoomout')" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                        <md-tooltip md-visible="zoomout.showTooltip" md-direction="left">Select object and  Zoom Out</md-tooltip>
                                    </li> 
                                </ul>
                                <ul>
                                    <li>
                                        <a class="fa fa-undo ng-scope ng-isolate-scope" translate="" ng-click="undo()" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                        <md-tooltip md-visible="undo.showTooltip" md-direction="left">Undo</md-tooltip>
                                    </li>
                                    <li>
                                        <a class="fa fa-repeat ng-scope ng-isolate-scope" translate="" ng-click="redo()" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                        <md-tooltip md-visible="redo.showTooltip" md-direction="left">Redo</md-tooltip>
                                    </li>
                                </ul>
                            </div> 
                        </div>  
                    </div>
                </div>
                <div class="changesSaveBtn">
                  <a ng-click="downloadObject()" href="javascript:void(0)" class="ng-scope"><button style="float: right;" class="btn btn-primary" id="abc" onclick="closewindow()">SAVE</button></a>                   
                </div>
               <!--  <div class="canvas_sub_image">
                    <ul>
                        <li ng-repeat="prodImg in productImages">
                            <img ng-click='loadProduct(defaultProductTitle, prodImg, defaultProductId, defaultPrice, defaultCurrency, $index)' data-ng-src="{{prodImg}}" alt="" width="120px;">
                        </li>
                    </ul>
                </div> -->
                <div class="canvas_details clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <span class="product_name">{{defaultProductTitle}}</span>
                    </div>
                    <!-- <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 clearfix"> 
                        <span class="pull-left">Qty:</span>
                        <div class="m-prod_detail_attr">
                            <div class="pull-left m-prod_counter">  
                                <span ng-click="increments()"><i class="fa fa-plus"></i></span>
                                <span ng-click="decrement()"><i class="fa fa-minus"></i></span>
                                <input type="text" value="{{counter}}" id="m-prod_count" name="quantity" required> 
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6 clearfix pricing"> 
                            <span class="price_title">Price</span>
                            <span class="price_amnt">{{defaultPrice}} {{defaultCurrency}}</span> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <a class="cart_icon" href="javascript:void(0)" ng-click="addToCart()">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </div> -->
                </div> 
            </div> 
        </div>



<!-- <section class="customizer" id="customizer">
    <a href="http://designtailor.veepixel.com/"><img src="images/logo.png" alt="" class="logo"></a>
    <div class="selector">
          <h2>Live Customizer</h2>
          <div class="color_section color_block">


                <span class="customizer_headings">Color Changer</span>

              <div class="col-lg-12 color-mixer">
                  <div class="col-lg-12">
                      <label class="customizer-label">Primary</label>
                      <div class="input-group colorPicker2 colorpicker-element">
                              <input ng-model="primaryColor" colorpicker type="text" value="" class="form-control"/>
                              <span class="input-group-addon"><i style="background: {{primaryColor}};"></i></span>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <label class="customizer-label">Secondary</label>
                      <div class="input-group colorPicker2 colorpicker-element">
                          <input ng-model="secondaryColor" colorpicker type="text" value="" class="form-control"/>
                          <span class="input-group-addon"><i style="background: {{secondaryColor}};"></i></span>
                      </div>
                  </div>
                  <hr /><br /><br />
                  <div class="col-lg-12">
                  <center><input ng-model="colorResult" type="button" value="Apply Color Scheme" class="btn btn-info" ng-click="changeColorScheme()"/></center>
                  </div>

              </div>

                <span class="customizer_headings">Canvas Background</span>
                <ul id="canvas_color_selector" class="color_selector canvas_selector">
                      <li data-attr="images/site_bg_01.jpg" class="canvas_1"></li>
                      <li data-attr="images/site_bg_02.jpg" class="canvas_2"></li>
                      <li data-attr="images/site_bg_03.jpg" class="canvas_3"></li>
                      <li data-attr="images/site_bg_04.jpg" class="canvas_4"></li> 
                </ul>
                  <span class="customizer_headings">Page Layout</span>
                  <ul class="layout_options">
                      <li><a href="index.html"><img src="images/layout_2.jpg" style="width: 60px;"></a></li>
                      <li><a href="index_01.html"><img src="images/layout_1.jpg" style="width: 60px;"></a></li>
                      <li><a href="index_02.html"><img src="images/layout_3.jpg" style="width: 60px;"></a></li>
                  </ul>
          </div>  
    </div>
    <i class="fa fa-cog" id="selector_icon"></i>
</section> -->
    </div>

</div>
        </div>
      </div>
    </section>
		
		<div class="modalea" aria-hidden="true">
  <div class="modal-dialog modalea-dialog">
    <div class="modal-header">
      <h2>Need Help for Design?</h2>
      <button type="button" class="close closemodalea" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body">      
       <p><?php echo @$upload_help_content['need_help_uploading']; ?></p>
      </div>
    <div class="modal-footer"> 
      <button type="button" class="btn btn-danger closemodalea">Close</button>
    </div>
  </div>
  </div>
  
  <div class="modalet" aria-hidden="true">
  <div class="modal-dialog modalet-dialog">
    <div class="modal-header">
      <h2>Design Terms and Conditions?</h2>
      <button type="button" class="close closemodalet" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
     <p><?php echo @$upload_help_content['design_terms_conditions']; ?></p>
      </div>
    <div class="modal-footer">
 
      <button type="button" class="btn btn-danger closemodalet">Close</button>
    </div>
  </div>
  </div>
<!-- <script src="<?php echo base_url();?>assets/design/assets/angular.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/angular-animate.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/angular-aria.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/angular-material.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/ng-file-upload/angular-file-upload.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/ng-file-upload/angular-file-upload-shim.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/design/assets/qr-code/raphael-2.1.0-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/design/assets/qr-code/qrcodesvg.js"></script>
<script src='<?php echo base_url();?>assets/design/assets/word-cloud/d3.v3.min.js'></script>
<script src='<?php echo base_url();?>assets/design/assets/word-cloud/d3.layout.cloud.js'></script>

<script src="<?php echo base_url();?>assets/design/assets/angular-sanitize.min.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/ng-scrollbar.min.js"></script> 

<script src="<?php echo base_url();?>assets/design/assets/fabric/fabric.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabric.min.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricCanvas.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricConstants.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricDirective.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricDirtyStatus.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricUtilities.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabricWindow.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabric.curvedText.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/fabric/fabric.customiseControls.js"></script>

<script src="<?php echo base_url();?>assets/design/assets/colorpicker/bootstrap-colorpicker-module.js"></script>
<script src="<?php echo base_url();?>assets/design/js/application.js"></script>

<script src="<?php echo base_url();?>assets/design/assets/file/fileSaver.js"></script>
<script src="<?php echo base_url();?>assets/design/assets/pdf/jspdf.debug.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.js" type="text/javascript"></script> -->
<div class="disabled">
<script src="http://volive.in/artaholics_dev/assets/design/assets/angular.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/angular-animate.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/angular-aria.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/angular-material.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/ng-file-upload/angular-file-upload.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/ng-file-upload/angular-file-upload-shim.js"></script>
<script type="text/javascript" src="http://volive.in/artaholics_dev/assets/design/assets/qr-code/raphael-2.1.0-min.js"></script>
<script type="text/javascript" src="http://volive.in/artaholics_dev/assets/design/assets/qr-code/qrcodesvg.js"></script>
<script src='http://volive.in/artaholics_dev/assets/design/assets/word-cloud/d3.v3.min.js'></script>
<script src='http://volive.in/artaholics_dev/assets/design/assets/word-cloud/d3.layout.cloud.js'></script>

<script src="http://volive.in/artaholics_dev/assets/design/assets/angular-sanitize.min.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/ng-scrollbar.min.js"></script> 

<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabric.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabric.min.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricCanvas.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricConstants.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricDirective.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricDirtyStatus.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricUtilities.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabricWindow.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabric.curvedText.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/fabric/fabric.customiseControls.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/colorpicker/bootstrap-colorpicker-module.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/js/application.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/file/fileSaver.js"></script>
<script src="http://volive.in/artaholics_dev/assets/design/assets/pdf/jspdf.debug.js"></script>
<script src="http://volive.in/artaholics_dev/assets/js/jquery.validate.js" type="text/javascript"></script>
   <div id="qrcode"></div>
<div id="wordcloud"></div>
<div class="css_gen"></div>
<div class="svgElements"></div>
 <script type="text/javascript">   
    function closewindow()
    {
        setInterval(function(){
             window.location.href="<?php echo base_url();?>admin/add_product/<?php echo @$pro_id; ?>"
          }, 2000);
    }
</script>
<script type="text/javascript">
    $('#abc').click(function(e) {
    window.onbeforeunload = null;
    e.preventDefault();
    var link = $(this);
    var form = link.closest('form');
    form.submit();
  });
</script>
    <script>
$("#add_product").validate({       
            rules: {
                "data[product_name]"   : "required",
                "data[description]"    : "required",
                "data[price]"          : "required",                
                "data[design_type]"    : "required",
                "data[customised_product_id]"    : "required",
                <?php if(@$product['product_image'] == ""){?>
                "image"                : "required",
                  <?php } ?> 
                "terms_conditios"      : "required",
                'sizes[]'              : {
                        required: true,                        
                    },
                'colors[]'             : {
                    required: true,                    
                } 
            },
            messages : {
                "data[product_name]"   : "Please Enter Product Name", 
                "data[description]"    : "Please Enter Product description",
                "data[price]"          : "Please Enter Product Price",                
                "data[design_type]"    : "Please Check Your Design Type", 
                "data[customised_product_id]"    : "Please Check Product",                
                <?php if(@$product['product_image'] == ""){?>
                "image"                : "Please Select Product Image",
                <?php } ?> 
                "terms_conditios"      : "Please Accept Terms and Conditions", 
               'sizes[]'               : {
                  required: "check at least 1 Size",                
                },
                'colors[]'             : {
                  required: "check at least 1 Color",                
                }
                              
            },      
        });

    $('.add_product').click(function(){    
        var validator = $("#add_product").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_ads').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:10px; height:20px;'>"); 
                  var data = new FormData($('#add_product')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_product",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){
                        var obj = jQuery.parseJSON(result);
                        if (obj.status == "success") {
                           location.reload();
                        } 
                    }
                });
            }
        });
   
</script>

<script>	
       function openPro(id)
       {            
           if(id != "")
           {  
              document.getElementById("myNavpro").style.width = "80%";
               $('.clearall').hide();
               //alert(id);
               $('#dynamic'+id).trigger("click");
               $('#srcimg').trigger("click");               
           }
           else
           {
              return;
           }
      }

      function closePro() {
        document.getElementById("myNavpro").style.width = "0%";
      }    

</script>

<script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    $(".cart_items").click(function(){
  $(".body-backdrop").addClass("modal-backdrop show");
});
$(".closebtn").click(function(){
  $(".body-backdrop").removeClass("modal-backdrop show");
});
</script>
<script>
    $(".dot").click(function(){
  $(this).toggleClass("selected");
});
</script>
<script>
    $(function() {
    $('.design-type_tab1').click( function() {
        $("#one_piece").addClass('hide');
        $("#upload_art").removeClass('hide');
        $("#up_design").addClass('hide');
        $('#add_product')[0].reset();
    });
    $('.design-type_tab2').click( function() {
        $("#one_piece").removeClass('hide');
        $("#upload_art").addClass('hide');
        $("#up_design").removeClass('hide');
        $('#add_product')[0].reset();
        
    });
});

function isNumber(evt)
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>
<script>
    $(function() {
    $('.design-type_check1').click( function() {
        $(".design-type_check2").removeAttr("checked","checked");
        $(".design-type_check1").attr("checked","checked");
        $("#one_piece").addClass('hide');
        $("#up_design").addClass('hide');
        $("#upload_art").removeClass('hide');
        $("#upload_design").addClass('hide');
        $('#add_product')[0].reset();
    });
    $('.design-type_check2').click( function() {
        $("#one_piece").removeClass('hide');
        $(".design-type_check2").attr("checked","checked");
        $("#upload_art").addClass('hide');
        $("#up_design").removeClass('hide');
        $("#upload_design").removeClass('hide');
        $('#add_product')[0].reset();
    });
});
</script>
<script type="text/javascript">
  //You may use vanilla JS, I just chose jquery

$('.openmodalea').click(function (e) {
         e.preventDefault();
         $('.modalea').addClass('opened');
    });
$('.closemodalea').click(function (e) {
         e.preventDefault();
         $('.modalea').removeClass('opened');
    });
</script>
<script type="text/javascript">
  //You may use vanilla JS, I just chose jquery

$('.openmodalet').click(function (e) {
         e.preventDefault();
         $('.modalet').addClass('opened');
    });
$('.closemodalet').click(function (e) {
         e.preventDefault();
         $('.modalet').removeClass('opened');
    });
</script>
<div class="body-backdrop"></div>

	</div>
	</div>