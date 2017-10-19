function $(d) {
    return document.getElementById(d);
};

function smation() {
    $("bar").style.width = parseInt($("bar").style.width) + 1 + "%";
    $("bar").innerHTML = $("bar").style.width;
    if($("bar").style.width == "100%") {
        document.getElementById("dian_Ci").style.fontWeight = "bold";
        document.getElementById("dian_Ci").innerHTML = "电磁炮加载成功!";
        window.clearInterval(bar);
        document.getElementById("crewLogin").style.cssFloat = "left";
        document.getElementById("crewLogin").style.marginLeft = "20%";
        document.getElementById("tourLogin").style.marginLeft = "60%";
        document.getElementById("crewLogin").style.marginTop = "10%";
        document.getElementById("tourLogin").style.marginTop = "10%";
        document.getElementById("crewLogin").style.display = "block";
        document.getElementById("tourLogin").style.display = "block";
    }
};

var bar = setInterval(function() {
    smation();
}, 50);

window.onload = function() {
    bar;
};