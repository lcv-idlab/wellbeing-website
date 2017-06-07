var gulp = require('gulp'),
  postcss = require('gulp-postcss'),
  stylus = require('gulp-stylus'),
  sourcemaps = require('gulp-sourcemaps'),
  lost = require('lost'),
  fontMagician = require('postcss-font-magician'),
  autoprefixer = require('autoprefixer'),
  watch = require('gulp-watch'),
  browserify = require('browserify'),
  source = require('vinyl-source-stream'),
  buffer = require('vinyl-buffer')
  uglify = require('gulp-uglify'),
  gutil = require('gulp-util'),
  resolve = require('resolve');
  nano = require('cssnano');


var fs = require('fs');
var path = require('path');

//var vendorScripts = ['jquery', '@fancyapps/fancybox', 'flickity', 'animejs'];
var vendorScripts = Object.keys(require('./package').dependencies);

var styleSrc = 'src/assets/css/style.styl';
var panelStyleSrc = 'src/assets/css/panel.styl';
var styleDest = 'dist/assets/css';

var stylesPaths = [
  path.join(__dirname, 'node_modules'),
  path.join(__dirname, 'src/site/modules')
]

var jsSrc = 'src/assets/js/main.js';
var jsDest = 'dist/assets/js';

gulp.task('panelstyles', function() {
  return gulp.src(panelStyleSrc)
    .pipe(sourcemaps.init())
    .pipe(stylus({
      paths: stylesPaths,
      'include css': true
    }))
    .pipe(postcss([
      lost(),
      autoprefixer(),
      fontMagician(),
      nano({
        discardComments: {
          removeAll: true
        }
      })
    ]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(styleDest));
});

gulp.task('styles', function() {
  return gulp.src(styleSrc)
    .pipe(sourcemaps.init())
    .pipe(stylus({
      paths: stylesPaths,
      'include css': true
    }))
    .pipe(postcss([
      lost(),
      autoprefixer(),
      fontMagician(),
      nano({
        discardComments: {
          removeAll: true
        }
      })
    ]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(styleDest));
});

gulp.task('scripts:vendor', function() {
  var b = browserify({
    debug: true
  });

  vendorScripts.forEach(function(id) {
    b.require(resolve.sync(id), {
      expose: id
    });
  });

  return b.bundle()
    .pipe(source('vendor.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(uglify())
      .on('error', gutil.log)
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(jsDest));
});

gulp.task('scripts:app', function() {
  var b = browserify(jsSrc, {debug: true})
    .transform('babelify', {presets: ['es2015']});

  vendorScripts.forEach(b.external.bind(b));

  return b.bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(uglify())
      .on('error', gutil.log)
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(jsDest));
})

gulp.task('scripts', ['scripts:vendor', 'scripts:app']);

gulp.task('static', function () {
    return watch([
        'src/**/*',
        'src/**/.*/**/*',
        '!src/content/**/*',
        '!src/(assets)/**/(*.js|*.styl)'
      ], { ignoreInitial: false }, function(vinyl) {
      if(vinyl.event == 'unlink') {
        fs.unlink(vinyl.path, function(err) {
          console.log('UNLINK: ' + vinyl.path);
        });
      }
    }).pipe(gulp.dest('dist'));
});

gulp.watch('src/**/*.styl', ['styles', 'panelstyles']);
gulp.watch('src/**/*.js', ['scripts:app']);

gulp.task('default', ['static', 'scripts', 'styles', 'panelstyles']);