class Counter {
    text = "";

    get letters() {
        return this.text.length;
    }
    get words() {
        return this.text.split(' ').filter(s => s.trim().length > 0).length;
    }
    get sentences() {
        return this.text.split(/[.!?]+/).filter(s => s.trim().length > 0).length;
    }
    get readingTime() {
        return Math.ceil(this.text.trim().split(/\s+/).filter(word => word.length > 0).length / 200) + 'm';
    }

    clear() {
        this.text = "";
        Ui.toast.success('Text cleared');
    }
    async copy() {
        if (this.text == "") {
            Ui.toast.success('Nothing to copy');
        }
        else {
            await navigator.clipboard.writeText(this.text);
            Ui.toast.success('Copied to clipboard');
        }
    }
}