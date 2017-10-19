function ccm(id) {
    var _this = this;

    this.disX = 0;
    this.disY = 0;
    this.oDiv = document.getElementById(id);
    this.oDiv.onmousedown = function(ev) {
        _this.fnDown(ev);
    };
};
ccm.prototype.fnDown = function(ev) {
    var _this = this;
    var oEvent = ev || event;

    this.disX = oEvent.clientX - this.oDiv.offsetLeft;
    this.disY = oEvent.clientY - this.oDiv.offsetTop;

    document.onmousemove = function(ev) {
        _this.fnMove(ev);
        
        return false;
    };
    document.onmouseup = function() {
        _this.fnUp();
    };
};
ccm.prototype.fnMove = function(ev) {
    var oEvent = ev || event;
    var l = oEvent.clientX - this.disX;
    var t = oEvent.clientY - this.disY;

    if(l < 0) {
        l = 0
    }
    else if(l > document.documentElement.clientWidth - this.oDiv.offsetWidth) {
        l = document.documentElement.clientWidth - this.oDiv.offsetWidth;
    }

    this.oDiv.style.left = l + 'px';
    this.oDiv.style.top = t + 'px';

    // this.oDiv.style.left = oEvent.clientX - this.disX + 'px';
    // this.oDiv.style.top = oEvent.clientY - this.disY + 'px';
};
ccm.prototype.fnUp = function() {
    document.onmousemove = null;
    document.onmouseup = null;
};