module.exports = function(grunt) {
  require("load-grunt-tasks")(grunt);
  grunt.loadNpmTasks('grunt-nunjucks');
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Project configuration.
  grunt.initConfig({
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
    },
    nunjucks: {
        precompile: {
            baseDir: 'app/ui/templates',
            src: 'app/ui/templates/*',
            dest: 'app/build/ui/templates.js',
            options: {
              asFunction: true
            }
        }
    }
  });

  // Default task(s).
  grunt.registerTask("default", ["sass"]);
  grunt.registerTask("build", ["sass", "nunjucks"]);
  grunt.registerTask("compile", ["nunjucks"]);
};
