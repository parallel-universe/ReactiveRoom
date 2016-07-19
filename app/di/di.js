import Router from 'Router';
import IndexView from 'IndexView';
import TerminalView from 'TerminalView';
import RegionManager from 'RegionManager';
import Interpreter from 'Interpreter';
import playerDataProvider from 'playerDataProvider';
import PlayerModel from 'PlayerModel';
import HelloWorldApp from 'HelloWorldApp';
import HelloWorldInterpreter from 'HelloWorldInterpreter';

const bottle = new Bottle();

bottle.service('Router', Router);
bottle.service('RegionManager', RegionManager);
bottle.service('Interpreter', Interpreter);
bottle.service('PlayerModel', PlayerModel);
bottle.service('playerDataProvider', playerDataProvider, 'PlayerModel');

bottle.factory('HelloWorldApp', function(container) {
    console.log('dd');
    return new HelloWorldApp(HelloWorldInterpreter);
});

bottle.factory('TerminalView', function(container) {
    return new TerminalView({
        di: {
            Interpreter: Interpreter,
            regionManager: RegionManager,
            HelloWorldApp: new HelloWorldApp(HelloWorldInterpreter)
        }
    });
});

bottle.factory('IndexView', function(container) {
    const TerminalView = container.TerminalView;
    return new IndexView({
        di: {
            views: {
                content: TerminalView
            },
            regionManager: RegionManager,
            playerDataProvider: playerDataProvider
        }
    });
});

export default bottle.container;
