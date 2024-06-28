module.exports = {
    mode: "jit",
    purge: ["./**/*.html", "./**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", "sans-serif"],
                // Jika ingin mengubah juga untuk body, bisa tambahkan di sini
                body: ["Roboto", "sans-serif"],
            },
        },
    },
    plugins: [],
};
