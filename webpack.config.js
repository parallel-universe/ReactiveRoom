module.exports = {
    entry: [
        "./app/build/entities/hardware_node/hardwareNodeCollection.js",
        "./app/build/entities/hardware_node/hardwareNodeModel.js",
        "./app/build/entities/player/playerCollection.js",
        "./app/build/entities/player/playerModel.js",
        "./app/build/entities/software/softwareCollection.js",
        "./app/build/entities/software/softwareModel.js",
        "./app/build/events/subscribers/app/testSubscriber.js",
        "./app/build/events/subscribers/ui/testSub.js",
        "./app/build/events/dispatcher.js",
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
