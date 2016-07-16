(function() {
    _.extend(Backbone.View.prototype,{}, {
        render: function () {
            const data = this.model || {};
            const templateName = `app/ui/${this.template}`;
            this.el.innerHTML = nunjucks.render(templateName, data.attributes);
            return this;
        }
    });
}());
