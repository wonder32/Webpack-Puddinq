# Webpack-Wordpress-Phpstorm

This folder has the basic structure to build or redesign your own the in order to use webpack to compile
your sass files to css in a different folder and to build your javascript in the es6 format, so you will
end up with one javascript files in the production environment while working with separate debuggable 
modules in your development environment.

## Key features

* compile scss to css
* compile your es6 application to one bundle
* working with webpack
* use watch to automate all on the fly

## Basic start

```
    //git clone or download the repo
    git clone https://github.com/wonder32/Webpack-Wordpress-Phpstorm.git your-theme-name

    cd your-theme-name
    npm install
    npm run dev
```

## The explanation for the parts in the sum of all parts

This setup is an example, but you might start with bringing this example directly in your theme.
To make this work out of the box after (basic start) you have two options: development or production.
But there are a number of configurable options you might want to change, I wil try to explain most of
those options.

### Basic usage

There are to options that work out of the box: 

* development mode (npm run dev)  
  With the 'npm run dev' command a watch listener will stay active to update your styles and javascript 
  as they are edited in development. You will have to reload your page to see the changes.
* production mode: (npm run build)
  With 'npm run build' your files will be compiled once in minified versions, so they are optimized for
  your production environment.
  
### webpack.config.js

The webpack.config.js has al the settings how the scss and javascript needs to be converted.



