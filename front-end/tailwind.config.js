/** @type {import('tailwindcss').Config} */
export default {
  darkMode: "class",
  content: ["./index.html", "**/*.html", "**/**/*.html"],
  theme: {
    extend: {
      content: {
        icon: 'url("./public/assets/icon.svg")',
      },
      colors: {
        primary: "#7E3AF2",
      },
    },
  },
  plugins: [],
};
