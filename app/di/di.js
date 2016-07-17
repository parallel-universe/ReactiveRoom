import Router from 'Router';
import IndexView from 'IndexView';

const bottle = new Bottle();

bottle.service('Router', Router);
bottle.service('IndexView', IndexView);

export default bottle.container;
