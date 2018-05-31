// Manga
$('.delete_manga').on('click',function(){
	var thongbao='Delete this manga. You sure?';
	return confirm(thongbao);  
});

$('.update_manga').on('click',function(){
	var thongbao='Update new chapter of this Manga. You sure?';
	return confirm(thongbao);  
});

// Users
$('.delete_link').on('click',function(){
	var thongbao='Disable this account. You sure?';
	return confirm(thongbao);  
});

$('.update_link').on('click',function(){
	var thongbao='Enable this account. You sure?';
	return confirm(thongbao);  
});

	
	
