var
    gulp = require('gulp'),
    sass = require('gulp-sass'), // препроцессор sass
    autoprefixer = require('gulp-autoprefixer'), // вендорные префексы css
    sourcemaps = require('gulp-sourcemaps'), // создание sourcemap
    nano = require('gulp-clean-css'), // жатие стилей
    uglify = require('gulp-uglify'), // Подключаем gulp-uglifyjs (для сжатия JS)
    concat = require('gulp-concat'), //конкатинация
    browserSync = require('browser-sync'),  // перезагрузка страницы браузера при изменении файлов
    watch = require('gulp-watch'), // наблюдение за ихменением файлов
    imagemin = require('gulp-imagemin'), // Подключаем библиотеку для работы с изображениями
    pngquant = require('imagemin-pngquant'), // Подключаем библиотеку для работы с png
    clean = require('gulp-clean'), // Удаление папок и файлов
    rename = require('gulp-rename'), // Подключаем библиотеку для переименования файлов
    cache = require('gulp-cache'), // Подключаем библиотеку кеширования
    include = require('gulp-include'),
    plumber = require('gulp-plumber');

//переменные путей
var dir = '../wp-content/themes/dds-by',
    path = {
        src: {//
            html: dir + '/src/*.*',
            css: dir + '/css/',
            sass: dir + '/sass/**/*.*',
            js: dir + '/js/',
            php: dir + '/**/*.php',
            img: dir + '/img/**/*.*',
            fonts: dir + '/fonts/**/*.*',
            folder: dir + '/',
            libsjs: dir + '/assets/js/*.js',
            libscss: dir + '/libs/css/**/*.*',
            libsdest: dir + '/libs'
        },
        dist: {
            libs: dir + '/dist/libs/',
            clean: dir + '/dist/',
            folder: dir + '/dist/',
            css: dir + '/dist/css/',
            js: dir + '/dist/js/',
            img: dir + 'dist/img',
            fonts: dir + 'dist/fonts'
        }
    };

// tasks
// перезагрзка страницы
gulp.task('browsersync', function () {
    browserSync.init(
        {
            proxy: {
                target: 'https://dds.loc/',
                // proxyReq: [
                //     function(proxyReq) {
                //         proxyReq.setHeader('X-Special-Proxy-Header', 'foobar');
                //     }
                // ],
                // proxyRes: [
                //     function(proxyRes, req, res) {
                //         console.log(proxyRes.headers);
                //     }
                // ],
                // ws: true
            },
            port: 3000,
            files: [path.src.php],
            https: {
                key: "../../../userdata/config/cert_files/server.key",
                cert: "../../../userdata/config/cert_files/server.crt",
            },
            notify: false
        }

    );
});

// компиляция sass
gulp.task('sass', function () {
    return gulp.src(path.src.sass) // Берем источник
        .pipe(sass()) // Преобразуем Sass в CSS посредством gulp-sass
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true})) // Создаем префиксы
        .pipe(sourcemaps.init())
        .pipe(nano())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.src.css)) // Выгружаем результата в папку
        .pipe(browserSync.reload({stream: true})); // Обновляем CSS на странице при изменении
});
// js
gulp.task('js', function () {
    gulp.src(path.src.libsjs)
        .pipe(include())
        .on('error', console.log)
        // .pipe(uglify())
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.src.js)) // Выгружаем в папку app/js
        .pipe(browserSync.reload({stream: true})); // Обновляем CSS на странице при изменении
});

//работа с изображениями
gulp.task('img', function () {
    return gulp.src(path.src.img) // Берем все изображения из app
        .pipe(imagemin({
            interlaced: true,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(path.dist.img)); // Выгружаем на продакшен
});
//очистка папки перед билдом
gulp.task('clean', function () {
    return gulp.src(path.dist.clean)               // выберае папку
        .pipe(clean({force: true}));                     // очистка
});
// выгружаем скомпилированный проект в продакшен
gulp.task('build', gulp.series('clean', 'img', 'sass', function () {
    gulp.src(path.src.css + '**/*.css')  //css
        .pipe(gulp.dest(path.dist.css));
    gulp.src(path.src.fonts)            // fonts
        .pipe(gulp.dest(path.dist.fonts));
    gulp.src(path.src.js)               //js
        .pipe(gulp.dest(path.dist.js));
    gulp.src(path.src.libsjs)               //jslibs
        .pipe(gulp.dest(path.dist.libs));
    gulp.src(path.src.img)               //img
        .pipe(gulp.dest(path.dist.img));
    gulp.src(path.src.html)               //folder
        .pipe(gulp.dest(path.dist.folder));
}));
//
// наблюдение за изменением файлов
gulp.task('watch', gulp.series('sass', 'browsersync', function () {
    gulp.watch(path.src.sass, ['sass']); // Наблюдение за sass файлами в папке sass
    // gulp.watch(path.src.html, browsersync.reload); // Наблюдение за HTML файлами в корне проекта
    // gulp.watch(path.src.php, browserSync.reload); // Наблюдение за php файлами в корне проекта
    gulp.watch(path.src.js, ['js']); // Наблюдение за js файлами в корне проекта
    // gulp.watch(path.src.libsjs, browsersync.reload); // Наблюдение за js библиотеками в корне проекта
}));


// отмечаем скрипт по умолчанию
gulp.task('default', gulp.series('watch'));
