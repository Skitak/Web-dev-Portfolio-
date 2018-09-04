/* === dont forget to import scss to main.js file === */


var path = require("path");

module.exports = {
  entry: "./src/main.js",
  watch : true,
  mode: 'production',
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "bundle.js",
    publicPath: "/dist"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: {
          loader: "babel-loader",
          // options: { presets: ["es2015"] }
        }
      },
      {
        test: /\.s?css$/,
        use: [
          {
            loader: "style-loader" // creates style nodes from JS strings
          },
          {
            loader: "css-loader" // translates CSS into CommonJS
          },
          {
            loader: "sass-loader" // compiles Sass to CSS
          }
        ]
      },{
        test: /\.(gif|png|jpg|jpe?g|svg)/i,
        use: [
          "file-loader",
          {
            loader: "image-webpack-loader",
            // options: {
            //   mozjpeg: {
            //     progressive: true,
            //     quality: 65
            //   },
            //   // optipng.enabled: false will disable optipng
            //   optipng: {
            //     enabled: false,
            //   },
            //   pngquant: {
            //     quality: '65-90',
            //     speed: 4
            //   },
            //   gifsicle: {
            //     interlaced: false,
            //   },
            //   // the webp option will enable WEBP
            //   webp: {
            //     quality: 75
            //   }
            // }
          }
        ]
      }
    ]
  }
};