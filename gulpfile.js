const { src, dest, watch, series } = require('gulp')

// Styles packages
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')

// Scripts packages
const terser = require('gulp-terser')

// Global packages
const browserSync = require('browser-sync').create()
const rename = require('gulp-rename')
const concat = require('gulp-concat')

// Styles
function styles() {
  return src('app/assets/styles/main.scss', { sourcemaps: true })
    .pipe(
      sass({
        errLogToConsole: true,
        onError: browserSync.notify,
        outputStyle: 'compressed',
      })
    )
    .pipe(autoprefixer())
    .pipe(rename('styles.css'))
    .pipe(dest('app/dist', { sourcemaps: '.' }))
    .pipe(browserSync.stream())
}

// Scripts
function scripts() {
  const jsPath = {
    jquery: 'app/assets/scripts/libs/jquery.min.js',
    popper: 'app/assets/scripts/libs/popper.min.js',
    owl: 'app/assets/scripts/libs/owl.caroursel.min.js',
    bootstrap: 'app/assets/scripts/libs/bootstrap.min.js',
    app: 'app/assets/scripts/app.js',
  }
  return src([jsPath.jquery, jsPath.popper, jsPath.owl, jsPath.bootstrap, jsPath.app], { sourcemaps: true })
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(dest('app/dist', { sourcemaps: '.' }))
    .pipe(browserSync.stream())
}

// BrowserٍٍٍSync Serve
function browserSyncServe(cb) {
  browserSync.init({
    server: {
      baseDir: 'app',
    },
    notify: false,
  })
  cb()
}

// BrowserSync Reload on Save
function browserSyncReload(cb) {
  browserSync.reload()
  cb()
}

// Watch Files
function watchFiles() {
  watch('app/*.html', browserSyncReload)
  watch(['app/assets/styles/**/*.scss', 'app/assets/scripts/**/*.js'], series(styles, scripts, browserSyncReload))
}

// Default Gulp Task
exports.default = series(styles, scripts, browserSyncServe, watchFiles)