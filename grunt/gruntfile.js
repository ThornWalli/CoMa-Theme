module.exports = function (grunt) {

    grunt.initConfig({

        watch: {
            options: {
                forever: true,
                livereload: {
                    port: 35731
                },
                atBegin: true
            },
            sass: {
                options: {
                    livereload: false
                },
                files: [
                    './src/scss/**/*.scss',
                ],
                tasks: ['sass']
            },

            css: {
                files: ['../style.css', '../critical.css', '../editor.css'],
                tasks: []
            }

        },

        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    sourcemap: 'none'
                },
                files: {
                    '../critical.css': './src/scss/critical.scss',
                    '../style.css': './src/scss/style.scss',
                    '../editor.css': './src/scss/editor.scss'
                }
            }
        },

        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')({
                        browsers: ['> 5%', 'last 2 versions']
                    })
                ]
            },
            dist: {
                src: '../*.css'
            }
        },

        requirejs: {
            embed: {
                options: require('./embed.build.json')
            },
            main: {
                options: require('./main.build.json')
            }
        },

        weinre: {
            dev: {
                options: {
                    httpPort: 8060
                }
            }
        }

    });

    // npm tasks

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-weinre');

    // tasks

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build-sass', ['sass', 'postcss:dist']);
    grunt.registerTask('build-js', ['requirejs']);
    grunt.registerTask('build', ['build-sass', 'build-js']);

};
