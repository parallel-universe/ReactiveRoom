module.exports = function(grunt) {
  require("load-grunt-tasks")(grunt);
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Project configuration.
  grunt.initConfig({
    babel: {
      options: {
        sourceMap: true
      },
      dist: {
        files: [{
            expand: true,
            cwd: 'app',
            src: [
              'entities/**/*.js',
              'ui/**/*.js',
              'events/**/*.js'
            ],
            dest: 'app/build',
            ext: '.js'
        }]
      }
    },
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: [{
            expand: true,
            cwd: 'app',
            src: [
              'ui/**/*.scss'
            ],
            dest: 'app/build',
            ext: '.css'
        }]
      }
    }
  });

  // Default task(s).
  grunt.registerTask("default", ["babel"]);
  grunt.registerTask("build", [
    "babel",
    "sass"
    ]);
};
