import Router from 'Router';
import IndexView from 'IndexView';
import TerminalView from 'TerminalView';
import RegionManager from 'RegionManager';

const bottle = new Bottle();

bottle.service('Router', Router);
bottle.service('TerminalView', TerminalView);
bottle.service('RegionManager', RegionManager);

bottle.factory('IndexView', function(container) {
    const TerminalView = container.TerminalView;
    return new IndexView({
        di: {
            views: {
                content: TerminalView
            },
            regionManager: RegionManager
        }
    });
});

export default bottle.container;
