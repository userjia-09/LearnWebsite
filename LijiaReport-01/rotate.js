$(function(){
	var timeOut = function(){
		$("#lotteryBtn").rotate({
			angle: 0,
			duration: 10000,
			animateTo: 2160,
			callback:function(){
				alert('timeout')
			}
		});
};

var rotateFunc = function(awards,angle,text){
	$('#lotteryBtn').stopRotate();
	$('#lotteryBtn').rotate({
		angle: 0,
		duration: 5000,
		animateTo: angle+1440,	//spin 4 rounds
		callback:function(){
			alert(text)
		}

	});
};

$('#lotteryBtn').rotate({
	bind:
	{
		click:function(){
			var time = [0,1];
			time = time[Math.floor(Math.random()*time.length)];
			if(time == 0){
				timeOut();
			}
			if(time == 1){
				var data = [1,2,3,0];
				data = data[Math.floor(Math.random()*data.length)];
				if(data == 1){
					rotateFunc(1,157,'Congratulations for the first prize')
				}
				if(data == 2){
					rotateFunc(2,247,'Congratulations for the second prize')
				}
				if(data == 3){
					rotateFunc(3,22,'Congratulations for the third prize')
				}
				if(data == 0){
					var angle = [67,112,202,292,337];
					angle = angle[Math.floor(Math.random()*angle.length)]
					rotateFunc(0,angle,'No prize')
				}
			}
		}
	}
});
})