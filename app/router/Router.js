import TerminalRepository from 'TerminalRepository.js';

export default Backbone.Router.extend({
    routes: {
        '': 'index',
    },
    index() {
        const terminalView = TerminalRepository.create();
        terminalView.setElement('.js-container');
        terminalView.render();
    }
});
