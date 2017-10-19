function Reme() {
    var cross = document.getElementsByClassName('cancel');
    // var hook = document.getElementsByClassName('entypo-check');

    if(document.defaultView.getComputedStyle(cross, null).color == "#db1536") {
        console.log('HelloWorld');
        document.getElementById('font_reme').style.display = "";
    }
    else {
        document.getElementById('font_reme').style.display = "none";
    }
}