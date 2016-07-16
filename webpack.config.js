var path = require('path');

module.exports = {
    entry: [
        './app/bootstrap.js',
    ],
    output: {
        path: './app/build',
        filename: 'bundle.js'
    },
    resolve: {
        root: [
            path.resolve('./app/ui'),
            path.resolve('./app/ui/scss'),
            path.resolve('./app/ui/templates'),
            path.resolve('./app/ui/views'),
            path.resolve('./app/ui/views/terminal'),
            path.resolve('./app/'),
            path.resolve('./app/hardware'),
            path.resolve('./app/player'),
            path.resolve('./app/software'),
            path.resolve('./app/network'),
            path.resolve('./app/events'),
            path.resolve('./app/events/subscribers'),
            path.resolve('./app/events/subscribers/app'),
            path.resolve('./app/events/subscribers/ui')
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
        },
        {
            test: /\.(njk|nunjucks)$/,
            loader: 'nunjucks-loader'
        }
      ]
    }
};
