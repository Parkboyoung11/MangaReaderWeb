$("#upload").change( 
	function () {
		var screenWidth = $(window).width();	
		var indexTop = 100;
		var mainWidth = 455;
		var indexLeft = (screenWidth - mainWidth) / 2;
		$("#previewMain").css("top", indexTop).css("left", indexLeft).css("width", mainWidth);	
		var ratio = 1;
		var lock = 1;
		$("#imagePreview").attr('lock', lock);

		var reader = new FileReader();
		reader.onload = function(e) {			
			$("#imagePreview").attr('src', e.target.result).load(
				function() {
					var lock = $("#imagePreview").attr("lock");
					if (lock == 1) {
						$("#imagePreview").attr('lock', 0);
						var realWidth = this.width;
	            		var realHeight = this.height;
	            		
	            		if (realHeight > realWidth) {
	            			var imgWidth = 270;
	            			ratio = realWidth / imgWidth;
	            			var cropToolTop = 64 + (realHeight / ratio - imgWidth) / 2;
	            			$("#imageBox").css("width", imgWidth);
	            			$("#imagePreview").css("width", imgWidth);
	            			$("#imagePreview").attr('ratio', ratio);
	            			$("#cropTool").css("top", cropToolTop).css("left", "");
	            			$("#cropTool").css("width", imgWidth).css("height", imgWidth);			
	            		}else {
	            			var imgWidth = 400;
	            			ratio = realWidth / imgWidth;
	            			var imgHeight = realHeight / ratio;
	            			var cropToolTop = 64;
	            			var cropToolLeft = 27.5 + (imgWidth - imgHeight) / 2;
	            			$("#imageBox").css("width", imgWidth);
	            			$("#imagePreview").css("width", imgWidth);
	            			$("#imagePreview").attr('ratio', ratio);
	            			$("#cropTool").css("top", cropToolTop).css("left", cropToolLeft);
	            			$("#cropTool").css("width", imgHeight).css("height", imgHeight);
	            		}
	            		$("#cropTool").resizable({containment: "#imagePreview", aspectRatio: true});
						$("#cropTool").draggable({containment: "#imagePreview"});
	            		$("#previewDiv").css("display", "block");
						$("#previewMain").css("display", "block");
					}					
				}
			);			
		}
		reader.readAsDataURL(this.files[0]);		
	}
);

$("#hidenCrop").click(
	function() {
		$("#previewDiv").css("display", "none");
		$("#previewMain").css("display", "none");
	}
);

$("#cropButton").click(
	function() {
		var srcImg = $("#imagePreview").attr('src');
		var ratio = $("#imagePreview").attr('ratio');
		var username = $("#usernameJS").text();

		var imagePreviewTop = $("#imagePreview").position().top;
		var imagePreviewLeft = $("#imagePreview").position().left;
		var cropToolTop = $("#cropTool").position().top;
		var cropToolLeft = $("#cropTool").position().left;

		var cropStartX = cropToolLeft - imagePreviewLeft ;
		var cropStartY = cropToolTop - imagePreviewTop;

		var cropToolWidth = $("#cropTool").width();
		var cropToolHeight = $("#cropTool").height();
		// $("#avatarShow").attr('src', "Image/defaultAvatar.jpg");

		$.post("Update/crop.php", {username: username, srcImg: srcImg, cropStartX: cropStartX,
				 cropStartY:  cropStartY, cropToolWidth: cropToolWidth, 
				 cropToolHeight: cropToolHeight, ratio: ratio}, function(data){
			d = new Date();
			$("#avatarShow").attr("src", "Image/Avatar/" + username + ".png?"+d.getTime());							
			$("#previewDiv").css("display", "none");
			$("#previewMain").css("display", "none");
		});
		
	}
);
	