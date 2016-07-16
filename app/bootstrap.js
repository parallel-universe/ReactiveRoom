import TerminalView from 'terminalView.js';
import playerService from 'playerService.js';
import testSub from 'testSub.js';

(function() {
    console.log(playerService());
    const terminalView = new TerminalView({
        el: '.js-container',
        model: new Backbone.Model({stamp: 'number'})
    });
    terminalView.render();
}());
