document.querySelectorAll('.console-img-wrapper').forEach(function(wrapper) {
    const image = wrapper.querySelector('.original-img');
    const hoverImagePath = image.getAttribute('data-hover');
    const consoleName = wrapper.querySelector('.console-name'); 

    wrapper.addEventListener('mouseover', function() {
        wrapper.classList.add('hover'); 
        image.style.transform = 'scale(1.1)';
        image.src = hoverImagePath;
        setTimeout(() => {
            image.style.opacity = '1'; 
            image.style.transform = 'scale(1)'; 
        }, 200); 
    });

    wrapper.addEventListener('mouseout', function() {
        wrapper.classList.remove('hover');
        image.src = image.getAttribute('src').replace('-blue', ''); 
        setTimeout(() => {
            image.style.opacity = '1'; 
            image.style.transform = 'scale(1)'; 
        }, 200); 
    });
});