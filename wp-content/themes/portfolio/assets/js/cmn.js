const header = document.getElementById('masthead');
const toggleNavElm = document.getElementById('toggleNav');

toggleNavElm.addEventListener('click', function() {
    header.classList.toggle('active');
});