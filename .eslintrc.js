module.exports = {
    extends: ['@nuxtjs'],
    // add your custom rules here
    rules: {
        indent: ['error', 4],
        'vue/script-indent': ['error', 4, { baseIndent: 0 }],
        'vue/html-indent': ['error', 4, { baseIndent: 1 }]
    }
}
