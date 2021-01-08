// initialisation navbar
document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('.sidenav');
    const instances = M.Sidenav.init(elems, {

    });
});

// initialisation select
document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('select');
    const instances = M.FormSelect.init(elems, {

    });
});
