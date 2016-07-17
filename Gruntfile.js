module.exports = function(grunt) {
    require("load-grunt-tasks")(grunt);

    // Project configuration.
    grunt.initConfig({
        watch: {
            styles: {
                files: ['variables.scss', '**/*.scss'],
                tasks: ["sass"],
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
    sass: {
        dist: {
            options: {
                style: 'expanded'
            },
            files: [{
                expand: true,
                cwd: 'app',
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
    grunt.registerTask("build", ["sass", "nunjucks"]);
    grunt.registerTask("compile", ["nunjucks"]);
};
