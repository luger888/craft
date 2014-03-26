module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
   
    // Task configuration.
    concat: {
      options: {

      },
      dist: {

      }
    },
    uglify: {
      options: {

      },
      dist: {

      }
    },
      compass: {
          dist: {
              options: {
                  outputStyle: 'compressed',
                  sassDir: 'web/bundles/team/sass',
                  cssDir: 'web/bundles/team/css'
              }
          }
      },
      watch: {
          css: {
              options: {
                  spawn: false,
                  livereload: true
              },
              files: ['web/bundles/team/sass/custom.scss'],
              tasks: ['compass']

          }

      }
  });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Default task.
    grunt.registerTask('default', ['concat', 'uglify', 'watch']);

};
