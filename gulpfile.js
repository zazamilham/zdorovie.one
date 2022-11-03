const { src, dest, watch, parallel, series } = require('gulp');
const browserSync = require('browser-sync').create();
const scss = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const imagemin = require('gulp-imagemin');
const del = require('del');
const ftp = require('vinyl-ftp');
const gutil = require('gulp-util');

function styles() {
  return src([
    'node_modules/normalize.css/normalize.css',
    'node_modules/fullpage.js/dist/fullpage.css',
    'node_modules/@fortawesome/fontawesome-free/css/all.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/slick-carousel/slick/slick.css',
    'node_modules/sweetalert2/dist/sweetalert2.css',
    'app/scss/**/*.scss'
  ])
    .pipe(scss({ outputStyle: 'extanded' }))
    .pipe(concat('style.min.css'))
    .pipe(autoprefixer({
      overrideBrowserlist: ['last 10 version'],
      grid: true
    }))
    .pipe(dest('assets/css'))
  // .pipe(dest('./preFtp/assets/css'))
  // .pipe(browserSync.stream())
}

function scripts() {
  return src([
    // 'node_modules/jquery/dist/jquery.js',
    'node_modules/fullpage.js/vendors/scrolloverflow.js',
    'node_modules/fullpage.js/dist/fullpage.js',
    'node_modules/slick-carousel/slick/slick.js',
    'node_modules/sweetalert2/dist/sweetalert2.all.js',
    'app/js/main.js'
  ])
    .pipe(concat('main.min.js'))
    // .pipe(uglify())
    .pipe(dest('assets/js'))
  // .pipe(dest('./preFtp/assets/js'))
  // .pipe(browserSync.stream())
}



function browsersync() {
  browserSync.init({
    server: {
      baseDir: 'app/'
    }
  });
}

function images() {
  return src('app/img/**/*')
    .pipe(imagemin([
      imagemin.gifsicle({ interlaced: true }),
      imagemin.mozjpeg({ quality: 75, progressive: true }),
      imagemin.optipng({ optimizationLevel: 5 }),
      imagemin.svgo({
        plugins: [
          { removeViewBox: true },
          { cleanupIDs: false }
        ]
      })
    ]))
    .pipe(dest('assets/img'))
  // .pipe(dest('./preFtp/assets/img'))
  // .pipe(deploy())
}

function deploy() {
  var conn = ftp.create({
    host: 'ftp.h009421100.nichost.ru',
    user: 'h009421100_ftp',
    password: '9lQ6u1DPEm',
    parallel: 10,
    log: gutil.log
  });

  var globs = [
    './preFtp/**/*.*',
  ];
  return src(globs, { base: './preFtp', buffer: false })
    .pipe(conn.newer('/zdorovie.one/docs/wp-content/themes/zdravmat2/'))
    .pipe(conn.dest('/zdorovie.one/docs/wp-content/themes/zdravmat2/'))
}

function cleanPreFtp() {
  console.log('MY_LOG: cleanPreFtp is running')
  return del('./preFtp/**/*.*');
}

function watching() {
  // watch(['./*.html', './*.php']).on('change', function (path, stats) {
  //   console.log('Changes detected in file "' + path + '", ' + stats);
  //   return src(path)
  //   // .pipe(dest('./preFtp'))

  // });
  watch(['app/scss/**/*.scss'], series(styles));
  watch(['app/js/**/*.js', '!app/js/main.min.js'], series(scripts));

  // watch(['./preFtp/**/*.*'], series(deploy, cleanPreFtp));
}


exports.styles = series(styles, deploy);
exports.scripts = series(scripts, deploy);
exports.images = series(images, deploy);
exports.deploy = deploy;
exports.cleanPreFtp = cleanPreFtp;

// exports.build = series(cleanDist, build, images);
// exports.default = parallel(browsersync, watching, styles, scripts);
exports.default = parallel(watching, styles, scripts);
// exports.default = watching;