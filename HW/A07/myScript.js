/**
 * Created by Eric on 9/20/2015.
 */

function getClass(elem){
        var classes = String(elem.className);
        classes = regex.split(" ");
        alert(classes);
}

function addClass(elem, className) {
        elem.className = elem.className + " " +  className;
}