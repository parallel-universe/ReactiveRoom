const IndexView = Marionette.CompositeView.extend({
    template: 'index',
    initialize(options) {
        this.bodyView = options.di.bodyView;
    },
    onRender() {
        this.renderBodyView();
    },
    renderBodyView() {
        this.bodyView.setElement('.js-content');
        this.bodyView.render();
    }
});

export default IndexView;
