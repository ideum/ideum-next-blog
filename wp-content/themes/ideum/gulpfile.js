// Load plugins
var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({ camelize: true })
    browserify = require('browserify')
    source = require('vinyl-source-stream');

/////////////////
// Stylesheets //
/////////////////

// Compile the stylesheets
gulp.task('stylesheets', function () {
  return gulp.src('stylesheets/**/*.scss')
    .pipe(plugins.rubySass({
      loadPath: 'bower_components',
      sourcemap: true,
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
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('default'))
});

// Compile the scripts
gulp.task('javascripts', ['lint'], function () {
  return browserify('./javascripts/site.js')
    .bundle()
    .pipe(source('site.js'))
    .pipe(gulp.dest('./js'));
});

// Default task
gulp.task('default', []);
