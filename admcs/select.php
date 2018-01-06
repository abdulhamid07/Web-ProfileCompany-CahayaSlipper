<?php
	if(empty($_GET['fModule'])){
		include "pages/dashboard/dashboard.php";
	}else{
		switch($_GET['fModule']){
			case ('dashboard'): include("pages/dashboard/dashboard.php");
			break;
			case ('logoSlider'): include ('pages/settingWeb/logoSlider/logoSlider.php');
			break;
			case ('menuSubmenu'): include ('pages/settingWeb/menuSubmenu/menuSubmenu.php');
			break;
			case ('news'): include ('pages/contentWeb/news/newsAndComments.php');
			break;
			case ('add-news'): case ('edit-news'): include ('pages/contentWeb/news/addNews.php');
			break;
			case ('emailTestimoni'): include ('pages/dataCompany/emailAndTestimoni/emailAndTest.php');
			break;
			case ('detailEmail'): include ('pages/dataCompany/emailAndTestimoni/detailEmail.php');
			break;
			case ('aboutAndContact'): include ('pages/dataCompany/aboutAndContact/aboutAndContact.php');
			break;
			case ('edit-team'): include ('pages/dataCompany/aboutAndContact/editTeam.php');
			break;
			case ('productsAndServices'): include ('pages/dataCompany/productsAndServices/productsAndServices.php');
			break;
			case ('add-produk'): case ('edit-produk'): include ('pages/dataCompany/productsAndServices/addProduct.php');
			break;
			case ('edit-profile'): include ('pages/dataCompany/aboutAndContact/editAbout.php');
			break;
			case ('view-comments'): include ('pages/contentWeb/news/viewComment.php');
			break;
			case ('OrDers123'): include ('pages/dataCompany/orders/vieworders.php');
			break;
			case ('detail-OrDers123'): include ('pages/dataCompany/orders/detailOrder.php');
			break;
			case ('hasilpoling'):case('lihatpoling'): include ('poling/hasil-poling.php');
			break;
			case ('about'):include ('about/about.php');
			break;
		}

	}
?>