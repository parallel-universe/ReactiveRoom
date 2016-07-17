const IndexView = Marionette.CompositeView.extend({
    template: 'index',
    initialize(options) {
        this.views = options.di.views;
        this.regionManager = new options.di.regionManager();
    },
    onRender() {
        this.createRegions();
        this.renderViews();
    },
    createRegions() {
        this.regionManager.addRegion('content', '.js-content');
    },
    renderViews() {
        for (const view in this.views) {
            const region = this.regionManager.get(view);
            if (region) {
                region.show(this.views[view]);
            }
        }
    }
});

export default IndexView;
