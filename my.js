const ajeq = document.getElementById('ajeq');
const mdeq = document.getElementById('mdeq');
const speq = document.getElementById('speq');
const div1 = document.getElementById('divajq');
const div2 = document.getElementById('divmdq');
const div3 = document.getElementById('divspq');

const ajep = document.getElementById('ajp');
const mdep = document.getElementById('mdep');
const spep = document.getElementById('spep');
const div4 = document.getElementById('divajp');
const div5 = document.getElementById('divmdp');
const div6 = document.getElementById('divsp');

addEventListener("DOMContentLoaded", (event) => {
    ajeq.addEventListener("click", e => {
        div1.style.display = 'block';
    });

    mdeq.addEventListener("click", e => {
        div2.style.display = 'block';
    });

    speq.addEventListener("click", e => {
        div3.style.display = 'block';
    });

    ajep.addEventListener("click", e => {
        div4.style.display = 'block';
        
    });

    mdep.addEventListener("click", e => {
        div5.style.display = 'block';
    });

    spep.addEventListener("click", e => {
        div6.style.display = 'block';
    });
});
