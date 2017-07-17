// include gulp
var gulp = require('gulp');

// include plug-ins
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var changed = require('gulp-changed');
var minifyHTML = require('gulp-minify-html');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var browserSync = require('browser-sync').create();


//script paths
var jsFiles = ['./js/jquery-3.1.1.min.js', './js/masonry.js',  './js/imagesloaded.js', './js/main.js'],  
    jsDest = './build/';

//style paths
var cssFiles = ['./css/normalize.css', './css/skeleton.css', './css/style.css'],  
    cssDest = './build/';

// JS hint task
gulp.task('jshint', function() {
  gulp.src('./js/main.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// JS concat, strip debugging and minify
gulp.task('minifyJS', ['jshint'], function() {
   gulp.src(jsFiles)
    .pipe(concat('main.js'))
    .pipe(gulp.dest(jsDest))
    //.pipe(rename('build.min.js'))
    //.pipe(uglify())
    .pipe(gulp.dest('./build/'));
});

// minify new or changed HTML pages
gulp.task('htmlpage', function() {
  var htmlSrc = '*.html',
      htmlDst = './build/';

  gulp.src(htmlSrc)
    .pipe(changed(htmlDst))
    .pipe(minifyHTML())
    .pipe(gulp.dest(htmlDst));
});

//gulp.task('connect', function() {
//    connect.server();
//});

gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css/'));
});

// CSS minify
gulp.task('styles', function() {
  gulp.src(cssFiles)
    .pipe(concat('style.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest(cssDest));
});

// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['styles'], function (done) {
    browserSync.reload();
    done();
});

// use default task to launch Browsersync and watch JS files
gulp.task('serve', ['minifyJS'], function () {
    // Serve files from the root of this project
    browserSync.init({
        server: {
            baseDir: "./build/"
        }
    });

    // add browserSync.reload to the tasks array to make
    // all browsers reload after tasks are complete.
    gulp.watch("sass/*.scss", ['js-watch']);
});

// default gulp task
gulp.task('default', ['htmlpage', 'sass', 'styles', 'minifyJS', 'serve'], function() {

  // watch for HTML changes
  gulp.watch('*.html', function() {
    gulp.run('htmlpage');
  });

  // watch for JS changes
  gulp.watch('./js/*.js', function() {
    gulp.run('minifyJS');
  });


  gulp.watch('./sass/**/*.scss', ['sass']);

  // watch for CSS changes
  gulp.watch('./css/*.css', function() {
    gulp.run('styles');
  });

});



