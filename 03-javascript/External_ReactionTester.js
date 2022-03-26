/* variable reference(s) to HTML object(s) */
var span_measurement = document.getElementById("measuredTime");
var div_randomFigure = document.getElementById("randomFigure");

/**
 * round decimal number
 *
 * @param value - value to be rounded
 * @param decimals - how much decimals to be rounded
 */
function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}

/**
 * help function in generating of random number
 *
 * @param min - minimum random value
 * @param max - maximum random value
 *
 * @return generated random value
 */
const generateRandomNumber = (min,max) => {
    return Math.floor(Math.random() * (max-min) + min);
}

/**
 * set value to span HTML object
 *
 * @param value - inner HTML message to span
 */
function setValueToSpan(value) {
    span_measurement.innerHTML = value;
}

/* clear div HTML object style propertie(s) */
function clearFigureDiv() {
    div_randomFigure.style.removeProperty("border-radius");
}

/**
 * set background-color to div HTML object
 *
 * @param value - color value
 *
 * @val   0   => black
 * @val   1   => blue
 * @val   2   => yellow
 * @val   3   => green
 * @val   4   => orange
 * @val   5   => red
 * @val other => black
 */
function setColor(value) {
    var str = "";
    switch(value) {
        case 1:
            str = "blue";
            break;
        case 2:
            str = "yellow";
            break;
        case 3:
            str = "green";
            break;
        case 4:
            str = "orange";
            break;
        case 5:
            str = "red";
            break;
        default:
            str = "black";
    }
    div_randomFigure.style.backgroundColor = str;
}

/**
 * set border radius to div HTML object if there should be circle
 *
 * @param value - check wheter is square or circle
 *
 * @val   0   => circle
 * @val other => square
 */
function setFigureShape(value) {
    if (value == 0) {
        div_randomFigure.style.borderRadius = "50%";
    }
}

/**
 * set width and height to div HTML object
 *
 * @param value - width and height for square/circle
 */
function setFigureDimensions(value) {
    div_randomFigure.style.width = value + "px";
    div_randomFigure.style.height = value + "px";
}

/** 
 * set relative positioning to div HTML object
 *
 * @param val_x - left margin relative positioning
 * @param val_y - top  margin relative positioning
 */
function setPositioning(val_x, val_y) {
    div_randomFigure.style.position = "relative";
    div_randomFigure.style.left = val_x + "px";
    div_randomFigure.style.top = val_y + "px";
}

/* function which generates figure to div HTML object */
function generateFigure() {
    const color = generateRandomNumber(0, 6);
    /**
     * shape 0 => circle
     * shape 1 => square 
     */
    const shape = generateRandomNumber(0, 2);

    /* value for width and height in px */
    const w_h = generateRandomNumber(50, 201); /* value in px */

    /* top and left relative positions in px */
    const pos_x = generateRandomNumber(0, 1001); /* relative position in px */
    const pos_y = generateRandomNumber(0, 501);  /* relative position in px */

    /* clear previous inputs */
    clearFigureDiv();

    /* set color */
    setColor(color);

    /* create figure shape */
    setFigureShape(shape);

    /*set figure dimensions */
    setFigureDimensions(w_h);

    /* set positioning */
    setPositioning(pos_x, pos_y);
}

/* measured time variable(s) */
var startTime = 0;
var endTime   = 0;

/* function which creates new figure and starts measurement */
function startNewIteration() {
    generateFigure();
    startTime = performance.now();
}

div_randomFigure.onclick = function() {
    endTime = performance.now();
    var duration = round((endTime - startTime)/1000, 2) + 's';
    setValueToSpan(duration);

    /* recursive call */
    startNewIteration();
}

/* first call ever */
startNewIteration();
