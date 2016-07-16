import TerminalView from 'TerminalView.js';
import playerService from 'playerService.js';
import testSub from 'testSub.js';

(function() {
    console.log(playerService());
    const terminalView = new TerminalView({
        el: '.js-container',
        model: new Backbone.Model({stamp: 'number'})
    });
    console.log(terminalView);
    terminalView.render();
}());
