var gulp 		= require('gulp'),
	sass 		= require('gulp-sass'),
	livereload 	= require('gulp-livereload');


gulp.task('sass', function(){
	return gulp.src('sass/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('./'))
		.pipe(livereload());
});

gulp.task('default', ['sass', ], function(){

	livereload.listen();
	gulp.watch('sass/*.scss', ['sass']);

});