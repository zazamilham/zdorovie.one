// подключаем модули
const { src, dest, watch, parallel, series } = require("gulp");
const browserSync = require("browser-sync").create();
const scss = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify-es").default;
const del = require("del");
const ftp = require("vinyl-ftp");
const gutil = require("gulp-util");
const changed = require("gulp-changed");

// обработка стилей
function styles_vendor() {
  return src([
    "node_modules/normalize.css/normalize.css",
    // 'node_modules/fullpage.js/dist/fullpage.css',
    "node_modules/@fortawesome/fontawesome-free/css/all.css",
    "node_modules/animate.css/animate.min.css",
    "node_modules/slick-carousel/slick/slick.css",
    "node_modules/sweetalert2/dist/sweetalert2.css",
    "app/assets/src/vendor/**/*.scss",
    "app/assets/src/vendor/**/*.css",
  ])
    .pipe(changed("app/assets/vendor/css"))
    .pipe(
      autoprefixer({
        overrideBrowserlist: ["last 10 version"],
        grid: true,
      })
    )
    .pipe(dest("app/assets/vendor/css"));
}

// обработка стилей
function styles_theme() {
  return (
    src(["app/assets/src/scss/**/*.scss"])
      .pipe(changed("app/assets/theme/css"))
      .pipe(scss({ outputStyle: "expanded" }).on("error", scss.logError))
      // .pipe(concat('style.css'))
      .pipe(
        autoprefixer({
          overrideBrowserlist: ["last 10 version"],
          grid: true,
        })
      )
      .pipe(dest("app/assets/theme/css"))
  );
}

// обработка скриптов
function scripts_vendor() {
  return src([
    // 'node_modules/jquery/dist/jquery.js',
    // 'node_modules/fullpage.js/vendors/scrolloverflow.js',
    // 'node_modules/fullpage.js/dist/fullpage.js',
    "node_modules/slick-carousel/slick/slick.js",
    "node_modules/sweetalert2/dist/sweetalert2.all.js",
    "app/assets/src/vendor/**/*.js",
  ])
    .pipe(changed("app/assets/vendor/js"))
    .pipe(dest("app/assets/vendor/js"));
}

// обработка скриптов
function scripts_theme() {
  return (
    src(["app/assets/src/js/**/*.js"])
      .pipe(changed("app/assets/theme/js"))
      .pipe(concat("main.js"))
      // .pipe(uglify())
      .pipe(dest("app/assets/theme/js"))
  );
}

// обновление страницы
// function browsersync() {
//   browserSync.init({
//     server: {
//       baseDir: 'app/'
//     }
//   });
// }

// выгрузка на сервер
function deploy() {
  var conn = ftp.create({
    host: "albert7g.beget.tech",
    user: "albert7g_full",
    password: "PI1%1&u4z@r50GFXq*&",
    parallel: 10,
    log: gutil.log,
  });

  var globs = ["./app/**/*.*"];
  return src(globs, { base: "./app", buffer: false })
    .pipe(conn.newer("/zdorovie.one/public_html/wp-content/themes/zdravmat2"))
    .pipe(conn.dest("/zdorovie.one/public_html/wp-content/themes/zdravmat2"));
}

// слежение за изменениями
// function watching() {
//   watch(['app/assets/src/scss/**/*.scss'], series(styles_vendor, styles_theme, deploy));
//   watch(['app/assets/src/js/**/*.js'], series(scripts_vendor, scripts_theme, deploy));
//   watch(['app/**/*.*', '!app/**/*.js', '!app/**/*.scss'], series(deploy));
// }
function watching() {
  watch(["app/assets/src/scss/**/*.scss"], series(styles_vendor, styles_theme));
  watch(["app/assets/src/js/**/*.js"], series(scripts_vendor, scripts_theme));
  watch(["app/**/*.*", "!app/**/*.js", "!app/**/*.scss"]);
}

// список функций для терминала
exports.default = parallel(
  styles_vendor,
  styles_theme,
  scripts_vendor,
  scripts_theme,
  watching
);
exports.build = parallel(
  styles_vendor,
  styles_theme,
  scripts_vendor,
  scripts_theme
);
exports.deploy = series(deploy);
