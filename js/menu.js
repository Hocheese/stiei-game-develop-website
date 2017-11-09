var menu = document.getElementById("_menu");
document.oncontextmenu = function(ev) {
    var oEvent = ev || event;
    //自定义的菜单显示 
    menu.style.display = "block";
    //让自定义菜单随鼠标的箭头位置移动
    menu.style.left = oEvent.clientX + "px";
    menu.style.top = oEvent.clientY + "px";
    //return false阻止系统自带的菜单，
    //return false必须写在最后，否则自定义的右键菜单也不会出现    
    return false;
};
//实现点击document，自定义菜单消失
document.onclick = function() {
    menu.style.display = "none";
};