const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const {
    CleanWebpackPlugin
} = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
// const TreserJs = require('terser-webpack-plugin');




const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');


const entry = {
    main: JS_DIR + '/main.js',
    calendar: ['whatwg-fetch', 'element-remove', JS_DIR + '/calendar.js'],
    frontpage: JS_DIR + '/frontpage.js',
    preloader: JS_DIR + '/preloader.js',
    countdown: JS_DIR + '/countdown.js',
};
const output = {
    path: BUILD_DIR,
    filename: 'production' === process.env.NODE_ENV ? 'js/[name].min.js' : 'js/[name].js',
};

const rules = [{
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: ['@babel/preset-env']
            }
        }
    },
    {
        test: /\.(sass|css|scss)$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader,

            "css-loader",
            "sass-loader",

        ],


    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: {
            loader: 'file-loader',
            options: {
                name: 'images/[name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '.././'
            }
        }
    },
    {
        test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        exclude: [IMG_DIR, /node_modules/],
        use: {
            loader: 'file-loader',
            options: {
                name: 'fonts/[name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '.././'
            }
        }
    }

];

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode)
    }),
    new MiniCssExtractPlugin({
        filename: 'production' === process.env.NODE_ENV ? 'css/[name].min.css' : 'css/[name].css'
    }),
]


module.exports = (env, argv) => ({
    entry: entry,

    output: output,

    devtool: 'source-map',

    module: {
        rules: rules,
    },

    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessor: cssnano
            }),
            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false
            })
          

        ]
    },

    plugins: plugins(argv),

    externals: {
        jquery: 'jQuery'
    }

})