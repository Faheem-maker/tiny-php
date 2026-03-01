(function initUi() {
    class Ui {
    register(name, obj) {
        this[name] = obj;
    }
    unregister(name) {
        delete this[name];
    }
}

    window.Ui = new Ui();
})();