function uum(id) {
    ccm.call(this.id);
};

for(var i in ccm.prototype) {
    uum.prototype[i] = ccm.prototype[i];
};