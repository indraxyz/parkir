// custom tailwind

module.exports = {
    purge: [],
    theme: {
        fontFamily: {
            ubuntu: ["Ubuntu"]
        },
        inset: {
            "1/2": "50%"
        },
        extend: {}
    },
    variants: {
        display: ["responsive", "hover", "focus", "group-hover"],
        right: ["responsive", "hover", "focus", "group-hover"]
    },
    plugins: []
};
