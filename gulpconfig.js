module.exports = {
	server: {
		proxy: 'rokka-seikotsu-kokura.local',
		https: false,
		port: 3000,
    open: 'external'
  },

	watch: {
		// watchするファイルを指定する。
		code: [
            './**/*.{php,css}',
			'gulpfile.js',
			'gulpconfig.js',
		]
	}
}