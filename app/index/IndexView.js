const IndexView = Marionette.CompositeView.extend({
    template: 'index',
    initialize(options) {
        this.views = options.di.views;
        this.regionManager = new options.di.regionManager();
        this.playerDataProvider = options.di.playerDataProvider;
    },
    onRender() {
        this.createRegions();
        this.renderViews();
        console.log(this.playerDataProvider());
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
