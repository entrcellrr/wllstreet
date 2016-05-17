//var height = $(document).height()-9;
var height = "854px";
var server_path = "../server/";
var broker_id = 1;

$("#container").css("height",height);
$("#left").css("height",height);
$("#right").css("height",height);

$("body").animate({
		opecity: 1
	},1000,function() {
		brokerUpdate();
		shareUpdate();
});

function brokerUpdate() {
	$("#broker6").fadeOut(1200, function() {
		$("#broker1").hide();
		$("#broker6").show();
		for(i=6;i>1;i--) {
			var a = "#broker" + i;
			var b = "#broker" + (i-1);
			$(a).html($(b).html());			
		}
		//load
		$("#broker1").fadeIn(800);
	});
}

//share fields update
//shareUpdate();
function shareUpdate() {
	for(i=1;i<11;i++) {
		$("#share" + i).load(server_path + "stocks/share" + i + ".php", function() {
			$(this).prepend("Rs.");
		});
	}
	$("body").animate({
			opecity: 1
		},5000,function() {
			shareUpdate();
	});
}
//ends

$('.initial').each(function() {
    var default_value = this.value;
    $(this).focus(function() {
        if(this.value == default_value) {
            this.value = '';
        }
    });
    $(this).blur(function() {
        if(this.value == '') {
            this.value = default_value;
        }
    });
});

$(".buy .buy-details .buy-share-select1").css("background-color", "rgb(220,220,220)");
$(".buy .buy-details .buy-share-select1").click(function() {

	$(".buy .buy-details .buy-share-select1").css("background-color", "rgb(220,220,220)");
	$("#buy-share-select-value1").attr("value", $(this).attr("id"));
	$(this).css("background-color", "rgb(180,180,180)");
});

$(".buy .buy-details .buy-share-select2").css("background-color", "rgb(220,220,220)");
$(".buy .buy-details .buy-share-select2").click(function() {
	$(".buy .buy-details .buy-share-select2").css("background-color", "rgb(220,220,220)");
	$("#buy-share-select-value2").attr("value", $(this).attr("id"));
	$(this).css("background-color", "rgb(180,180,180)");
});

$(".buy .buy-details .buy-share-select3").css("background-color", "rgb(220,220,220)");
$(".buy .buy-details .buy-share-select3").click(function() {
	$(".buy .buy-details .buy-share-select3").css("background-color", "rgb(220,220,220)");
	$("#buy-share-select-value3").attr("value", $(this).attr("id"));
	$(this).css("background-color", "rgb(180,180,180)");
});

$(".buy-submit").click(function() {
	var x = $(this).attr("id");
	x = x[10];
	var user = $("#buy-user-id" + x).attr("value");
	var share = $("#buy-share-select-value" + x).attr("value");
	
	var number = $("#buy-number-of-shares" + x).attr("value");
	if("user id" != user) {
		if("" != share) {
			if("number of shares" != number) {
				if(share[24] == '0')
					share = share[25];
				else share = 1 + share[25];
				$("#buy-pop-up" + x).load(server_path + "stocks/buy.php/?user=" + user + "&share=" + share + "&number=" + number + "&x=" + x + "&broker=" + broker_id);
			}
			
		}
	}
});

$(".hide").click(function() {
    $(this).parent().hide();
});

$(".sell-submit").click(function() {
	var x = $(this).attr("id");
	x = x[11]; 
	var user = $("#sell-user-id" + x).attr("value");
	$("#sell-user-id-store" + x).attr("value", user);
	if("user id" != user) {
		$("#blank" + x).load(server_path + "stocks/details.php/?user=" + user + "&x=" + x);
	}
});

$(".sell-sell-go1").click(function() {
	var user = $("#sell-user-id-store1").attr("value");
	var x = $(this).attr("id");
	var number = $("#sell-sell-number1" + x[12] + x[13]).attr("value");
	if(x[12] == '0')
		x = x[13];
	else x = 1 + x[13];
	$("#sell-pop-up1").load(server_path + "stocks/sell.php/?user=" + user + "&share=" + x + "&number=" + number + "&x=" + 1 + "&broker=" + broker_id);

});
$(".sell-sell-go2").click(function() {
	var user = $("#sell-user-id-store2").attr("value");
	var x = $(this).attr("id");
	var number = $("#sell-sell-number2" + x[12] + x[13]).attr("value");
	if(x[12] == '0')
		x = x[13];
	else x = 1 + x[13];
	$("#sell-pop-up2").load(server_path + "stocks/sell.php/?user=" + user + "&share=" + x + "&number=" + number + "&x=" + 2 + "&broker=" + broker_id);
});
$(".sell-sell-go3").click(function() {
	var user = $("#sell-user-id-store1").attr("value");
	var x = $(this).attr("id");
	var number = $("#sell-sell-number2" + x[12] + x[13]).attr("value");
	if(x[12] == '0')
		x = x[13];
	else x = 1 + x[13];
	$("#sell-pop-up3").load(server_path + "stocks/sell.php/?user=" + user + "&share=" + x + "&number=" + number + "&x=" + 3 + "&broker=" + broker_id);
});

$(".try-submit").click(function() {
	var x = $(this).attr("id");
	x = x[10];
	var user = $("#buy-user-id" + x).attr("value");
	var share = $("#buy-share-select-value" + x).attr("value");
	var number = $("#buy-number-of-shares" + x).attr("value");
	if("user id" != user) {
		if("" != share) {
			if("number of shares" != number) {
				if(share[24] == '0')
					share = share[25];
				else share = 1 + share[25];
				$("#buy-pop-up" + x).load(server_path + "stocks/pending.php/?user=" + user + "&share=" + share + "&number=" + number + "&x=" + x + "&broker=" + broker_id);
			}
		}
	}
});