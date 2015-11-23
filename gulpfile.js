var gulp 		= require('gulp');
var browserSync = require('browser-sync');
var reload 		= browserSync.reload;
var sass 		= require('gulp-sass');

gulp.task('browser-sync', ['sass'], function(){

	var files = [
		'styles.css',
		'*.php'
	];
	
	browserSync.init(files, {
		ui: {
			port: 8000,
		},

		proxy: "http://certificate-system:8888/"
	});
});

gulp.task('sass', function(){
	return gulp.src('sass/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('./'))
		.pipe(reload({stream:true}));
});

gulp.task('default', ['sass', 'browser-sync'], function(){
	var files = [
		'*.php',
		'includes/*.php',
		'js/*.js',
		'plugins/login-with-ajax/*.php',
		'templates/*.php'
	];

	gulp.watch('sass/*.scss', ['sass']);

	gulp.watch(files).on('change', reload);

});