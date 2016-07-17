var path = require('path');

module.exports = {
    entry: [
        './app/vendor_overrides/backbone.overrides.js',
        './app/bootstrap.js',
    ],
    output: {
        path: './app/build',
        filename: 'scripts.js'
    },
    resolve: {
        root: [
            path.resolve('./app/'),
            path.resolve('./app/di'),
            path.resolve('./app/hardware'),
            path.resolve('./app/terminal'),
            path.resolve('./app/player'),
            path.resolve('./app/software'),
            path.resolve('./app/network'),
            path.resolve('./app/router'),
            path.resolve('./app/events'),
            path.resolve('./app/events/subscribers'),
            path.resolve('./app/events/subscribers/app'),
            path.resolve('./app/events/subscribers/ui'),
            path.resolve('./app/vendor_overrides'),
        ],
        extensions: ['', '.js', '.json']
    },
    module: {
        loaders: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components|nunjucks.js|\.njk$)/,
          loader: 'babel',
          query: {
            presets: ['es2015']
          }
        }
      ]
    }
};
