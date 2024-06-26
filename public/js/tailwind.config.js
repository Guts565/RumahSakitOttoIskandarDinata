module.exports = {
    theme: {
        fontFamily: {
            sans: ["Roboto", "sans-serif"],
            // Jika ingin mengubah juga untuk body, bisa tambahkan di sini
            body: ["Roboto", "sans-serif"],
        },
    },
    // Opsional: menonaktifkan preflight untuk memungkinkan pengaturan custom tanpa diset ulang oleh Tailwind
    corePlugins: {
        preflight: false,
    },
};
