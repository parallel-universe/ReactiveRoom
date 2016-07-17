import Router from 'Router';
import IndexView from 'IndexView';
import TerminalView from 'TerminalView';

const bottle = new Bottle();

bottle.service('Router', Router);
bottle.service('TerminalView', TerminalView);

bottle.factory('IndexView', function(container) {
    const TerminalView = container.TerminalView;
    return new IndexView({
        di: {
            bodyView: TerminalView
        }
    });
});

export default bottle.container;
