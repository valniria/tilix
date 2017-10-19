var gulp = require('gulp'),
	browser  = require('browser-sync').create();


gulp.task('server', function(){
	browser.init({
        server: {
            baseDir: "./"
        }
    });

    gulp.watch("**/*.js", [browser.reload]);
});