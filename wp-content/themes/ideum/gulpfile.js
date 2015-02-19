// Load plugins
var gulp = require('gulp'),
    rubySass = require('gulp-ruby-sass'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    bowerFiles = require('main-bower-files'),
    browserify = require('browserify'),
    source = require('vinyl-source-stream'),
    filter = require('gulp-filter');

/////////////////
// Stylesheets //
/////////////////

// Compile the stylesheets
gulp.task('stylesheets', function () {
  return gulp.src('stylesheets/**/*.scss')
    .pipe(rubySass({
      loadPath: 'bower_components',
      sourcemapPath: './stylesheets',
      style: 'expanded'
    }))
    .pipe(gulp.dest('./'));
});

/////////////////
// Javascripts //
/////////////////

// Run jshint on the scripts
gulp.task('lint', function () {
  return gulp.src('javascripts/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

gulp.task('vendor_javascripts', function () {
  return gulp.src(bowerFiles())
    .pipe(filter('**/*.js'))
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('./js/'));
});

// Compile the scripts
gulp.task('javascripts', ['lint', 'vendor_javascripts'], function () {
  return browserify('./javascripts/site.js')
    .bundle()
    .pipe(source('site.js'))
    .pipe(gulp.dest('./js/'));
});

///////////////
// Utilities //
///////////////

// Build
gulp.task('build', ['javascripts', 'stylesheets']);

// Watch for changes
gulp.task('watch', ['build'], function () {
  gulp.watch('javascripts/**/*.js', ['javascripts']);
  gulp.watch('stylesheets/**/*.scss', ['stylesheets']);
});

// Default task
gulp.task('default', ['build']);
