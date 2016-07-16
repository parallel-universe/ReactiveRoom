var path = require('path');

module.exports = {
    entry: [
        "./app/hardware/hardwareCollection.js",
        "./app/hardware/hardwareModel.js",
        "./app/player/playerCollection.js",
        "./app/player/playerModel.js",
        "./app/player/playerService.js",
        "./app/software/softwareCollection.js",
        "./app/software/softwareModel.js",
        "./app/events/subscribers/app/testSubscriber.js",
        "./app/events/subscribers/ui/testSub.js",
        "./app/events/dispatcher.js",
        "./app/ui/views/terminal/terminalView.js",
        "./app/backbone.overrides.js",
        "./app/di.js",
        './app/bootstrap.js'
    ],
    output: {
        path: './app/build',
        filename: "bundle.js"
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
