// JavaScript Document
//定义全局变量
var title=new Array();
title[0]="1.樱花粉 高雅可爱 限时抢购！";
title[1]="2.魅族更新了Flyme 6稳定版！";
title[2]="3.魅族 拍得漂亮 用得持久！";
title[3]="4.店庆钜献 银灰大气 玫金高端！";
title[4]="5.魅族拥有里壳 防指纹 防水印设计!";
var NowFrame = 1;   //最先显示第一张图片
var MaxFrame = 5;   //一共五张图片
function show(d1) {
	if(Number(d1)){
		clearTimeout();  //当触动按扭时，清除计时器
		NowFrame=d1;                //设当前显示图片
		}
	for(var i=1;i<(MaxFrame+1);i++){
		if(i==NowFrame){
			
			document.getElementById("Rotator").src ="images/adRotator_"+i+".jpg";   //显示当前图片
			document.getElementById("fig_"+i).innerHTML=title[i-1];       //显示当前图片对应的标题
			document.getElementById("fig_"+i).className="numberOver";    //设置当前标题的CSS样式
         }
		 else{
		 document.getElementById("fig_"+i).innerHTML=i;
		 document.getElementById("fig_"+i).className="number";
		 }
	}
	if(NowFrame == MaxFrame){   //设置下一个显示的图片
		NowFrame = 1;
		}
	else{
		NowFrame++;
		}
}
var theTimer=setInterval('show()', 3000);   //设置定时器，显示下一张图片
window.onload=show;    //页面加载时运行函数show()