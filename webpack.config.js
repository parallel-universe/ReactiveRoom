module.exports = {
    entry: [
        "./app/entities/hardware_node/hardwareNodeCollection.js",
        "./app/entities/hardware_node/hardwareNodeModel.js",
        "./app/entities/player/playerCollection.js",
        "./app/entities/player/playerModel.js",
        "./app/entities/software/softwareCollection.js",
        "./app/entities/software/softwareModel.js",
        "./app/events/subscribers/app/testSubscriber.js",
        "./app/events/subscribers/ui/testSub.js",
        "./app/events/dispatcher.js",
        "./app/ui/application.js",
        "./app/ui/views/terminal/terminalView.js",
        "./app/di.js",
        "./app/bootstrap.js"
    ],
    output: {
        path: './app/build',
        filename: "bundle.js"
    },
    loaders: [
    {
      test: /\.js$/,
      exclude: /(node_modules|bower_components)/,
      loader: 'babel', // 'babel-loader' is also a legal name to reference
      query: {
        presets: ['es2015']
      }
    }
  ]
};
