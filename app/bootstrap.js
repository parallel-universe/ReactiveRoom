import di from 'di.js'

(function(Router) {
    document.addEventListener("DOMContentLoaded", function(event) { 
        const applicationRouter = Router;
        Backbone.history.start();
    });
}(di.Router));
