// JavaScript Document
var basenum=0;
function whq_ajax(url,fx){
	$.getJSON(url).done(function(data){
				if(data.error==0){
					$.each(data.data,function(k,v){fx(k,v)});
				}else if(data.error==2){
					alert("不要再翻啦，没东西啦！！");
				}else{
					alert("发生错误！错误代码："+data.error+"\n 错误原因："+data.data+"\n您可以向网站技术负责人王贺青（QQ：2653591247）报告这个错误，感谢！");
				}
				
			})
basenum+=10;
}
