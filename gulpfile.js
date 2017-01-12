'use strict';

const gulp    = require('gulp');
const plumber = require('gulp-plumber');
const wpPot   = require('gulp-wp-pot');
const sort    = require('gulp-sort'); // Recommended to prevent unnecessary changes in pot-file.

const wpPotOptions = {
    domain         : 'ultimate-page-builder-twitter-bootstrap',
    package        : 'Ultimate Page Builder Twitter Bootstrap',
    bugReport      : 'https://github.com/EmranAhmed/ultimate-page-builder-twitter-bootstrap/issues',
    lastTranslator : 'ThemeHippo <themehippo@gmail.com>',
    team           : 'ThemeHippo <themehippo@gmail.com>',

    destFile      : 'ultimate-page-builder-twitter-bootstrap.pot',
    translatePath : './languages'
};

// translate
gulp.task('translate', _ => {
    return gulp.src(`./**/*.php`)
        .pipe(sort())
        .pipe(wpPot(wpPotOptions))
        .pipe(gulp.dest(`${wpPotOptions.translatePath}/${wpPotOptions.destFile}`))
});

// yarn run build
gulp.task('build', ['translate']);