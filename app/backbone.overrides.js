(function() {
    _.extend(Backbone.View.prototype,{}, {
        render: function () {
            const data = this.model || {};
            this.el.innerHTML = nunjucks.render(this.template, data.attributes);
            return this;
        }
    });
}());
