document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('resize', function() {
        var myElements = document.querySelectorAll('.content');
    
        myElements.forEach(function(element) {
            if (window.innerWidth <= 768) {
                element.classList.add('container-fluid');
            } else {
                element.classList.remove('container-fluid');
            }
        });
    }); 
    
    window.dispatchEvent(new Event('resize'));
});
