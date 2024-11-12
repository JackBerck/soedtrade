/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{html,js,php}"],
  theme: {
    extend: {
      container: {
        center: true,
      },
      colors: {
        "blue-base": "#1a73e8",
        "dark-base": "#111827",
        "light-base": "#f9fafb",
        "green-base": "#22c525",
      },
      fontFamily: {
        poppins: "Poppins",
      },
    },
  },
  plugins: [],
};
