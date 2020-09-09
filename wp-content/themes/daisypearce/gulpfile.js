const gulp = require('gulp');
const gulpless = require('gulp-less');
const gulpautoprefixer = require('gulp-autoprefixer');
const concat = require("gulp-concat");

const srcfile = './less/app.less';
 
gulp.task('less', function() {    
    return gulp
        .src(srcfile)
        .pipe(gulpless())
        .pipe(concat("style.css"))
        .pipe(gulpautoprefixer())
        .pipe(gulp.dest("./"))
    });

gulp.task('watch', function() {
    gulp.watch('./less/**/*.less',  gulp.parallel(['less']));  // Watch all the .less files, then run the less task
});


gulp.task('default', gulp.parallel('watch'));
