// JavaScript Document
var db=openDatabase("stiei_gdt","1.0","STIET Game Develop Team",2*1024*1024);
db.transaction(function(tx){
	tx.executeSQL("CREATE TABLE IF NOT EXISTS article(title,class,text,imgid)");
});

function save(){
	tx.executeSQL("INSERT INTO(title,class,text,imgid)VALUES()")
}