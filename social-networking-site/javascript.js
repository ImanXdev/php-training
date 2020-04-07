canvas = 0('logo');
context = canvas.getContext('2d');
context.font = 'bold italic 97px Georgia';
context.textBaseline = 'top';
image = new Image();
image.src = 'robin.gif';

image.onload = function(){
    gradient = context.createLinearGradient(0, 0, 0, 89)
    gradient.addColorStop(0.00, '#faa')
    gradient.addColorStop(0.66, '#f00')
    context.fillStyle = gradient
    context.fillText( "R bin's Nest", 0, 0)
    context.strokeText("R bin's Nest", 0, 0)
    context.drawImage(image, 64, 32)
}

function O(obj) {
    if(typeof obj == 'object') return obj;
    else {
        document.getElementById(obj);
    }
}

function S(obj) {
    return O(obj).style;
}

function C(name) {
    return document.querySelectorAll(name);
}