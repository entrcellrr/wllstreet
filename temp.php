
<script type="text/javascript" src="script/jquery.js"></script>
<div class="select" id="1" style="width:10%;">12</div>
<div class="select" id="2" style="width:10%;">324</div>
<div class="select" id="3" style="width:10%;">1234</div>
<div class="select" id="4" style="width:10%;">123</div>
<div class="select" id="5" style="width:10%;">42</div>
<div class="select" id="6" style="width:10%;">34</div>
<div class="select" id="7" style="width:10%;">143</div>
<input type="hidden" id="buy-share-select1" />
<script type="text/javascript">
	$(".select").css("background-color", "rgb(220,220,220)");
	$(".select").click(function() {
		$(".select").css("background-color", "rgb(220,220,220)");
		$("#buy-share-select1").attr("value", $(this).attr("id"));
		$(this).css("background-color", "rgb(180,180,180)");
	});
</script>