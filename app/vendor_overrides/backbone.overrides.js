(function() {
    _.extend(Backbone.View.prototype,{}, {
        render: function () {
            const data = this.model || {};
            const templateName = `${this.template}.nunjucks`;
            this.el.innerHTML = nunjucks.render(templateName, data.attributes);
            return this;
        }
    });
}());
