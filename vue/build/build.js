require('./check-versions')()

process.env.NODE_ENV = 'production'

var ora = require('ora')
var rm = require('rimraf')
var fs = require('fs')
var path = require('path')
var chalk = require('chalk')
var webpack = require('webpack')
var config = require('../config')
var webpackConfig = require('./webpack.prod.conf')

var spinner = ora('building for production...')
spinner.start()

rm(path.join(config.build.assetsRoot, config.build.assetsSubDirectory), err => {
  if (err) throw err
  webpack(webpackConfig, function (err, stats) {
    spinner.stop()
    if (err) throw err
    process.stdout.write(stats.toString({
      colors: true,
      modules: false,
      children: false,
      chunks: false,
      chunkModules: false
    }) + '\n\n')
    copyRecursiveSync(config.build.assetsRoot, '../app/webroot/vue')
    console.log(chalk.cyan('  Build complete.\n'))
    console.log(chalk.yellow(
      '  Tip: built files are meant to be served over an HTTP server.\n' +
      '  Opening index.html over file:// won\'t work.\n'
    ))
  })
})


/**
 * Look ma, it's cp -R.
 * @param {string} src The path to the thing to copy.
 * @param {string} dest The path to the new copy.
 */
var copyRecursiveSync = function(src, dest) {
  var exists = fs.existsSync(src);
  var stats = exists && fs.statSync(src);
  var isDirectory = exists && stats.isDirectory();
  if (exists && isDirectory) {
    fs.mkdirSync(dest);
    fs.readdirSync(src).forEach(function(childItemName) {
      copyRecursiveSync(path.join(src, childItemName),
                        path.join(dest, childItemName));
    });
  } else {
    fs.linkSync(src, dest);
  }
};