require('./check-versions')()

process.env.NODE_ENV = 'production'

var ora = require('ora')
var fs = require('fs')
var rm = require('rimraf')
var ncp = require('ncp').ncp
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
    if (err) throw err
    process.stdout.write(stats.toString({
      colors: true,
      modules: false,
      children: false,
      chunks: false,
      chunkModules: false
    }) + '\n\n')
    
    spinner.text = 'Removing old cake'    
    rm('../app/webroot/vue', err => {
      if (err) throw err
      chalk.cyan('Old cake removed.\n')
      spinner.text = 'Moving to cake'
      ncp(config.build.assetsRoot, '../app/webroot/vue', err => {
        if (err) throw err
        chalk.cyan('Moved to cake.\n')
        spinner.text = 'Renaming'
        fs.rename('../app/webroot/vue/vueheader.ctp', '../app/View/Elements/vueheader.ctp', err => {
          if (err) throw err
          chalk.cyan('Renamed vueheader.ctp.\n')
          spinner.stop()
          console.log(chalk.cyan('  Build complete.\n'))
        })
      })
    })
  })
})
