//---------------------------------------------------------------------------
// ファイル読み込み
//---------------------------------------------------------------------------
var
  gulp = require('gulp'),

  // Configファイルを読みます。
  config = require('./gulpconfig'),
  browserSync = require('browser-sync');

//---------------------------------------------------------------------------
// BROWSER SYNC
//---------------------------------------------------------------------------

gulp.task('server', function () {
  return browserSync.init(
    config.server
  );
});

//---------------------------------------------------------------------------
// Watch
//---------------------------------------------------------------------------
gulp.task('watch:code', function () {

  // https://github.com/BrowserSync/browser-sync/issues/711
  function reload (done) {
    browserSync.reload();
    done();
  }
  gulp.watch(config.watch.code, gulp.series(reload));
});
gulp.task('watch', gulp.parallel(
  'watch:code'
));

//---------------------------------------------------------------------------
// Tasks
//---------------------------------------------------------------------------
// default

gulp.task('default', gulp.series(gulp.parallel('server', 'watch')));