const purgecss = require('@fullhuman/postcss-purgecss');
const cssnano = require('cssnano');

module.exports = {
    plugins: [
        require('tailwindcss'),
        process.env.NODE_ENV === 'production' ? require('autoprefixer') : null,
        process.env.NODE_ENV === 'production' ? cssnano({
            preset: ['default', {
                discardComments: {
                    removeAll: true,
                },
            }]
        }) : null,
        process.env.NODE_ENV === 'production' ? purgecss({
            content: ['./resources/views/**/*.blade.php', './public/js/*.js'],
            defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
        }) : null,
    ],
};