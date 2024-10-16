import './bootstrap';
import 'flowbite';

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('updateProductButton').click();
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('deleteButton').click();
});

window.addEventListener("load", function(event) {
    document.querySelector('[data-dropdown-toggle="dropdown"]').click();
});
