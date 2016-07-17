const TerminalView = Marionette.ItemView.extend({
    template: 'terminal/terminalView',
    initialize() {
        console.log('termView');
    },
    onRender() {
        this.initializeTerminal();
    },
    initializeTerminal() {
        $('#terminal').terminal(function (command, terminal) {
            terminal.echo(`you typed: ${command}!`);
        }, {prompt: '> ', name: 'test'});
    }
});

export default TerminalView;
