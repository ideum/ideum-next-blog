// Load plugins
var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({ camelize: true });

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

// Default task
gulp.task('default', []);
