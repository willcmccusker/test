// Gruntfile.js

// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function (grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({



    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.name)
    pkg: grunt.file.readJSON('package.json'),

        uglifyFiles : {
          'dist/js/app.min.js': [
            // 'src/js/zepto.min.js',
            // 'node_modules/big.js/big.min.js',
            'src/js/jquery-3.1.0.min.js',
            // 'src/js/jquery.easyListSplitter.ignore.js',
            // 'src/js/headroom.min.js',
            // 'src/js/jquery.onscreen.min.js',
            // 'src/js/leaflet.min.js',
            // 'src/js/mapbox.standalone.js',
            // 'topojson.min.js',
            // 'mapbox.ignore.js',
            // 'src/js/plotly.min.js',
            // 'src/js/d3.min.js',
            // 'src/js/chartist.min.js',
            // 'src/js/plottable.min.js',

            // 'src/js/stupidtable.min.js',
            // 'src/js/jquery.waypoints.min.js',
            // 'src/js/chart.ignore.js',
            // 'src/js/Chart.Deferred.min.js',
            // 'src/js/Chart.bundle.min.js',
            'src/js/list.ignore.js',
            'src/js/list.pagination.min.js',
            'src/js/ap.js'
            // 'src/js/app.js'
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
              mangle: true,
              compress: true,
              wrap: true,
              sourceMap: false,
              banner: '/*\n <%= pkg.name %>-dist <%= pkg.version %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
            },
            files: "<%= uglifyFiles %>"
          }
        },
        browserSync: {
          default_options: {
            bsFiles: {
              src: [
                '../../**/*.php',
                '../../**/*.ctp',
                '../../**/*.html',
                "dist/js/app.min.js",
                "dist/css/style.css"
              ]
            },
            options: {
              watchTask: true,
              open: true,
              proxy: 'atlas.dev',
              port: '9000'
            }
          }
        },
        clean: ['dist/js/*', 'dist/css/*'],
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')
                ]
            },
            dist: {
                files: {
                    'dist/css/style.css': 'dist/css/style.css'
                }
            }
        },
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
          style: {
            files: ['src/sass/*.scss'],
            tasks: ['compass', 'postcss']
          },
          app: {
            files : [ 'src/js/*.js' ],
            tasks: [ 'uglify:dev']
          }
        }
  });

  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // we can only load these if they are in our package.json
  // make sure you have run npm install so our app can find these
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('default', ['browserSync', 'watch']);
  grunt.registerTask('dist', [ 'clean', 'uglify:dist', 'compass', 'postcss']);

};
