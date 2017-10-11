module.exports = function(grunt) {
	
	grunt.initConfig({
		csslint: {
			strict: {
				options: {
					important: false
				},
				src: ['controls/**/*.css']
			},
		},
		jshint: {
			files: ['Gruntfile.js', 'controls/**/*.js'],
			options: {
				globals: {
					jQuery: true
				},
				ignores: ['controls/**/*.min.js']
			}
		},
		uglify: {
			my_target: {
				files: {
					'controls/icon-picker/assets/js/jquery.ddslick.min.js': ['controls/icon-picker/assets/js/jquery.ddslick.js']
				}
			}
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-csslint');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['csslint', 'jshint', 'uglify']);
	
};