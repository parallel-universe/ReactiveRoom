import di from 'di';

export default Backbone.Router.extend({
    routes: {
        '': 'index',
    },
    index() {
        const indexView = di.IndexView;
        indexView.setElement('.js-container');
        indexView.render();
    }
});
