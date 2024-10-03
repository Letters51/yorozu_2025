const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');

// compile scss into css
function style() {
    //1. where is my scss
    return gulp.src('./assets/sass/**/*.scss')
        //2. pass that file through sass compileer
        .pipe(sass().on('error', sass.logError))
        //add prefixert to the css
        .pipe(autoprefixer({
            cascade: false,
            grid: true,
            flex: true
        }))
        //3. where do i save the compiled css?
        .pipe(gulp.dest('./assets/css'))
        //4.stream change to all browser
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        server: {
            baseDir: './'
        }
    });
    gulp.watch('./assets/sass/**/*.scss', style);
    gulp.watch('./**/*.html').on('change', browserSync.reload);
    gulp.watch('./assets/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;