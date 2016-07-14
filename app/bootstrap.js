import application from 'application.js';
import TerminalView from 'terminalView.js';
import testSub from 'testSub.js';

(function() {
    const number = Date.now() / Math.floor(Math.random() * (500 - 1 + 1)) + 1;
    const terminalView = new TerminalView({
        el: '.js-container',
        model: new Backbone.Model({stamp: number})
    });
    console.log(terminalView);
    terminalView.render();
    console.log(Backbone.View.prototype.render);
    console.log(terminalView);
}());
