const TerminalView = Marionette.ItemView.extend({
    template: 'terminal/terminalView',
    className: 'terminal',
    initialize(options) {
        this.di = options.di;
        console.log(this.di);
    },
    onShow() {
        this.initializeTerminal();
    },
    initializeTerminal() {
        this.terminal = $('.terminal').terminal(this.di.HelloWorldApp.getInterpreter(), {
            prompt: '> ', name: 'test'
        });
    }
});

export default TerminalView;
