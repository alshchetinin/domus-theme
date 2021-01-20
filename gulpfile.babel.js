import { src, dest, watch, series, parallel} from 'gulp';
import browserSync from "browser-sync";
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
const autoprefixer = require("gulp-autoprefixer");
import imagemin from 'gulp-imagemin';
import del from 'del';
import zip from "gulp-zip";
import replace from "gulp-replace";
import info from "./package.json";

const PRODUCTION = yargs.argv.prod;

export const styles = () => {
  return src('src/sass/bundle.sass')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass.sync().on("error", sass.logError))
    .pipe(gulpif(PRODUCTION, autoprefixer({
      grid: true,
      overrideBrowserslist: ["last 10 versions"]
    })))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'))
    .pipe(server.stream());
}

export const scripts = () => {
  return src(['src/js/bundle.js'])
    .pipe(named())
    .pipe(webpack({
      module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: '[name].js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest('dist/js'));
}


export const clean = () => {
  return del(['dist']);
}

export const copy = () => {
  return src(['src/**/*','!src/{images,js,sass}','!src/{images,js,sass}/**/*'])
    .pipe(dest('dist'));
}

export const images = () => {
  return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
}

export const watchForChanges = () => {
  watch('src/sass/**/*.sass', series(styles));
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], series(copy, reload));
  watch('src/js/**/*.js', series(scripts, reload));
  watch("**/*.php", reload);
}

const server = browserSync.create();
export const serve = done => {
  server.init({
    proxy: "http://domus.local/" // put your local website link here
  });
  done();
};
export const reload = done => {
  server.reload();
  done();
};

export const compress = () => {
  return src([
      "**/*",
      "!node_modules{,/**}",
      "!bundled{,/**}",
      "!src{,/**}",
      "!.babelrc",
      "!.gitignore",
      "!gulpfile.babel.js",
      "!package.json",
      "!package-lock.json",
    ])
    .pipe(replace("_themename", info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(dest('bundled'));
  };


export const dev = series(clean, parallel(styles, images, copy, scripts), serve, watchForChanges);
export const build = series(clean, parallel(styles, images, copy, scripts), compress);
export default dev;

