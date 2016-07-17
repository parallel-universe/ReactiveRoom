module.exports = function(grunt) {
    require("load-grunt-tasks")(grunt);
    grunt.loadNpmTasks('grunt-nunjucks');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Project configuration.
    grunt.initConfig({
        watch: {
            styles: {
                files: ['**/*.scss'],
                tasks: ["concat", "sass"],
                options: {
                    spawn: false,
                },
            },
            templates: {
                files: ['**/*.nunjucks'],
                tasks: ["nunjucks"],
                options: {
                    spawn: false,
                },
            },
        },
    concat: {
        dist: {
            src: [
                '**/*.scss',
            ],
            dest: 'app/build/styles.scss',
        }
    },
    sass: {
        dist: {
            options: {
                style: 'expanded'
            },
            files: [{
                expand: true,
                cwd: 'app/build',
                src: 'styles.scss',
                dest: 'app/build',
                ext: '.css',
            }]
        }
    },
    nunjucks: {
        precompile: {
            baseDir: 'app',
            src: '**/*.nunjucks',
            dest: 'app/build/templates.js',
            options: {
              asFunction: true
            }
        }
    }
  });

    // Default task(s).
    grunt.registerTask("default", ["sass"]);
    grunt.registerTask("build", ["concat", "sass", "nunjucks"]);
    grunt.registerTask("compile", ["nunjucks"]);
};
