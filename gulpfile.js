// REQUIRES
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    imagemin = require('gulp-imagemin'),
    svgmin = require('gulp-svgmin'),
    del = require('del'),
    runSequence = require('run-sequence'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify');

// PATHS
var root = 'wp-content/themes/okie/';
var paths = {
  src: root + 'src',
  dist: root + 'dist',
  scss: root + 'src/scss',
  jssrc: root + 'src/js-src',
  imgsrc: root + 'src/img-src',
  css: root + 'dist/css',
  js: root + 'dist/js',
  img: root + 'dist/img'
};

// ERROR HANDLING
var errorHandler = {
  errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

// SASS
gulp.task('sass', function(){
  return gulp
    .src(paths.scss + '/**/*.scss')
    .pipe(sass({
      includePaths: ['node_modules/susy/sass', 'node_modules/breakpoint-sass/stylesheets']
    })
    .on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest(paths.css))
});

// JAVASCRIPT
gulp.task('javascript', function(){
  gulp.src(paths.jssrc + '/**/*')
      .pipe(uglify())
      // .pipe(concat('main.js'))
      .pipe(gulp.dest(paths.js));
});

// IMAGES TASK
gulp.task('images', function(){
  gulp.src(paths.imgsrc + '/**/*.{jpg,png,gif,ico}')
    .pipe(imagemin({
      optimizationLevel: 7,
      progressive: true
    }))
    .pipe(gulp.dest(paths.img));
  gulp.src(paths.imgsrc + '/**/*.svg')
    .pipe(svgmin())
    .pipe(gulp.dest(paths.img));
});

// CLEAN TASK
gulp.task('clean', function(){
  del([
    paths.css + '/*',
    paths.js + '/*',
    paths.img + '/*'
  ]);
});

// PRODUCTION BUILD TASK
gulp.task('build', function(buildDone){
  runSequence(
    'clean',
    'javascript',
    'images',
    'sass',
    buildDone
  );
});

// WATCH TASK
gulp.task('watch', function(){
  gulp.watch(paths.scss + '/**/*.scss', ['sass']);
  gulp.watch(paths.jssrc + '/**/*', ['javascript']);
  gulp.watch(paths.imgsrc + '/**/*', ['images']);
});

// DEFAULT TASK
gulp.task('default', function(defaultDone){
  runSequence(
    'build',
    'watch',
    defaultDone
  );
});


