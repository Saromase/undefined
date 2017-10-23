var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    exec = require('child_process').exec;

function swallowError(error) {

    console.log(error.toString());

    this.emit('end')
}

gulp.task('sass-dev', function () {
    gulp.src('./web/assets/sass/master.scss')
        .pipe(sass({sourceComments: 'map'}))
        .on('error', swallowError)
        .pipe(gulp.dest('./web/assets/gulp/css/'));
});

gulp.task('sass-prod', function () {
    gulp.src('./web/assets/sass/master.scss')
        .pipe(sass({sourceComments: 'map'}))
        .pipe(cleanCSS({compatibility: 'ie8', processImportFrom: ['!fonts.googleapis.com']}))
        .on('error', swallowError)
        .pipe(gulp.dest('./web/assets/gulp/css/'));
});

var livereload = require('gulp-livereload');

gulp.task('watch', function () {
    var onChange = function (event) {
        console.log('File ' + event.path + ' has been ' + event.type);

        gulp.task('reload', ['installAssets', 'sass-dev']);

        // Tell LiveReload to reload the window
        livereload.changed(event.path);
    };
    // Starts the server
    livereload.listen();
    gulp.watch('./web//sass/**/*.scss', ['sass-dev']).on('change', onChange);
});

gulp.task('installAssets', function () {
    exec('php bin/console assets:install --symlink', function (err, stdout, stderr) {
        console.log(stdout + stderr);
    });
});

gulp.task('default', ['sass-dev']);

gulp.task('dev', ['sass-dev']);

gulp.task('prod', ['sass-prod']);
