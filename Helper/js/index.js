$(document).ready(
	function () {

		var img = document.getElementById('imageZone'); 
		var width = img.naturalWidth;
		var height = img.naturalHeight;
		var widthZoom = img.clientWidth;
		var heightZoom = img.clientHeight;

		var ratio = width/widthZoom;

		var image_full_div_top = $(".image-full-div").position().top;
		var image_full_div_left = $(".image-full-div").position().left;

		if (width > height) {
			var startTop = image_full_div_top;
			var startLeft = image_full_div_left + (widthZoom - heightZoom) / 2;
			$("#crop_tool").css("top", startTop).css("left", startLeft).css("width", heightZoom).css("height", heightZoom);			
		}else {			
			var startTop = image_full_div_top + (heightZoom - widthZoom) / 2;
			var startLeft = image_full_div_left;
			$("#crop_tool").css("top", startTop).css("left", startLeft).css("width", widthZoom).css("height", widthZoom);
		}

		$("#crop_tool").resizable({containment: "#imageZone", aspectRatio: true});
		$("#crop_tool").draggable({containment: "#imageZone"});

		$("#crop_btn").click(
			function () {
				var image_full_div_top = parseInt($(".image-full-div").position().top);
				var image_full_div_left = parseInt($(".image-full-div").position().left);
				var crop_tool_top = parseInt($("#crop_tool").position().top);
				var crop_tool_left = parseInt($("#crop_tool").position().left);

				image_full_div_left.toFixed();
				image_full_div_top.toFixed();
				crop_tool_top.toFixed();
				crop_tool_left.toFixed();

				var crop_start_x = crop_tool_left - image_full_div_left ;
				var crop_start_y = crop_tool_top - image_full_div_top;

				var crop_tool_width = parseInt($("#crop_tool").width());
				var crop_tool_height = parseInt($("#crop_tool").height());

				crop_tool_width.toFixed();
				crop_tool_height.toFixed();

				var img_name = $("#crop_btn").attr("img_name");

				$.post("crop.php", {img_name: img_name, crop_start_x: crop_start_x,
				 crop_start_y:  crop_start_y, crop_tool_width: crop_tool_width, 
				 crop_tool_height: crop_tool_height, ratio: ratio}, function(data){
				 		alert("Successfullly!");
				})
			}
		);
	}
)