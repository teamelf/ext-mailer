/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

const gulp = require('teamelf-gulp');

gulp({
  modules: {
    'teamelf/mailer': './js/**/*.js'
  },
  output: './dist/mailer.js'
}, {
  modules: [
    './less/**/*.less'
  ],
  output: './dist/mailer.css'
});
