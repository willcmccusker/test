// Gruntfile.js

// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function(grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({



    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.name)
    pkg: grunt.file.readJSON('package.json'),

    // configure jshint to validate js files -----------------------------------
        jshint: {
          options: {
            multistr : true,
            reporter: require('jshint-stylish') // use jshint-stylish to make our errors look and read good
          },
          // when this task is run, lint the Gruntfile and all js files in src
          build: ['Gruntfile.js', 'src/js/**.js', '!src/js/*.min.js', '!src/js/*.ignore.js', '!src/js/*.jsx']
        },
        uglifyFiles : {
          'dist/js/app.min.js': [

            'src/js/jquery-3.1.0.min.js', 


            // 'leaflet.min.js',
            'topojson.min.js',
            // 'mapbox.ignore.js',
            // 'src/js/plotly.min.js',
            // 'src/js/d3.min.js',
            // 'src/js/chartist.min.js',
            // 'src/js/plottable.min.js',

            // 'src/js/stupidtable.min.js',
            'src/js/jquery.waypoints.min.js',
            //'src/js/chart.ignore.js',
            'src/js/Chart.bundle.min.js',
            'src/js/list.ignore.js',
            'src/js/list.pagination.min.js',

            'src/js/app.js',
          ]
        },
        uglify: {
          dev : {
            options: {
              mangle: false,
              compress: false,
              beautify : false,
              wrap: false,
              sourceMap: true,
              banner: '/*\n <%= pkg.name %>-dev <%= pkg.version %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
            },
            
            files: "<%= uglifyFiles %>"
          
          },
          dist: {
            options: {
              mangle: false,
              compress: false,
              wrap: false,
              sourceMap: false,
              banner: '/*\n <%= pkg.name %>-dist <%= pkg.version %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
            },
            
            files: "<%= uglifyFiles %>"
            
          }
        },
        clean: ['dist/js/*', 'dist/css/*'],
        compass: {
          options: {
            sassDir: 'src/sass',
            cssDir: 'dist/css',
            outputStyle: 'compressed',
            relativeAssets: true,
            debugInfo: false,
            watch: false,
            sourcemap: true
          },
          build: {
            files: {
              'dist/css/style.css': 'src/sass/style.scss'
            }
          }
        },
        watch: {
          files: ['src/sass/*.scss'],
          tasks: ['compass'],
          scripts: {
            files : [ 'src/js/*.js'],
            tasks: ['jshint', 'uglify:dev']
          }
        },
  });

  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // we can only load these if they are in our package.json
  // make sure you have run npm install so our app can find these
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');

  grunt.registerTask('dev', [  'clean', 'jshint', 'uglify:dev', 'compass']); 
  grunt.registerTask('dist', [ 'clean', 'uglify:dist', 'compass']); 

};
