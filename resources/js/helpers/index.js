export function shuffle(array) {
    const shuffledColors = array.slice();
    for (let i = shuffledColors.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffledColors[i], shuffledColors[j]] = [shuffledColors[j], shuffledColors[i]];
    }
    return shuffledColors;
}

export function createColorPalets(colors) {
    const palets = [];
    for (let i = 0; i < colors.length; i += 10) {
        palets.push(colors.slice(i, i + 10))
    }
    return palets;
}

export const COLORS = [
    "red", "lime", "blue", "yellow", "magenta", "cyan", "orange", "green", "indigo", "violet",
    "aqua", "crimson", "gold", "purple", "pink", "white", "black", "gray", "brown", "olive",
    "maroon", "navy", "teal", "silver", "skyblue", "salmon", "turquoise", "lavender", "chocolate", "coral",
    "darkcyan", "darkgoldenrod", "darkgray", "darkgreen", "darkkhaki", "darkmagenta", "darkolivegreen",
    "darkorange", "darkorchid", "darkred", "darksalmon", "darkseagreen", "darkslateblue", "darkslategray",
    "darkturquoise", "darkviolet", "deeppink", "deepskyblue", "dimgray", "firebrick", "floralwhite", "forestgreen",
    "gainsboro", "ghostwhite", "goldenrod", "honeydew", "hotpink", "indianred", "ivory", "khaki", "lavenderblush",
    "lemonchiffon", "lightblue", "lightcoral", "lightcyan", "lightgoldenrodyellow", "lightgreen", "lightgrey", "lightpink",
    "lightsalmon", "lightseagreen", "lightskyblue", "lightslategray", "lightsteelblue", "lightyellow", "linen",
    "mediumaquamarine", "mediumblue", "mediumorchid", "mediumpurple", "mediumseagreen", "mediumslateblue", "mediumspringgreen",
    "mediumturquoise", "mediumvioletred", "midnightblue", "mintcream", "mistyrose", "moccasin", "navajowhite", "oldlace",
    "olivedrab", "orangered", "orchid", "palegoldenrod", "palegreen", "paleturquoise", "palevioletred", "papayawhip", "peachpuff",
    "peru", "plum", "powderblue", "rosybrown", "royalblue", "saddlebrown", "sandybrown", "seagreen", "seashell", "sienna",
    "slateblue", "slategray", "snow", "springgreen", "steelblue", "tan", "thistle", "tomato", "turquoise", "violet", "wheat",
    "whitesmoke", "yellowgreen"
];
